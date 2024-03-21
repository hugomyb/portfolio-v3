@extends('layouts.app', ['title' => $project->name . ' - Hugo Mayonobe'])

@section('content')
    <div class="project-main">
        <div class="popup_modal_img">
            <img src="/storage/{{ $project->thumbnail }}" alt="Projet {{ $project->name }}">
        </div>
        <div class="popup_modal_content">
            <div class="portfolio_info container">
                <div class="portfolio_info_text">
                    <h2 class="title">{{ $project->name }}</h2>
                    <div class="desc">
                        <p>{{ $project->resume }}</p>
                    </div>
                    @if($project->url)
                        <a href="{{ $project->url }}" class="btn tj-btn-primary">live preview <i
                                class="fal fa-arrow-right"></i></a>
                    @endif
                </div>
                <div class="portfolio_info_items">
                    <div class="info_item">
                        <div class="key">Category</div>
                        <div class="value">{{ $project->category->name }}</div>
                    </div>
                    <div class="info_item">
                        <div class="key">Date</div>
                        <div class="value">{{ Carbon\Carbon::parse($project->date)->format('d F Y') }}</div>
                    </div>

                    <div class="portfolio_tags_items">
                        <div class="key">Tags</div>
                        <div class="tags-item">
                            @foreach($project->tags as $tag)
                                <div class="tag-bubble" title="{{ $tag->name }}">
                                    <img src="/storage/{{ $tag->logo }}" alt="Tag {{ $tag->name }}">
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="portfolio_gallery owl-carousel pb-4">
                <div class="gallery_item">
                    <img src="{{asset('assets/img/portfolio-gallery/p-gallery-1.jpg')}}" alt="">
                </div>
                <div class="gallery_item">
                    <img src="{{asset('assets/img/portfolio-gallery/p-gallery-2.jpg')}}" alt="">
                </div>
                <div class="gallery_item">
                    <img src="{{asset('assets/img/portfolio-gallery/p-gallery-3.jpg')}}" alt="">
                </div>
                <div class="gallery_item">
                    <img src="{{asset('assets/img/portfolio-gallery/p-gallery-4.jpg')}}" alt="">
                </div>
            </div>

            @if($project->description)
                <div class="portfolio_description container">
                    <h2 class="title">Project Description</h2>
                    <div class="desc">
                        {!! $project->description !!}
                    </div>
                </div>
            @endif

            <div class="portfolio_navigation">
                @php
                    $nextProject = \App\Models\Project::where('id', '>', $project->id)->orderBy('id')->first() ?? \App\Models\Project::orderBy('id')->first();
                    $prevProject = \App\Models\Project::where('id', '<', $project->id)->orderBy('id', 'desc')->first() ?? \App\Models\Project::orderBy('id', 'desc')->first();
                @endphp
                <div class="navigation_item prev-project">
                    <a href="{{ route('project', $prevProject) }}" class="project">
                        <i class="fal fa-arrow-left"></i>
                        <div class="nav_project">
                            <div class="label">Previous Project</div>
                            <h3 class="title">{{ $prevProject->name }}</h3>
                        </div>
                    </a>
                </div>

                <div class="navigation_item next-project">
                    <a href="{{ route('project', $nextProject) }}" class="project">
                        <div class="nav_project">
                            <div class="label">Next Project</div>
                            <h3 class="title">{{ $nextProject->name }}</h3>
                        </div>
                        <i class="fal fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
