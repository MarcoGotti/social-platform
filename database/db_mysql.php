<?php

require_once __DIR__ . '/conn_mysql.php';
include __DIR__ . '/../models/Cathegory.php';


//stringa di una query. Interrogazione db
$sql =
    'SELECT DATE(`date`) AS `date`, `title`, `tags`, t.`tot_likes` 
    FROM posts
    LEFT JOIN (SELECT post_id, COUNT(*) AS `tot_likes` 
              FROM `likes`
              GROUP BY post_id)t ON t.post_id = posts.id;';

//eseguire la query e messa in var $result
$result = $connection->query($sql);
