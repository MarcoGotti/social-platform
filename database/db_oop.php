<?php

require __DIR__ . '/conn_mysql.php';
include __DIR__ . '/../models/Post.php';

$posts = [];



$sql = ('SELECT DATE(`date`) AS `date`, posts.`id`, `title`, DATE(posts.`created_at`) AS created_at, users.username AS `by`, `tags`, t.`tot_likes`
FROM posts
LEFT JOIN (SELECT post_id, COUNT(*) AS `tot_likes` 
          FROM `likes`
          GROUP BY post_id)t ON t.post_id = posts.id
JOIN `users` ON users.id=posts.user_id;');


$result = $connection->query($sql);



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
