<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">	            
                <input type="text"  class="form-control" placeholder="Search" wire:model="searchTerm" />
	            <table class="table table-bordered" style="margin: 10px 0 10px 0;">
	                <tr>
	                    <th>Name</th>
	                    <th>Email</th>
	                </tr>
	                @foreach($news as $key => $value)
	                <tr>
	                    <td>
	                        {{ $value->nama }}
	                    </td>
	                    <td>
	                        {{ $value->deskripsi }}
	                    </td>
	                </tr>
	                @endforeach
	            </table>
	            {{ $news->links('livewire.livewire-pagination') }}
	            {{-- {{ $users->links('vendor.pagination.custom') }} --}}
	        </div>
	    </div>
	</div>
</div>
