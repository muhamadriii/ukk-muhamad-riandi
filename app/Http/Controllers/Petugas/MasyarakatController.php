<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masyarakat;
use App\Models\Village;
use View;


class MasyarakatController extends Controller
{
    protected $view;
    protected $route;

    public function __construct(Masyarakat $model){
        $this->model = $model;
        $this->route = 'petugas.masyarakat.';
        $this->view = 'pages.petugas.masyarakat.';
        $this->village = Village::orderBy('name', 'ASC')->get();

        View::share('route', $this->route);
        View::share('view', $this->view);
        View::share('village', $this->village);
    }

    public function index(){
        $datas = $this->model->with('village')->get();
        return view($this->view.'index', compact('datas'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'village_id' => 'required',
            'nik' => 'required|integer|unique:masyarakats',
            'name' => 'required',
            'username' => 'required|unique:petugas,username',
            'password' => 'required|max:10|min:4',
            'telp' => 'required|max:13|min:11',
        ]);

        $payload = $request->all();
        $data = $this->model->create($payload);

        return to_route($this->route.'index');
    }

    public function edit($id){
        $data = $this->model->find($id);
        $datas = $this->model->with('village')->get();

        return view($this->view.'index', compact('data', 'datas'));
    }

    public function update(Request $request, $id){
        $model = $this->model->find($id);
        
        $validated = $request->validate([
            'village_id' => 'required',
            'nik' => 'integer|unique:masyarakats',
            'name' => 'required',
            'username' => 'required|unique:petugas,username|unique:masyarakats,username',
            'telp' => 'min:11|max:14'
        ]);

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
