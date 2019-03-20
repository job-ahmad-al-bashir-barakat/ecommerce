@php
    $labelClass = $required ? "$labelClass required" : "$labelClass";
    $selectClass = $required ? "$selectClass required" : "$selectClass";
@endphp

<div class="form-group">
    {{ Form::label($name,$label,['class' => $labelClass]) }}
    @isset($tooltip) {!! $tooltip !!} @endisset
    {{ Form::select($name,$list,$selected,array_merge([
         'id'                    => $id,
         'class'                 => "custom-select autocomplete {$selectClass}",
         'data-remote'           => $remote,
    ],$selectAttributes),$optionsAttributes,$optgroupsAttributes) }}
    @include('form::error')
</div>