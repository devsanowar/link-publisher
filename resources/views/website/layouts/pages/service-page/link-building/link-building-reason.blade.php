<section class="why-hire-section">
            <div class="container">
                <div class="row align-items-center gy-4">
                    <!-- Left Image -->
                    <div class="col-lg-6 text-center text-lg-start">
                        <div class="">
                            <img src="{{ asset($linkbuildingReason->image ?? '') }}" alt="Image"
                                class="img-fluid rounded-3">
                        </div>
                    </div>

                    <!-- Right Content -->
                    <div class="col-lg-6">
                        <div class="service-section-title">
                            <h2 class="service-heading text-start">{{ $linkbuildingReason->title ?? '' }}</h2>
                            <p class="mb-2">{!! $linkbuildingReason->description ?? '' !!}</p>
                        </div>

                        <div class="row">
                            <!-- Column 1 -->

                            @foreach ($reasonFeatures as $feature)
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="d-flex align-items-start gap-3">
                                        <div class="click-icon-image"><img src="{{ asset('frontend') }}/assets/images/service/circle-right.png"
                                                alt=""></div>
                                        <div class="single-hire-item">
                                            <p><strong>{{ $feature->title ?? '' }}:</strong>{!! $feature->description ?? '' !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>