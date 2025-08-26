<section class="service-why-choose-us">
            <div class="container">
                <div class="service-section-title">
                    <h2 class="service-heading">Why Choose Link Publishers As Your Link Building Agency</h2>
                    <p class="service-subtitle">
                        We are an AI-driven link building platform using advanced algorithms to secure niche-relevant
                        links from high-ranking domains.
                    </p>
                </div>

                <div class="row">
                    <!-- LEFT COLUMN -->
                    <div class="col-md-6">
                        
                        @foreach ($whyChoseLinkPublishers->take(7) as $key => $whychose)

                        <div class="feature-item">
                            <i class="{{ $whychose->icon ?? '' }} feature-icon"></i>
                            <div>
                                <div class="feature-title">{{ $whychose->title ?? '' }}: <span class="feature-text">{!! $whychose->description ?? '' !!}</span></div>
                            </div>
                        </div>        
                        
                        @endforeach
                        
                    </div>

                    <!-- RIGHT COLUMN -->
                    <div class="col-md-6">
                        @foreach ($whyChoseLinkPublishers->skip(7) as $whychose) 
                        <div class="feature-item">
                            <i class="{{ $whychose->icon ?? '' }} feature-icon"></i>
                            <div>
                                <div class="feature-title">{{ $whychose->title ?? '' }}: <span
                                        class="feature-text">{!! $whychose->description !!}</span></div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>

                <div class="footer-note">
                    That’s not all! Alongside our manual contextual link-building services, our platform makes it easy
                    to browse high-DA websites and order backlinks, just like shopping on Amazon!
                </div>
            </div>
        </section>