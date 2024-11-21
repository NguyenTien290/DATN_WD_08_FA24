    <!-- Jquery JS-->
    <script src="/assets/admin/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="/assets/admin/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="/assets/admin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS -->
    <script src="/assets/admin/vendor/slick/slick.min.js"></script>
    <script src="/assets/admin/vendor/wow/wow.min.js"></script>
    <script src="/assets/admin/vendor/animsition/animsition.min.js"></script>
    <script src="/assets/admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="/assets/admin/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="/assets/admin/vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="/assets/admin/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="/assets/admin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/assets/admin/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="/assets/admin/vendor/select2/select2.min.js"></script>
    <script src="/assets/admin/vendor/vector-map/jquery.vmap.js"></script>
    <script src="/assets/admin/vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="/assets/admin/vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="/assets/admin/vendor/vector-map/jquery.vmap.world.js"></script>

    <!-- Main JS-->
    <script src="/assets/admin/js/main.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pusher-js@7.0.3/dist/web/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.11.0/dist/echo.iife.js"></script>
    <script type="module" src="{{ asset('assets/js/app.js') }}"></script>

    {{-- Biến môi trường  --}}
    <script>
        window.PUSHER_APP_KEY = "{{ env('PUSHER_APP_KEY') }}";
        window.PUSHER_APP_CLUSTER = "{{ env('PUSHER_APP_CLUSTER', 'mt1') }}";
    </script>
