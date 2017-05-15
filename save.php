<?php
    header('Content-Type: application/json');

    $markdown = $_POST['markdown'];
    preg_match_all("/path: \"\/(.*)\/\"/", $markdown, $output_array);
    $dir = date("Y-m-d") . "-" . $output_array[1][0];
    mkdir("../gatsby/pages/" . $dir, 0755);
    $file = fopen("../gatsby/pages/" . $dir . "/index.md","w");

    fwrite($file, $markdown);
    fclose($file);

    $arr = file("../gatsby/pages/" . $dir . "/index.md");
    $arr[0] = trim($arr[0]) . "\n";
    $arr[1] = trim($arr[1]) . "\n";
    $arr[2] = trim($arr[2]) . "\n";
    $arr[3] = trim($arr[3]) . "\n";
    $arr[4] = trim($arr[4]) . "\n";
    $arr[5] = trim($arr[5]) . "\n";
 
    file_put_contents("../gatsby/pages/" . $dir . "/index.md", implode($arr));

    shell_exec('(cd ../gatsby/; gatsby build)');
?>
