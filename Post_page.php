<?php

require __DIR__ . '/layout/head.php';
include_once __DIR__ . '/database/arrayResult.php'

//var_dump($posts[0]);
?>



<main>
    <div class="container py-5">
        <div class="row row-cols-5 g-3">

            <?php
            foreach ($posts as $post) : ?>

                <div class="col border border-2 border-black">
                    <h4><?php echo $post->id . ' ' . $post->title ?></h4>
                    <p><?php echo $post->date . '  by  ' . $post->username ?></p>

                    <div><strong>Medias</strong>
                        <?php
                        foreach ($post->medias as $media) : ?>

                            <div><?php echo $media->type . '   ...' . substr($media->path, 38) ?></div>

                        <?php endforeach; ?>
                    </div>

                    <div class="mt-2"><strong>Tags</strong><br>
                        <?php
                        foreach ($post->tags as $tag) : ?>

                            <span><?= $tag ?> </span>

                        <?php endforeach; ?>
                    </div>

                </div>
            <?php endforeach; ?>


        </div>
    </div>
</main>