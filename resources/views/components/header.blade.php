<!-- HEADER START -->
<header class="tj-header-area header-absolute">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex flex-wrap align-items-center">

                <div class="logo-box">
                    <a href="{{ route('home') }}">
                        <img class="logo" src="{{asset('assets/img/logo/logo.png')}}" alt="Logo Hugo Mayonobe">
                    </a>
                </div>

                <div class="header-info-list d-none d-md-inline-block">
                    <ul class="ul-reset">
                        <li><a href="mailto:hugomayonobe@gmail.com">hugomayonobe@gmail.com</a></li>
                    </ul>
                </div>

                <div class="header-menu">
                    <nav>
                        <ul>
                            <li><a href="{{ route('home') }}#works">Works</a></li>
                            <li><a href="{{ route('home') }}#resume">Resume</a></li>
                            <li><a href="{{ route('home') }}#skills">Skills</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="header-button">
                    <a href="#contact" class="btn tj-btn-primary">Contact me !</a>
                </div>

                @include('components.theme-switcher')

                <div class="menu-bar d-lg-none">
                    <button>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
<header class="tj-header-area header-2 header-sticky sticky-out">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex flex-wrap align-items-center">

                <div class="logo-box">
                    <a href="{{ route('home') }}">
                        <img class="logo" src="{{asset('assets/img/logo/logo.png')}}" alt="">
                    </a>
                </div>

                <div class="header-info-list d-none d-md-inline-block">
                    <ul class="ul-reset">
                        <li><a href="mailto:hugomayonobe@gmail.com">hugomayonobe@gmail.com</a></li>
                    </ul>
                </div>

                <div class="header-menu">
                    <nav>
                        <ul>
                            <li><a href="{{ route('home') }}#works">Works</a></li>
                            <li><a href="{{ route('home') }}#resume">Resume</a></li>
                            <li><a href="{{ route('home') }}#skills">Skills</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="header-button">
                    <a href="#" class="btn tj-btn-primary">Contact me !</a>
                </div>

                @include('components.theme-switcher')

                <div class="menu-bar d-lg-none">
                    <button>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- HEADER END -->
