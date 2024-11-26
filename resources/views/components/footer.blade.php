<!-- FOOTER AREA START -->
<footer class="tj-footer-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="footer-logo-box">
                    <a href="#"><img src="{{asset('assets/img/logo/logo.png')}}" alt=""></a>
                </div>
                <div class="footer-menu">
                    <nav>
                        <ul>
                            <li><a href="{{ route('home') }}#works">Works</a></li>
                            <li><a href="{{ route('home') }}#resume">Resume</a></li>
                            <li><a href="{{ route('home') }}#skills">Skills</a></li>
                            <li><a href="{{ route('home') }}#contact">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="copy-text">
                    <p>&copy; {{ now()->year }} All rights reserved by <a href="{{ route('home') }}">Hugo Mayonobe</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- FOOTER AREA END -->
