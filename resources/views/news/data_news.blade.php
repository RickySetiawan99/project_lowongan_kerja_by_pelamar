<div class="row">
    @if (count($news) > 0)
        @foreach ($news as $key => $value)
            <div class="col-lg-3 col-md-4">
                <div class="single-latest-news">
                    <a href="{{ route('news.detail', Hashids::encode($value->id)) }}"><div class="latest-news-bg news-bg-3"></div></a>
                    <div class="news-text-box">
                        <h3><a href="{{ route('news.detail', Hashids::encode($value->id)) }}">{{ $value->nama }}</a></h3>
                        <p class="blog-meta">
                            <span class="author"><i class="fas fa-user"></i> Admin</span>
                            <span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
                        </p>
                        <p class="excerpt">{{ $value->deskripsi }}</p>
                        {{-- make link redirect to detail_news --}}
                        <a href="{{ route($route.'detail', Hashids::encode($value->id)) }}" class="read-more">Read More <i class="fas fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- {{ $news->links('vendor.pagination.custom') }} --}}
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