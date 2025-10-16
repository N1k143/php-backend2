<?php
$dt = time();
$page = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
$ref = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
$path = $dt . '|' . $page . '|' . $ref . "\n";

file_put_contents(PATH_LOG, $path, FILE_APPEND);
?>