@extends('dashboard.layouts.master')
@section('title','FooterGrid Two Page')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('FooterGrid Two')}}</h1>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>{{__('FooterGrid Two')}}</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.footer-grid-two.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> {{__('Create New')}}
                            </a>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                    @foreach($languages as $key => $language)
                                        <li class="nav-item">
                                            <a class="nav-link {{$key === 0 ?'active':''}} " id="home-tab2"
                                               data-toggle="tab" href="#home-{{$language->lang}}"
                                               role="tab" aria-controls="home"
                                               aria-selected="true">{{$language->name}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="tab-content tab-bordered" id="myTab3Content">
                                    @foreach($languages as $language )
                                        @php
                                            $footer = App\Models\FooterGridTwo::where('language',$language->lang)->get();
                                        @endphp
                                        <div class="tab-pane fade show {{$loop->index === 0 ?'active':''}}"
                                             id="home-{{$language->lang}}"
                                             role="tabpanel"
                                             aria-labelledby="home-tab2">
                                            <div class="table-responsive">
                                                <table class="table table-striped" id="table-{{$language->lang}}">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th>{{__('Name')}}</th>
                                                        <th>{{__('Language')}}</th>
                                                        <th>{{__('Status')}}</th>
                                                        <th>{{__('Action')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($footer as $key => $item)
                                                        <tr>
                                                            <td>{{$key + 1}}</td>
                                                            <td>{{$item->name}}</td>
                                                            <td>{{$item->language}}</td>
                                                            <td>
                                                                @if($item->status === 'active')
                                                                    <span
                                                                        class="badge badge-success">{{__('Active')}}</span>
                                                                @else
                                                                    <span
                                                                        class="badge badge-danger">{{__('Inactive')}}</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('admin.footer-grid-two.edit',$item->id) }}"
                                                                   class="btn btn-primary">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <a href="{{ route('admin.footer-grid-two.destroy',$item->id) }}"
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
                                    @endforeach
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
        @foreach($languages as $language)
        $("#table-{{$language->lang}}").dataTable({
            "columnDefs": [
                {"sortable": false, "targets": [2, 3]}
            ]
        });
        @endforeach
    </script>

@endpush
