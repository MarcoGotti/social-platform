<?php

require __DIR__ . '/../layout/head.php';

class Post
{
    public static int $numb = 0;
    public int $id;
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
        public string $media_path
    ) {
        $this->id = self::setId(get_class($this));
    }

    public static function setId($class)
    {
        $class::$numb++;
        return $class::$numb;
    }
}

$trial1 = new Post(2, 'title', date("Y/m/d"), 'ghjkl');
var_dump($trial1);
$trial2 = new Post(2, 'title', date("Y/m/d"), 'ghjkl');
var_dump($trial2);
$trial3 = new Post(2, 'title', date("Y/m/d"), 'ghjkl');
var_dump($trial3);
$trial4 = new Post(2, 'title', date("Y/m/d"), 'ghjkl');
var_dump($trial4);
