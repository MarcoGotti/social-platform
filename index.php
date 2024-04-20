<?php

/* ricerca con tags WHERE tags LIKE "%estate%" */

require_once __DIR__ . '/database/db_mysql.php';

$tagsList = [];
$arr = []; //array di supporto

require __DIR__ . '/functions/tag_color.php';

require __DIR__ . '/layout/head.php';
include __DIR__ . '/Home_page.php';
