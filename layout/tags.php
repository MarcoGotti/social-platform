<?php

foreach ($tags as $tag) {

    if (!in_array($tag, $arr)) {
        array_push($arr, $tag);

        array_push($tagsList, new Cathegory($tag));
    }

    echo '<div class="badge p-1 mb-1" style="background:' . getColor($tagsList, $tag) . ';">' . $tag . '</div><br>';
};
