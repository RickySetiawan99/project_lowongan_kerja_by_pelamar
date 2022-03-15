@foreach ($news as $key => $value)
    <div class="col-lg-4 col-md-6">
        <div class="single-latest-news">
            <a href="single-news.html"><div class="latest-news-bg news-bg-1"></div></a>
            <div class="news-text-box">
                <h3><a href="single-news.html">{{ $value->nama }}</a></h3>
                <p class="blog-meta">
                    <span class="author"><i class="fas fa-user"></i> Admin</span>
                    <span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
                </p>
                <p class="excerpt">{{ $value->deskripsi }}</p>
                <a href="single-news.html" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
            </div>
        </div>
    </div>
@endforeach

{{ $news->links('livewire.livewire-pagination') }}