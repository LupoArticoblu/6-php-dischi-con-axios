<?php

$string = file_get_contents('dischi.json');
$disc_list = json_decode($string, true);



header('Content-Type: application/json');

echo json_encode($disc_list);