<section class="pricing-section">
            <div class="container">
                <!-- Title -->
                <div class="service-section-title">
                    <h2 class="service-heading">Our Link Building Packages & Pricing</h2>
                    <p class="service-subtitle">
                        Enjoy simple and transparent pricing with no hidden fees. Choose any affordable link building
                        services plan that fits your budget.
                    </p>
                </div>

                <!-- Pricing Cards -->
                <div class="row g-4 justify-content-center">

                    <!-- Lite Plan -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card pricing-card h-100">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Lite</h5>
                                <h3 class="card-price mb-3">${{ $packages['lite']->price ?? '0' }}</h3>
                                <button class="btn btn-outline-primary mb-3">{{ $packages['lite']->button_text ?? '...' }}</button>
                                <div class="plan-features flex-grow-1 overflow-auto">
                                    <ul class="list-unstyled">
                                       @foreach($packages['lite']->features ?? [] as $feature)
                                        <li><span><i class="fa-solid fa-circle-check"></i></span> {{ $feature }}</li>
                                       @endforeach
            
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Standard Plan -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card pricing-card recommended h-100 position-relative">
                            <span class="recommended-badge position-absolute top-0 end-0">Recommended</span>
                            <div class="card-body d-flex flex-column text-white">
                                <h5 class="card-title">Standard</h5>
                                <h3 class="card-price mb-3">${{ $packages['standard']->price ?? '0' }}</h3>
                                <button class="btn btn-light mb-3">{{ $packages['standard']->button_text ?? 'Chose plan' }}</button>
                                <div class="plan-features flex-grow-1 overflow-auto">
                                    <ul class="list-unstyled">
                                        @foreach ($packages['standard']->features ?? [] as $feature)   
                                        <li><span><i class="fa-solid fa-circle-check"></i></span> {{ $feature }}
                                        </li>
                                        @endforeach
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Premium Plan -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card pricing-card h-100">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Premium</h5>
                                <h3 class="card-price mb-3">${{ $packages['premium']->price ?? '0' }}</h3>
                                <button class="btn btn-outline-primary mb-3">{{ $packages['standard']->button_text ?? 'Chose Plan' }}</button>
                                <div class="plan-features flex-grow-1 overflow-auto">
                                    <ul class="list-unstyled">
                                        @foreach ($packages['premium']->features ?? [] as $feature)     
                                        <li><span><i class="fa-solid fa-circle-check"></i></span> {{ $feature }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Customized Plan -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card pricing-card h-100">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Customized</h5>
                                <h3 class="card-price mb-3">${{ $packages['customize']->price ?? '0' }}</h3>
                                <button class="btn btn-outline-primary mb-3">{{ $packages['customize']->button_text ?? '0' }}</button>
                                <div class="plan-features flex-grow-1 overflow-auto">
                                    <ul class="list-unstyled">
                                        @foreach ($packages['customize']->features as $feature)
                                        <li><span><i class="fa-solid fa-circle-check"></i></span> {{ $feature }}</li>
                                        @endforeach
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>