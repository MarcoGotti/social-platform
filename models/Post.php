<?php

require __DIR__ . '/../layout/head.php';
include __DIR__ . '/Media.php';

class Post
{
    public static int $numb = 0;
    public int $id;
    public Media $media;
    /* public $tags;
    public $updated_at; */

    public function __construct(
        public int $user_id,
        public string $title,
        public string $created_at,
        /* array $tags,
        string $updated_at, */
        $media
    ) {
        $this->id = self::setId(get_class($this));
        $this->media = $media;
    }

    public static function setId($class)
    {
        $class::$numb++;
        return $class::$numb;
    }
}

$trial1 = new Post(2, 'title', date("Y/m/d"), new Video(date("Y/m/d")));
var_dump($trial1);
$trial2 = new Post(2, 'title', date("Y/m/d"), new Photo(date("Y/m/d")));
var_dump($trial2);
$trial3 = new Post(2, 'title', date("Y/m/d"), new Video(date("Y/m/d")));
var_dump($trial3);
$trial4 = new Post(2, 'title', date("Y/m/d"), new Photo(date("Y/m/d")));
var_dump($trial4);
