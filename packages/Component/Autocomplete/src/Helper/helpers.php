<?php

if(! function_exists('autocompleteEval'))
{
    function autocompleteEval($object ,$id = 'id' ,$name = 'name') {

        if(is_null($object))
        {
            return [];
        }
        else
        {
            return [$object->$id => $object->$name];
        }
    }
}
