<script src="{{ asset('assets/dashboard/modules/jquery.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/modules/popper.js') }}"></script>
<script src="{{ asset('assets/dashboard/modules/tooltip.js') }}"></script>
<script src="{{ asset('assets/dashboard/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/modules/moment.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/stisla.js') }}"></script>

<!-- JS Libraies -->
<script src="{{ asset('assets/dashboard/modules/summernote/summernote-bs4.js') }}"></script>

<!-- Page Specific JS File -->
{{--<script src="{{ asset('assets/dashboard/js/page/index-0.js') }}"></script>--}}

<!-- Template JS File -->
<script src="{{ asset('assets/dashboard/js/scripts.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/custom.js') }}"></script>
<script src="{{asset('assets/dashboard/modules/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>
@include('sweetalert::alert')
<script>
    $.uploadPreview({
        input_field: "#image-upload",   // Default: .image-upload
        preview_box: "#image-preview",  // Default: .image-preview
        label_field: "#image-label",    // Default: .image-label
        label_default: "Choose File",   // Default: Choose File
        label_selected: "Change File",  // Default: Change File
        no_label: false,                // Default: false
        success_callback: null          // Default: null
    });
</script>

@stack('js')
