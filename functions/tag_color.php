<?php


function getColor($array, $tag)
{
    foreach ($array as $object) {

        if ($object->name === $tag) {
            return $object->color;
        }
    }
}
