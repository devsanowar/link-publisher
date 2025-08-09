<section class="container my-5">
        <div class="promo-section row align-items-center">
            <!-- Left Text Content -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="promo-title">{{ $cta->title ?? 'Unlock Your Content Potential with Link Publishers' }}</h2>
                <p class="promo-text mt-3">
                    {!! $cta->content ?? 'N/A' !!}
                </p>
                <button class="promo-btn"><a class="text-dark" href="{{ $cta->button_url }}">{{ $cta->button_name }}</a></button>
            </div>

            <!-- Right Icon Content -->
            <div class="col-lg-6">
                <div class="unlock-right-image">
                    <img src="{{ asset($cta->image) }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>