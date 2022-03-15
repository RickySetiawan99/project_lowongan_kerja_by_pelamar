<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hashids;

//load model
use App\Models\News;

class NewsController extends Controller
{
    private $title = 'News';
    private $route = 'news.'; //path awal foldernya ajah (misal folder di admin/dashboard) => 'admin.dashboard'
    private $header = 'News';
    private $sub_header = 'News Article';

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

    public function searchNews(Request $request)
    {
        $post              = $request->all();
        // dd($post);

        if(!empty($post['search'])){
            $getData = News::where(function($sub_query) use ($post){
                        $sub_query->where('nama', 'like', '%'.$post['search'].'%')
                                ->orWhere('deskripsi', 'like', '%'.$post['search'].'%');
                    })->paginate(4);
        }else{
            $getData = News::paginate(4);
        }
        // dd($getData);

        $data = [
            'valSearch'     => $post['search'],
            'route'         => $this->route,
            'news'          => $getData,
        ];
        // dd($data);
        
        return view($this->route.'data_news', $data);
    }

    // get Detail news by id
    public function detailNews($news_id)
    {
        $id = Hashids::decode($news_id);

        $getData = News::find($id)->first();
        // dd($getData);

        $data = [
            'title'         => $this->title,
            'route'         => $this->route,
            'header'        => $this->header,
            'sub_header'    => $this->sub_header,
            'news'          => $getData,
        ];
        
        return view($this->route.'detail_news', $data);
    }
}
