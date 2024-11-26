<!-- RESUME SECTION START -->
<section class="resume" id="resume">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="section-header wow fadeInUp" data-wow-delay=".3s">
                    <h2 class="section-title"><i class="flaticon-recommendation"></i> My Experience</h2>
                </div>

                <div class="resume-widget">
                    @foreach(\App\Models\Experience::all()->sortBy('order') as $experience)
                        <div class="resume-item wow fadeInLeft" data-wow-delay=".4s">
                            <div class="time">
                                {{ $experience->start_date }} - {{ $experience->end_date }}
                            </div>
                            <h3 class="resume-title">{{ $experience->title }}</h3>
                            <div class="institute">
                                {{ $experience->location }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-6">
                <div class="section-header wow fadeInUp" data-wow-delay=".4s">
                    <h2 class="section-title"><i class="flaticon-graduation-cap"></i> My Education</h2>
                </div>

                <div class="resume-widget">
                    @foreach(\App\Models\Education::all()->sortBy('order') as $education)
                        <div class="resume-item wow fadeInRight" data-wow-delay=".5s">
                            <div class="time">
                                {{ $education->start_date }} - {{ $education->end_date }}
                            </div>
                            <h3 class="resume-title">{{ $education->title }}</h3>
                            <div class="institute">
                                {{ $education->school }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- RESUME SECTION END -->
