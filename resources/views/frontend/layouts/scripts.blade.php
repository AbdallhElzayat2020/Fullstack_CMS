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
                        window.location.href = "{{url('/')}}";
                    }
                },
                error: function (error) {
                    console.log(error);
                },
            });
        });

        /*Subscribe newsLetter*/

        $('.newsletter-form').on('submit', function (e) {
            e.preventDefault();
            let email = $('#newsletter-email').val();
            $.ajax({
                method: 'POST',
                url: "{{route('news-letter')}}",
                data: $(this).serialize(),
                beforeSend: function () {
                    $('.newsletter-button').text('{{__('Sending...')}}');
                    $('.newsletter-button').attr('disabled', true);
                },
                success: function (data) {
                    if (data.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message,
                        });
                        $('.newsletter-form')[0].reset();
                        $('.newsletter-button').text('{{__('Sing up')}}');
                        $('.newsletter-button').attr('disabled', false);
                    }
                }, error: function (data) {
                    $('.newsletter-button').text('{{__('Sing up')}}');
                    $('.newsletter-button').attr('disabled', false);
                    if (data.status === 422) {
                        let errors = data.responseJSON.errors;
                        for (let key in errors) {
                            if (errors.hasOwnProperty(key)) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: errors[key][0],
                                });
                            }
                        }
                    }
                }
            });
        });
    })


</script>

