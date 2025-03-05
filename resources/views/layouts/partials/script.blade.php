<script src="{{ asset('js/demo-theme.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('js/demo.min.js') }}"></script>
<script src="{{ asset('js/common.js') }}"></script>
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>
<script src="{{ asset('js/list.js') }}"></script>
<script src="{{ asset('js/axios.min.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>

<script>
    $(document).ready(function() {
        @if (session()->has('success'))
            toastr.success("{{ session()->get('success') }}");
        @endif
        @if (session()->has('error'))
            toastr.error("{{ session()->get('error') }}");
        @endif
        @if (session()->has('warning'))
            toastr.warning("{{ session()->get('warning') }}");
        @endif
    });
</script>
