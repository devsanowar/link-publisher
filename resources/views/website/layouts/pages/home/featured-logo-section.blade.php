<section id="featured-logo-section">
        <div class="container">
            <div class="section-title text-center">
                <h2>Get Featured On</h2>
            </div>
        </div>
        <div class="container-fluid py-2">
            <div class="logo-slider-wrapper">
                <div id="logoTrack" class="logo-track">
                    @foreach($brands as $brand)
                    <div class="logo-item-wrapper">
                        <img src="{{ asset($brand->image) }}" class="logo-item" alt="Brand {{ $brand->id }}">
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </section>