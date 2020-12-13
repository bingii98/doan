<?php
include 'model/Class_.php';
$class = new Class_();
if ($class->edit($_POST['id'], $_POST['name'], $_POST['room'], $_POST['subject'])) {
    echo true;
} else {
    echo false;
}


