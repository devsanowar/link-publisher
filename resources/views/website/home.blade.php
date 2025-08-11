@extends('website.layouts.app')
@section('title', 'Home Page')
@push('styles')
        <!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    /* Arrow Buttons Design */
.wallLoveSlider .swiper-button-prev,
.wallLoveSlider .swiper-button-next {
    background: #fff;
    color: #333;
    width: 45px;
    height: 45px;
    border-radius: 50%;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.wallLoveSlider .swiper-button-prev:hover,
.wallLoveSlider .swiper-button-next:hover {
    background: #ff6600; /* ব্র্যান্ড কালার */
    color: #fff;
}

/* Arrow Icon Size */
.wallLoveSlider .swiper-button-prev::after,
.wallLoveSlider .swiper-button-next::after {
    font-size: 18px;
    font-weight: bold;
}

/* Equal Height for Slides */
.wallLoveSlider .swiper-slide {
    display: flex;
    flex-direction: column;
    height: 100%;
}

.wallLoveSlider .single-wall-love,
.wallLoveSlider .single-image-video {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

</style>
@endpush
@section('website_content')
    <!-- Hero Section Start -->
    @include('website.layouts.pages.home.hero-section')
    <!-- Hero Section End -->

    <!-- Hero Banner Image section Start-->
    @include('website.layouts.pages.home.hero-banner-section')
    <!-- Hero Banner Image section End-->

    <!-- Featured logo Section Start -->
    @include('website.layouts.pages.home.featured-logo-section')
    <!-- Featured logo Section End -->

    <!-- Achivement section Start -->
    @include('website.layouts.pages.home.achievement')
    <!-- Achivement section End -->

    <!-- Wall of Love section Start -->
    @include('website.layouts.pages.home.wall-of-love-section')
    <!-- Wall of Love section End -->
    <!-- Top featured section Start -->
    @include('website.layouts.pages.home.featured-section')
    <!-- Top featured section End -->
    <!-- Why Us section Start -->
    @include('website.layouts.pages.home.why-chose-us-section')
    <!-- Why Us section End -->
    <!-- Services section Start -->
    @include('website.layouts.pages.home.service-section')
    <!-- Services section End -->
    <!-- Unlock section Start -->
    @include('website.layouts.pages.home.unlock-section')
@endsection

@push('scripts')


<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    new Swiper('.wallLoveSlider', {
        slidesPerView: 3, // একসাথে ৩টা দেখাবে
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        breakpoints: {
            0: { slidesPerView: 1 }, // মোবাইলে ১টা
            768: { slidesPerView: 2 }, // ট্যাবে ২টা
            1024: { slidesPerView: 3 } // ডেস্কটপে ৩টা
        }
    });

    // Video Modal Play
    var videoModal = document.getElementById('videoModal');
    videoModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var videoUrl = button.getAttribute('data-video');
        document.getElementById('youtubeVideo').src = videoUrl + "?autoplay=1";
    });
    videoModal.addEventListener('hidden.bs.modal', function () {
        document.getElementById('youtubeVideo').src = "";
    });
});
</script>


@endpush

