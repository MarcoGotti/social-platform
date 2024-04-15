<?php

class Cathegory
{
    public $name;
    public $color;

    public function __construct($tag)
    {
        $this->name = $tag;
        $this->color = self::generateRdmColor();
    }

    public static function generateRdmColor()
    {
        $hexUnits = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f'];
        $randomColor = '#';

        for ($i = 0; $i < 6; $i++) {

            $element = $hexUnits[floor(rand(0, (sizeof($hexUnits) - 1)))];
            $randomColor .= $element;
        }
        return $randomColor;
    }
}

/* class RandomColor
{

    public static function generateRdmColor()
    {
        $hexUnits = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f'];
        $randomColor = '#';

        for ($i = 0; $i < 6; $i++) {

            $element = $hexUnits[floor(rand(0, (sizeof($hexUnits) - 1)))];
            $randomColor .= $element;
        }
        return $randomColor;
    }
} */
