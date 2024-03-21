<div class="col-md-12">
    <div class="portfolio-filter text-center wow fadeInUp"
         data-wow-delay=".5s"
         x-init="init()"
         x-data="{
            activeFilter: $wire.$entangle('filter', true),
            activeBgLeft: 0,
            activeBgWidth: 0,

            init() {
                this.updateFilter(0);
            },


            updateFilter(filterId) {
                this.activeFilter = filterId;
                this.$nextTick(() => this.updateActiveBg());
            },

            updateActiveBg() {
                    const activeButton = document.querySelector('.active');
                    let activeBg = document.querySelector('.active-bg');
                    if (!activeButton) return;

                    const buttonGroupRect = document.querySelector('.button-group').getBoundingClientRect();
                    const activeButtonRect = activeButton.getBoundingClientRect();

                    this.activeBgLeft = activeButtonRect.left - buttonGroupRect.left - 7;
                    this.activeBgWidth = activeButtonRect.width  + 15;
            },

         }">
        <div class="button-group filter-button-group" style="position: relative;">
            <button
                :class="activeFilter === 0 ? 'active' : ''"
                @click="updateFilter(0)"
            >All
            </button>
            @foreach($categories as $category)
                <button
                    :class="activeFilter === {{ $category->id }} ? 'active' : ''"
                    @click="updateFilter({{ $category->id }})">{{ $category->name }}</button>
            @endforeach
            <div class="active-bg"
                 :style="`left: ${activeBgLeft}px; width: ${activeBgWidth}px;`"></div>
        </div>
    </div>

    <div class="portfolio-box wow fadeInUp" data-wow-delay=".6s" wire:ignore.self>
        <div class="row">
            @foreach($projects as $project)
                <div class="col-12 col-lg-6 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.2s">
                    <a href="{{ route('project', $project) }}">
                        <div class="portfolio-item"
                             :style="localStorage.getItem('theme') === 'dark' ? 'background-color: var(--tj-theme-accent-2);' : 'background-color: var(--tj-off-white);'">
                            <div class="image-box"
                                 style="background-image: url('/storage/{{ $project->thumbnail }}');"></div>
                            <div class="content-box">
                                <h3 class="portfolio-title">{{ $project->name }}</h3>
                                <p>{{ $project->resume }}</p>
                                <i class="flaticon-up-right-arrow"></i>
                                <a href="{{ route('project', $project) }}"
                                   class="portfolio-link"></a>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
