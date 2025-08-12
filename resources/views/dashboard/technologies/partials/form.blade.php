<div class="row">
    <div class="col-12">
        <div class="input-wrap">
            <label class="form-label my-2">Name</label>
            <input type="text" name="name" value="{{ $technology->name ?? '' }}" placeholder="Enter Technology Name">
            @if ($errors->has('name'))
                <small class="text-danger">{{ $errors->first('name') }}</small>
            @endif
        </div>
    </div>
    {{-- slug --}}
    <div class="col-12">
        <div class="input-wrap">
            <label class="form-label my-2">Slug</label>
            <input type="text" name="slug" value="{{ $technology->slug ?? '' }}" placeholder="Enter Technology Slug">
            @if ($errors->has('slug'))
                <small class="text-danger">{{ $errors->first('slug') }}</small>
            @endif
        </div>
    </div>
    {{-- icon --}}
    <div class="col-12">
        <div class="input-wrap">
            <label class="form-label my-2">Icon</label>
            <input type="text" name="icon" value="{{ $technology->icon ?? '' }}" placeholder="Enter Technology Icon">
            @if ($errors->has('icon'))
                <small class="text-danger">{{ $errors->first('icon') }}</small>
            @endif
        </div>
    </div>

</div>
