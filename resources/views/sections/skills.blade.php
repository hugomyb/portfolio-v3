<!-- SKILLS SECTION START -->
<section class="skills-section" id="skills-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-header text-center">
                    <h2 class="section-title wow fadeInUp" data-wow-delay=".3s">My Skills</h2>
                    <p class=" wow fadeInUp" data-wow-delay=".4s">We put your ideas and thus your wishes in the
                        form of a unique web project that inspires
                        you
                        and you customers.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="skills-widget d-flex flex-wrap justify-content-center align-items-center">
                    @foreach(\App\Models\Skill::all()->sortBy('order') as $skill)
                        <div class="skill-item wow fadeInUp" data-wow-delay=".3s">
                            <div class="skill-inner">
                                <div class="icon-box">
                                    <img src="/storage/{{ $skill->logo }}" alt="{{ $skill->name }} Logo">
                                </div>
                            </div>
                            <p>{{ $skill->name }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- SKILLS SECTION END -->
