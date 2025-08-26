@extends('website.layouts.app')
@section('title', 'Link building - Service Page')
@push('styles')
        <link href="{{ asset('frontend') }}/assets/css/service-style.css" rel="stylesheet">
        <style>
            .build-link-para p{
                line-height: 36px;
            }
        </style>
@endpush
@section('website_content')
        <main>
        <!-- SECTION: Trusted Link Building Services -->
        @include('website.layouts.pages.service-page.link-building.about-link-building')
        <!-- SECTION: Pricing-Section -->
        @include('website.layouts.pages.service-page.link-building.pricing-section')
        <!-- Service: Why choose link section Start -->
        @include('website.layouts.pages.service-page.link-building.why-chose-link-publishers')
        <!-- Service: Why choose link section End -->
        <!-- Achivement section Start -->
        @include('website.layouts.pages.service-page.link-building.achievement')
        <!-- Achivement section End -->
        <!-- Highlight Marketing section Start -->
        @include('website.layouts.pages.service-page.link-building.build-backlinks')
        <!-- Highlight Marketing section End -->
        <!-- Link Building Process section Start -->
        @include('website.layouts.pages.service-page.link-building.link-building-process')
        <!-- Link Building Process section End -->
        <!-- cta-section Section Start -->
        <section class="cta-section my-5">
            <div class="container">
                <div
                    class="cta-box d-flex flex-column flex-md-row align-items-center justify-content-between p-4 p-md-5 rounded-4">
                    <div class="text-white mb-4 mb-md-0">
                        <h3 class="fw-bold mb-3">Let’s Build Quality Backlinks Together</h3>
                        <p class="mb-0 fs-6 text-build-features">
                            Climb Rankings 👉 Attract Traffic 👉 Grow Your Business
                        </p>
                    </div>
                    <a href="#" class="btn btn-warning text-white fw-semibold px-4 py-2">Register Now</a>
                </div>
            </div>
        </section>

        <!-- cta-section Section End -->
        <!-- stand-out-section Section Start -->
       @include('website.layouts.pages.service-page.link-building.link-building-solution')
        <!-- stand-out-section Section End -->
        <!-- Why hire Section Start -->
        @include('website.layouts.pages.service-page.link-building.link-building-reason')

        <!-- Why hire Section End -->
        <!-- Services section Start -->
        <section class="service-section">
            <div class="container">

                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="section-title">
                            <h2 class="service-main-heading">Looking for a Full-Suite SEO and Link Building Solution?
                            </h2>
                            <p class="service-subtext"> At Link Publishers – we offer a range of services to help you
                                build a strong backlink profile and boost your website’s SEO.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="service-box">
                                    <div class="service-icon"><i class="fas fa-file-alt"></i></div>
                                    <div class="service-title">Guest Posting</div>
                                    <div class="arrow-icon"><i class="fas fa-arrow-right"></i></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="service-box">
                                    <div class="service-icon"><i class="fas fa-link"></i></div>
                                    <div class="service-title">Link Building</div>
                                    <div class="arrow-icon"><i class="fas fa-arrow-right"></i></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="service-box">
                                    <div class="service-icon"><i class="fas fa-bullhorn"></i></div>
                                    <div class="service-title">Digital PR</div>
                                    <div class="arrow-icon"><i class="fas fa-arrow-right"></i></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="service-box">
                                    <div class="service-icon"><i class="fas fa-edit"></i></div>
                                    <div class="service-title">Niche Edits</div>
                                    <div class="arrow-icon"><i class="fas fa-arrow-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- Services section End -->
        <!-- Faq section Start -->
        <section class="faq-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <h2 class="fw-bold mb-4 faq-title-heading">Frequently Asked Questions</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="accordion" id="faqAccordion">
                            <!-- FAQ ITEM -->
                            <div class="accordion-item border-0 border-bottom">
                                <h2 class="accordion-header" id="headingOne">
                                    <button
                                        class="accordion-button collapsed d-flex justify-content-between align-items-center"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                        aria-expanded="false" aria-controls="collapseOne">
                                        <span>How many links do you build per month?</span>
                                        <span class="icon-toggle ms-auto">+</span>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        We build a customized number of links based on your needs and goals. This varies
                                        per
                                        client and their strategy.
                                    </div>
                                </div>
                            </div>

                            <!-- REPEAT -->
                            <div class="accordion-item border-0 border-bottom">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button
                                        class="accordion-button collapsed d-flex justify-content-between align-items-center"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        <span>How long are my links live for?</span>
                                        <span class="icon-toggle ms-auto">+</span>
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Most of our links are permanent unless stated otherwise.
                                    </div>
                                </div>
                            </div>
                            <!-- REPEAT 3-->
                            <div class="accordion-item border-0 border-bottom">
                                <h2 class="accordion-header" id="headingThree">
                                    <button
                                        class="accordion-button collapsed d-flex justify-content-between align-items-center"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        <span>What separates you from competitors?</span>
                                        <span class="icon-toggle ms-auto">+</span>
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        We have a large network of high-authority sites and a focus on ethical, white
                                        hat link building services. Moreover, we also offer an AI-powered guest posting
                                        and link building marketplace – where you can easily buy links as per your
                                        preference.
                                    </div>
                                </div>
                            </div>
                            <!-- REPEAT 4-->
                            <div class="accordion-item border-0 border-bottom">
                                <h2 class="accordion-header" id="headingFour">
                                    <button
                                        class="accordion-button collapsed d-flex justify-content-between align-items-center"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                        aria-expanded="false" aria-controls="collapseFour">
                                        <span>Which countries can your link building services secure backlinks
                                            from?</span>
                                        <span class="icon-toggle ms-auto">+</span>
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        We can secure backlinks from a variety of countries - including the USA, UK,
                                        Canada, and Australia, among others.
                                    </div>
                                </div>
                            </div>
                            <!-- REPEAT 5-->
                            <div class="accordion-item border-0 border-bottom">
                                <h2 class="accordion-header" id="headingFive">
                                    <button
                                        class="accordion-button collapsed d-flex justify-content-between align-items-center"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                        aria-expanded="false" aria-controls="collapseFive">
                                        <span>How long does it take to see results?</span>
                                        <span class="icon-toggle ms-auto">+</span>
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Results start showing within a few weeks - but it can take a few months to see
                                        noticeable improvements in rankings.
                                    </div>
                                </div>
                            </div>
                            <!-- REPEAT 6-->
                            <div class="accordion-item border-0 border-bottom">
                                <h2 class="accordion-header" id="headingSix">
                                    <button
                                        class="accordion-button collapsed d-flex justify-content-between align-items-center"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                        aria-expanded="false" aria-controls="collapseSix">
                                        <span>How do you find the sites you build links with?</span>
                                        <span class="icon-toggle ms-auto">+</span>
                                    </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        We use a combination of advanced tools and our network to identify relevant,
                                        high-authority sites for backlink opportunities.
                                    </div>
                                </div>
                            </div>
                            <!-- REPEAT 7-->
                            <div class="accordion-item border-0 border-bottom">
                                <h2 class="accordion-header" id="headingSeven">
                                    <button
                                        class="accordion-button collapsed d-flex justify-content-between align-items-center"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven"
                                        aria-expanded="false" aria-controls="collapseSeven">
                                        <span>Can you build backlinks to any page?</span>
                                        <span class="icon-toggle ms-auto">+</span>
                                    </button>
                                </h2>
                                <div id="collapseSeven" class="accordion-collapse collapse"
                                    aria-labelledby="headingSeven" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Yes, with our premium link building services, we can build backlinks to any page
                                        on your website.
                                    </div>
                                </div>
                            </div>
                            <!-- REPEAT 8-->
                            <div class="accordion-item border-0 border-bottom">
                                <h2 class="accordion-header" id="headingEight">
                                    <button
                                        class="accordion-button collapsed d-flex justify-content-between align-items-center"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight"
                                        aria-expanded="false" aria-controls="collapseEight">
                                        <span>How can we be confident your link building services are white hat?</span>
                                        <span class="icon-toggle ms-auto">+</span>
                                    </button>
                                </h2>
                                <div id="collapseEight" class="accordion-collapse collapse"
                                    aria-labelledby="headingEight" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        We use only ethical, white hat techniques, focusing on quality content and
                                        reputable sites to guarantee safe and effective SEO practices.
                                    </div>
                                </div>
                            </div>

                            <!-- Add more FAQ items here -->
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Faq section End -->
        <!-- ready-posting section Start -->
        <section class="ready-posting">
            <div class="container">
                <div class="posting-body">
                    <div class="row d-flex align-content-center">
                        <div class="col-md-6">
                            <h3>Best Link Building Services!</h3>
                            <p>Partner with Link Publishers to design a link building strategy that improves your search
                                engine ranking.</p>
                        </div>
                        <div class="col-md-6">
                            <div class="lets-get-start-btn text-end">
                                <button class="btn btn-get-started">Let's Get Started</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ready-posting section End -->


    </main>
@endsection