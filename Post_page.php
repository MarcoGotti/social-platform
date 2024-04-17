<?php

require __DIR__ . '/layout/head.php';
include __DIR__ . '/database/db_oop.php';

$posts = [];

if ($result && $result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        ['date' => $date, 'title' => $title, 'created_at' => $created_at, 'by' => $author, 'tot_likes' => $tot_likes] = $row;
        $tags = array_values(array_diff(explode('"', $row['tags']), array("[", ", ", "]")));


        $post = new Post($author, $title, $created_at, $tags);
        $post->setLikes($tot_likes);
        $post->addMedia('Video');
        $post->addMedia('Photo');

        array_push($posts, $post);
    }
}

var_dump($posts[0]->media[1]->path, $posts[0]->media[1]->type);
var_dump($posts);

?>
<!-- <main>
    <div class="container py-5">
        <div class="row row-cols-5 g-3">

            <?php
            if ($result && $result->num_rows > 0) :
                while ($row = $result->fetch_assoc()) :
                    ['date' => $date, 'title' => $title, 'created_at' => $created_at, 'by' => $author, 'tot_likes' => $tot_likes] = $row;
                    $tags = array_values(array_diff(explode('"', $row['tags']), array("[", ", ", "]"))); ?>

                    <div class="col">
                        <h4><?php echo $row['id'] . ' ' . $title ?></h4>
                    </div>

            <?php endwhile;
            endif; ?>


        </div>
    </div>
</main> -->