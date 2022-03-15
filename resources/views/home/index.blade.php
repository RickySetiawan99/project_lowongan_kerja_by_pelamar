@extends('layouts.app')

@section('content')

    {{-- slider --}}
    @include('layouts.sliders.slider')
    {{-- end slider --}}

    <!-- features list section -->
	<div class="list-section pt-80 pb-80">
		<div class="container">

			<div class="row">
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-shipping-fast"></i>
						</div>
						<div class="content">
							<h3>Free Shipping</h3>
							<p>When order over $75</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>24/7 Support</h3>
							<p>Get support all day</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="list-box d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fas fa-sync"></i>
						</div>
						<div class="content">
							<h3>Refund</h3>
							<p>Get refund within 3 days!</p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- end features list section -->

    <!-- latest news -->
	<div class="latest-news pt-150 pb-150">
		<div class="container">

			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Our</span> News</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>

			<div class="row">
				@foreach ($news as $key => $value)
					<div class="col-lg-3 col-md-3">
						<div class="single-latest-news">
							<a href="single-news.html"><div class="latest-news-bg news-bg-1"></div></a>
							<div class="news-text-box">
								<h3><a href="{{ route('news.detail', Hashids::encode($value->id)) }}">{{ $value->nama }}</a></h3>
								<p class="blog-meta">
									<span class="author"><i class="fas fa-user"></i> Admin</span>
									<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
								</p>
								<p class="excerpt">{{ $value->deskripsi }}</p>
								<a href="{{ route('news.detail', Hashids::encode($value->id)) }}" class="read-more">Read More <i class="fas fa-angle-double-right"></i></a>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<a href="{{ route('news.index') }}" class="boxed-btn">More News</a>
				</div>
			</div>
		</div>
	</div>
	<!-- end latest news -->

@endsection