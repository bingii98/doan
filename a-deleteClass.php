<?php
include 'model/Class_.php';
$class = new Class_();
if ($class->delete($_POST['class_id'])) {
    echo true;
} else {
    echo false;
}


