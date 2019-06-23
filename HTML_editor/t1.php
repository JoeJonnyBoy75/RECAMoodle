<?php

include('functions.php');

echo realpath('.');
echo '<br>';
echo is_contained_by('.', 'packages/u1s4/content/img/');
echo '<br>';
echo is_contained_by('.', '../../../../etc/passwd');
echo '<br>';
echo 'packages/u1s4/content/img/IMG_8371.jpg';
echo '<br>';
echo dirname('packages/u1s4/content/img/IMG_8371.jpg');
echo '<br>';
echo is_contained_by('.', 'packages/u1s4/content/img/IMG_8371.jpg');
echo '<br>';
echo is_contained_by('.', dirname('packages/u1s4/content/img/IMG_8371.jpg'));
echo 'done';
