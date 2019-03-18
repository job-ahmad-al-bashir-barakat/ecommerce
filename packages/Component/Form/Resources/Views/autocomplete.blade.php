{!! Form::select($name,$option,array_keys($option),array_merge([
     'id'                    => $id,
     'class'                 => "form-control autocomplete $class",
     'data-letter'           => $letter,
     'data-placeholder'      => $placeholder,
     'tabindex'              => '1',
     'style'                 => "width: 100%",
     'data-remote'           => $remoteUrl
],$attr)) !!}
