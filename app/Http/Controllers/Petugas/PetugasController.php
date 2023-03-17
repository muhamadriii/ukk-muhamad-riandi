<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Petugas;
use App\Models\Village;
use View;
use Hash;


class PetugasController extends Controller
{
    protected $view;
    protected $route;

    public function __construct(Petugas $model){
        $this->model = $model;
        $this->route = 'petugas.petugas.';
        $this->view = 'pages.petugas.petugas.';
        $this->village = Village::orderBy('name', 'ASC')->get();

        View::share('village', $this->village);
        View::share('route', $this->route);
        View::share('view', $this->view);
    }

    public function index(){
        $datas = $this->model->with('village')->get();
        return view($this->view.'index', compact('datas'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'village_id' => 'required',
            'name' => 'required',
            'username' => 'required|unique:masyarakats,username|unique:petugas,username',
            'level' => 'required',
            'telp' => 'required',
            'password' => 'required|min:5|max:15',
        ]);

        $payload = $request->all();
        $payload['password'] = Hash::make($request->password);
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
            'name' => 'required',
            'username' => 'required|unique:masyarakats,username',
            'level' => 'required',
            'telp' => 'required',
            'password' => 'required|min:5|max:15',
        ]);

        $payload = $request->all();
        $payload['password'] = Hash::make($request->password);
        $data = $model->update($payload);

        return to_route($this->route.'index');
    }

    public function destroy($id){
        $model = $this->model->find($id);
        $data = $model->delete();

        return to_route($this->route.'index');
    }


}
