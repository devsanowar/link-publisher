<section class="ready-posting about-posting">
    <div class="container">
        <div class="posting-body text-center">
            <div class="single-posting-content">
                <h3>{{ $aboutPageCta->title }}</h3>
                <p>{!! $aboutPageCta->content !!}</p>
            </div>
            <div class="about-posting-btn">
                <div class="lets-get-start-btn text-end">
                    <a href="{{ $aboutPageCta->button_url }}"><button
                            class="btn btn-get-started">{{ $aboutPageCta->button_name }}</button></a>
                </div>
            </div>
        </div>
    </div>
</section>
