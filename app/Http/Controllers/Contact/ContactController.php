<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $title = 'Contact';
    private $route = 'contact.'; //path awal foldernya ajah (misal folder di admin/dashboard) => 'admin.dashboard'
    private $header = 'Contact';
    private $sub_header = 'Contact Us';

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
