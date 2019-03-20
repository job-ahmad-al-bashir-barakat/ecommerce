@php
    $labelClass = $required ? "$labelClass required" : "$labelClass";
    $inputClass = $required ? "$inputClass required" : "$inputClass";
@endphp

<div class="form-group">
    {{ Form::label($name,$label,['class' => $labelClass]) }}
    {{ Form::$type($name,$value,array_merge(['id' => $id,'class' => "form-control {$inputClass}"],$attr)) }}
    @include('form::error')
</div>
