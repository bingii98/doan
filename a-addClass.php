<?php
include 'model/Class_.php';
if (!isset($_SESSION))
    session_start();
$class = new Class_();
if ($class->insert($_POST['name'], $_FILES['file']['name'], $_POST['room'], $_POST['subject'], $_SESSION['isLogin']['id'])) {
    echo true;
    if (0 < $_FILES['file']['error']) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    } else {
        move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']);
    }
} else {
    echo false;
}


