<div class="card border border-primary">
    <div class="card-body mt-4">
        <form action="{{ route('admin.general-setting.update') }}" method="post"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="form-group">

                <label for="site_name">{{__('Site Name')}}</label>

                <input type="text" value="{{$setting['site_name']}}" class="form-control" name="site_name">
                @error('site_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">

                <label for="">{{__('Site Logo')}}</label>

                <input type="file" class="form-control" name="site_logo" id="">
                <img style="width: 150px;" src="{{asset($setting['site_logo'])}}" alt="{{$setting['site_name']}}">
                @error('site_logo')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">

                <label for="">{{__('Site Favicon')}}</label>

                <input type="file" class="form-control" name="site_favicon" id="">
                <img style="width: 150px;" src="{{asset($setting['site_favicon'])}}" alt="{{$setting['site_name']}}">

                @error('site_favicon')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">
                {{__('Save')}}
            </button>

        </form>
    </div>
</div>
