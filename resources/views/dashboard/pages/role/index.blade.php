@extends('dashboard.layouts.master')
@section('title','Roles Page')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('Roles and Permission')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>{{__('Roles and Permission')}}</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.role.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> {{__('Create Role')}}
                            </a>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped" id="table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>{{__('Category Name')}}</th>
                                        <th>{{__('Language')}}</th>
                                        <th>{{__('Status')}}</th>
                                        <th>{{__('Show In Nav')}}</th>
                                        <th>{{__('Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>

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
        $("#table").dataTable({
            "columnDefs": [
                {"sortable": false, "targets": [2, 3]}
            ]
        });
    </script>

@endpush
