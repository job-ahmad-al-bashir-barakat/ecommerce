@php
    $labelClass = $required ? "$labelClass required" : "$labelClass";
    $inputClass = $required ? "$inputClass required" : "$inputClass";
@endphp

<div class="form-group">
    {{ Form::label($name, $label,['class' => $labelClass]) }}
    <div class="input-group {{ $inputGroupClass }}">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="{{ $inputGroupIcon }}"></i></div>
        </div>
        {{ Form::$type($name,$value,array_merge(['id' => $id, 'class' => "form-control {$inputClass}"],$attr)) }}
    </div>
    @include('form::error')
</div>