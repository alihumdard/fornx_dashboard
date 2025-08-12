<div class="row">
    <div class="col-12">
        <div class="input-wrap">
            <label class="form-label my-2">Name</label>
            <input type="text" name="name" value="{{ $platform->name ?? '' }}" placeholder="Enter Platform Name">
            @if ($errors->has('name'))
                <small class="text-danger">{{ $errors->first('name') }}</small>
            @endif
        </div>
    </div>
    {{-- slug --}}
    <div class="col-12">
        <div class="input-wrap">
            <label class="form-label my-2">Slug</label>
            <input type="text" name="slug" value="{{ $platform->slug ?? '' }}" placeholder="Enter Platform Slug">
            @if ($errors->has('slug'))
                <small class="text-danger">{{ $errors->first('slug') }}</small>
            @endif
        </div>
    </div>

</div>
