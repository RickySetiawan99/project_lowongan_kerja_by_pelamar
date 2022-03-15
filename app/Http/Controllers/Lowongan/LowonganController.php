<?php

namespace App\Http\Controllers\Lowongan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hashids;

//load model
use App\Models\Lowongans;

class LowonganController extends Controller
{
    private $title = 'Lowongan';
    private $route = 'lowongan.'; //path awal foldernya ajah (misal folder di admin/dashboard) => 'admin.dashboard'
    private $header = 'Lowongan';
    private $sub_header = 'Artikel Lowongan';

    public function index()
    {
        $data = [
            'title'         => $this->title,
            'route'         => $this->route,
            'header'        => $this->header,
            'sub_header'    => $this->sub_header,
        ];
        
        return view($this->route.'index', $data);
    }

    public function searchLowongan(Request $request)
    {
        $post              = $request->all();
        
        $perusahaanId = $post['perusahaan_id'] ?? NULL;
        $pendidikanId = $post['pendidikan_id'] ?? NULL;
        $keyword      = $post['keyword'] ?? '';

        if(!empty($perusahaanId)){
            $getData = Lowongans::where('perusahaan_id', $perusahaanId)->get();
        }elseif(!empty($pendidikanId)){
            $getData = Lowongans::where('pendidikan_id', $pendidikanId)->get();
        }elseif(!empty($keyword)){
            $getData = Lowongans::where(function($sub_query) use ($keyword){
                        $sub_query->where('keterangan', 'like', '%'.$keyword.'%')
                                ->orWhere('syarat', 'like', '%'.$keyword.'%');
                    })->get();
        }else{
            $getData = Lowongans::get();
        }
        // dd($getData);

        $data = [
            'valSearch'     => NULL,
            'route'         => $this->route,
            'lowongan'      => $getData,
        ];
        // dd($data);
        
        return view($this->route.'data_lowongan', $data);
    }
}
