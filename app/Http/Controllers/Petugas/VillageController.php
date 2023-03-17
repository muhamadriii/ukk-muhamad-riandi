<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Village;
use View;


class VillageController extends Controller
{
    protected $view;
    protected $route;

    public function __construct(Village $village){
        $this->model = $village;
        $this->route = 'petugas.village.';
        $this->view = 'pages.petugas.village.';

        View::share('route', $this->route);
        View::share('view', $this->view);
    }

    public function index(){
        $datas = $this->model->get();
        return view($this->view.'index', compact('datas'));
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
