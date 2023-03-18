<?php

namespace App\Http\Controllers;

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
        $this->route = 'home';
        $this->view = 'welcome';

        View::share('route', $this->route);
        View::share('view', $this->view);
    }

    public function index(){
        $auth = auth()->guard('petugas')->user();

        
        $recentPengaduan = Pengaduan::orderBy('created_at')->limit(7)->get();

        $cardPengaduan['0'] = Pengaduan::where('status', '0')->count();
        $cardPengaduan['proses'] = Pengaduan::where('status', 'proses')->count();
        $cardPengaduan['selesai'] = Pengaduan::where('status', 'selesai')->count();
        $cardPengaduan['total'] = Pengaduan::count();
        $datas = Pengaduan::orderBy('created_at','DESC')->limit(7)->get();
        foreach ($datas as $data) {
            $data->foto = asset('storage/foto-pengaduan').'/'.$data->foto;
        }

        return view($this->view, compact('recentPengaduan', 'cardPengaduan', 'datas'));
    }
}
