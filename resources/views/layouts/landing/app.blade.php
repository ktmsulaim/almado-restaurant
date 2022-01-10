<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="Almado, restaurant" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('assets/landing/images/favicon.png') }}" type="">

    <title>
        @yield('title')
    </title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/landing/css/bootstrap.css') }}" />

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select  -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
        crossorigin="anonymous" />
    <!-- font awesome style -->
    <link href="{{ asset('assets/landing/css/font-awesome') }}.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/landing/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('assets/landing/css/responsive.css') }}" rel="stylesheet" />

</head>

<body>
    @php($logo = \App\CentralLogics\Helpers::get_settings('logo'))
    <!-- header section strats -->
    <header class="header_section">
        <div class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <span>
                        Almado
                    </span>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav  mx-auto ">
                        <li class="nav-item">
                            <a class="nav-link navbar-font" href="{{route('home')}}">{{__('messages.home')}} <span
                                    class="sr-only">(current)</span></a>
                        </li>
                    
                        <li class="nav-item">
                            <a class="nav-link navbar-font" href="{{route('terms-and-conditions')}}">{{__('messages.terms_and_condition')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navbar-font" href="{{route('about-us')}}">{{__('messages.about_us')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navbar-font" href="{{route('contact-us')}}">{{__('messages.contact_us')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navbar-font" href="{{route('privacy-policy')}}">{{__('messages.privacy_policy')}}</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- end header section -->

    @yield('content')

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 footer-col">
                <div class="footer_contact">
                    <h4>
                        Contact Us
                    </h4>
                    <div class="contact_link_box">
                        <a href="">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>
                                {{ \App\CentralLogics\Helpers::get_settings('address') }}
                            </span>
                        </a>
                        <a href="">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>
                                {{ \App\CentralLogics\Helpers::get_settings('phone') }}
                            </span>
                        </a>
                        <a href="">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>
                                {{ \App\CentralLogics\Helpers::get_settings('email_address') }}
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 footer-col">
                <div class="footer_detail">
                    <div>
                        <a class="footer-logo" href="javascript:void(0)">
                            <img class="rounded"
                                onerror="this.src='{{ asset('assets/admin/img/160x160/img2.jpg') }}'"
                                src="{{ asset('storage/business/' . $logo) }}"
                                style="max-width: 80px;">
                        </a>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat repudiandae non ad minima aspernatur ea fugiat deleniti eius eos exercitationem! Optio inventore et, maiores recusandae facilis a numquam porro at!
                    </p>
                    <div class="footer_social">
                        <a href="">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-pinterest" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 footer-col">
                <h4>
                    Opening Hours
                </h4>
                <p>
                    Everyday
                </p>
                <p>
                    10.00 AM -10.00 PM
                </p>
            </div>
        </div>
        <div class="footer-info">
            <p>
                &copy;
                <span id="displayYear">{{ date('Y') }}</span>
                {{ \App\CentralLogics\Helpers::get_settings('footer_text') }}
                <a href="{{ route('home') }}">{{ \App\CentralLogics\Helpers::get_settings('business_name') }}</a><br>
                
                <div class="small text-light">
                    Powered by
                    <a href="https://fathi-tech.com/" class="text-muted" target="_blank">Fathi-Tech Solutions</a>
                </div>
            </p>
        </div>
    </div>
</footer>
<!-- footer section -->

<!-- jQery -->
<script src="{{ asset('assets/landing/js/jquery-3.4.1.min.js') }}"></script>
<!-- popper js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<!-- bootstrap js -->
<script src="{{ asset('assets/landing/js/bootstrap.js') }}"></script>
<!-- owl slider -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- isotope js -->
<script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
<!-- nice select -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
<!-- custom js -->
<script src="{{ asset('assets/landing/js/custom.js') }}"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
<!-- End Google Map -->

</body>

</html>