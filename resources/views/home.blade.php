@extends('layouts.landing.app')

@section('title', 'Home | ' . \App\Models\BusinessSetting::where(['key' => 'business_name'])->first()->value ?? 'Almado
    Arabian Cuisine')

@section('content')
    <div class="hero_area">
        <div class="bg-box">
            <img src="{{ asset('assets/landing/images/hero-bg.jpg') }}" alt="">
        </div>

        @if ($sliders && $sliders->count())
            <!-- slider section -->
            <section class="slider_section ">
                <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($sliders as $key => $slider)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <div class="container ">
                                    <div class="row">
                                        <div class="col-md-7 col-lg-6 ">
                                            <div class="detail-box">
                                                <h1>
                                                    {{ $slider->title }}
                                                </h1>
                                                <p>
                                                    {{ $slider->description }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="container">
                        <ol class="carousel-indicators">
                            @foreach ($sliders as $key => $dot)
                                <li data-target="#customCarousel1" data-slide-to="{{ $key }}"
                                    class="{{ $key == 0 ? 'active' : null }}"></li>
                            @endforeach
                        </ol>
                    </div>
                </div>

            </section>
            <!-- end slider section -->
        @endif
    </div>

    <!-- food section -->

    <section class="food_section layout_padding-bottom layout_padding-top">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Our Menu
                </h2>
            </div>

            <ul class="filters_menu">
                <li class="active" data-filter="*">All</li>
                @if ($categories)
                    @foreach ($categories as $category)
                        <li data-filter=".cat-{{ str_slug($category->name) }}">{{ $category->name }}</li>
                    @endforeach
                @endif
            </ul>

            <div class="filters-content">
                <div class="row grid">
                    @if ($foods)
                        @foreach ($foods as $food)    
                        <div class="col-sm-6 col-lg-4 all cat-{{ str_slug($food->category) }}">
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img src="{{asset('storage/product')}}/{{$food->image}}" onerror="{{asset('assets/admin/img/160x160/img2.jpg')}}" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            {{ $food->name }}
                                        </h5>
                                        <p>
                                            {{ $food->description }}
                                        </p>
                                        <div class="options">
                                            <h6>
                                                {{\App\CentralLogics\Helpers::format_currency($food->price)}}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- end food section -->

     <!-- about section -->

     <section class="about_section layout_padding">
        <div class="container  ">

            <div class="row">
                <div class="col-md-6 ">
                    <div class="img-box">
                        <img src="{{ asset('assets/landing/images/about-img.png') }}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                We Are Almado
                            </h2>
                        </div>
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem praesentium voluptates ab hic, porro aliquid ratione reiciendis qui reprehenderit. Praesentium, magni sunt. Corporis enim libero cupiditate aliquid culpa quia doloremque.
                        </p>
                        <a href="{{ route('about-us') }}">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end about section -->

     <!-- client section -->

     <section class="client_section layout_padding-bottom layout_padding-top">
        <div class="container">
            <div class="heading_container heading_center psudo_white_primary mb_45">
                <h2>
                    What Says Our Customers
                </h2>
            </div>
            <div class="carousel-wrap row ">
                <div class="owl-carousel client_owl-carousel">
                    @foreach(include(public_path('assets/landing_old/data/testimonial.php')) as $data)
                        <div class="item">
                            <div class="box">
                                <div class="detail-box">
                                    <p>
                                        {{$data['detail']}}
                                    </p>
                                    <h6>
                                        {{$data['name']}}
                                    </h6>
                                    <p>
                                        {{$data['position']}}
                                    </p>
                                </div>
                                <div class="img-box">
                                    <img src="{{$data['image']}}" alt="" class="box-img">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- end client section -->
@endsection
