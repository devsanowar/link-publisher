<section class="highlight-marketing-section">
    <div class="container">
        <div class="row align-items-center">
            <!-- Image Column -->
            <div class="col-md-6 mb-4 mb-md-0 text-center">
                <img src="{{ asset($backlink->image ?? 'image') }}" alt="Link Building Illustration" class="img-fluid"
                    style="max-width: 400px;">
            </div>

            <!-- Text Column -->
            <div class="col-md-6 build-link-para">
                <h2 class="highlight-section-heading">{{ $backlink->title ?? 'N/A' }}</h2>
                <p class="highlight-section-para">{!! $backlink->description ?? 'N/A' !!}</p>
            </div>
        </div>
    </div>
</section>
