<script src="{{ asset('assets/dashboard/modules/jquery.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/modules/popper.js') }}"></script>
<script src="{{ asset('assets/dashboard/modules/tooltip.js') }}"></script>
<script src="{{ asset('assets/dashboard/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/modules/moment.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/stisla.js') }}"></script>

<!-- JS Libraies -->
<script src="{{ asset('assets/dashboard/modules/summernote/summernote-bs4.js') }}"></script>
<script src="{{asset('assets/dashboard/modules/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/dashboard/modules/datatables/datatables.min.js')}}"></script>
<script
    src="{{asset('assets/dashboard/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/dashboard/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('assets/dashboard/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>

<!-- Page Specific JS File -->
<script src="{{asset('assets/dashboard/js/page/modules-datatables.js')}}"></script>


<!-- Template JS File -->
<script src="{{ asset('assets/dashboard/js/scripts.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/custom.js') }}"></script>
<script src="{{asset('assets/dashboard/modules/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>

{{--sweet alert js--}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@include('sweetalert::alert')

@stack('js')

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

    // handle tags input
    $(".inputtags").tagsinput('items');

    // add csrf token in ajax requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /*
     Handle Dynamic Delete    add delete-item in all delete buttons
    * */
    $(document).ready(function () {
        $('.delete-item').on('click', function (e) {
            e.preventDefault();

            let url = $(this).attr('href'); // رابط الحذف

            Swal.fire({
                title: "Are you sure?",
                text: "You will delete it forever!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: 'DELETE',
                        url: url,
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content') // CSRF Token
                        },
                        success: function (response) {
                            Swal.fire({
                                title: response.status === "success" ? "Deleted!" : "Warning!",
                                text: response.message,
                                icon: response.status === "success" ? "success" : "warning"
                            }).then(() => {
                                if (response.status === "success") {
                                    location.reload();
                                }
                            });
                        },
                        error: function (xhr) {
                            let errorMessage = "Something went wrong.";
                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                errorMessage = xhr.responseJSON.message;
                            }
                            Swal.fire({
                                title: "Error!",
                                text: errorMessage,
                                icon: "error"
                            });
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });
    });


</script>


