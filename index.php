<?php

/* Connect to the database via PHP */

define('DB_SERVERNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'social-platform');

$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($connection && $connection->connect_error) {
    echo 'Database Connection Failed';
    die;
}

$sql = (
    'SELECT DATE(`date`) AS `date`, `title`, `tags`, t.`tot_likes` 
    FROM posts
    LEFT JOIN (SELECT post_id, COUNT(*) AS `tot_likes` 
              FROM `likes`
              GROUP BY post_id)t ON t.post_id=posts.id;'
);

$result = $connection->query($sql);
//var_dump(rand(10, 200));

/* $tagsList = [];
if ($result && $result->num_rows > 0) {


    while ($row = $result->fetch_assoc()) {
        //$tags = $row['tags'];
        //$array0 = explode('"', $tags);
        //$array1 = array_diff($array0, array("[", ", ", "]"));
        //$array2 = array_values($array1);
        $tags = array_values(array_diff(explode('"', $row['tags']), array("[", ", ", "]")));
        var_dump($tags);

        foreach ($tags as $tag) {

            if (!in_array($tag, $tagsList)) {
                array_push($tagsList, $tag);
            }
        };
    }
}
var_dump($tagsList); */

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>social-platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/style.css">

</head>

<body>
    <header class="p-3 text-center bg-body-secondary text-danger shadow">
        <h2 class="text-uppercase fw-bold">Social plattform</h2>

    </header>
    <main>
        <div class="container py-5">
            <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-3">

                <?php
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) :
                        ['date' => $date, 'title' => $title, 'tot_likes' => $tot_likes] = $row;

                        $tags = array_values(array_diff(explode('"', $row['tags']), array("[", ", ", "]"))); ?>

                        <div class="col">

                            <div class="card h-100 shadow-lg p-3 bg-dark rounded text-white position-relative">
                                <a class="btn btn-dark yellow position-absolute m-1">
                                    <i class="fa-solid fa-thumbs-up"></i>
                                    <?php echo ' ' . $tot_likes ?>
                                </a>
                                <div class="">
                                    <img src="https://picsum.photos/id/<?php echo rand(9, 85); ?>/200/300?grayscale" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body p-0">
                                    <div class="card-text text-end fs_12"><?= $date; ?></div>
                                    <div class="position-absolute top-0 end-0 px-1 py-4 text-end">

                                        <?php
                                        foreach ($tags as $tag) {
                                            echo '<div class="badge text-bg-danger p-1 mb-1 ">' . $tag . '</div><br>';
                                        } ?>

                                    </div>
                                    <h5 class="card-title"><?= $title; ?></h5>
                                    <a href="#" class="btn btn-sm btn-danger">Read...</a>


                                </div>
                            </div>
                        </div>

                    <?php endwhile; ?>
                <?php } elseif ($result) { ?>
                    <div>CORRECT CONNECTION AND QUERY, BUT NO RESULTS</div>
                <?php } ?>

            </div>
        </div>


    </main>



</body>

</html>