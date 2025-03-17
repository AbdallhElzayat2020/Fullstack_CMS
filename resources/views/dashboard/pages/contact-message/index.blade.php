@extends('dashboard.layouts.master')
@section('title','Contact Messages')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('Contact Messages')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>{{__('All Contact Messages')}}</h4>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-sub">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{__('Email')}}</th>
                                            <th>{{__('Subject')}}</th>
                                            <th>{{__('Message')}}</th>
                                            <th>{{__('Replied')}}</th>
                                            <th>{{__('Action')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($messages as $key=> $message)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$message->email}}</td>
                                                <td>{{$message->subject}}</td>
                                                <td>{{$message->message}}</td>
                                                <td>
                                                    @if($message->replied == 1)
                                                        <i style="font-size: 18px" class="fas fa-check text-success"></i>
                                                    @else
                                                        <i style="font-size: 18px" class="fas fa-times text-danger"></i>
                                                    @endif
                                                </td>

                                                {{--                                                <td>--}}
                                                {{--                                                    @if($link->status === 'active')--}}
                                                {{--                                                        <span--}}
                                                {{--                                                            class="badge badge-success">{{__('Active')}}</span>--}}
                                                {{--                                                    @else--}}
                                                {{--                                                        <span class="badge badge-danger">{{__('Not Active')}}</span>--}}
                                                {{--                                                    @endif--}}
                                                {{--                                                </td>--}}

                                                <td class=" d-flex">
                                                    <a href=""
                                                       data-toggle="modal" data-target="#exampleModal-{{$message->id}}"
                                                       class="btn btn-primary mx-1">
                                                        <i class="fas fa-envelope"></i>
                                                    </a>

                                                    <a href="{{ route('admin.social-link.destroy',$message->id) }}"
                                                       class="btn btn-danger delete-item mx-1">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @foreach($messages as $message)
        <div class="modal fade" id="exampleModal-{{$message->id}}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Replay To : {{$message->email}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.contact.replay-send') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="">{{__('Subject')}}</label>
                                <input type="text" name="subject" class="form-control">
                                <input type="hidden" name="email" value="{{$message->email}}" class="form-control">
                                <input type="hidden" name="message_id" value="{{$message->id}}" class="form-control">
                                @error('subject')
                                <p class="text-danger">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">{{__('Message')}}</label>
                                <textarea name="message" id="" style="height: 200px!important;" class="form-control"
                                          cols="30" rows="10"></textarea>
                                @error('message')
                                <p class="text-danger">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                    {{__('Close')}}
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    {{__('Send Email')}}
                                </button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

@endsection

@push('js')

    <script>

        $("#table-sub").dataTable({
            "columnDefs": [
                {
                    "sortable": false,
                    "targets": [1]
                }
            ],
            "order": [[0, 'desc']]
        });

    </script>

@endpush
