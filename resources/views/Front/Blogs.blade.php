@extends('layouts.FrontLayout')

@section('Front-container')
    <style>
        .text-medium {
            font-size: 32px
        }

        .custom-height {
            min-height: 714px;
        }

        @media(max-width:678px) {

            h1 {
                font-size: 1.5rem;
            }

            h2 {
                font-size: 1.2rem;
            }

            .text-medium {
                font-size: 20px
            }

            .custom-height {
                min-height: auto;
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
        }
    </style>
    @if ($blog_header)
        <section class="testimonials-two min-h-85 custom-height"
            style="display:flex; align-items: center;overflow: visible;background-image:url({{ $blog_header->img }});background-position: center bottom;background-repeat: no-repeat;background-size: cover;">
            <div class="container">
                <div class="row flex-center">
                    <div class="col-md-10 col-11">

                        <div class="section-title color-two text-center">
                            <h1 class=" wow pixFadeUp   text-secondry-color "
                                style=" visibility: visible; animation-name: pixFadeUp;">
                                {{ config('app.locale') == 'en' ? $blog_header->name_en : $blog_header->name_ar }}
                            </h1>
                            <span class=" wow pixFadeUp text-center text-white text-medium"
                                style="visibility: visible;line-height: 1.5;margin-top: 31px;display: inline-block;font-weight: 300;">
                                {{ config('app.locale') == 'en' ? $blog_header->des_en : $blog_header->des_ar }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($blog_recent)
        <section class="testimonials-two  " style="overflow: visible;background: #032850;">
            <div class="container">
                <div class="row flex-center">
                    <div class="col-lg-8 col-11">

                        <div class="section-title color-two text-center wow stickySlideDown">
                            <h1 class="  text-secondry-color " style="visibility: visible;">
                                {{ config('app.locale') == 'en' ? $blog_recent->name_en : $blog_recent->name_ar }}
                            </h1>
                            <span class="text-center text-white " style="font-size:23px; visibility: visible;">
                                {{ config('app.locale') == 'en' ? $blog_recent->des_en : $blog_recent->des_ar }}
                            </span>
                        </div>
                    </div>
                </div>
                {{--
                <div class="row align-items-center wow stickySlideUp">
                    @foreach ($posts as $post)
                        <div class="col-md-4 col-lg-4 col-sm-12 mb-5">
                            <a href="/BlogPost/{{ $post->id }}" class="card"
                                style="background: white;border-radius: 30px;">
                                <img src="{{ $post->img }}" style="border-radius: 26px 26px 0px 0px;" /> --}}

                <div class="row wow stickySlideUp default-content">
                    @foreach ($posts as $post)
                        <div class="col-md-4 col-lg-4 col-sm-12 mb-5">
                            <a href="/BlogPost/{{ $post->id }}" class="card"
                                style="background: white;border-radius: 30px; height:100%;">
                                <img src="{{ asset($post->img) }}"
                                    style="border-radius: 26px 26px 0px 0px; aspect-ratio: 16 / 10;" />


                                <div class="my-3 px-2">
                                    <p class="text-start my-2 px-3" style="color: #5A6570;">
                                        {{ \Carbon\Carbon::parse($post->updated_at)->format('M d, Y') }}</p>

                                    <h6 class="text-start my-2 font-Bold px-3">
                                        {{ config('app.locale') == 'en' ? $post->name_en : $post->name_ar }}
                                    </h6>
                                    <h6 class="text-start my-2 font-Light px-3">
                                        {{ config('app.locale') == 'en' ? $post->des_en : $post->des_ar }}
                                    </h6>
                                </div>


                                <div class="mb-3 px-2 ">
                                    @foreach ($post->sections as $detail)
                                        <h6 class="text-start font-Light px-3 py-2">
                                            <i class="fa-solid fa-circle-check " style="color: #6F71FC"></i>
                                            {{ config('app.locale') == 'en' ? $detail->des_en : $detail->des_ar }}
                                        </h6>
                                    @endforeach
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <section class="featured  py-5 mobile-content">
                    <div class="container text-center py-5">
                        <div id="testimonial-wrapper" class="mt-3" data-wow-delay="0.4s"
                            style="visibility: visible; animation-delay: 0.4s; animation-name: pixFadeUp;">
                            <div class="swiper-container service-swiper swiper-container-initialized swiper-container-horizontal"
                                id="testimonial-two" data-speed="700" data-autoplay="5000" data-perpage="3" data-space="10"
                                centeredSlides="true" data-breakpoints="{&quot;991&quot;: {&quot;slidesPerView&quot;: 1}}">
                                <div class="swiper-wrapper"
                                    style="transform: translate3d(-2950px, 0px, 0px); transition-duration: 0ms;">
                                    @foreach ($posts as $post)
                                        <div class="swiper-slide swiper-slide-duplicate-active" data-swiper-slide-index="0"
                                            style="width: 540px;">
                                            <div class="col-sm-12 mb-5">
                                                <a href="/BlogPost/{{ $post->id }}" class="card"
                                                    style="background: white;border-radius: 30px; height:100%;">
                                                    <img src="{{ asset($post->img) }}"
                                                        style="border-radius: 26px 26px 0px 0px; aspect-ratio: 16 / 10;" />


                                                    <div class="my-3 px-2" style="text-align: left">
                                                        <p class="text-start my-2 px-3" style="color: #5A6570;">
                                                            {{ \Carbon\Carbon::parse($post->updated_at)->format('M d, Y') }}
                                                        </p>

                                                        <h6 class="text-start my-2 font-Bold px-3">
                                                            {{ config('app.locale') == 'en' ? $post->name_en : $post->name_ar }}
                                                        </h6>
                                                        <h6 class="text-start my-2 font-Light px-3">
                                                            {{ config('app.locale') == 'en' ? $post->des_en : $post->des_ar }}
                                                        </h6>
                                                    </div>


                                                    <div class="mb-3 px-2" style="text-align: left">
                                                        @foreach ($post->sections as $detail)
                                                            <h6 class="text-start font-Light px-3 py-2">
                                                                <i class="fa-solid fa-circle-check "
                                                                    style="color: #6F71FC"></i>
                                                                {{ config('app.locale') == 'en' ? $detail->des_en : $detail->des_ar }}
                                                            </h6>
                                                        @endforeach
                                                    </div>
                                                </a>
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
            </div>
        </section>
    @endif

@endsection
