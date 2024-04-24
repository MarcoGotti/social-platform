<?php

class Media
{
    public static int $numb = 0;
    public int $id;
    public string $type;
    public string $path;

    public function __construct()
    {
        $this->id = Post::setId(get_class($this));
    }

    public static function setPath($mediaType)
    {
        $format = '.jpg';
        if ($mediaType == 'Video') {
            $format = '.mp4';
        }

        $path = 'path/' . self::setCode() . $format;
        return $path;
    }

    public static function setCode()
    {
        $units = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f'];
        $code = '';

        for ($i = 0; $i < 8; $i++) {
            $element = $units[floor(rand(0, (sizeof($units) - 1)))];
            $code .= $element;
        }
        $code .= '-';

        for ($i = 0; $i < 4; $i++) {
            $element = $units[floor(rand(0, (sizeof($units) - 1)))];
            $code .= $element;
        }
        $code .= '-';

        for ($i = 0; $i < 4; $i++) {
            $element = $units[floor(rand(0, (sizeof($units) - 1)))];
            $code .= $element;
        }
        $code .= '-';

        for ($i = 0; $i < 4; $i++) {
            $element = $units[floor(rand(0, (sizeof($units) - 1)))];
            $code .= $element;
        }
        $code .= '-';

        for ($i = 0; $i < 12; $i++) {
            $element = $units[floor(rand(0, (sizeof($units) - 1)))];
            $code .= $element;
        }

        return $code;
    }
}


class Video extends Media
{
    function __construct()
    {
        parent::__construct();
        $this->type = get_class($this); //non ha senso memorizzare in una var perchè riutilizzabile in istanza
        $this->path = Media::setPath(get_class($this));
    }
}


class Photo extends Media
{
    function __construct()
    {
        parent::__construct();
        $this->type = get_class($this);
        $this->path = Media::setPath(get_class($this));
    }
}
