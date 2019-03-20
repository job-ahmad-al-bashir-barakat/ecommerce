<?php

namespace Component\Form\Builder;

class FormBuilder
{
    protected $global = [];

    protected $default = [
        'required'    => false,
        'placeholder' => '',
        'tooltip'     => '',
    ];

    function default()
    {
        foreach ($this->default as $index => $default)
            $this->global[$index] = $default;
    }

    function required($bool = true)
    {
        $this->global['required'] = $bool;

        return $this;
    }

    function placeholder($text = '')
    {
        $this->global['placeholder'] = $text;

        return $this;
    }

    function tooltip($key, $separator = '', $width = '200px')
    {
        $content = config("tooltip.$key.content");

        $items = implode($separator, config("tooltip.$key.items"));

        $tooltip = preg_replace_array('/{items}/', ['items' => $items], $content);

        $this->global['tooltip'] = view('form::tooltip',[
            'tooltip' => $tooltip, 'width' => $width
        ])->render();

        return $this;
    }

    private function input($view = '', $param = [])
    {
        $html = view("form::$view",[
            'type'                => $param['type'] ?? 'text',
            'label'               => $param['label'] ?? '',
            'id'                  => $param['id'] ?? '',
            'name'                => $param['name'] ?? '',
            'remote'              => $param['remote'] ?? '',
            'value'               => $param['value'] ?? null,
            'labelClass'          => $param['labelClass'] ?? '',
            'inputClass'          => $param['inputClass'] ?? '',
            'selectClass'         => $param['selectClass'] ?? '',
            'inputGroupClass'     => $param['inputGroupClass'] ?? '',
            'inputGroupIcon'      => $param['inputGroupIcon'] ?? '',
            'attr'                => $param['attr'] ?? [],
            'required'            => $param['required'] ?? false,

            'list'                => $param['list'] ?? [],
            'selected'            => $param['selected'] ?? null,
            'selectAttributes'    => $param['selectAttributes'] ?? [],
            'optionsAttributes'   => $param['optionsAttributes'] ?? [],
            'optgroupsAttributes' => $param['optgroupsAttributes'] ?? [],
            'placeholder'         => $param['placeholder'] ?? '',
            'tooltip'             => $param['tooltip'] ?? ''
        ])->render();

        $this->default();

        return $html;
    }

    function text($label = '', $id = '', $name = '', $value = null, $labelClass = '', $inputClass = '', $attr = [])
    {
        return $this->input('input',[
            'label'          => $label,
            'id'             => $id,
            'name'           => $name,
            'value'          => $value,
            'labelClass'     => $labelClass,
            'inputClass'     => $inputClass,
            'attr'           => $attr,
            'required'       => $this->global['required'],
        ]);
    }

    function number($label = '', $id = '', $name = '', $value = null, $labelClass = '', $inputClass = '', $attr = [])
    {
        return $this->input('input',[
            'type'           => 'number',
            'label'          => $label,
            'id'             => $id,
            'name'           => $name,
            'value'          => $value,
            'labelClass'     => $labelClass,
            'inputClass'     => $inputClass,
            'attr'           => $attr,
            'required'       => $this->global['required'],
        ]);
    }

    function inputTextGroup($label = '', $id = '', $name = '', $value = null, $labelClass = '', $inputClass = '', $inputGroupClass = '', $inputGroupIcon = '', $attr = [])
    {
        return $this->input('input-group',[
            'type'            => 'text',
            'label'           => $label,
            'id'              => $id,
            'name'            => $name,
            'value'           => $value,
            'labelClass'      => $labelClass,
            'inputClass'      => $inputClass,
            'inputGroupClass' => $inputGroupClass,
            'inputGroupIcon'  => $inputGroupIcon,
            'attr'            => $attr,
            'required'        => $this->global['required'],
        ]);
    }

    function inputNumberGroup($label = '', $id = '', $name = '', $value = null, $labelClass = '', $inputClass = '' ,$inputGroupClass = '' , $inputGroupIcon = '', $attr = [])
    {
        return $this->input('input-group',[
            'type'            => 'number',
            'label'           => $label,
            'id'              => $id,
            'name'            => $name,
            'value'           => $value,
            'labelClass'      => $labelClass,
            'inputClass'      => $inputClass,
            'inputGroupClass' => $inputGroupClass,
            'inputGroupIcon'  => $inputGroupIcon,
            'attr'            => $attr,
            'required'        => $this->global['required'],
        ]);
    }

    function inputUrlGroup($label = '', $id = '', $name = '', $value = null, $labelClass = '', $inputClass = '' ,$inputGroupClass = '' , $inputGroupIcon = '', $attr = [])
    {
        return $this->input('input-group',[
            'type'            => 'url',
            'label'           => $label,
            'id'              => $id,
            'name'            => $name,
            'value'           => $value,
            'labelClass'      => $labelClass,
            'inputClass'      => $inputClass,
            'inputGroupClass' => $inputGroupClass,
            'inputGroupIcon'  => $inputGroupIcon,
            'attr'            => $attr,
            'required'        => $this->global['required'],
        ]);
    }

    function select($label = '', $id = '', $name = '', $list = [], $selected = null, $labelClass = '', $selectClass = '', $selectAttributes = [], $optionsAttributes = [], $optgroupsAttributes = [])
    {
        return $this->input('select',[
            'label'               => $label,
            'id'                  => $id,
            'name'                => $name,
            'list'                => $list,
            'selected'            => $selected,
            'selectAttributes'    => $selectAttributes,
            'optionsAttributes'   => $optionsAttributes,
            'optgroupsAttributes' => $optgroupsAttributes,
            'labelClass'          => $labelClass,
            'selectClass'         => $selectClass,
            'placeholder'         => $this->global['placeholder'],
            'required'            => $this->global['required'],
        ]);
    }

    function autocomplete($label = '', $id = '', $name = '',$remote = '', $list = [], $selected = null, $labelClass = '', $selectClass = '', $selectAttributes = [], $optionsAttributes = [], $optgroupsAttributes = [])
    {
        return $this->input('autocomplete',[
            'label'               => $label,
            'id'                  => $id,
            'name'                => $name,
            'remote'              => $remote,
            'list'                => $list,
            'selected'            => $selected,
            'selectAttributes'    => $selectAttributes,
            'optionsAttributes'   => $optionsAttributes,
            'optgroupsAttributes' => $optgroupsAttributes,
            'labelClass'          => $labelClass,
            'selectClass'         => $selectClass,
            'placeholder'         => $this->global['placeholder'],
            'required'            => $this->global['required'],
            'tooltip'             => $this->global['tooltip'],
        ]);
    }

    function editor($label = '',$id = '',$name = '',$value = '',$labelClass = '')
    {
        return $this->input('editor',[
            'label'      => $label,
            'id'         => $id,
            'name'       => $name,
            'value'      => $value,
            'labelClass' => $labelClass,
            'required'   => $this->global['required'],
        ]);
    }
}