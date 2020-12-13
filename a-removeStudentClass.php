<?php
include 'model/Class_.php';
$class = new Class_();
if ($class->leaveStudent($_POST['idUser'], $_POST['idClass'])) {
    echo true;
} else {
    echo false;
}


