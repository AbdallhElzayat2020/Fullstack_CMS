<a href="javascript:void(0)" id="return-to-top"><i class="fa fa-chevron-up"></i></a>

<script type="text/javascript" src="{{asset('assets/frontend/js/index.bundle.js')}}"></script>

<script>
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
