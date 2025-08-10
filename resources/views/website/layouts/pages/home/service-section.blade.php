<section class="service-section">
        <div class="container">

            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="section-title">
                        <h5 class="serivice-section-title">Our Services</h5>
                        <h2 class="service-main-heading">Are you in search of a complete solution for your digital
                            product?
                        </h2>
                        <p class="service-subtext">Explore our range of services designed for a well-rounded strategy to
                            boost
                            your online
                            presence.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row g-4">
                       
                        @foreach ($services as $service)
                        <div class="col-md-6">
                            <a href="{{ $service->url }}">
                                <div class="service-box">
                                    <div class="service-icon"><i class="{{ $service->icon }}"></i></div>
                                    <div class="service-title">{{ $service->title }}</div>
                                    <div class="arrow-icon"><i class="fas fa-arrow-right"></i></div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>

        </div>
    </section>