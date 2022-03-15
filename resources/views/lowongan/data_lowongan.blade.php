<div class="row">
    @if (count($lowongan) > 0)
        @foreach ($lowongan as $key => $value)
            {{-- {{ dd($value) }} --}}
            <div class="col-lg-3 col-md-4">
                {{-- <p>{{ $value->perusahaan->nama }}</p>
                <p>{{ $value->pendidikan->nama }}</p>
                <p>{{ $value->keterangan }}</p>
                <p>{{ $value->syarat }}</p> --}}
                <div class="single-latest-news">
                    {{-- <a href="#"><div class="latest-news-bg news-bg-3"></div></a> --}}
                    <div class="news-text-box">
                        <h3><a href="#">{{ $value->perusahaan->nama }}</a></h3>
                        {{-- info waktu upload/ pasang  --}}
                        {{-- <p class="blog-meta">
                            <span class="author"><i class="fas fa-user"></i> Admin</span>
                            <span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
                        </p> --}}
                        <p class="excerpt">{{ $value->keterangan }}</p>
                        <a href="#" class="read-more">Read More <i class="fas fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
    @else

</div>

<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <label>Hasil Pencarian "{{ $valSearch }}" Tidak Ditemukan</label>
    </div>
    <div class="col-4"></div>
</div>
@endif