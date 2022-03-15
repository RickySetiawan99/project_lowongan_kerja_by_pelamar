<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    private $title = 'About';
    private $route = 'about.'; //path awal foldernya ajah (misal folder di admin/dashboard) => 'admin.dashboard'
    private $header = 'About';
    private $sub_header = 'About Us';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
}
