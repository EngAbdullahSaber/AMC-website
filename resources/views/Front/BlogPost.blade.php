@extends('layouts.FrontLayout')

@section('Front-container')
    <style>
        @media(max-width:768px) {
            .welcome-section {
                display: block !important;
            }

            .left {
                width: 100% !important;
                text-align: center;
                margin-bottom: 20px;
            }

            .right {
                width: 100% !important;
                text-align: center;
            }
        }

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
        <section class="testimonials-two custom-height"
            style="display:flex; align-items: center;overflow: visible;background-image:url({{ asset($blog_header->img) }});background-position: center bottom;background-repeat: no-repeat;background-size: cover;">
            <div class="container flex-center d-flex">
                <div class="row flex-center" style="width: 100%">
                    <div class="col-lg-10 col-12">

                        <div class="section-title color-two text-center">
                            <h1 class=" wow pixFadeUp   text-secondry-color "
                                style=" visibility: visible; animation-name: pixFadeUp;">
                                {{ config('app.locale') == 'en' ? $blog_header->name_en : $blog_header->name_ar }}
                            </h1>
                            <span class=" wow pixFadeUp text-center text-white text-medium "
                                style="visibility: visible;line-height: 1.5;margin-top: 31px;display: inline-block;font-weight: 300;">
                                {{ config('app.locale') == 'en' ? $blog_header->des_en : $blog_header->des_ar }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <div id="post-section">
        <div class="container wow stickySlideUp">
            <div class="welcome-section">
                <div class="left">
                    <img src="{{ asset($post->img) }}" />
                </div>
                <div class="right">
                    <div class="title">
                        {{ config('app.locale') == 'en' ? $post->name_en : $post->name_ar }}
                    </div>
                    @foreach ($post->sections as $key => $section)
                        @if ($key === 0)
                            <div class="section">
                                <div class="title">
                                    {{ config('app.locale') == 'en' ? $section->des_en : $section->des_ar }}
                                </div>
                                <div class="content">
                                    {{ config('app.locale') == 'en' ? $section->content_en : $section->content_ar }}
                                </div>

                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            @foreach ($post->sections as $key => $section)
                @if ($key !== 0)
                    <div class="section d-sm-flex gap-4">
                        <div class="flex-grow-1 flex-shrink-1 " @if ($section->img) style="flex:1" @endif>
                            <div class="title">
                                {{ config('app.locale') == 'en' ? $section->des_en : $section->des_ar }}
                            </div>
                            <div class="content">
                                {{ config('app.locale') == 'en' ? $section->content_en : $section->content_ar }}
                            </div>
                        </div>
                        @if ($section->img)
                            <div class="flex-grow-1 flex-shrink-1 " style="flex:1">
                                <img src="{{ asset($section->img) }}" />
                            </div>
                        @endif
                    </div>
                @endif
            @endforeach
            <div class="date">
                {{ \Carbon\Carbon::parse($post->updated_at)->format('M d, Y') }}
            </div>
        </div>
    </div>

    <style>
        #post-section {
            background-image: url({{ asset('/Front/bg.png') }});
            background-size: cover;
            padding: 60px 0;
        }

        .welcome-section {
            display: flex;
        }

        .left,
        .right {
            width: 50%;
            padding: 0 20px;
        }

        .left img {
            width: 630px;
            border-radius: 30px;
        }

        .title {
            color: #CCFF00;
            font-size: 28px;
            margin-bottom: 17px;
        }

        .welcome-section,
        .section {
            margin-bottom: 40px;
        }

        .content {
            color: white;
            margin-bottom: 20px;
            white-space: pre-line;
        }

        .right>.title {
            color: white;
            font-size: 32px;
            margin-bottom: 20px;
            line-height: 1.25;
        }

        .date {
            font-size: 20px;
            color: #B2C4D9;
        }

        @media(max-width:769px) {

            .right,
            .left {
                padding: 0px;
                text-align: left;
                white-space: normal
            }

            .title {
                font-size: 18px !important;
            }

            .right>.title {
                text-align: center
            }

            .content {
                white-space: normal
            }

            .date {
                font-size: 16px;
                color: #B2C4D9;
            }

            .no-mp-small {
                margin: 0px;
                padding: 0px;
            }
        }
    </style>


    @if ($blog_recent)
        <section class="testimonials-two no-mp-small" style="overflow: visible;background: #032850;">
            <div class="container wow stickySlideUp">
                <div class="row">
                    <div class="col-12">

                        <div class="section-title color-two text-left no-mp-small">
                            <h1 class="  text-secondry-color " style="visibility: visible;">
                                {{ config('app.locale') == 'en' ? $blog_recent->name_en : $blog_recent->name_ar }}
                            </h1>

                        </div>
                    </div>
                </div>
                <div class="row wow stickySlideUp default-content">
                    @foreach ($posts as $post)
                        <div class="col-md-4 col-lg-4 col-sm-12 mb-5">
                            <a href="/BlogPost/{{ $post->id }}" class="card"
                                style="background: white;border-radius: 30px;height:100%;">
                                <img src="{{ asset($post->img) }}" style="border-radius: 26px 26px 0px 0px;" />


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
                                <div class="mb-3 px-2">

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
                <section class=" mobile-content">
                    <div class="container text-center pb-5">
                        <div id="testimonial-wrapper" class="mt-3" data-wow-delay="0.4s"
                            style="visibility: visible; animation-delay: 0.4s; animation-name: pixFadeUp;">
                            <div class="swiper-container service-swiper swiper-container-initialized swiper-container-horizontal"
                                id="testimonial-two" data-speed="700" data-autoplay="5000" data-perpage="1" data-space="50"
                                centeredSlides="true"
                                data-breakpoints="{&quot;991&quot;: {&quot;slidesPerView&quot;: 1,&quot;centeredSlides&quot;: true}}">
                                <div class="swiper-wrapper"
                                    style="transform: translate3d(-2950px, 0px, 0px); transition-duration: 0ms;">
                                    @foreach ($posts as $post)
                                        <div class="swiper-slide swiper-slide-duplicate-active" data-swiper-slide-index="0"
                                            style="width: 540px;">
                                            <div class="col-12 mb-5" style="padding: 0px">
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
