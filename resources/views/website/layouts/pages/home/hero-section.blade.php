<section class="hero-section">
    <div class="meet-us-part">
        <a href="#"> <i class="fa-solid fa-location-dot me-2"></i> {{ $banner->sub_title ?? 'Not Available' }} </a>
    </div>
    @php
        $words = explode(' ', $banner->title);

        if(count($words) > 2){
            $words[1] = '<span class="highlight-heading-title">'.$words[1].'</span>';
        }

        $title = implode(' ', $words);
    @endphp

    <h1 class="top-title-heading">{!! $title ?? 'Not Available' !!}</h1>

    <p class="hero-section-paragraph">{!! $banner->description ?? 'Not Available' !!}</p>
    <h5 class="hero-looking-heading">{!! $banner->interested_in ?? 'Not Available' !!}</h5>
    <div class="btn-group-custom hero-section-big-btn">
        <a href="{{ $banner->button_one_url ?? '#'}}" class="btn btn-link-publisher-primary">{{ $banner->button_one_name ?? 'Not Available'}}</a>
        <a href="{{ $banner->button_two_url ?? '#' }}" class="btn btn-outline-link-publisher">{{ $banner->button_two_name ?? 'Not Available' }}</a>
    </div>
    <p class="text-muted small live-link-money-back"> <i class="fa-solid fa-square-check"></i> {!! $banner->guarantee_text ?? 'Live link or
        money back/replacement guarantee' !!}</p>
    <div style="margin: 1rem 0;">
        <img src="https://randomuser.me/api/portraits/women/44.jpg" class="rounded-circle" width="40">
        <img src="https://randomuser.me/api/portraits/women/47.jpg" class="rounded-circle" width="40">
        <img src="https://randomuser.me/api/portraits/men/40.jpg" class="rounded-circle" width="40">
        <span class="small">Loved by 6,000+ customers</span>
    </div>
    <p class="text-muted small mb-3">We are Integrated with</p>
    <div class="trusted-by">
        @php
            $trustedLogos = json_decode($banner->files, true);
        @endphp
        @if (!empty($trustedLogos) && is_array($trustedLogos))
            @foreach ($trustedLogos as $logo)
                <img src="{{ asset($logo) }}" alt="Trusted Logo">
            @endforeach
        @endif
    </div>

</section>
