<div class="card border border-primary">
    <div class="card-body mt-4">
        <form action="{{ route('admin.seo-setting.update') }}" method="post">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="site_seo_title">{{__('Site Seo Title')}}</label>

                <input type="text" value="{{$setting['site_seo_title']}}" class="form-control" name="site_seo_title">

                @error('site_seo_title')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="site_seo_description">{{__('Site Seo Description')}}</label>

                <textarea class="form-control" type="text" style="height: 300px!important;"
                          name="site_seo_description">{{$setting['site_seo_description']}}</textarea>

                @error('site_seo_description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="site_seo_keywords">{{__('Site Seo Keywords')}}</label>

                <input name="site_seo_keywords" value="{{$setting['site_seo_keywords']}}" type="text"
                       class="form-control inputtags">
                @error('site_seo_keyword')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">
                {{__('Save')}}
            </button>

        </form>
    </div>
</div>
