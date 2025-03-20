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
                                        <th>{{__('Role Name')}}</th>
                                        <th>{{__('Permissions')}}</th>
                                        <th>{{__('Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($roles as $key => $role)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                @foreach($role->permissions as $permission)
                                                    <span class="badge badge-primary">{{ $permission->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.role.edit',$role->id) }}"
                                                   class="btn btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('admin.role.destroy',$role->id) }}"
                                                   class="btn delete-item btn-danger">
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
