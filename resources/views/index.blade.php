@extends('layouts.app')

@section('content')
    <!-- HERO SECTION START -->
    <section class="hero-section d-flex align-items-center" id="intro">
        <div class="intro_text">
            <svg viewBox="0 0 1320 300">
                <text x="50%" Y="50%" text-anchor="middle">
                    HI
                </text>
            </svg>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="hero-content-box">
                        <span class="hero-sub-title">I am Hugo</span>
                        <h1 class="hero-title">Laravel Web<br>Developer
                        </h1>

                        <div class="hero-image-box d-md-none text-center">
                            <img src="{{asset('assets/img/hero/me.png')}}" alt="">
                        </div>

                        <p class="lead">French student in Web Development specialized in Laravel, I blend passion and
                            expertise to craft captivating and intuitive web experiences</p>
                        <div class="button-box d-flex flex-wrap align-items-center">
                            <ul class="ul-reset social-icons">
                                <li><a target="_blank" href="https://x.com/hugo_mynb"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a target="_blank" href="https://www.linkedin.com/in/hugo-mayonobe/"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                <li><a target="_blank" href="https://github.com/hugomyb"><i class="fa-brands fa-github"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-none d-md-block">
                    <div class="hero-image-box text-center">
                        <img src="{{asset('assets/img/hero/me.png')}}" alt="Hugo Mayonobe">
                    </div>
                </div>
            </div>

            <div class="funfact-area">
                <div class="row d-flex justify-content-center">
                    <div class="col-4 col-lg-3">
                        <div class="funfact-item d-flex flex-column flex-sm-row flex-wrap align-items-center">
                            <div class="number"><span class="odometer" data-count="5">0</span></div>
                            <div class="text">Years of <br>Experience</div>
                        </div>
                    </div>
                    <div class="col-4 col-lg-3">
                        <div class="funfact-item d-flex flex-column flex-sm-row flex-wrap align-items-center">
                            <div class="number"><span class="odometer" data-count="40">0</span>+</div>
                            <div class="text">Project <br>Completed</div>
                        </div>
                    </div>
                    <div class="col-4 col-lg-3">
                        <div class="funfact-item d-flex flex-column flex-sm-row flex-wrap align-items-center">
                            <div class="number"><span class="odometer" data-count="1">0</span></div>
                            <div class="text">Open-Source <br>Project Contribution</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- HERO SECTION END -->

    @include('sections.portfolio')

    @include('sections.resume')

    @include('sections.skills')

    @include('sections.contact')
@endsection
