<?php

require_once __DIR__ . '/conn_mysql.php';
include __DIR__ . '/../models/Cathegory.php';


//Interrogazione del db con una query. $sql è una string. La string è una query. 
$sql =
    'SELECT DATE(`date`) AS `date`, `title`, `tags`, t.`tot_likes` 
    FROM posts
    LEFT JOIN (SELECT post_id, COUNT(*) AS `tot_likes` 
              FROM `likes`
              GROUP BY post_id)t ON t.post_id = posts.id;';

//eseguire la query con il method query(). Salvare l'esecuzione in una var $result
$result = $connection->query($sql);
