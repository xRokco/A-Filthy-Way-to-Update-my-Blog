<?php
    header('Content-Type: application/json');

    mkdir("../gatsby/pages/" . date("Y-m-d") . "-newdir", 0755);
    $file = fopen("../gatsby/pages/newdir/test.txt","w");
?>
