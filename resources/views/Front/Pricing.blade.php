@extends('layouts.FrontLayout')
@section('Front-container')
    <style>
        @media(max-width:678px) {

            h1 {
                font-size: 1.3rem;
            }

            h2 {
                font-size: 1.1rem;
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
    @if ($pricing_header)
        <section class="testimonials-two  "
            style="overflow: visible;background-image:url({{ $pricing_header->img }});background-position: center bottom;background-repeat: no-repeat;background-size: cover;">
            <div class="container">
                <div class="row flex-center wow stickySlideUp">
                    <div class="col-md-9 col-11">

                        <div class="section-title color-two text-center">
                            <h1 class="  text-secondry-color " style="visibility: visible; line-height:1.5">
                                {{ config('app.locale') == 'en' ? $pricing_header->name_en : $pricing_header->name_ar }}
                            </h1>
                            <span class="text-center text-white " style="visibility: visible;">
                                {{ config('app.locale') == 'en' ? $pricing_header->des_en : $pricing_header->des_ar }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($support_plan)
        <section class="testimonials-two  "
            style="overflow: visible;background-image:url({{ $support_plan->img }});background-position: center bottom;background-repeat: no-repeat;background-size: cover;">
            <div class="container wow stickySlideUp">
                <div class="row flex-center">
                    <div class="col-md-8 col-11">

                        <div class="section-title color-two text-center">
                            <h1 class="  text-secondry-color " style="visibility: visible">
                                {{ config('app.locale') == 'en' ? $support_plan->name_en : $support_plan->name_ar }}
                            </h1>
                            <span class="text-center text-white " style="visibility: visible">
                                {{ config('app.locale') == 'en' ? $support_plan->des_en : $support_plan->des_ar }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row px-3 default-content">
                    @foreach ($subscriptions as $item)
                        <div @if (!$item->most_popular) style="scale:0.95" @endif
                            class="col-md-4 col-lg-4 col-sm-12 my-3 d-flex">
                            <div class="card justify-content-between" style="flex:1;background: white;border-radius: 30px;">
                                <div>
                                    @if ($item->most_popular)
                                        <img class="subscrebtion_img"
                                            src="{{ asset('Front/media/NewBanners/Vector_270.png') }}" alt="">
                                    @endif
                                    <h5 @if ($item->most_popular) class="text-center my-3 mt-5 pt-4 text-main-dark-color font-Light" @endif
                                        class="text-center my-3 mt-5 text-main-dark-color font-Light">
                                        {{ config('app.locale') == 'en' ? $item->header_en : $item->header_ar }}
                                    </h5>
                                    @if ($item->price == 'Custom' || $item->price == 'Free')
                                        <div class="row flex-center align-items-end">
                                            <h3 class="text-center my-2 ml-2 font-Regular  text-white-secondry-color">
                                                {{ $item->price }}
                                            </h3>
                                        </div>
                                    @elseif ($item->price > 0)
                                        <div class="row flex-center align-items-end">
                                            @if ($item->discount > 0)
                                                <del class="text-center my-2 text-muted  font-Regular ">
                                                    ${{ $item->discount }}
                                                </del>
                                            @endif
                                            <h3 class="text-center my-2 ml-2 font-Regular  text-white-secondry-color">
                                                ${{ $item->price }}<span style="font-size: 15px">/mo</span>
                                            </h3>
                                        </div>
                                    @endif
                                    <h6 class="text-center my-2 font-Bold">
                                        {{ config('app.locale') == 'en' ? $item->name_en : $item->name_ar }}
                                    </h6>
                                    <h6 class="text-center my-2 font-Light px-3">
                                        {{ config('app.locale') == 'en' ? $item->des_en : $item->des_ar }}
                                    </h6>
                                    <div class="d-flex flex-center">
                                        <div class="col-11">
                                            <hr class="px-3 my-3 font-Light purple_color "
                                                style="background: #6F71FC ;align-items: center; padding: 1px; ">
                                        </div>
                                    </div>

                                    <div class="mx-3">
                                        @foreach ($item->details as $detail)
                                            <h6 class="text-start font-Light px-3 py-2">
                                                <i class="fa-solid fa-circle-check " style="color: #6F71FC"></i>
                                                {{ config('app.locale') == 'en' ? $detail->des_en : $detail->des_ar }}
                                            </h6>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="my-3 px-3">
                                    <div class="d-flex flex-center my-5">

                                        <a href="{{ route('front.contact') }}"
                                            class=" btn3 @if ($item->most_popular) active @endif wow pixFadeUp px-3 text-center font-Medium"
                                            style="width: 90%; visibility: visible; animation-delay: 0.6s; animation-name: pixFadeUp;"
                                            data-wow-delay="0.6s">
                                            {{ __('validation.Header.btn2') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- <section class="featured  py-2 mobile-content">
                    <div class="text-center ">
                        <div id="testimonial-wrapper" class="mt-3" data-wow-delay="0.4s"
                            style="visibility: visible; animation-delay: 0.4s; animation-name: pixFadeUp;">
                            <div class="swiper-container service-swiper swiper-container-initialized swiper-container-horizontal"
                                id="testimonial-two" data-speed="700" data-autoplay="5000" data-perpage="3" data-space="50"
                                data-breakpoints="{&quot;991&quot;: {&quot;slidesPerView&quot;: 2}}" style="padding:0px">
                                <div class="swiper-wrapper"
                                    style="transform: translate3d(-2950px, 0px, 0px); transition-duration: 0ms;">
                                    @foreach ($subscriptions as $item)
                                        <div @if (!$item->most_popular) style="scale:0.95" @endif
                                            class="col-10  d-flex">
                                            <div class="card justify-content-between"
                                                style="flex:1;background: white;border-radius: 30px; text-align:left">
                                                <div>
                                                    @if ($item->most_popular)
                                                        <img class="subscrebtion_img"
                                                            src="{{ asset('Front/media/NewBanners/Vector_270.png') }}"
                                                            alt="">
                                                    @endif
                                                    <h5 @if ($item->most_popular) class="text-center my-3 mt-5 pt-4 text-main-dark-color font-Light" @endif
                                                        class="text-center my-3 mt-5 text-main-dark-color font-Light">
                                                        {{ config('app.locale') == 'en' ? $item->header_en : $item->header_ar }}
                                                    </h5>
                                                    @if ($item->price == 'Custom' || $item->price == 'Free')
                                                        <div class="row flex-center align-items-end">
                                                            <h3
                                                                class="text-center my-2 ml-2 font-Regular  text-white-secondry-color">
                                                                {{ $item->price }}
                                                            </h3>
                                                        </div>
                                                    @elseif ($item->price > 0)
                                                        <div class="row flex-center align-items-end">
                                                            @if ($item->discount > 0)
                                                                <del class="text-center my-2 text-muted  font-Regular ">
                                                                    ${{ $item->discount }}
                                                                </del>
                                                            @endif
                                                            <h3
                                                                class="text-center my-2 ml-2 font-Regular  text-white-secondry-color">
                                                                ${{ $item->price }}<span
                                                                    style="font-size: 15px">/mo</span>
                                                            </h3>
                                                        </div>
                                                    @endif
                                                    <h6 class="text-center my-2 font-Bold">
                                                        {{ config('app.locale') == 'en' ? $item->name_en : $item->name_ar }}
                                                    </h6>
                                                    <h6 class="text-center my-2 font-Light px-3">
                                                        {{ config('app.locale') == 'en' ? $item->des_en : $item->des_ar }}
                                                    </h6>
                                                    <div class="d-flex flex-center">
                                                        <div class="col-11">
                                                            <hr class="px-3 my-3 font-Light purple_color "
                                                                style="background: #6F71FC ;align-items: center; padding: 1px; ">
                                                        </div>
                                                    </div>

                                                    <div class="mx-1">
                                                        @foreach ($item->details as $detail)
                                                            <h6 class="text-start font-Light px-3 py-2">
                                                                <i class="fa-solid fa-circle-check "
                                                                    style="color: #6F71FC"></i>
                                                                {{ config('app.locale') == 'en' ? $detail->des_en : $detail->des_ar }}
                                                            </h6>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="my-3 px-3">
                                                    <div class="d-flex flex-center my-5">

                                                        <a href="{{ route('front.contact') }}"
                                                            class=" btn3 @if ($item->most_popular) active @endif wow pixFadeUp px-3 text-center font-Medium"
                                                            style="width: 90%; visibility: visible; animation-delay: 0.6s; animation-name: pixFadeUp;"
                                                            data-wow-delay="0.6s">
                                                            {{ __('validation.Header.btn2') }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                </section> --}}
                <section class="mobile-content  py-lg-5">
                    <div class=" text-center py-5">

                        <div id="testimonial-wrapper" class="mt-3" data-wow-delay="0.4s"
                            style="visibility: visible; animation-delay: 0.4s; animation-name: pixFadeUp;">
                            <div class="swiper-container service-swiper swiper-container-initialized swiper-container-horizontal"
                                style="padding:0" id="testimonial-two" data-speed="700" data-autoplay="5000"
                                data-perpage="3" data-space="50"
                                data-breakpoints="{&quot;991&quot;: {&quot;slidesPerView&quot;: 1}}">
                                <div class="swiper-wrapper"
                                    style="transform: translate3d(-2950px, 0px, 0px); transition-duration: 0ms;">
                                    @foreach ($subscriptions as $item)
                                        <div class="swiper-slide swiper-slide-duplicate-active" data-swiper-slide-index="0"
                                            style="width: 540px; margin-right: 50px;">
                                            <div class="saaspik-icon-box-wrapper style-one   pt-3 d-flex flex-column flex-1"
                                                style=" border-radius: 30px;min-height: 250px" data-wow-delay="0.3s">
                                                <div @if (!$item->most_popular) style="scale:0.95; padding:0 !important;" @endif
                                                    class="col-12 my-3 d-flex">
                                                    <div class="card justify-content-between"
                                                        style="flex:1;background: white;border-radius: 30px;">
                                                        <div>
                                                            @if ($item->most_popular)
                                                                <img class="subscrebtion_img"
                                                                    src="{{ asset('Front/media/NewBanners/Vector_270.png') }}"
                                                                    alt="">
                                                            @endif
                                                            <h5 @if ($item->most_popular) class="text-center my-3 mt-5 pt-4 text-main-dark-color font-Light" @endif
                                                                class="text-center my-3 mt-5 text-main-dark-color font-Light">
                                                                {{ config('app.locale') == 'en' ? $item->header_en : $item->header_ar }}
                                                            </h5>
                                                            @if ($item->price == 'Custom' || $item->price == 'Free')
                                                                <div class="row flex-center align-items-end">
                                                                    <h3
                                                                        class="text-center my-2 ml-2 font-Regular  text-white-secondry-color">
                                                                        {{ $item->price }}
                                                                    </h3>
                                                                </div>
                                                            @elseif ($item->price > 0)
                                                                <div class="row flex-center align-items-end">
                                                                    @if ($item->discount > 0)
                                                                        <del
                                                                            class="text-center my-2 text-muted  font-Regular ">
                                                                            ${{ $item->discount }}
                                                                        </del>
                                                                    @endif
                                                                    <h3
                                                                        class="text-center my-2 ml-2 font-Regular  text-white-secondry-color">
                                                                        ${{ $item->price }}<span
                                                                            style="font-size: 15px">/mo</span>
                                                                    </h3>
                                                                </div>
                                                            @endif
                                                            <h6 class="text-center my-2 font-Bold">
                                                                {{ config('app.locale') == 'en' ? $item->name_en : $item->name_ar }}
                                                            </h6>
                                                            <h6 class="text-center my-2 font-Light px-3">
                                                                {{ config('app.locale') == 'en' ? $item->des_en : $item->des_ar }}
                                                            </h6>
                                                            <div class="d-flex flex-center">
                                                                <div class="col-11">
                                                                    <hr class="px-3 my-3 font-Light purple_color "
                                                                        style="background: #6F71FC ;align-items: center; padding: 1px; ">
                                                                </div>
                                                            </div>

                                                            <div class="mx-3 " style="text-align:left">
                                                                @foreach ($item->details as $detail)
                                                                    <h6 class="text-start font-Light px-3 py-1"
                                                                        style="font-size: 0.8rem">
                                                                        <i class="fa-solid fa-circle-check "
                                                                            style="color: #6F71FC"></i>
                                                                        {{ config('app.locale') == 'en' ? $detail->des_en : $detail->des_ar }}
                                                                    </h6>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="my-3 px-3">
                                                            <div class="d-flex flex-center my-5">

                                                                <a href="{{ route('front.contact') }}"
                                                                    class=" btn3 @if ($item->most_popular) active @endif wow pixFadeUp px-3 text-center font-Medium"
                                                                    style="width: 90%; visibility: visible; animation-delay: 0.6s; animation-name: pixFadeUp;"
                                                                    data-wow-delay="0.6s">
                                                                    {{ __('validation.Header.btn2') }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
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
                </section>
            </div>
        </section>
    @endif

    @if ($product_plan)
        <section class="testimonials-two  "
            style="overflow: visible;background-image:url({{ $product_plan->img }});background-position: center bottom;background-repeat: no-repeat;background-size: cover;">
            <div class="container wow stickySlideUp">
                <div class="row flex-center">
                    <div class="col-lg-8 col-12">

                        <div class="section-title color-two text-center">
                            <h1 class="  text-secondry-color " style="visibility: visible">
                                {{ config('app.locale') == 'en' ? $product_plan->name_en : $product_plan->name_ar }}
                            </h1>
                            <span class="text-center text-white " style="visibility: visible">
                                {{ config('app.locale') == 'en' ? $product_plan->des_en : $product_plan->des_ar }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row default-content">
                    @foreach ($products as $item)
                        <div @if (!$item->most_popular) style="scale:0.95" @endif
                            class="col-md-4 col-lg-4 col-sm-12 my-3 d-flex">
                            <div class="card justify-content-between"
                                style="flex:1;background: white;border-radius: 30px;">
                                <div>
                                    @if ($item->most_popular)
                                        <img class="subscrebtion_img"
                                            src="{{ asset('Front/media/NewBanners/Vector_270.png') }}" alt="">
                                    @endif
                                    <h5 class="text-center my-3 mt-5 pt-4 text-main-dark-color font-Light">
                                        {{ config('app.locale') == 'en' ? $item->header_en : $item->header_ar }}
                                    </h5>
                                    @if ($item->price > 0)
                                        <div class="row flex-center align-items-end">
                                            @if ($item->discount > 0)
                                                <del class="text-center my-2 text-muted  font-Regular ">
                                                    ${{ $item->discount }}
                                                </del>
                                            @endif
                                            <h3 class="text-center my-2 ml-2 font-Regular  text-white-secondry-color">
                                                ${{ $item->price }}<span style="font-size: 15px">/mo</span>
                                            </h3>
                                        </div>
                                    @endif
                                    <h6 class="text-center my-2 font-Bold">
                                        {{ config('app.locale') == 'en' ? $item->name_en : $item->name_ar }}
                                    </h6>
                                    <h6 class="text-center my-2 font-Light px-3">
                                        {{ config('app.locale') == 'en' ? $item->des_en : $item->des_ar }}
                                    </h6>
                                    <div class="d-flex flex-center">
                                        <div class="col-11">
                                            <hr class="px-3 my-3 font-Light purple_color "
                                                style="background: #6F71FC ;align-items: center; padding: 1px; ">
                                        </div>
                                    </div>
                                    <div>
                                        @foreach ($item->details as $detail)
                                            <h6 class="text-start font-Light px-3 py-2">
                                                <i class="fa-solid fa-circle-check " style="color: #6F71FC"></i>
                                                {{ config('app.locale') == 'en' ? $detail->des_en : $detail->des_ar }}
                                            </h6>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="my-3 px-3">

                                    <div class="d-flex flex-center my-5">

                                        <a href="{{ route('front.contact') }}"
                                            class=" btn3 @if ($item->most_popular) active @endif wow pixFadeUp px-3 text-center font-Medium"
                                            style="width: 90%; visibility: visible; animation-delay: 0.6s; animation-name: pixFadeUp;"
                                            data-wow-delay="0.6s">
                                            {{ __('validation.Header.btn2') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <section class="mobile-content  py-lg-5">
                    <div class=" text-center py-5">

                        <div id="testimonial-wrapper" class="mt-3" data-wow-delay="0.4s"
                            style="visibility: visible; animation-delay: 0.4s; animation-name: pixFadeUp;">
                            <div class="swiper-container service-swiper swiper-container-initialized swiper-container-horizontal"
                                style="padding:0" id="testimonial-two" data-speed="700" data-autoplay="5000"
                                data-perpage="3" data-space="50"
                                data-breakpoints="{&quot;991&quot;: {&quot;slidesPerView&quot;: 1}}">
                                {{-- <div class="swiper-container service-swiper swiper-container-initialized swiper-container-horizontal"
                                style="padding:0" id="testimonial-two" data-speed="700" data-autoplay="5000"
                                data-perpage="3" data-space="10" centeredSlides="true"
                                data-breakpoints="{&quot;991&quot;: {&quot;slidesPerView&quot;: 1.3,&quot;centeredSlides&quot;: true}}"> --}}
                                <div class="swiper-wrapper"
                                    style="transform: translate3d(-2950px, 0px, 0px); transition-duration: 0ms;">
                                    @foreach ($products as $item)
                                        <div class="swiper-slide swiper-slide-duplicate-active"
                                            data-swiper-slide-index="0" style="width: 540px; margin-right: 50px;">
                                            <div class="saaspik-icon-box-wrapper style-one   pt-3 d-flex flex-column flex-1"
                                                style=" border-radius: 30px;min-height: 250px" data-wow-delay="0.3s">
                                                <div @if (!$item->most_popular) style="scale:0.95; padding:0 !important;" @endif
                                                    class="col-12 my-3 d-flex">
                                                    <div class="card justify-content-between"
                                                        style="flex:1;background: white;border-radius: 30px;">
                                                        <div>
                                                            @if ($item->most_popular)
                                                                <img class="subscrebtion_img"
                                                                    src="{{ asset('Front/media/NewBanners/Vector_270.png') }}"
                                                                    alt="">
                                                            @endif
                                                            <h5 @if ($item->most_popular) class="text-center my-3 mt-5 pt-4 text-main-dark-color font-Light" @endif
                                                                class="text-center my-3 mt-5 text-main-dark-color font-Light">
                                                                {{ config('app.locale') == 'en' ? $item->header_en : $item->header_ar }}
                                                            </h5>
                                                            @if ($item->price == 'Custom' || $item->price == 'Free')
                                                                <div class="row flex-center align-items-end">
                                                                    <h3
                                                                        class="text-center my-2 ml-2 font-Regular  text-white-secondry-color">
                                                                        {{ $item->price }}
                                                                    </h3>
                                                                </div>
                                                            @elseif ($item->price > 0)
                                                                <div class="row flex-center align-items-end">
                                                                    @if ($item->discount > 0)
                                                                        <del
                                                                            class="text-center my-2 text-muted  font-Regular ">
                                                                            ${{ $item->discount }}
                                                                        </del>
                                                                    @endif
                                                                    <h3
                                                                        class="text-center my-2 ml-2 font-Regular  text-white-secondry-color">
                                                                        ${{ $item->price }}<span
                                                                            style="font-size: 15px">/mo</span>
                                                                    </h3>
                                                                </div>
                                                            @endif
                                                            <h6 class="text-center my-2 font-Bold">
                                                                {{ config('app.locale') == 'en' ? $item->name_en : $item->name_ar }}
                                                            </h6>
                                                            <h6 class="text-center my-2 font-Light px-3">
                                                                {{ config('app.locale') == 'en' ? $item->des_en : $item->des_ar }}
                                                            </h6>
                                                            <div class="d-flex flex-center">
                                                                <div class="col-11">
                                                                    <hr class="px-3 my-3 font-Light purple_color "
                                                                        style="background: #6F71FC ;align-items: center; padding: 1px; ">
                                                                </div>
                                                            </div>

                                                            <div class="mx-3 " style="text-align:left">
                                                                @foreach ($item->details as $detail)
                                                                    <h6 class="text-start font-Light px-3 py-1"
                                                                        style="font-size: 0.8rem">
                                                                        <i class="fa-solid fa-circle-check "
                                                                            style="color: #6F71FC"></i>
                                                                        {{ config('app.locale') == 'en' ? $detail->des_en : $detail->des_ar }}
                                                                    </h6>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="my-3 px-3">
                                                            <div class="d-flex flex-center my-5">

                                                                <a href="{{ route('front.contact') }}"
                                                                    class=" btn3 @if ($item->most_popular) active @endif wow pixFadeUp px-3 text-center font-Medium"
                                                                    style="width: 90%; visibility: visible; animation-delay: 0.6s; animation-name: pixFadeUp;"
                                                                    data-wow-delay="0.6s">
                                                                    {{ __('validation.Header.btn2') }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
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
                </section>
            </div>
        </section>
    @endif

@endsection
