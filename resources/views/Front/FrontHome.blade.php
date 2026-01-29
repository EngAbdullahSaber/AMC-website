@extends('layouts.FrontLayout')
@section('Front-container')
    <style>
        .swiper-slide {
            transition: transform 0.3s ease;
        }

        .swiper-slide-next {
            transform: scale(1.1);
        }

        .d-block {
            display: block !important;
        }

        .banner2 {
            position: absolute;
        }

        .header_mobile_img {
            transform: translateX(-35%);
        }

        @media (max-width:992px) {
            .banner2 {
                position: static !important;
                padding-left: 20px
            }
        }

        .mobile-content {
            display: none;
        }

        @media(max-width:768px) {
            .default-content {
                display: none;
            }

            .mobile-content {
                display: block;
            }

            h1 {
                font-size: 1.4rem;
            }

            h2 {
                font-size: 1.2rem;
            }

            h4 {
                font-size: 1.2rem
            }

            .custom-width {
                width: 70%;
            }
        }

        @media(max-width:678px) {
            .text-medium {
                font-size: 20px
            }

            .custom-height {
                min-height: auto;
            }

            .header_mobile_img {
                transform: translateX(-15%);
            }

        }

        @media(max-width:400px) {

            h1 {
                font-size: 1.2rem;
            }

            h2 {
                font-size: 1rem;
            }

            h4 {
                font-size: 1rem
            }

            .custom-width {
                width: 95%;
            }
        }
    </style>
    <div class="background-dark-main-color">
        <section class="testimonials-two pb-0"
            style="background-image:url({{ asset('Front/media/NewBanners/hero-section-1.png') }});background-position: center bottom;background-repeat: no-repeat;background-size: cover;">
            <div class="container">
                <div class="section-title color-two text-center">
                    <h1 class="font-Regular text-white " style="visibility: visible;">
                        {{ __('validation.Header.text') }}
                    </h1>
                    <h1 class="font-Regular mb-4" style="visibility: visible;">
                        <a href="" class="typewrite text-secondry-color" data-period="2000"
                            data-type='[  "{{ __('validation.Header.text2') }}"]'>
                            <span class="wrap"></span>
                        </a>

                    </h1>
                    <a href="{{ route('front.contact') }}" class="new_btn my-3font-Medium" data-wow-delay="0.9s"
                        style="visibility: visible; animation-delay: 0.9s;">
                        {{ __('validation.Header.btn') }}
                    </a>
                </div>
                {{-- @if (session()->has('user_id')) --}}
                <div style="margin-left:0px;margin-right:0px;" class="row flex-center position-relative col-md-9 m-auto">
                    {{-- <img src="{{ asset('upload/items/d75f8108-fa82-4ef9-9d92-c4c96034b61b.png') }}" alt="mpckup"> --}}
                    <img src="{{ asset($home_sections[0]->img) }}" alt="mpckup">
                    <img class="header_mobile_img"
                        style="position: absolute;
                                height: 80%;
                                bottom: 0px;
                                left: 0px;
                                "
                        src="{{ asset($home_sections[0]->img2) }}" alt="mpckup">
                </div>
                {{-- @else
                    <div class="row flex-center">
                        No Image
                    </div>
                @endif --}}
            </div>
        </section>


        {{-- Services --}}
        @if ($services->count() > 0)
            <section class="featured  py-5">
                <div class="container text-center py-5">
                    <h1 class="text-center font-Regular text-secondry-color mb-3"> {{ __('validation.Services.text') }}</h1>
                    <span class="text-center font-Regular text-white  "> {{ __('validation.Services.text2') }}</span>
                    <div id="testimonial-wrapper" class="mt-3" data-wow-delay="0.4s"
                        style="visibility: visible; animation-delay: 0.4s; animation-name: pixFadeUp;">
                        <div class="swiper-container service-swiper swiper-container-initialized swiper-container-horizontal"
                            id="testimonial-two" data-speed="700" data-autoplay="5000" data-perpage="3" data-space="50"
                            data-breakpoints="{&quot;991&quot;: {&quot;slidesPerView&quot;: 1}}">
                            <div class="swiper-wrapper"
                                style="transform: translate3d(-2950px, 0px, 0px); transition-duration: 0ms;">
                                @foreach ($services as $item)
                                    <div class="swiper-slide swiper-slide-duplicate-active" data-swiper-slide-index="0"
                                        style="width: 540px; margin-right: 50px;">
                                        <div class="saaspik-icon-box-wrapper style-one service_box" data-wow-delay="0.3s"
                                            style=" display: flex;
                                                    flex-direction: column;
                                                    justify-content: center;">
                                            <div class="text-center my-1 ">
                                                <img src="{{ $item->img }}" width="25%" alt="">
                                            </div>
                                            <div class="px-3 mt-3">
                                                <h2 class=" font-SemiBold text-center text-main-color "
                                                    style="font-size: 17px;">
                                                    {{ config('app.locale') == 'en' ? $item->name_en : $item->name_ar }}
                                                </h2>
                                                <h5 class="font-Light text-black text-center" style="font-size: 15px;">
                                                    {{ config('app.locale') == 'en' ? $item->des_en : $item->des_ar }}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                        <div class="shape-shadow"></div>
                        <div class="swiper-pagination mt-0"></div>
                        <div class="service-box-arraow slider-nav" data-wow-delay="0.3s"
                            style="visibility: visible; animation-delay: 0.3s; animation-name: pixFadeUp;top:45% !important">
                            <div id="slide-prev" class="swiper-button-prev" tabindex="0" role="button"
                                aria-label="Previous slide">
                                <i class="ei ei-arrow_left"></i>
                            </div>
                            <div id="slide-next" class=" swiper-button-next" tabindex="0" role="button"
                                aria-label="Next slide">
                                <i class="ei ei-arrow_right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if ($banner2)
            <section class="py-5 "
                style="background-image:url({{ asset('Front/media/NewBanners/Frame-1000004482-1.png') }});     background-position: center bottom;background-repeat: no-repeat;background-size: cover;">
                <div class="py-2 ">
                    <div class="row pl-3 justify-content-lg-between justify-content-end">
                        <div class="col-lg-5 pix-order-one pl-lg-5 wow stickySlideDown p-4">
                            <div class="stepper-item ">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon rounded-3">
                                        <img src="{{ asset('Front/media/NewBanners/Frame-17.png') }}" alt="">
                                        <div class="stepper-line h-40px"> </div>
                                    </div>
                                    <div class="stepper-label">
                                        <h2 class="title  text-secondry-color">
                                            {{ config('app.locale') == 'en' ? $banner2->name_en : $banner2->name_ar }}
                                        </h2>
                                        <h6 class=" text-white  font-Light" data-wow-delay="0.3s">
                                            {{ config('app.locale') == 'en' ? $banner2->des_en : $banner2->des_ar }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="stepper-item pt-5 ">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon rounded-3">
                                        <img class="wow pixFadeDown"
                                            src="{{ asset('Front/media/NewBanners/Frame-1000004394.png') }}"
                                            alt="">
                                    </div>
                                    <div class="stepper-label">
                                        @if ($banner2_2)
                                            <h2 class="title  text-secondry-color">
                                                {{ config('app.locale') == 'en' ? $banner2_2->name_en : $banner2_2->name_ar }}
                                            </h2>
                                            <h6 class=" text-white  font-Light" data-wow-delay="0.3s">
                                                {{ config('app.locale') == 'en' ? $banner2_2->des_en : $banner2_2->des_ar }}
                                            </h6>
                                        @else
                                            <h2 class="title  text-secondry-color">
                                                Cost Effective
                                            </h2>
                                            <h6 class=" text-white  font-Light" data-wow-delay="0.3s">
                                                Streamline user interactions, boost
                                                engagement, and maximize revenue effortlessly.
                                            </h6>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 text-end m-0 p-0 pl-3 custom-width">
                            <img src="{{ asset($banner2->img) }}" class="wow slideInRight banner2" alt="informes"
                                style="right: 0; ">
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if ($banner1)
            <section class="testimonials-two pb-0 mt-5"
                style="background-image:url({{ asset('Front/media/NewBanners/dashboard2-1.png') }});background-position: center bottom;background-repeat: no-repeat;background-size: cover;">
                <div class="container wow stickySlideDown">
                    <div class="section-title color-two text-center mb-0">
                        <h1 class=" font-Regular my-4   text-secondry-color" style="visibility: visible">
                            {{ config('app.locale') == 'en' ? $banner1->name_en : $banner1->name_ar }}
                        </h1>

                        <div class="my-4 row flex-center">
                            <div class="col-md-6">
                                <span class="  font-Regular text-white" style="visibility: visible">
                                    {{ config('app.locale') == 'en' ? $banner1->des_en : $banner1->des_ar }}
                                </span>
                            </div>
                        </div>
                        <a href="{{ route('front.contact') }}" class="new_btn my-3 font-Medium" data-wow-delay="0.9s"
                            style="visibility: visible">
                            {{ __('validation.Header.btn2') }}
                        </a>
                    </div>
                </div>
                <div class="container">
                    <div class=" row flex-center mt-3 mx-3">
                        <img class="wow stickySlideUp" src="{{ $banner1->img }}" alt="mpckup">
                    </div>
                </div>
            </section>
        @endif

        @if ($products)
            <section class="default-content featured mt-3">
                <div class="container wow stickySlideDown mt-5">
                    <h1 class="text-center font-Regular text-secondry-color"> {{ __('validation.Products.text') }}</h1>
                    <div class="text-center">
                        <span class="text-center font-Regular text-white my-3 ">
                            {{ __('validation.Products.text2') }}</span>
                    </div>
                </div>
                <div class="container wow stickySlideUp">
                    <div class="row my-5">
                        @foreach ($products as $key => $item)
                            @if ($key < 3)
                                <div class="col-md-4 d-flex">
                                    <div class="saaspik-icon-box-wrapper style-one px-3  pt-3 d-flex flex-column flex-1"
                                        style="  border: solid white 0.5px; border-radius: 30px;min-height: 250px"
                                        data-wow-delay="0.3s">
                                        <div class="text-start my-1 lactic_color  ">
                                            <img src="{{ $item->img }}" width="25%" alt=""
                                                class="rounded-circle">
                                        </div>
                                        <div
                                            class="p-1 py-2 d-flex flex-column flex-1 flex-grow-1 justify-content-between">
                                            <div>
                                                <h2 class=" font-Regular text-secondry-color  text-start"
                                                    style="font-size: 17px;">
                                                    {{ config('app.locale') == 'en' ? $item->name_en : $item->name_ar }}
                                                </h2>
                                                <span class="font-Regular text-white text-start "
                                                    style="font-size: 17px;">
                                                    {{ config('app.locale') == 'en' ? $item->des_en : $item->des_ar }}
                                                </span>
                                            </div>
                                            <div class="flex-1 py-3">
                                                <a class="text-secondry-color" href="{{ route('front.contact') }}"> Find
                                                    Out More
                                                    <img width="5%" class="ml-1"
                                                        src="{{ asset('Front/media/NewBanners/Vector106.png') }}"
                                                        alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </section>
            <section class="mobile-content featured  py-5">
                <div class="container text-center py-5">
                    <h1 class="text-center font-Regular text-secondry-color"> {{ __('validation.Products.text') }}</h1>
                    <span class="text-center font-Regular text-white  "> {{ __('validation.Services.text2') }}</span>
                    <div id="testimonial-wrapper" class="mt-3" data-wow-delay="0.4s"
                        style="visibility: visible; animation-delay: 0.4s; animation-name: pixFadeUp;">
                        <div class="swiper-container service-swiper swiper-container-initialized swiper-container-horizontal"
                            id="testimonial-two" data-speed="700" data-autoplay="5000" data-perpage="3" data-space="50"
                            data-breakpoints="{&quot;991&quot;: {&quot;slidesPerView&quot;: 1}}">
                            <div class="swiper-wrapper "
                                style="transform: translate3d(-2950px, 0px, 0px); transition-duration: 0ms;">
                                @foreach ($products as $item)
                                    <div class="swiper-slide swiper-slide-duplicate-active " data-swiper-slide-index="0"
                                        style="width: 540px; margin-right: 50px;">
                                        <div class="saaspik-icon-box-wrapper style-one px-3 text-left pt-3 d-flex flex-column flex-1"
                                            style="  border: solid white 0.5px; border-radius: 30px;min-height: 250px"
                                            data-wow-delay="0.3s">
                                            <div class="text-start my-1 lactic_color  ">
                                                <img src="{{ $item->img }}" width="25%" alt=""
                                                    class="rounded-circle">
                                            </div>
                                            <div
                                                class="p-1 py-2 d-flex flex-column flex-1 flex-grow-1 justify-content-between">
                                                <div>
                                                    <h2 class=" font-Regular text-secondry-color  text-start"
                                                        style="font-size: 17px;">
                                                        {{ config('app.locale') == 'en' ? $item->name_en : $item->name_ar }}
                                                    </h2>
                                                    <span class="font-Regular text-white text-start "
                                                        style="font-size: 17px;">
                                                        {{ config('app.locale') == 'en' ? $item->des_en : $item->des_ar }}
                                                    </span>
                                                </div>
                                                <div class="flex-1 py-3">
                                                    <a class="text-secondry-color" href="{{ route('front.contact') }}">
                                                        Find
                                                        Out More
                                                        <img width="5%" class="ml-1"
                                                            src="{{ asset('Front/media/NewBanners/Vector106.png') }}"
                                                            alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                        <div class="shape-shadow"></div>
                        <div class="swiper-pagination mt-0"></div>
                        <div class="service-box-arraow slider-nav" data-wow-delay="0.3s"
                            style="visibility: visible; animation-delay: 0.3s; animation-name: pixFadeUp;top:45% !important">
                            <div id="slide-prev" class="swiper-button-prev" tabindex="0" role="button"
                                aria-label="Previous slide">
                                <i class="ei ei-arrow_left"></i>
                            </div>
                            <div id="slide-next" class=" swiper-button-next" tabindex="0" role="button"
                                aria-label="Next slide">
                                <i class="ei ei-arrow_right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <section class="testimonials-two"
            style="background-image:url({{ asset('Front/media/NewBanners/contact-us1.png') }});background-position: center bottom;background-repeat: no-repeat;background-size: cover;">
            <div class="container text-center">
                <div class="section-title color-two text-center wow stickySlideUp">
                    <h1 class=" font-Regular text-secondry-color" style="visibility: visible;">
                        {{ __('validation.Contact.text') }}
                    </h1>
                    <div class="my-3">
                        <span class="text-center font-Regular text-white  my-3 ">
                            {{ __('validation.Contact.text2') }}</span>
                    </div>
                    <a href="{{ route('front.contact') }}" class="new_btn my-3 font-Bold" style="visibility: visible;">
                        {{ __('validation.Contact') }}
                    </a>
                </div>

            </div>
        </section>


        @if ($Testimonials->count() > 0)
            <section class="testimonials-two"
                style="background-image:url({{ asset('Front/media/NewBanners/testimonials1.png') }});background-position: center bottom;background-repeat: no-repeat;background-size: cover;">
                <div class="container wow stickySlideUp">
                    <div class="section-title color-two text-center">
                        <div class="row flex-center">
                            <div class="col-lg-8 col-12">
                                <h1 class="  font-Regular text-white" style="visibility: visible;">
                                    {{ __('validation.testimonials.text') }}
                                </h1>
                            </div>
                        </div>
                    </div><!-- /.section-title -->
                    <div id="testimonial-wrapper" class="" style="visibility: visible; ">
                        <div class="swiper-container service-swiper swiper-container-initialized swiper-container-horizontal"
                            id="testimonial-two" data-speed="700" data-autoplay="5000" data-perpage="3" data-space="50"
                            data-breakpoints="{&quot;991&quot;: {&quot;slidesPerView&quot;: 1}}" data-loop="true">
                            <div class="swiper-wrapper"
                                style="transform: translate3d(-2950px, 0px, 0px); transition-duration: 0ms; padding-top: 28px;">

                                @foreach ($Testimonials as $item)
                                    <div class="swiper-slide swiper-slide-duplicate-active" data-swiper-slide-index="0"
                                        style="width: 540px; margin-right: 50px; height: auto">
                                        <div class="testimonial-two" style="height: 100%">
                                            <div class="testi-content-inner" style="height: 100%; padding:20px">
                                                <div class="testimonial-bio">
                                                    <div class="avatar">
                                                        <img src="{{ $item->img }}" alt="testimonial">
                                                    </div>
                                                    <div class="bio-info">
                                                        <h3 class="name">
                                                            {{ config('app.locale') == 'en' ? $item->name_en : $item->name_ar }}
                                                        </h3>
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="testimonial-content">
                                                    <p>{{ config('app.locale') == 'en' ? $item->des_en : $item->des_ar }}
                                                    </p>
                                                </div>


                                                <div class="quote">
                                                    <img src="{{ asset('Front') }}/media/testimonial/quote.png"
                                                        alt="quote">
                                                </div>
                                            </div>
                                            <div class="shape-shadow"></div>
                                        </div>
                                    </div>
                                @endforeach


                            </div><!-- /.swiper-wrapper -->

                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div><!-- /.swiper-container -->
                        <div class="shape-shadow"></div>


                        <div class="slider-nav wow pixFadeUp" data-wow-delay="0.3s"
                            style="visibility: visible; animation-delay: 0.3s; animation-name: pixFadeUp;">
                            <div id="slide-prev" class="swiper-button-prev" tabindex="0" role="button"
                                aria-label="Previous slide">
                                <i class="ei ei-arrow_left"></i>
                            </div>
                            <div id="slide-next" class=" swiper-button-next" tabindex="0" role="button"
                                aria-label="Next slide">
                                <i class="ei ei-arrow_right"></i>
                            </div>
                        </div>
                    </div>
                    <!-- /#testimonial-wrapper -->


                </div>
                <!-- /.container -->
            </section>
        @endif



        <script>
            $(function() {
                $('#tab0').css('display', 'block')
            })
        </script>
    </div>
@endsection
