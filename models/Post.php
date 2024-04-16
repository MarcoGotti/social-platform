<?php

require __DIR__ . '/../layout/head.php';
include __DIR__ . '/Media.php';
include __DIR__ . '/../database/db_oop.php';

class Post
{
    public static int $numb = 0;
    public int $id;
    public array $media;
    /* public $tags;
    public $updated_at; */

    public function __construct(
        public int $user_id,
        public string $title,
        public string $created_at,
        /* array $tags,
        string $updated_at, */
    ) {
        $this->id = self::setId(get_class($this));
    }

    public function addMedia($type)
    {
        if ($type === 'Video' || $type === 'Photo') {
            $this->media[] = new $type();
        } else {
            echo "Error: only addMedia('Video') or addMedia('Photo')" . '<br>';
        }
    }

    public function getMedias()
    {
        return $this->media;
    }

    public static function setId($class)
    {
        $class::$numb++;
        return $class::$numb;
    }
}
