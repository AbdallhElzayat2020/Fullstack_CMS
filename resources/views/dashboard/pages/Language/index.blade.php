@extends('dashboard.layouts.master')
@section('title','Languages Page')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('Languages')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>{{__('All Languages')}}</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.language.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> {{__('Create New')}}
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>{{__('Language Name')}}</th>
                                    <th>{{__('Lang Code')}}</th>
                                    <th>{{__('Status')}}</th>
                                    <th>{{__('Is Default')}}</th>
                                    <th>{{__('Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($languages as $key=> $language)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>
                                        <td>{{$language->name}}</td>
                                        <td>{{$language->lang}}</td>
                                        <td>
                                            @if($language->status ==='active')
                                                <div
                                                    class="badge badge-success">
                                                    {{$language->status}}
                                                </div>
                                            @else
                                                <div
                                                    class="badge badge-secondary">
                                                    {{$language->status}}
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($language->default ==='yes')
                                                <div
                                                    class="badge badge-primary">
                                                    Default
                                                </div>
                                            @else
                                                <div
                                                    class="badge badge-secondary">
                                                    {{$language->default}}
                                                </div>
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.language.edit',$language->id) }}"
                                               class="btn btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('admin.language.destroy',$language->id) }}"
                                               class="delete-item btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>

                                            {{--                                                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"--}}
                                            {{--                                                                                                data-bs-target="#delete{{ $language->id }}">--}}
                                            {{--                                                                                            <i class="fas fa-trash-alt"></i>--}}
                                            {{--                                                                                        </button>--}}

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
    </section>

@endsection
