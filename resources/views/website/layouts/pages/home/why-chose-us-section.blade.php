<section class="why-us-section">
        <div class="container">
            <div class="section-title">
                <h5>Why Us?</h5>
                <h2>Why to choose
                    <br>
                    Link Publishers?
                </h2>
            </div>
            <!-- first row  -->
            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="single-why-card">
                        <div class="single-why-img">
                            <img src="{{ asset($whychoseus->image_one) }}"
                                class="img-fluid" alt="">
                        </div>
                        <div class="single-why-content">
                            <h3>{{ $whychoseus->title_one ?? 'N/A'}}</h3>
                            <p>{!! $whychoseus->description_one ?? 'N/A' !!}</p>
                        </div>
                    </div>
                </div>
                <!-- col 6 -->
                <div class="col-md-6">
                    <div class="singel-why-card-two">
                        <div class="singel-why-card-two-img">
                            <img src="{{ asset($whychoseus->image_two) }}" class="img-fluid"
                                alt="">
                        </div>
                        <div class="single-why-card-two-content">
                            <h3>{{ $whychoseus->title_two ?? 'N/A'}}</h3>
                            <p>{!! $whychoseus->description_two ?? 'N/A' !!}</p>
                        </div>
                    </div>
                    <!-- single card -->
                    <div class="single-why-card">
                        <div class="single-why-img text-center">
                            <img src="{{ asset($whychoseus->image_three) }}" class="img-fluid"
                                alt="">
                        </div>
                        <div class="single-why-content">
                            <h3>{{ $whychoseus->title_three ?? 'N/A'}}</h3>
                            <p>{!! $whychoseus->description_three ?? 'N/A' !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- second row -->
            <div class="row">
                <div class="col-md-4">
                    <div class="single-why-card">
                        <div class="single-why-img">
                            <img src="{{ asset($whychoseus->image_four) }}" class="img-fluid"
                                alt="">
                        </div>
                        <div class="single-why-content">
                            <h3>{{ $whychoseus->title_four ?? 'N/A'}}</h3>
                            <p>{!! $whychoseus->description_four ?? 'N/A' !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <!-- card excellent -->
                    <div class="excellent-customer">
                        <div class="excellent-customer-text">
                            <h3>Excellent Customer Support</h3>
                        </div>
                        <div class="excellent-customer-images">
                            <img src="{{ asset('frontend') }}/assets/images/why-us/great-two.png" class="img-fluid"
                                alt="">
                            <img src="{{ asset('frontend') }}/assets/images/why-us/great-five.png" class="img-fluid"
                                alt="">
                            <img src="{{ asset('frontend') }}/assets/images/why-us/great-six.png" class="img-fluid"
                                alt="">
                            <img src="{{ asset('frontend') }}/assets/images/why-us/great-three.png" class="img-fluid"
                                alt="">
                            <img src="{{ asset('frontend') }}/assets/images/why-us/great-two.png" class="img-fluid"
                                alt="">
                        </div>
                    </div>
                    <!-- singel-why-card-three -->
                    <div class="singel-why-card-three">
                        <div class="singel-why-card-three-img">
                            <img src="{{ asset($whychoseus->image_five) }}" class="img-fluid"
                                alt="">
                        </div>
                        <div class="singel-why-card-three-content">
                            <h3>{{ $whychoseus->title_five ?? 'N/A'}}</h3>
                            <p>{!! $whychoseus->description_five ?? 'N/A' !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>