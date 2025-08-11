<section class="wall-of-love-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6">
                <div class="section-title">
                    <h5>Wall of Love</h5>
                    <h2>What people are <br> saying</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="wall-logo-images d-flex align-items-center justify-content-end gap-3">
                    <img src="{{ asset('frontend/assets/images/wall-love/clutch.svg') }}" width="50px" alt="">
                    <img src="{{ asset('frontend/assets/images/wall-love/front-semrush-certified.svg') }}"
                        width="50px" alt="">
                    <img src="{{ asset('frontend/assets/images/wall-love/tech-behemonth.svg') }}" width="50px"
                        alt="">
                    <img src="{{ asset('frontend/assets/images/wall-love/users-love.svg') }}" width="50px"
                        alt="">
                </div>
            </div>
        </div>

        <!-- Slider Wrapper -->
        <div class="swiper wallLoveSlider">
            <div class="swiper-wrapper">
                @foreach ($reviews as $review)
                    @if ($review->type === 'text')
                        <div class="swiper-slide">
                            <div class="single-wall-love border p-3 rounded">
                                <p class="flex-grow-1">"{{ $review->review }}"</p>
                                <hr>
                                <div class="wall-profile d-flex align-items-center gap-3">
                                    <img src="{{ $review->image ? asset($review->image) : asset('frontend/assets/images/default-profile.webp') }}"
                                        width="50" class="rounded-circle" alt="{{ $review->name }}">
                                    <h3 class="mb-0">{{ $review->name }}</h3>
                                </div>
                            </div>
                        </div>
                    @elseif ($review->type === 'video')
                        <div class="swiper-slide">
                            <div class="single-image-video position-relative">
                                <img src="{{ $review->image ?: asset('frontend/assets/images/wall-love/client-seven.webp') }}"
                                    alt="{{ $review->name }}" class="img-fluid video-thumbnail rounded-3">
                                <div
                                    class="overlay-image-video d-flex justify-content-between align-items-end px-3 py-2">
                                    <span class="video-icon" data-bs-toggle="modal" data-bs-target="#videoModal"
                                        data-video="{{ $review->video_url }}">
                                        <i class="fas fa-play-circle"></i>
                                    </span>
                                    <h5 class="client-name mb-0">{{ $review->name }}</h5>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Custom Arrows -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

    </div>

    <!-- Video Modal -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-dark border-0">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="ratio ratio-16x9">
                        <iframe id="youtubeVideo" src="" title="YouTube Video" allow="autoplay"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
