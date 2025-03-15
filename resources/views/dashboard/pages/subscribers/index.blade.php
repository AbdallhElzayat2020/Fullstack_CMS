@extends('dashboard.layouts.master')
@section('title','Mail Subscribers Page')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('Subscribers')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>{{__('Send Mail to Subscribers')}}</h4>

                    </div>

                    <div class="col-12 col-sm-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.subscribers.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="subject">{{__('Subject')}}</label>
                                        <input type="text" class="form-control" name="subject" id="subject">
                                        @error('subject')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="subject">{{__('Message')}}</label>
                                        <textarea name="message" class="summernote" id=""></textarea>
                                        @error('message')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary" type="submit">{{__('Send')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>{{__('All Subscribers')}}</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> {{__('Create New')}}
                            </a>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-sub">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>{{__('Email')}}</th>
                                            <th>{{__('Action')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($subscribers as $key => $subscriber)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$subscriber->email}}</td>
                                                <td>
                                                    <a href="{{ route('admin.subscribers.destroy',$subscriber->id) }}"
                                                       class="delete-item btn btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
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

@endsection

@push('js')

    <script>

        $("#table-sub").dataTable({
            "columnDefs": [
                {
                    "sortable": false,
                    "targets": [1]
                }
            ]
        });

    </script>

@endpush
