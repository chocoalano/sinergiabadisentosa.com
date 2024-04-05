@extends('layouts.app')
@section('title', $content['page-title'])
@section('content-description', $content['page-description'])
@section('content-keyword', $content['page-keywords'])
@section('dark', 'dark')
@section('css', '')
@section('js')
    <script>
        (function() {
            new HSHeader('#header').init()
            new HSShowAnimation('.js-animation-link')
            HSBsValidation.init('.js-validate', {
                onSubmit: data => {
                    data.event.preventDefault()
                    alert('Submited')
                }
            })
            HSBsDropdown.init()
            new HSGoTo('.js-go-to')
            AOS.init({
                duration: 650,
                once: true
            });
            HSCore.components.HSTyped.init('.js-typedjs')
            var sliderThumbs = new Swiper('.js-swiper-thumbs', {
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
                history: false,
                breakpoints: {
                    480: {
                        slidesPerView: 2,
                        spaceBetween: 15,
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 15,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 15,
                    },
                },
                on: {
                    'afterInit': function(swiper) {
                        swiper.el.querySelectorAll('.js-swiper-pagination-progress-body-helper')
                            .forEach($progress => $progress.style.transitionDuration =
                                `${swiper.params.autoplay.delay}ms`)
                    }
                }
            });
            var sliderMain = new Swiper('.js-swiper-main', {
                effect: 'fade',
                autoplay: true,
                loop: true,
                thumbs: {
                    swiper: sliderThumbs
                }
            })
        })()
    </script>
