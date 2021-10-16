<?php
session_start();
session_destroy();
$path = 'location: ' . '..' . '/index.php';
echo $path;
header($path);