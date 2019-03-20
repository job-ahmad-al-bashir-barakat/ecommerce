@php
    $labelClass  = $required ? "$labelClass required" : "$labelClass";
    $selectClass = $required ? "$selectClass required" : "$selectClass";
@endphp

<div class="form-group">
    {{ Form::label($name,$label,['class' => $labelClass]) }}
    {{ Form::select($name,$list,$selected,array_merge([
        'id' => $id ,'class' => "custom-select {$selectClass}",'placeholder' => $placeholder
    ],$selectAttributes),$optionsAttributes,$optgroupsAttributes) }}
    @include('form::error')
</div>