    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- Bootstrap JS (with Popper) -->
    <script src="{{ asset('publisher') }}/assets/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <script src="{{ asset('publisher') }}/assets/js/all.min.js"></script>

    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("collapsed");
        }
    </script>



    @stack('scripts')