<?php

require __DIR__ . '/../layout/head.php';
include __DIR__ . '/Media.php';

class Post
{
    public static int $numb = 0;
    public int $id;
    public $media;
    /* public $tags;
    public $created_at;
    public $updated_at; */

    public function __construct(
        public int $user_id,
        public string $title,
        public string $date,
        /* array $tags,
        string $created_at,
        string $updated_at, */
        Media $media
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
$trial2 = new Post(2, 'title', date("Y/m/d"), new Video(date("Y/m/d")));
var_dump($trial2);
$trial3 = new Post(2, 'title', date("Y/m/d"), new Video(date("Y/m/d")));
var_dump($trial3);
$trial4 = new Post(2, 'title', date("Y/m/d"), new Video(date("Y/m/d")));
var_dump($trial4);
