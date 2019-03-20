@if($required)
    <div id="error_{{$id}}">
        @if ($errors->has($name))
            <span class="invalid-feedback d-inline-block" role="alert">
                <strong>{{ $errors->first($name) }}</strong>
            </span>
        @endif
    </div>
@endif