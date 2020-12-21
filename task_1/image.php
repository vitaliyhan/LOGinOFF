<?php

include 'lib/storageInterface.php';
include 'lib/count.php';
include 'lib/file.php';
include 'lib/image.php';

$file = new File('count/count.txt');
$count = new Count($file);
$count->add();

Image::show('1.jpg');





