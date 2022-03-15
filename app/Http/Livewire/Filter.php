<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use App\Models\News;

class Filter extends Component
{
    use WithPagination;

	public $searchTerm;
    public $currentPage = 1;

    // public function render()
    // {
    //     $searchTerm = '%'.$this->searchTerm.'%';
    //     $getData = User::where(function($sub_query) use ($searchTerm){
    //                     $sub_query->where('name', 'like', '%'.$searchTerm.'%')
    //                             ->orWhere('email', 'like', '%'.$searchTerm.'%');
    //                 })->paginate(3);

    //     $data = [
    //         'users' => $getData,
    //     ];

    //     return view('livewire.filter', $data);
    // }
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $getData = News::where(function($sub_query) use ($searchTerm){
                        $sub_query->where('nama', 'like', '%'.$searchTerm.'%')
                                ->orWhere('deskripsi', 'like', '%'.$searchTerm.'%');
                    })->paginate(3);
        // dd($getData);

        $data = [
            'news' => $getData,
        ];

        return view('livewire.filter', $data);
    }

    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function(){
            return $this->currentPage;
        });
    }
}
