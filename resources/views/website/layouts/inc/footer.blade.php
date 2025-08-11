<footer>
    <div class="container">
        <div class="row">

            <!-- Column 1: Logo & Description -->
            <div class="col-lg-4 mb-4">
                <div class="d-flex align-items-center footer-logo">
                    <a href="index-home.html">
                        <img src="{{ asset($website_setting->website_footer_logo) }}" class="img-fluid" height="40px"
                            alt="">
                    </a>
                </div>
                <p class="footer-description">
                    {!! $website_setting->footer_content !!}
                </p>

                <!-- Social Icons -->
                <div class="social-icons mt-3">
                    <a href="{{ $social_setting->facebook_url }}" target="__blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ $social_setting->pinterest_url }}" target="__blank"><i class="fab fa-pinterest"></i></a>
                    <a href="{{ $social_setting->youtube_url }}" target="__blank"><i class="fab fa-youtube"></i></a>
                    <a href="{{ $social_setting->instagram_url }}" target="__blank"><i class="fab fa-instagram"></i></a>
                    <a href="{{ $social_setting->linkedin_url }}" target="__blank"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <!-- Column 2: Services -->
            <div class="col-md-4 col-lg-2 mb-4">
                <h5 class="footer-title">Services</h5>
                <div class="footer-links">
                    <a href="#">Link Building</a>
                    <a href="#">Guest Posting</a>
                    <a href="#">Digital PR</a>
                    <a href="#">Niche Edit</a>
                    <a href="#">SEO Reseller</a>
                    <a href="#">Content Writing</a>
                </div>
            </div>

            <!-- Column 3: Company -->
            <div class="col-md-4 col-lg-2 mb-4">
                <h5 class="footer-title">Company</h5>
                <div class="footer-links">
                    <a href="#">About</a>
                    <a href="#">Contact</a>
                    <a href="#">Blog</a>
                    <a href="#">Life at Link Publishers</a>
                    <a href="#">Write for Us</a>
                </div>
            </div>

            <!-- Column 4: Newsletter -->
            <div class="col-md-4 col-lg-4 mb-4">
                <h5 class="footer-title">Get Update</h5>
                <form id="newslatterForm" method="POST">
                    <div class="position-relative mb-2">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" id="email" name="email" class="form-control ps-5 subscribe-input"
                            placeholder="Your email address">
                    </div>
                    <button type="submit" class="subscribe-btn">Get Started</button>
                </form>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom d-flex flex-wrap justify-content-between align-items-center">
            <div>©{{ $website_setting->copyright_text }}.</div>
            <div class="d-flex flex-wrap align-items-center">
                <a href="#">Terms & Conditions</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Refund Policy</a>
                <a href="#">Get Help</a>
                <a href="#" class="go-top">Go back top <i class="fas fa-arrow-up"></i></a>
            </div>
        </div>
    </div>
</footer>
<!-- Footer section End -->
@push('scripts')
    <script>
        $(document).ready(function() {
            $("#newslatterForm").submit(function(e) {
                e.preventDefault();

                let formData = $(this).serialize(); // ফর্মের সব ডাটা নেবে

                $.ajax({
                    url: "{{ route('newslatter.store') }}",
                    type: "POST",
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#newslatterForm")[0].reset();
                        
                        setTimeout(() => {
                            toastr.options = {
                                timeOut: 1500,
                                extendedTimeOut: 1000,
                                closeButton: true,
                                progressBar: true,
                                positionClass: 'toast-top-right'
                            };
                            toastr.success(response.message ?? 'Subscribed successfully!');
                        }, 500);
                    },
                    error: function(xhr) {
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            toastr.error(xhr.responseJSON.message);
                        } else {
                            toastr.error('Something went wrong!');
                        }
                    }
                });
            });
        });
    </script>
@endpush
