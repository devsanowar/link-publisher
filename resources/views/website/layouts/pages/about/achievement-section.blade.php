<section class="achievement-section py-5">
    <div class="container">
        <div class="row g-0 achievement-row">
            @foreach ($achievements as $achievement)
                <div class="col-md-3 col-6">
                    <div class="single-achievement border-right">
                        <h3>{{ $achievement->count_number }}+</h3>
                        <p>{{ $achievement->title }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
