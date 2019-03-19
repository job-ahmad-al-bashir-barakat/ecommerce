<?php


if (!function_exists('joinTooltip')) {

    function tooltip($key, $separator = '',$width = '200px')
    {
        $content = config("tooltip.$key.content");

        $items = implode($separator, config("tooltip.$key.items"));

        $tooltip = preg_replace_array('/{items}/', ['items' => $items], $content);

        $tooltip = "<div class='d-inline-block' data-toggle='tooltip'><div style='max-width: $width;'>{$tooltip}</div></div>";

        return $tooltip;
    }
}