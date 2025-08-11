<!-- Bootstrap JS -->
    <script src="{{ asset('frontend') }}/assets/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <script src="{{ asset('frontend') }}/assets/js/all.min.js"></script>

    <!-- Logo Slider JS -->
    <script src="{{ asset('frontend') }}/assets/js/logoSlider.js"></script>

    <!-- counter js -->
    <script src="{{ asset('frontend') }}/assets/js/counter.js"></script>

    <!-- popup video -->
    <script src="{{ asset('frontend') }}/assets/js/videoPopup.js"></script>

    <script>
        function toggleMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('open');

            // Close dropdowns on close
            if (!menu.classList.contains('open')) {
                document.querySelectorAll('.has-dropdown.open').forEach(item => item.classList.remove('open'));
            }
        }

        function toggleDropdown(trigger) {
            const parent = trigger.closest('.has-dropdown');

            // Close other dropdowns
            document.querySelectorAll('.has-dropdown').forEach(item => {
                if (item !== parent) item.classList.remove('open');
            });

            parent.classList.toggle('open');
        }
    </script>
    <!-- back to top -->
    <script>
        document.querySelector('.go-top').addEventListener('click', function (e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
    <!-- sticky menu -->
    <script src="{{ asset('frontend') }}/assets/js/sticky-menu.js"></script>

    @stack('scripts')