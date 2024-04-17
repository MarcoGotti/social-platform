<?php

require __DIR__ . '/conn_mysql.php';
include __DIR__ . '/../models/Post.php';


$sql = ('SELECT DATE(`date`) AS `date`, posts.`id`, `title`, DATE(posts.`created_at`) AS created_at, users.username AS `by`, `tags`, t.`tot_likes`
FROM posts
LEFT JOIN (SELECT post_id, COUNT(*) AS `tot_likes` 
          FROM `likes`
          GROUP BY post_id)t ON t.post_id = posts.id
JOIN `users` ON users.id=posts.user_id;');



$result = $connection->query($sql);
