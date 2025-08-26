<section class="link-building-header-section">
    <div class="container link-building-wrapper">
        <!-- Left Content -->
        <div class="link-content">
            <h1>{{ $aboutLinkBuilding->title }}</h1>
            <p class="subheading">{{ $aboutLinkBuilding->subtitle }}</p>
            <ul class="benefits-list">
                @foreach ($aboutLinkBuilding->features as $feature)
                    <li> <span class="check-icon"><i class="fa-solid fa-check"></i></span>{{ $feature }}</li>
                @endforeach

            </ul>
            <div class="button-group service-header-section-btn">
                <a href="{{ $aboutLinkBuilding->button_one_url }}"
                    class="btn btn-link-publisher-primary">{{ $aboutLinkBuilding->button_one_name }}</a>
                <a href="{{ $aboutLinkBuilding->button_two_url }}"
                    class="btn btn-outline-link-publisher">{{ $aboutLinkBuilding->button_two_name }}</a>
            </div>
        </div>

        <!-- Right Video -->
        <div class="video-container">
            <div class="video-wrapper">
                <iframe src="{{ $aboutLinkBuilding->video_url }}" title="Trusted Link Building Services" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
</section>
