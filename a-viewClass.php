<?php
if (!isset($_SESSION))
    session_start();

include 'model/Class_.php';
include 'model/User.php';

$class = new Class_();
$user = new User();

$c = $class->get($_POST['id']);

if (!empty($c)) :
    $_SESSION['class_join']['id'] = $_POST['id'];
    echo 1;
endif;
