<a href="javascript:void(0)" id="return-to-top"><i class="fa fa-chevron-up"></i></a>

<script type="text/javascript" src="{{asset('assets/frontend/js/index.bundle.js')}}"></script>
{{--sweet alert js--}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('sweetalert::alert')
@stack('content')
<script>

    // add csrf token in ajax requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {
        /* Change Language */
        $('#site-language').on('change', function () {
            let language_code = $(this).val();

            $.ajax({
                method: 'GET',
                url: "{{route('language')}}",
                data: {
                    language_code: language_code,
                },
                success: function (data) {
                    if (data.status === 'success') {
                        window.location.reload();
                    }
                },
                error: function (error) {
                    console.log(error);
                },
            });
        });
    })
</script>

