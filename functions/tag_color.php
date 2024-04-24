<?php


function getColor($array, $tag)
{
    foreach ($array as $object) {

        if ($object->name === $tag) {
            return $object->color;
        }
    }
    return ''; //se arriva qui è perchè non ha trovato niente 
}
