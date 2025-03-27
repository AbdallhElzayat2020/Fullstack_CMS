@extends('dashboard.layouts.master')
@section('title','Frontend localization')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('Frontend localization')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>{{__('Frontend localization')}}</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
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
                                        <div class="tab-pane fade show {{$loop->index === 0 ?'active':''}}"
                                             id="home-{{$language->lang}}"
                                             role="tabpanel"
                                             aria-labelledby="home-tab2">

                                            <div class="card-body">
                                                <div>
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <form action="{{ route('admin.extract-localize-string') }}"
                                                                      method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="directory" value="{{resource_path('views/frontend')}}">
                                                                    <input type="hidden" name="language_code" value="{{$language->lang}}">
                                                                    <button type="submit" class="btn btn-primary mx-3">
                                                                        {{__('Generate Strings')}}
                                                                    </button>
                                                                </form>
                                                                <button type="submit" class="btn btn-dark mx-3">
                                                                    {{__('Translate Strings')}}
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="table-responsive">
                                                    <table class="table table-striped" id="table-{{$language->lang}}">
                                                        <thead>
                                                        <tr>
                                                            <th class="text-center">#</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
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
