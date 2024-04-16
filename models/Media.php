<?php

include './Post.php';

class Media
{
    public static int $numb = 0;
    public int $id;

    public function __construct(
        public string $created_at
    ) {
        $this->id = Post::setId(get_class($this));
    }
}


$trial1 = new Media(date("Y/m/d"));
var_dump($trial1);
$trial2 = new Media(date("Y/m/d"));
var_dump($trial2);


class Video extends Media
{
    public string $type;
    public string $path;

    function __construct($created_at)
    {
        parent::__construct($created_at);
        $this->type = get_class($this);
        $this->path = self::setPath(get_class($this));
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

$trial1 = new Video(date("Y/m/d"));
var_dump($trial1);


class Photo extends Media
{
    public string $type;
    public string $path;

    function __construct($created_at)
    {
        parent::__construct($created_at);
        $this->type = get_class($this);
        $this->path = Video::setPath(get_class($this));
    }
}

$trial2 = new Photo(date("Y/m/d"));
var_dump($trial2);
