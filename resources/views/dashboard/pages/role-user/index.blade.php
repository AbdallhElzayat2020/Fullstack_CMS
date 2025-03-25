@extends('dashboard.layouts.master')
@section('title','Roles Users Page')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('Roles Users')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>{{__('All Roles Users')}}</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.role-users.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> {{__('Create User')}}
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
                                        <th>{{__('Name')}}</th>
                                        <th>{{__('Email')}}</th>
                                        <th>{{__('Role')}}</th>
                                        <th>{{__('Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($admins as $key=> $admin)
                                        <tr>
                                            <td>
                                                {{$key+1}}
                                            </td>
                                            <td>
                                                {{$admin->name}}
                                            </td>
                                            <td>
                                                {{$admin->email}}
                                            </td>
                                            <td>
                                               <span class="badge badge-primary">
                                                    {{$admin->getRoleNames()->first()}}
                                               </span>
                                            </td>
                                            <td>
                                                @if($admin->getRoleNames()->first() !== 'Super Admin')

                                                    <a href="{{ route('admin.role-users.edit',$admin->id) }}"
                                                       class="btn btn-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <a href="{{ route('admin.role-users.destroy',$admin->id) }}"
                                                       class="btn delete-item btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </a>

                                                @endif
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
