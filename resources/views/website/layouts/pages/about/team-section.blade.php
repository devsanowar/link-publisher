<section class="our-team-section">
    <div class="container">
        <h4>The Visionaries Behind the Link Building Revolution</h4>
        <div class="our-founder">
            <div class="row gy-4">
                <!-- Founder & CEO -->
                @foreach ($founders as $founder)
                    <div class="col-12 col-md-6">
                        <div class="d-flex flex-column flex-sm-row align-items-center gap-3 h-100">

                            @if ($loop->iteration % 2 != 0)
                                {{-- Odd row --}}
                                <div class="founder-detail text-center text-sm-start">
                                    <h3>{{ $founder->name }}</h3>
                                    <h6>{{ $founder->designation }}</h6>
                                    <a href="{{ $founder->linkedin_url ?? '#' }}" target="_blank">
                                        <img src="{{ asset($founder->social_icon) }}" alt="linkedin" width="32"
                                            height="32">
                                    </a>
                                    <img style="transform: rotate(180deg);"
                                        src="https://linkpublishers.com/assets/latest_assets/image/about-right.svg"
                                        alt="arrow" class="right-arrow-icon" width="36" height="16">
                                </div>
                                <div class="text-center">
                                    <img src="{{ asset($founder->image) }}" alt="{{ $founder->name }}"
                                        class="img-fluid">
                                </div>
                            @else
                                {{-- Even row --}}
                                <div class="text-center">
                                    <img src="{{ asset($founder->image) }}" alt="{{ $founder->name }}"
                                        class="img-fluid">
                                </div>
                                <div class="founder-detail our-co-founder text-center text-sm-start">
                                    <h3>{{ $founder->name }}</h3>
                                    <h6>{{ $founder->designation }}</h6>
                                    <a href="{{ $founder->linkedin_url ?? '#' }}" target="_blank">
                                        <img src="{{ asset($founder->social_icon) }}" alt="linkedin" width="32"
                                            height="32">
                                    </a>
                                    <img src="https://linkpublishers.com/assets/latest_assets/image/about-right.svg"
                                        alt="arrow" class="left-arrow-icon" width="36" height="16">
                                </div>
                            @endif

                        </div>
                    </div>
                @endforeach





            </div>
        </div>

        <div class="our-team">
            <div class="row">
                <h3 class="our-team-section-title">
                    Fueled by caffeine &amp; driven by deadlines, this team delivers results.
                </h3>

                <!-- single team member -->
                @foreach ($teams as $team)
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="our-team-member">
                            <div class="our-team-img">
                                <img src="{{ asset($team->image) }}"
                                    alt="Amish Keshwani - Advisory Board Member - Digital Marketing" loading="lazy"
                                    class="img-fluid" />
                            </div>
                            <h5>{{ $team->name }}</h5>
                            <p>{{ $team->designation }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
