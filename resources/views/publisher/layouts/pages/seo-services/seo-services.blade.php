@extends('publisher.layouts.app')
@section('title', 'Seo Service page')
@section('publisher_contents')
 <!-- body content -->
            <div class="seo-service-dashboard container py-5">
                <div class="mb-4">
                    <h3 class="fw-bold">SEO Services</h3>
                    <p class="text-muted">
                        Do You Need More Website Traffic, Sales & Leads? Hire Link Publishers As Your SEO Partner
                    </p>
                    <div class="d-flex align-items-center gap-3 mt-3">
                        <button class="btn btn-outline-secondary btn-sm tab-btn active" data-tab="plans">📄 Select your
                            plan</button>
                        <button class="btn btn-outline-secondary btn-sm tab-btn" data-tab="case-studies">📊 Case
                            studies</button>
                    </div>
                </div>

                <!-- Tab Content -->
                <div class="tab-content">

                    <!-- Pricing Plans Tab -->
                    <div class="row g-4 mt-4 tab-pane active" id="plans">
                        <!-- ... All 4 pricing plans including custom + audit ... -->
                        <!-- Lite -->
                        <div class="col-md-3">
                            <div class="pricing-card">
                                <div class="pricing-title">Lite</div>
                                <div class="price">${{ $seoServices['lite']->price ?? '' }}</div>
                                <button class="btn btn-inquire mb-3">{{ $seoServices['lite']->button_text ?? '' }}</button>
                                <ul class="features-list list-unstyled">
                                   @foreach ($seoServices['lite']->features ?? [] as $feature)
                                   <li>{{ $feature }}</li>
                                   @endforeach
                                    
                                </ul>
                            </div>
                        </div>

                        <!-- Standard -->
                        <div class="col-md-3">
                            <div class="pricing-card position-relative">
                                <span class="badge-recommended">Recommended</span>
                                <div class="pricing-title">Standard</div>
                                <div class="price">${{ $seoServices['standard']->price ?? '' }}</div>
                                <button class="btn btn-inquire mb-3">{{ $seoServices['standard']->button_text ?? '' }}</button>
                                <ul class="features-list list-unstyled">
                                    @foreach ($seoServices['standard']->features ?? [] as $feature)
                                   <li>{{ $feature }}</li>
                                   @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- Premium -->
                        <div class="col-md-3">
                            <div class="pricing-card">
                                <div class="pricing-title">Premium</div>
                                <div class="price">${{ $seoServices['premium']->price ?? '' }}</div>
                                <button class="btn btn-inquire mb-3">{{ $seoServices['premium']->button_text }}</button>
                                <ul class="features-list list-unstyled">
                                    @foreach ($seoServices['premium']->features ?? [] as $feature)
                                   <li>{{ $feature }}</li>
                                   @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- Custom -->
                        <div class="col-md-3">
                            <div class="pricing-card mb-3">
                                <div class="pricing-title">Custom</div>
                                <p class="text-muted my-2">Looking for custom plans and pricing?</p>
                                <button class="btn btn-inquire">{{ $seoServices['premium']->button_text ?? '' }}</button>

                                <!-- Free Audit Report -->
                                <div class="audit-box text-center mt-3">
                                    <h6 class="mb-1">Free Audit Report Worth</h6>
                                    <div class="audit-price mb-2">${{ $seoServices['custom']->price ?? '' }}</div>
                                    <img src="assets/images/rocket.png" alt="Audit Image" height="40" width="60"
                                        class="img-fluid mb-2">
                                    <button class="btn-know">Know More</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Case Studies Tab -->
                    <div class="row g-4 mt-4 tab-pane" id="case-studies">
                        <div class="col-md-4">
                            <div class="case-card">
                                <div class="overlay"></div>
                                <div class="case-card-content">
                                    <h6 class="fw-bold">E-Commerce SEO Boost</h6>
                                    <p class="text-muted">Achieved 300% organic traffic increase for a fashion retailer
                                        in
                                        90 days.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="case-card">
                                <div class="overlay"></div>
                                <div class="case-card-content">
                                    <h6 class="fw-bold">Local SEO Domination</h6>
                                    <p class="text-muted">Helped a dental clinic rank #1 locally within 6 weeks.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="case-card">
                                <div class="overlay"></div>
                                <div class="case-card-content">
                                    <h6 class="fw-bold">SaaS Visibility Growth</h6>
                                    <p class="text-muted">Doubled organic sign-ups through targeted keyword mapping.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@push('scripts')
    <script>
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                // Remove active from all buttons
                document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                const target = this.getAttribute('data-tab');

                // Hide all panes
                document.querySelectorAll('.tab-pane').forEach(pane => pane.classList.remove('active'));

                // Show the selected tab
                document.getElementById(target).classList.add('active');
            });
        });
    </script>
@endpush