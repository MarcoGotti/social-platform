<?php

$sql = (
    'SELECT DATE(`date`) AS `date`, `title`, `tags`, t.`tot_likes` 
    FROM posts
    LEFT JOIN (SELECT post_id, COUNT(*) AS `tot_likes` 
              FROM `likes`
              GROUP BY post_id)t ON t.post_id = posts.id
    /* WHERE `tot_likes`= 12 */;'
);

$result = $connection->query($sql);
