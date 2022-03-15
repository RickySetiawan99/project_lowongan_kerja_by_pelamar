<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// load model
use App\Models\News;

class HomeController extends Controller
{
    private $title = 'Home';
    private $route = 'home.'; //path awal foldernya ajah (misal folder di admin/dashboard) => 'admin.dashboard'
    private $header = 'Home';
    private $sub_header = 'Home';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_news = News::orderBy('created_at', 'desc')->paginate(4);

        $data = [
            'title'         => $this->title,
            'route'         => $this->route,
            'header'        => $this->header,
            'sub_header'    => $this->sub_header,
            'news'          => $data_news,
        ];
        
        return view($this->route.'index', $data);
    }
}
