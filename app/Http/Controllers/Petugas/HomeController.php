<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Pengaduan;
use View;


class HomeController extends Controller
{
    protected $view;
    protected $route;

    public function __construct(){
        $this->route = 'petugas.home';
        $this->view = 'pages.petugas.home';

        View::share('route', $this->route);
        View::share('view', $this->view);
    }

    public function index(){
        $auth = auth()->guard('petugas')->user();

        $model = Pengaduan::orderBy('created_at', 'DESC');
        if ($auth->level != 'admin') {
            $model = $model->where('village_id', $auth->village_id);
        }
        
        $recentPengaduan = $model->limit(7)->get();

        
        if ($auth->level == 'admin') {
            $cardPengaduan['0'] = Pengaduan::where('status', '0')->count();
            $cardPengaduan['proses'] = Pengaduan::where('status', 'proses')->count();
            $cardPengaduan['selesai'] = Pengaduan::where('status', 'selesai')->count();
        }else{
            $cardPengaduan['0'] = Pengaduan::where('status', '0')->count();
            $cardPengaduan['proses'] = Pengaduan::where('status', 'proses')->count();
            $cardPengaduan['selesai'] = Pengaduan::where('status', 'selesai')->count();
        }

        return view($this->view, compact('recentPengaduan', 'cardPengaduan'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
        ]);
        $payload = $request->all();
        $data = $this->model->create($payload);

        return to_route($this->route.'index');
    }

    public function edit($id){
        $data = $this->model->find($id);
        $datas = $this->model->get();

        return view($this->view.'index', compact('data', 'datas'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required',
        ]);
        
        $model = $this->model->find($id);
        $payload = $request->all();
        $data = $model->update($payload);

        return to_route($this->route.'index');
    }

    public function destroy($id){
        $model = $this->model->find($id);
        $data = $model->delete();

        return to_route($this->route.'index');
    }


}
