<section class="our-story-section">
            <div class="container">
                <div class="our-story-detail">
                    <h2>{{ $storyContent->section_title }}</h2>
                    <p>{!! $storyContent->section_subtitle !!}</p>
                </div>
                <div class="our-story-marketplace">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="our-story-item">
                                <h3>{{ $storyContent->title }}</h3>
                                <p>{!! $storyContent->story_content !!}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="our-story-img">
                                <img src="{{ asset($storyContent->image) }}"
                                    alt="about-our-story" loading="lazy" class="img-fluid">
                            </div>
                        </div>
                    </div>


                </div>
                <div class="story-link-publisher mt-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="our-story-item">
                                <h3>{{ $storyContent->section_title_two }}</h3>
                                <p>{!! $storyContent->story_content_two !!}</p>
                                {{-- <ul>
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
                                        online shopping."</b></p> --}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="our-story-item story-link">
                                <h3>{{ $storyContent->section_title_three }}</h3>
                                <p>{!! $storyContent->story_content_three !!}
                                </p>
                                {{-- <p><b>The result = guest posts + backlinks that offer value</b></p>
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
                                </ul> --}}
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>