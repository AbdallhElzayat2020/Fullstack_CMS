<div class="card border border-primary">
    <div class="card-body mt-4">
        <form action="{{ route('admin.appearance-setting.update') }}" method="post">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>{{__('Pick Your Color')}}</label>
                <div class="input-group colorpickerinput">
                    <input name="site_color" value="{{$setting['site_color']}}" type="text" class="form-control">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="fas fa-fill-drip"></i>
                        </div>
                    </div>

                    @error('site_color')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                </div>
            </div>


            <button class="btn btn-primary" type="submit">
                {{__('Save')}}
            </button>

        </form>
    </div>
</div>
