@extends('layouts.app')
<style>
    .page-item.active .page-link{
        z-index: 3;
        color: #fff !important  ;
        background-color: #000ed6 !important;
        border-color: #000ed6 !important;
        border-radius: 50%;
        padding: 6px 12px;
    }
    .page-link{
        z-index: 3;
        /* color: #00ACD6 !important; */
        background-color: #fff;
        border-color: #007bff;
        border-radius: 50%;
        padding: 6px 12px !important;
    }
    .page-item:first-child .page-link{
        border-radius: 30% !important;
    }
    .page-item:last-child .page-link{
        border-radius: 30% !important;   
    }
    .pagination li{
        padding: 3px;
    }
    .disabled .page-link{
        color: #212529 !important;
        opacity: 0.5 !important;
    }
	.center-block {
		display: table;  /* Instead of display:block */
		margin-left: auto;
		margin-right: auto;
		padding-top: 50px;
	}
	.btn-search{
		background: #F28123 !important;
	}
	.btn-search:hover{
		background: #a75009 !important;
	}
	.search-icon{
		color: #fff !important;
	}
	.breadcrumb-section{
		padding-top: 100px !important;
        padding: 100px 0 !important;
	} 
	
</style>
@section('content')
    <!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						{{-- <p>GET 24/7 SUPPORT</p> --}}
						<h1>{{ $sub_header }}</h1>
					</div>
				</div>
			</div>

			{{-- <form action="#" method="post"> --}}
				<div class="input-group center-block w-50">
					<input type="text" class="form-control" placeholder="Search News">
					<div class="input-group-append">
						<button class="btn btn-search" type="button" id="search-news">
							<i class="fa fa-search search-icon"></i>
						</button>
					</div>
				</div>
			{{-- </form> --}}
			
		</div>
	</div>
	<!-- end breadcrumb section -->
	<!-- latest news -->
	<div class="latest-news mt-100 mb-100">
		<div class="container">

			<div id="preview-news">
				{{-- show data news --}}
			</div>

			{{-- {{ $news->links('vendor.pagination.custom') }} --}}
			
		</div>
	</div>
	<!-- end latest news -->

	<div class="loader" id="loader">
		<div class="loader-inner">
			<div class="circle"></div>
		</div>
	</div>
	
@endsection
@push('js')
	<script src="{{ asset('assets/js/custom.js') }}"></script>
	<script>
		$(document).ready(function(){
			setTimeout(function() {
				$("#search-news").trigger('click');
			}, 10);

			$(document).ajaxStart(function(){
				$("#loader").show();
			});
			$(document).ajaxComplete(function(){
				$("#loader").hide();
			});

			$('#search-news').click(function(){
				var search = $('input[type="text"]').val();
				$.ajax({
					url: "{{ route($route.'search') }}",
					type: "POST",
					data: {
						search: search,
						_token: "{{ csrf_token() }}"
					},
					success: function(data){
						$('#preview-news').html(data);
					}
				});
			});
			
		});
	</script>
@endpush