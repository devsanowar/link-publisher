<section class="link-process-section text-white">
    <div class="container">
        <div class="service-section-title">
            <h2 class="service-heading">A Step-by-Step Guide to Our Link Building Process</h2>
            <p class="service-subtitle">
                Here’s our 4-step roadmap for offering the best link building services.
            </p>
        </div>

        <!-- Steps -->
        <div class="row gy-5 justify-content-between text-center text-md-start">
            @foreach ($linkBuildingProcesses as $key => $process)
                <!-- Step 3 -->
                <div class="col-12 col-md-6 col-lg-3 process-step">
                    <div class="step-number">{{ $key + 1 }}</div>
                    <h5 class="fw-semibold mt-3">{{ $process->title }}</h5>
                    <p class="step-description">{!! $process->description !!}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
