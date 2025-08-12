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
        <section class="our-story-section">
            <div class="container">
                <div class="our-story-detail">
                    <h2>Our Story</h2>
                    <p>Oh, the struggles of being an SEO professional - spending hours searching for the right websites
                        to get quality backlinks! It is a slow, boring, and frustrating process, with no guarantee of
                        results.
                        Het Balar faced this same struggle in 2021. But instead of giving up, he asked a simple yet
                        powerful question: “What if there was an easier way for advertisers and publishers to connect?”
                        And that’s how <b>Link Publishers</b> came to life.</p>
                </div>
                <div class="our-story-marketplace">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="our-story-item">
                                <h3>The Birth of Marketplace</h3>
                                <p>Link Publishers was born from a simple yet powerful idea – <b>to make link building
                                        easier</b>.</p>
                                <p>Inspired by a vision to simplify the process, it became a platform where advertisers
                                    and
                                    publishers could connect quickly.</p>
                                <p>What started as a solution for guest posting has grown into so much more. Today, Link
                                    Publishers is a go-to hub for smarter link-building - helping of SEO professionals
                                    secure
                                    high-quality backlinks quickly and efficiently - all without the usual hassle.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="our-story-img">
                                <img src="https://linkpublishers.com/assets/latest_assets/image/about-our-story.svg"
                                    alt="about-our-story" loading="lazy" class="img-fluid">
                            </div>
                        </div>
                    </div>


                </div>
                <div class="story-link-publisher">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="our-story-item">
                                <h3>How We Make Link Building Easier</h3>
                                <p>Traditional link building can be a nightmare - manual outreach, endless research, and
                                    weeks
                                    of waiting. Link Publishers has completely changed this process by focusing on what
                                    matters
                                    most:</p>
                                <ul>
                                    <li><b>Faster Backlinks:</b> No more waiting forever. With Link Publishers, you can
                                        secure
                                        high-quality backlinks in just 32 hours.</li>
                                    <li><b>Customized Strategies:</b> Need niche-specific backlinks or wider reach? We
                                        create
                                        plans that match your goals perfectly.</li>
                                    <li><b>Simplified Connections:</b> Forget the complicated steps. Our platform
                                        connects
                                        advertisers and publishers instantly, saving you time and stress.</li>
                                </ul>
                                <p><b>"Securing quality guest posts with strong backlinks is now as simple and seamless
                                        as
                                        online shopping."</b></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="our-story-item story-link">
                                <h3>What Makes Link Publishers Different?</h3>
                                <p>What truly sets Link Publishers apart is our use of advanced AI technology. Our
                                    platform is
                                    powered by smart algorithms to connect the right advertisers and publishers in every
                                    niche.
                                </p>
                                <p><b>The result = guest posts + backlinks that offer value</b></p>
                                <p><b>Here is why brands and SEO experts trust us:</b></p>
                                <ul>
                                    <li><b>Effortless Connections:</b> We make sure advertisers and publishers connect
                                        with ease
                                        - guaranteeing effective collaborations.</li>
                                    <li><b>Holistic Services:</b> Beyond link building - we offer custom strategies,
                                        content
                                        creation, and SEO reselling services to address every SEO need.</li>
                                    <li><b>Innovative Approach:</b> We are always improving - using creative methods to
                                        deliver
                                        exceptional results that keep you ahead.</li>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
        <!-- Achivement section Start -->
        <section class="achievement-section py-5">
            <div class="container">
                <div class="row g-0 achievement-row">
                    <div class="col-md-3 col-6">
                        <div class="single-achievement border-right">
                            <h3>21,350+</h3>
                            <p>Publishers</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="single-achievement border-right">
                            <h3>9,674+</h3>
                            <p>Advertisers</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="single-achievement border-right">
                            <h3>40,116+</h3>
                            <p>Successful Orders</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="single-achievement">
                            <h3>114,521+</h3>
                            <p>Websites</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Achivement section End -->
        <!-- ready-posting section Start -->
        <section class="ready-posting about-posting">
            <div class="container">
                <div class="posting-body text-center">
                    <div class="single-posting-content">
                        <h3>Ready to reap the benefits of link building?</h3>
                        <p>Join us today and experience a smarter way to achieve your SEO goals.</p>
                    </div>
                    <div class="about-posting-btn">
                        <div class="lets-get-start-btn text-end">
                            <button class="btn btn-get-started">Talk to Our Experts</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
                <h3>Fueled by caffeine &amp; driven by deadlines, this team delivers results.</h3>
                <div class="our-team">
                    <div class="row">
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