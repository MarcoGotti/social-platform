<?php

include __DIR__ . '/Media.php';


class Post
{
    public static int $numb = 0;
    public int $id;
    public array $medias;
    protected $likes;

    public function __construct(
        public string $username,
        public string $title,
        public string $date,
        public array $tags
    ) {
        $this->id = self::setId(get_class($this));
    }

    public function setLikes($likes)
    {
        if (is_null($likes)) {
            $this->likes = 0;
        } else {
            $this->likes = (int)$likes;
        }
    }

    public function addMedia($type)
    {
        if ($type === 'Video' || $type === 'Photo') {
            $this->medias[] = new $type();
        } else {
            echo "Error: only addMedia('Video') or addMedia('Photo')" . '<br>';
        }
    }

    public function getMedias()
    {
        return $this->medias;
    }

    public static function setId($class)
    {
        $class::$numb++;
        return $class::$numb;
    }
}