@endsection
@section('main')
    <main id="content" role="main">
        <!-- Hero -->
        <div class="d-lg-flex position-relative">
            <div class="container d-lg-flex align-items-lg-center content-space-t-3 content-space-lg-0 min-vh-lg-100">
                <!-- Heading -->
                <div class="w-100">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="mb-5">
                                <h1 class="display-4 mb-3">
                                    {{ ucfirst($content['hero-content']['title']) }}
                                    <span class="text-primary text-highlight-warning">
                                        <span class="js-typedjs"
                                            data-hs-typed-options='{
                            "strings": ["OEM and ODM.", "Private Label Manufacturer.", "Taste the Quality", "Feel the Difference", "Our Packaging"],
                            "typeSpeed": 100,
                            "loop": true,
                            "backSpeed": 100,
                            "backDelay": 5500
                          }'></span>
                                    </span>
                                </h1>

                                <p class="lead">{{ ucfirst($content['hero-content']['desc']) }}</p>
                            </div>

                            <div class="d-grid d-sm-flex gap-3">
                                <a class="btn btn-primary btn-transition px-6" href="#features">Get started</a>
                                <a class="btn btn-link" href="#news">Learn more <i
                                        class="bi-chevron-right small ms-1"></i></a>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Title & Description -->

                <!-- SVG Shape -->
                <div class="col-lg-7 col-xl-6 d-none d-lg-block position-absolute top-0 end-0 pe-0"
                    style="margin-top: 6.75rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1137.5 979.2">
                        <path fill="#F9FBFF" d="M565.5,957.4c81.1-7.4,155.5-49.3,202.4-115.7C840,739.8,857,570,510.7,348.3C-35.5-1.5-4.2,340.3,2.7,389
                              c0.7,4.7,1.2,9.5,1.7,14.2l29.3,321c14,154.2,150.6,267.8,304.9,253.8L565.5,957.4z" />
                        <defs>
                            <path id="mainHeroSVG1"
                                d="M1137.5,0H450.4l-278,279.7C22.4,430.6,24.3,675,176.8,823.5l0,0C316.9,960,537.7,968.7,688.2,843.6l449.3-373.4V0z" />
                        </defs>
                        <clipPath id="mainHeroSVG2">
                            <use xlink:href="#mainHeroSVG1" />
                        </clipPath>
                        <g transform="matrix(1 0 0 1 0 0)" clip-path="url(#mainHeroSVG2)">
                            <image width="750" height="750" xlink:href="assets/img/750x750/img2.jpg"
                                transform="matrix(1.4462 0 0 1.4448 52.8755 0)"></image>
                        </g>
                    </svg>
                </div>
                <!-- End SVG Shape -->
            </div>
        </div>
        <!-- End Hero -->

        <!-- Card Grid -->
        <div class="container content-space-2 content-space-t-xl-3 content-space-b-lg-3">
            <!-- Heading -->
            <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5">
                <h2>How make your product.</h2>
            </div>
            <!-- End Heading -->

            <!-- list-inline -->
            <div class="text-center mb-10">
                <ul class="list-inline list-checked list-checked-primary">
                    @foreach ($content['card-grid']['list-inline'] as $k)
                        <li class="list-inline-item list-checked-item">{{ ucfirst($k) }}</li>
                    @endforeach
                </ul>
            </div>
            <!-- End list-inline -->

            <!-- Row -->
            <div class="row mb-5 mb-md-5 d-flex justify-content-center">
                @foreach ($content['card-grid']['row'] as $k)
                    <div class="col-sm-6 col-lg-4 mt-3">
                        <div class="card card-sm h-100">
                            <div class="p-2">
                                <img class="card-img" src="{{ $k['cover'] }}" alt="Image Description">
                            </div>

                            <div class="card-body">
                                <h4 class="card-title">{{ ucfirst($k['title']) }}</h4>
                                <p class="card-text">{{ ucfirst($k['desc']) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- End Row -->
        </div>
        <!-- End Card Grid -->

        <!-- Features -->
        <div class="position-relative bg-light rounded-2 mx-3 mx-lg-10" id="features">
            <div class="container content-space-2 content-space-lg-3">
                <!-- Heading -->
                <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5">
                    <h2>{{ ucfirst($content['features']['heading']['title']) }}</h2>
                    <p>{{ ucfirst($content['features']['heading']['desc']) }}</p>
                </div>
                <!-- End Heading -->

                <div class="text-center mb-10">
                    <!-- List Checked -->
                    <ul class="list-inline list-checked list-checked-primary">
                        @foreach ($content['features']['list-checked'] as $k)
                            <li class="list-inline-item list-checked-item">{{ ucfirst($k) }}</li>
                        @endforeach
                    </ul>
                    <!-- End List Checked -->
                </div>
                
                <!-- Row -->
                <div class="row">
                    <!-- Col 1 -->
                    <div class="col-lg-7 mb-9 mb-lg-0">
                        <div class="pe-lg-6">
                            <!-- Browser Device -->
                            <figure class="device-browser">
                                <div class="device-browser-header">
                                    <div class="device-browser-header-btn-list">
                                        <span class="device-browser-header-btn-list-btn"></span>
                                        <span class="device-browser-header-btn-list-btn"></span>
                                        <span class="device-browser-header-btn-list-btn"></span>
                                    </div>
                                    <div class="device-browser-header-browser-bar">sinergiabadisentosa.com</div>
                                </div>

                                <div class="device-browser-frame">
                                    <img class="device-browser-img" src="{{ $content['features']['row']['col-1']['img-browser-devices'] }}"
                                        alt="Image Description">
                                </div>
                            </figure>
                            <!-- End Browser Device -->
                        </div>
                    </div>
                    <!-- End Col 1-->
                    <!-- Col 2 -->
                    <div class="col-lg-5">
                        <!-- Heading -->
                        <div class="mb-4">
                            <h2>{{ ucfirst($content["features"]["row"]["col-2"]["heading"]["title"]) }}</h2>
                            <p>{{ ucfirst($content["features"]["row"]["col-2"]["heading"]["desc"]) }}</p>
                        </div>
                        <!-- End Heading -->

                        <!-- List Checked -->
                        <ul class="list-checked list-checked-primary mb-5">
                            @foreach ($content["features"]["row"]["col-2"]["list-checked"] as $k)
                            <li class="list-checked-item">{{ ucfirst($k) }}</li>
                            @endforeach
                        </ul>
                        <!-- End List Checked -->
                    </div>
                    <!-- End Col 2-->
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- End Features -->

        <!-- work-flow -->
        <div class="container content-space-2 content-space-lg-3">
            <div class="row align-items-md-center">
                <img class="img-fluid rounded-2" src="{{ $content['work-flow'] }}"
                    alt="Image Description">
            </div>
        </div>
        <!-- End work-flow -->

        <!-- Stats -->
        <div class="bg-light rounded-2 mx-3 mx-lg-10">
            <div class="container content-space-2">
                <div class="row justify-content-center">
                    @foreach ($content["stats"] as $k)
                        <!-- Col -->
                    <div class="col-sm-6 col-md-4 mb-7 mb-md-0">
                        <!-- Stats -->
                        <div class="text-center">
                            <h2 class="display-4"><i class="{{ $k['iclass'] }}"></i>{{ $k['title'] }}</h2>
                            <p class="mb-0">{{ $k['desc'] }}</p>
                        </div>
                        <!-- End Stats -->
                    </div>
                    <!-- End Col -->
                    @endforeach
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- End Stats -->

        <!-- Card Content -->
        <div class="container content-space-2 content-space-lg-3" id="news">
            <!-- Heading -->
            <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5">
                <h2>{{ ucfirst($content['card-content']['title']) }}</h2>
            </div>
            <!-- End Heading -->

            <div class="overflow-hidden">
                <div class="row gx-lg-7">
                    @foreach ($content['card-content']['product'] ?? [] as $k => $v)
                        {{-- {{ dd($v) }} --}}
                        <div class="col-sm-6 col-lg-4 mb-5">
                            <a class="card card-flush h-100" href="{{ route('product.show', $v->slug) }}"
                                data-aos="fade-up">
                                <img class="card-img" src="{{ asset('storage/' . $v->image) }}" alt="Image Description">
                                <div class="card-body">
                                    <span class="card-subtitle text-body">Read the article</span>
                                    <h4 class="card-title text-inherit">{{ Str::limit(ucfirst($v->title), 20) }}</h4>
                                    <p class="card-text text-body">{{ Str::limit($v->description, 70) }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <!-- End Row -->
            </div>

            <!-- Card Info -->
            <div class="text-center">
                <div class="card card-info-link card-sm">
                    <div class="card-body">
                       {{ ucfirst($content['card-content']['card']['text-line']) }} <a class="card-link ms-2" href="{{ $content['card-content']['card']['btn-link'] }}">{{ ucfirst($content['card-content']['card']['text-btn']) }} <span
                                class="bi-chevron-right small ms-1"></span></a>
                    </div>
                </div>
            </div>
            <!-- End Card Info -->
        </div>
        <!-- End Card Content -->
    </main>
@endsection
