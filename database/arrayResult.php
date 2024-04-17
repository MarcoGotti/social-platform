<?php

include __DIR__ . '/db_oop.php';



$posts = [];

if ($result && $result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        ['title' => $title, 'date' => $date, 'by' => $author, 'tot_likes' => $tot_likes] = $row;
        $tags = array_values(array_diff(explode('"', $row['tags']), array("[", ", ", "]")));


        $post = new Post($author, $title, $date, $tags);
        $post->setLikes($tot_likes);
        $post->addMedia('Video');
        $post->addMedia('Photo');

        array_push($posts, $post);
    }
}
