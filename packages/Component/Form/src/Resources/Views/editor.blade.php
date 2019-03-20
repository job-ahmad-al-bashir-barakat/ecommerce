@php
    $labelClass = $required ? "$labelClass required" : "$labelClass";
@endphp

<div class="form-group">
    {{ Form::label($name, $label,['class' => $labelClass]) }}
    {{ Form::hidden($name,null,['id' => $id, 'class' => 'editor-value']) }}
    <div class="editor">{!! $value !!}</div>
    @include('form::error')
</div>