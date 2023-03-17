<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Category;
use App\Models\Village;
use View;
use Storage;
use Route;
use PDF;


class PengaduanController extends Controller
{
    protected $view;
    protected $route;

    public function __construct(Pengaduan $model){
        $this->model = $model;
        $this->route = 'petugas.pengaduan.';
        $this->view = 'pages.petugas.pengaduan.';
        $this->category = Category::orderBy('name', 'ASC')->get();
        $this->village = Village::orderBy('name', 'ASC')->get();

        View::share('village', $this->village);
        View::share('category', $this->category);
        View::share('route', $this->route);
        View::share('view', $this->view);
    }

    public function index(Request $request){
        $url = $request->fullUrl();

        $model = $this->model;

        if ($request->strdate) {
            $model = $model->whereDate('date', '>', $request->strdate);
        }

        if ($request->enddate) {
            $model = $model->whereDate('date', '<', $request->enddate);
        }

        if ($request->category && $request->category != 'all') {
            $model = $model->where('category_id', $request->category);
        }

        if ($request->village && $request->village != 'all') {
            $model = $model->where('village_id', $request->village);
        }

        $datas = $model->with('pengadu','category', 'village')->get();


        // $datas = $this->model->with('pengadu','category', 'village')->get();
        foreach ($datas as $data) {
            $data->foto = asset('storage/foto-pengaduan').'/'.$data->foto;
        }



        if ($a = $request->pdf == true) {
            return $this->pdf($datas);
        }

        return view($this->view.'index', compact('datas','url'));
    }

    public function store(Request $request){
        $payload = $request->all();

        if ($request->file('foto')) {
            $filename = $request->file('foto')->getClientOriginalName();
            Storage::putFileAs(
                'public/foto-pengaduan',
                $request->file('foto'),
                $filename
            );
            $payload['foto'] = $filename;
        }
        $payload['date'] = now();
        $payload['nik'] = '111101111000010000';
        $payload['status'] = '0';
        $payload['masyarakat_id'] = auth()->guard('petugas')->user()->id;

        $data = $this->model->create($payload);

        return to_route($this->route.'index');
    }

    public function edit($id){
        $data = $this->model->with('pengadu')->with('village')->with('category')->with('tanggapan')->find($id);
        $datas = $this->model->get();
        foreach ($datas as $item) {
            $item->foto = asset('storage/foto-pengaduan').'/'.$item->foto;
        }

        return view($this->view.'index', compact('data', 'datas'));
    }

    public function destroy($id){
        $model = $this->model->find($id);
        if ($model){
            $data = $model->delete();
        }

        return to_route($this->route.'index');
    }

    public function tanggapan(Request $request, $id){
        $pengaduan = $this->model->find($id);
        $payload = $request->all();
        $payload['date'] = now();
        $payload['petugas_id'] = '1';
        $payload['pengaduan_id'] = $pengaduan->id;
        $tanggapan = Tanggapan::where('pengaduan_id', $id)->first();
        
        if ($tanggapan) {
            $data = $tanggapan->update($payload);
        }else{
            $data = Tanggapan::create($payload);
        }

        $pengaduan->update([
            'status' => $request->status
        ]);
        return to_route($this->route.'index');
    }

    public function pdf($datas){
        $pdf = PDF::loadview($this->view.'alldatapdf',['datas'=>$datas]);
        $name = auth()->guard('petugas')->user()->name.'-laporan-pengaduan-'.str()->random(5);
    	return $pdf->download($name.'.pdf');
    }

}