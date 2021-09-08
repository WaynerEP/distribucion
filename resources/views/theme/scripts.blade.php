<script src="assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="bootstrap/js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/js/app.js"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
{{-- <script src="plugins/highlight/highlight.pack.js"></script> --}}
<script src="assets/js/custom.js"></script>
{{-- <script src="assets/js/scrollspyNav.js"></script> --}}
<script src="plugins/notification/snackbar/snackbar.min.js"></script>
<script src="assets/js/components/notification/custom-snackbar.js"></script>
<script src="plugins/sweetalerts/sweetalert2.min.js"></script>
{{-- <script src="plugins/sweetalerts/custom-sweetalert.js"></script> --}}
<script src="plugins/flatpickr/flatpickr.js"></script>
@yield('scripts')
<script>
    function showMessage(msg) {
        Snackbar.show({
            text: msg,
            pos: 'top-right',
            actionText: 'Cerrar'
        });
    }
</script>
@livewireScripts
