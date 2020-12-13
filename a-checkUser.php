<?php
include 'model/User.php';
$user = new User();
if ($user->checkLogin($_POST['username'], $_POST['password'])) {
    echo true;
} else {
    echo false;
}