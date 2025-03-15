@extends('dashboard.layouts.master')
@section('title','News Page')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{__('News')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>{{__('All News')}}</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
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
                                            $news = App\Models\News::with('category')->where('language',$language->lang)->orderBy('id','DESC')->get();
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
                                                        <th>{{__('In Breaking')}}</th>
                                                        <th>{{__('In Slider')}}</th>
                                                        <th>{{__('In Popular')}}</th>
                                                        <th>{{__('Status')}}</th>
                                                        <th>{{__('Created By')}}</th>
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
                                                                <label class="custom-switch mt-2">
                                                                    <input
                                                                        {{$newsItem->is_breaking_news === 1 ? 'checked' :'' }} value="1"
                                                                        data-id="{{$newsItem->id}}"
                                                                        data-name="is_breaking_news"
                                                                        type="checkbox"
                                                                        class="custom-switch-input toggle-status">
                                                                    <span class="custom-switch-indicator"></span>
                                                                </label>

{{--                                                                                                                                @if($newsItem->is_breaking_news === 1)--}}
{{--                                                                                                                                    <span--}}
{{--                                                                                                                                        class="badge badge-success">{{__('Yes')}}</span>--}}
{{--                                                                                                                                @else--}}
{{--                                                                                                                                    <span class="badge badge-danger">{{__('No')}}</span>--}}
{{--                                                                                                                                @endif--}}
                                                            </td>

                                                            <td>
                                                                <label class="custom-switch mt-2">
                                                                    <input
                                                                        {{$newsItem->show_at_slider === 1 ? 'checked' : '' }} value="1"
                                                                        data-id="{{$newsItem->id}}"
                                                                        data-name="show_at_slider"
                                                                        type="checkbox"
                                                                        class="custom-switch-input toggle-status">
                                                                    <span class="custom-switch-indicator"></span>
                                                                </label>
                                                            {{--                                                                @if($newsItem->show_at_slider === 1)--}}
                                                            {{--                                                                    <span--}}
                                                            {{--                                                                        class="badge badge-success">{{__('Yes')}}</span>--}}
                                                            {{--                                                                @else--}}
                                                            {{--                                                                    <span class="badge badge-danger">{{__('No')}}</span>--}}
                                                            {{--                                                                @endif--}}
                                                            {{--                                                            </td>--}}

                                                            <td>
                                                                <label class="custom-switch mt-2">
                                                                    <input
                                                                        value="1"
                                                                        data-id="{{ $newsItem->id }}"
                                                                        data-name="show_at_popular"
                                                                        type="checkbox"
                                                                        class="custom-switch-input toggle-status"
                                                                        @checked(($newsItem->show_at_popular ?? 0) === 1)>
                                                                    <span class="custom-switch-indicator"></span>
                                                                </label>
                                                                {{--                                                                @if($newsItem->show_at_popular === 1)--}}
                                                                {{--                                                                    <span--}}
                                                                {{--                                                                        class="badge badge-success">{{__('Yes')}}</span>--}}
                                                                {{--                                                                @else--}}
                                                                {{--                                                                    <span class="badge badge-danger">{{__('No')}}</span>--}}
                                                                {{--                                                                @endif--}}
                                                            </td>

                                                            <td>
                                                                {{--                                                                <label class="custom-switch mt-2">--}}
                                                                {{--                                                                    <input--}}
                                                                {{--                                                                        {{$newsItem->status === 'active' ? 'checked' : '' }} value="1"--}}
                                                                {{--                                                                        data-id="{{$newsItem->id}}" data-name="status"--}}
                                                                {{--                                                                        type="checkbox"--}}
                                                                {{--                                                                        class="custom-switch-input toggle-status">--}}
                                                                {{--                                                                    <span class="custom-switch-indicator"></span>--}}
                                                                {{--                                                                </label>--}}
                                                                @if($newsItem->status === 'active')
                                                                    <span
                                                                        class="badge badge-success">{{__('Active')}}</span>
                                                                @else
                                                                    <span
                                                                        class="badge badge-danger">{{__('Inactive')}}</span>
                                                                @endif
                                                            </td>

                                                            <td>
                                                                {{Auth::guard('admin')->user()->name}}
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
            "order": [[0, "desc"]]
        });
        @endforeach

        /*
        * Change Toggle Status
        * */
        $(document).ready(function () {

            $('.toggle-status').on('click', function () {
                let id = $(this).attr('data-id');
                let name = $(this).attr('data-name');
                let status = $(this).prop('checked') ? 1 : 0;

                $.ajax({
                    method: 'GET',
                    url: "{{route('admin.toggle-news-status')}}",
                    data: {
                        id: id,
                        name: name,
                        status: status
                    },
                    success: function (data) {
                        if (data.status === 'success') {
                            Toast.fire({
                                icon: "success",
                                title: "updated successfully"
                            });
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
