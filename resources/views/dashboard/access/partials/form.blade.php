<div class="row">
    {{-- name --}}
    <div class="col-12">
        <div class="input-wrap">
            <label class="form-label my-2">Name</label>
            <input type="text" name="name" value="{{ $access->name ?? '' }}" placeholder="Enter Access Name">
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
    </div>
</div>
