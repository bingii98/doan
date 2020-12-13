<?php
include 'model/User.php';
$user = new User();
if ($user->delete($_POST['id'])) {
    echo true;
} else {
    echo false;
}


