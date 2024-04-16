<?php


$first_post = new Post(2, 'title', date("Y/m/d"));
$first_post->addMedia('Video');
$first_post->addMedia('Photo');

$second_post = new Post(2, 'title', date("Y/m/d"));
$second_post->addMedia('Video');
$second_post->addMedia('Photo');


var_dump($first_post, $second_post);
var_dump($first_post->getMedias(), $second_post->getMedias());
