<?php

/* ricerca con tags WHERE tags LIKE "%estate%" */
/* Connect to the database via PHP */

require_once __DIR__ . '/database/conn_mysql.php';
require_once __DIR__ . '/database/db_mysql.php';
include __DIR__ . '/models/Cathegory.php';

$tagsList = [];
$arr = [];

require __DIR__ . '/functions/tag_color.php';
require __DIR__ . '/layout/head.php';

?>


<main>
    <div class="container py-5">
        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-3">

            <?php
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) :
                    ['date' => $date, 'title' => $title, 'tot_likes' => $tot_likes] = $row;

                    //transform $row->tags from string  to array; es: string'["natura","sera"]' becomes array[0 =>'natura', 1 =>'sera']
                    $tags = array_values(array_diff(explode('"', $row['tags']), array("[", ", ", "]")));
            ?>

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
                                    require __DIR__ . '/layout/tags.php';
                                    ?>

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