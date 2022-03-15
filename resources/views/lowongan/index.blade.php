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

    /* select2 */
    .select2.select2-container {
    width: 100% !important;
    }

    .select2.select2-container .select2-selection {
    border: 1px solid #ccc;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    height: 34px;
    margin-bottom: 15px;
    outline: none !important;
    transition: all .15s ease-in-out;
    }

    .select2.select2-container .select2-selection .select2-selection__rendered {
    color: #333;
    line-height: 32px;
    padding-right: 33px;
    }

    .select2.select2-container .select2-selection .select2-selection__arrow {
    background: #f8f8f8;
    border-left: 1px solid #ccc;
    -webkit-border-radius: 0 3px 3px 0;
    -moz-border-radius: 0 3px 3px 0;
    border-radius: 0 3px 3px 0;
    height: 32px;
    width: 33px;
    }

    .select2.select2-container.select2-container--open .select2-selection.select2-selection--single {
    background: #f8f8f8;
    }

    .select2.select2-container.select2-container--open .select2-selection.select2-selection--single .select2-selection__arrow {
    -webkit-border-radius: 0 3px 0 0;
    -moz-border-radius: 0 3px 0 0;
    border-radius: 0 3px 0 0;
    }

    .select2.select2-container.select2-container--open .select2-selection.select2-selection--multiple {
    border: 1px solid #34495e;
    }

    .select2.select2-container .select2-selection--multiple {
    height: auto;
    min-height: 34px;
    }

    .select2.select2-container .select2-selection--multiple .select2-search--inline .select2-search__field {
    margin-top: 0;
    height: 32px;
    }

    .select2.select2-container .select2-selection--multiple .select2-selection__rendered {
    display: block;
    padding: 0 4px;
    line-height: 29px;
    }

    .select2.select2-container .select2-selection--multiple .select2-selection__choice {
    background-color: #f8f8f8;
    border: 1px solid #ccc;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    margin: 4px 4px 0 0;
    padding: 0 6px 0 22px;
    height: 24px;
    line-height: 24px;
    font-size: 12px;
    position: relative;
    }

    .select2.select2-container .select2-selection--multiple .select2-selection__choice .select2-selection__choice__remove {
    position: absolute;
    top: 0;
    left: 0;
    height: 22px;
    width: 22px;
    margin: 0;
    text-align: center;
    color: #e74c3c;
    font-weight: bold;
    font-size: 16px;
    }

    .select2-container .select2-dropdown {
    background: transparent;
    border: none;
    margin-top: -5px;
    }

    .select2-container .select2-dropdown .select2-search {
    padding: 0;
    }

    .select2-container .select2-dropdown .select2-search input {
    outline: none !important;
    border: 1px solid #34495e !important;
    border-bottom: none !important;
    padding: 4px 6px !important;
    }

    .select2-container .select2-dropdown .select2-results {
    padding: 0;
    }

    .select2-container .select2-dropdown .select2-results ul {
    background: #fff;
    border: 1px solid #34495e;
    }

    .select2-container .select2-dropdown .select2-results ul .select2-results__option--highlighted[aria-selected] {
    background-color: #3498db;
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
            <div class="row mt-10">
                <div class="form-group col-md-3">
                    {{-- <input type="text" class="form-control" placeholder="Perusahaan"> --}}
                    <select class="form-control perusahaan_id" name="perusahaan_id">
                        {{-- <option value="5">KPI Shadow</option> --}}
                    </select>
                </div>
                <div class="form-group col-md-3">
                    {{-- <input type="text" class="form-control" placeholder="Pendidikan"> --}}
                    <select class="form-control pendidikan_id" name="pendidikan_id">
                        {{-- <option value="5">KPI Shadow</option> --}}
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <input type="text" class="form-control keyword" placeholder="Kata Kunci" name="keyword">
                </div>
                <div class="form-group col-md-3">
                    <button type="button" class="btn btn-primary" id="search-lowongan">
                        <i class="flaticon-search"></i> Cari
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

        <div id="preview-lowongan">
            {{-- show data lowongan --}}
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
        setTimeout(function() {
            $("#search-lowongan").trigger('click');
        }, 10);

        // $(document).ajaxStart(function(){
        //     $("#loader").show();
        // });
        // $(document).ajaxComplete(function(){
        //     $("#loader").hide();
        // });

        perusahaanOption = {
            route_to    : '{{ route("global.get_data", ["table" => "perusahaans"]) }}',
            placeholder : 'Pilih Perusahaan',
            allowClear  : true,
        }
        global.init_select2('.perusahaan_id', perusahaanOption);

        pendidikanOption = {
            route_to    : '{{ route("global.get_data", ["table" => "master_pendidikans"]) }}',
            placeholder : 'Pilih Pendidikan',
            allowClear  : true,
        }
        global.init_select2('.pendidikan_id', pendidikanOption);

        $('#search-lowongan').click(function(){
            var keyword         = $('input[type="text"]').val();
            var valPerusahaan   = $('.perusahaan_id').val();
            var valPendidikan   = $('.pendidikan_id').val();
            $.ajax({
                url: "{{ route($route.'search') }}",
                type: "POST",
                data: {
                    keyword: keyword,
                    perusahaan_id: valPerusahaan,
                    pendidikan_id: valPendidikan,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data){
                    $('#preview-lowongan').html(data);
                }
            });
        });
        
    });
</script>
@endpush