<?php

require __DIR__ . '/conn_mysql.php';

$sql = ('SELECT DATE(`date`) AS `date`, posts.`id`, `title`, posts.`created_at`, users.username AS `by`, `tags`, t.`tot_likes`
FROM posts
LEFT JOIN (SELECT post_id, COUNT(*) AS `tot_likes` 
          FROM `likes`
          GROUP BY post_id)t ON t.post_id = posts.id
JOIN `users` ON users.id=posts.user_id;');

$result = $connection->query($sql);

//var_dump($result);
//var_dump($result->fetch_assoc());

/* $first_post = new Post('marco gotti', 'title', date("Y/m/d"));
$first_post->addMedia('Video');
$first_post->addMedia('Photo');

$second_post = new Post(2, 'title', date("Y/m/d"));
$second_post->addMedia('Video');
$second_post->addMedia('Photo'); */


//var_dump($first_post);
//var_dump($first_post->getMedias(), $second_post->getMedias());

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ['date' => $date, 'title' => $title, 'created_at' => $created_at, 'by' => $author, 'tot_likes' => $tot_likes] = $row;
        $tags = array_values(array_diff(explode('"', $row['tags']), array("[", ", ", "]")));
        //var_dump($date, $author, $tags);

        $post = new Post($author, $title, $created_at, $tot_likes, $tags);
        $post->addMedia('Video');
        $post->addMedia('Photo');
        var_dump($post);
    }
}
