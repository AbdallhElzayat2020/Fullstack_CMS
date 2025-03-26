@extends('dashboard.layouts.master')
@section('title','Pending News Page')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('Pending News')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>{{__('All Pending News')}}</h4>
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
                                            $news = App\Models\News::with('category')->where('language',$language->lang)
                                            ->where('is_approved', 0)
                                            ->orderBy('id','DESC')->get();
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
                                                        <th>{{__('Image')}}</th>
                                                        <th>{{__('Title')}}</th>
                                                        <th>{{__('Category')}}</th>
                                                        <th>{{__('Approve')}}</th>
                                                        <th>{{__('Action')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($news as $key => $newsItem)
                                                        <tr>
                                                            <td>{{$key + 1}}</td>
                                                            <td>
                                                                <img style="width: 100px; height: 100px"
                                                                     src="{{asset($newsItem->image)}}"
                                                                     alt="{{$newsItem->title}}">
                                                            </td>
                                                            <td>{{$newsItem->title}}</td>
                                                            <td>{{$newsItem->category->name}}</td>
                                                            <td>
                                                                <form action="{{ route('admin.approved-news') }}"
                                                                      id="approve_form">
                                                                    <input type="hidden" name="id"
                                                                           value="{{$newsItem->id}}">
                                                                    <div class="form-group">
                                                                        <select name="is_approved" class="form-control"
                                                                                id="approve_input">
                                                                            <option class="form-control" value="0">
                                                                                {{__('pending')}}
                                                                            </option>
                                                                            <option class="form-control" value="1">
                                                                                {{__('Approved')}}
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </form>
                                                            </td>

                                                            <td>
                                                                <div class="d-flex">
                                                                    <a href="{{ route('admin.news.edit',$newsItem->id) }}"
                                                                       class="btn btn-primary mx-1">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                    <a href="{{ route('admin.news.destroy',$newsItem->id) }}"
                                                                       class="delete-item btn btn-danger mx-1">
                                                                        <i class="fas fa-trash-alt"></i>
                                                                    </a>
                                                                    <a href="{{ route('admin.news-copy',$newsItem->id) }}"
                                                                       class="btn btn-primary mx-1">
                                                                        <i class="fas fa-copy"></i>
                                                                    </a>
                                                                </div>
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
            ],
            "order": [[0, "asc"]]
        });
        @endforeach

        /*
        * Change Toggle Status
        * */
        $(document).ready(function () {

            $('#approve_input').on('change', function () {
                $('#approve_form').submit();
            });

            $('#approve_form').on('submit', function (e) {
                e.preventDefault();

                let data = $(this).serialize();
                $.ajax({
                    method: 'PUT',
                    url: '{{route('admin.approved-news')}}',
                    data: data,
                    success: function (data) {
                        if (data.status === 'success') {
                            Toast.fire({
                                icon: "success",
                                title: "updated successfully"
                            });
                            window.location.reload();
                        }
                    },
                    error: function (err) {
                        console.log(err);
                    }
                })
            });
        })
    </script>

@endpush
