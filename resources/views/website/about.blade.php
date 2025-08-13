@extends('website.layouts.app')
@section('title', 'About Page')
@push('styles')
    <link href="{{ asset('frontend') }}/assets/css/service-style.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/tools-style.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/company.css" rel="stylesheet">
@endpush
@section('website_content')
    <main>
        <!-- About content body-->
        @include('website.layouts.pages.about.about-section')
        <!-- our story section -->
        @include('website.layouts.pages.about.our-story-section')
        <!-- Achivement section Start -->
        @include('website.layouts.pages.about.achievement-section')
        <!-- Achivement section End -->
        <!-- ready-posting section Start -->
        @include('website.layouts.pages.about.cta-section')
        <!-- ready-posting section End -->
        <section class="our-team-section">
            <div class="container">
                <h4>The Visionaries Behind the Link Building Revolution</h4>
                <div class="our-founder">
                    <div class="row gy-4">
                        <!-- Founder & CEO -->
                        <div class="col-12 col-md-6">
                            <div class="d-flex flex-column flex-sm-row align-items-center gap-3 h-100">
                                <div class="founder-detail text-center text-sm-start">
                                    <h3>Het Balar</h3>
                                    <h6>Founder &amp; CEO</h6>
                                    <a href="https://www.linkedin.com/in/het-balar/" target="_blank">
                                        <img src="https://linkpublishers.com/assets/latest_assets/image/about-linkedin.svg"
                                            alt="about-linkedin" loading="lazy" width="32" height="32">
                                    </a>
                                    <img style="transform: rotate(180deg);"
                                        src="https://linkpublishers.com/assets/latest_assets/image/about-right.svg"
                                        alt="about-right" loading="lazy" width="36" height="16">
                                </div>
                                <div class="text-center">
                                    <img src="https://linkpublishers.com/assets/latest_assets/image/about-het-sir.svg"
                                        alt="Het Balar - CEO and Founder" class="img-fluid" loading="lazy">
                                </div>
                            </div>
                        </div>

                        <!-- Co-Founder -->
                        <div class="col-12 col-md-6">
                            <div class="d-flex flex-column flex-sm-row align-items-center gap-3 h-100">
                                <div class="text-center">
                                    <img src="https://linkpublishers.com/assets/latest_assets/image/about-harshal-sir.svg"
                                        alt="Harshal Shah - Co- Founder" class="img-fluid" loading="lazy" />
                                </div>
                                <div class="founder-detail our-co-founder text-center text-sm-start">
                                    <h3>Harshal Shah</h3>
                                    <h6>Co- Founder</h6>
                                    <a href="https://www.linkedin.com/in/harshalelsner/" target="_blank">
                                        <img src="https://linkpublishers.com/assets/latest_assets/image/about-linkedin.svg"
                                            alt="about-linkedin" loading="lazy" width="32" height="32">
                                    </a>
                                    <img src="https://linkpublishers.com/assets/latest_assets/image/about-right.svg"
                                        alt="about-right" class="left-arrow-icon" loading="lazy" width="36" height="16">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="our-team">
                    <div class="row">
                        <h3 class="our-team-section-title">
                            Fueled by caffeine &amp; driven by deadlines, this team delivers results.
                        </h3>

                        <!-- single team member -->
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="our-team-member">
                                <div class="our-team-img">
                                    <img src="https://linkpublishers.com/assets/latest_assets/image/amish-keshwani.webp"
                                        alt="Amish Keshwani - Advisory Board Member - Digital Marketing" loading="lazy"
                                        class="img-fluid" />
                                </div>
                                <h5>Amish Keshwani</h5>
                                <p>Advisory Board Member - Digital Marketing</p>
                            </div>
                        </div>
                        <!-- single team member -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="our-team-member">
                                <div class="our-team-img">
                                    <img src="https://linkpublishers.com/assets/latest_assets/image/about-kevin.webp"
                                        alt="Kevin Ajudia - Account Manager" loading="lazy" class="img-fluid" />
                                </div>
                                <h5>Kevin Ajudia</h5>
                                <p>Account Manager</p>
                            </div>
                        </div>
                        <!-- single team member -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="our-team-member">
                                <div class="our-team-img">
                                    <img src="https://linkpublishers.com/assets/latest_assets/image/about-vishakha-balar.webp"
                                        alt="Vishakha Balar - Account Manager" loading="lazy" class="img-fluid" />
                                </div>
                                <h5>Vishakha Balar</h5>
                                <p>Account Manager</p>
                            </div>
                        </div>
                        <!-- single team member -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="our-team-member">
                                <div class="our-team-img">
                                    <img src="https://linkpublishers.com/assets/latest_assets/image/about-parul-sharma.webp"
                                        alt="Parul Sharma - Account Manager" loading="lazy" class="img-fluid" />
                                </div>
                                <h5>Parul Sharma</h5>
                                <p>Account Manager</p>
                            </div>
                        </div>
                        <!-- single team member -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="our-team-member">
                                <div class="our-team-img">
                                    <img src="https://linkpublishers.com/assets/latest_assets/image/about-nupur-sharma.webp"
                                        alt="Nupur Sharma - Outreach Manager" loading="lazy" class="img-fluid" />
                                </div>
                                <h5>Nupur Sharma</h5>
                                <p>Outreach Manager</p>
                            </div>
                        </div>
                        <!-- single team member -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="our-team-member">
                                <div class="our-team-img">
                                    <img src="https://linkpublishers.com/assets/latest_assets/image/about-aansi-gosaliya.webp"
                                        alt="Aashi Gosaliya - Outreach Manager" loading="lazy" class="img-fluid" />
                                </div>
                                <h5>Aashi Gosaliya</h5>
                                <p>Outreach Manager</p>
                            </div>
                        </div>
                        <!-- single team member -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="our-team-member">
                                <div class="our-team-img">
                                    <img src="https://linkpublishers.com/assets/latest_assets/image/about-dharti-patel.webp"
                                        alt="Dharti Patel - Sr. Software Developer" loading="lazy" class="img-fluid" />
                                </div>
                                <h5>Dharti Patel</h5>
                                <p>Sr. Software Developer</p>
                            </div>
                        </div>
                        <!-- single team member -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="our-team-member">
                                <div class="our-team-img">
                                    <img src="https://linkpublishers.com/assets/latest_assets/image/about-vairag-bhuriya.webp"
                                        alt="Vairag Bhuriya - QA Engineer" loading="lazy" width="260" height="320">
                                </div>
                                <h5>Vairag Bhuriya</h5>
                                <p>QA Engineer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </main>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const members = document.querySelectorAll(".fade-in");
            members.forEach((el, i) => {
                el.style.animationDelay = `${i * 0.15}s`;
            });
        });
    </script>
@endpush