@extends('dashboard.layouts.master')
@section('title','Social Links Page')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('Social Links')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>{{__('All Social Links')}}</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.social-link.create') }}" class="btn btn-primary">
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
                                            <th>#</th>
                                            <th>{{__('Icon')}}</th>
                                            <th>{{__('Url')}}</th>
                                            <th>{{__('Status')}}</th>
                                            <th>{{__('Action')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($socialLInks as $key=> $link)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td><i style="font-size: 30px" class="{{$link->icon}}"></i></td>
                                                <td>{{$link->url}}</td>
                                                <td>
                                                    @if($link->status === 'active')
                                                        <span
                                                            class="badge badge-success">{{__('Active')}}</span>
                                                    @else
                                                        <span class="badge badge-danger">{{__('Not Active')}}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.social-link.edit',$link->id) }}"
                                                       class="btn btn-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('admin.social-link.destroy',$link->id) }}"
                                                       class="btn btn-danger delete-item">
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
