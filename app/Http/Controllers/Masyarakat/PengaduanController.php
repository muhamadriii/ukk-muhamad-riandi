<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Category;
use App\Models\Village;
use View;
use Auth;
use Storage;
use PDF;


class PengaduanController extends Controller
{
    protected $view;
    protected $route;

    public function __construct(Pengaduan $pengaduan){
        $this->model = $pengaduan;
        $this->route = 'masyarakat.pengaduan.';
        $this->view = 'pages.masyarakat.pengaduan.';
        $this->category = Category::orderBy('name', 'ASC')->get();
        $this->village = Village::orderBy('name', 'ASC')->get();

        View::share('village', $this->village);
        View::share('category', $this->category);
        View::share('route', $this->route);
        View::share('view', $this->view);

    }

    public function index(Request $request){
        $url = $request->fullUrl();
        $auth = Auth::guard('masyarakat')->user();

        
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

        $datas = $model->with('pengadu','category', 'village')->where('nik', $auth->nik)->get();
        foreach ($datas as $data) {
            $data->foto = asset('storage/foto-pengaduan').'/'.$data->foto;
        }

        if ($a = $request->pdf == true) {
            return $this->pdf($datas);
        }
        return view($this->view.'index', compact('datas','url'));
    }

    public function store(Request $request){
        $auth = Auth::guard('masyarakat')->user();
        $payload = $request->all();
        $payload['nik'] = $auth->nik;
        $payload['date'] = now();
        $payload['status'] = '0';

        if ($request->file('foto')) {
            $filename = $request->file('foto')->getClientOriginalName();
            Storage::putFileAs(
                'public/foto-pengaduan',
                $request->file('foto'),
                $filename
            );
            $payload['foto'] = $filename;
        }

        $data = $this->model->create($payload);

        return to_route($this->route.'index');
    }

    public function edit(Request $request,$id){
        $auth = Auth::guard('masyarakat')->user();
        $data = $this->model->with('tanggapan', 'tanggapan.petugas')->find($id);
        $datas = $this->model->where('nik', $auth->nik)->get();
        foreach ($datas as $item) {
            $item->foto = asset('storage/foto-pengaduan').'/'.$data->foto;
        }

        if ($request->pdf == 'true' && $data->tanggapan) {
            return $this->pdfSinggle($data);
        }

        return view($this->view.'index', compact('data', 'datas'));
    }

    public function update(Request $request, $id){
        $auth = Auth::guard('masyarakat')->user();
        $model = $this->model->find($id);
        $payload = $request->all();
        $payload['nik'] = $auth->nik;
        $payload['date'] = now();
        $payload['status'] = '0';

        if ($request->file('foto')) {
            $filename = $request->file('foto')->getClientOriginalName();
            Storage::putFileAs(
                'public/foto-pengaduan',
                $request->file('foto'),
                $filename
            );
            $payload['foto'] = $filename;
        }

        $data = $model->update($payload);

        return to_route($this->route.'index');
    }

    public function destroy($id){
        $model = $this->model->find($id);
        $data = $model->delete();

        return to_route($this->route.'index');
    }

    public function pdf($datas){
        $pdf = PDF::loadview($this->view.'alldatapdf',['datas'=>$datas])->setPaper('a4', 'landscape');
        $name = auth()->guard('masyarakat')->user()->name.'-laporan-pengaduan-'.str()->random(5);
    	return $pdf->download($name.'.pdf');
    }

    public function pdfSinggle($data){
        $pdf = PDF::loadview($this->view.'singgle-pdf',['data'=>$data]);
        $name = auth()->guard('masyarakat')->user()->name.'-laporan-'.$data->judul.'-'.str()->random(5);
    	return $pdf->download($name.'.pdf');
    }
}
