<?php
include 'model/User.php';
$user = new User();
if ($user->changeRole($_POST['id'],$_POST['role'])) {
    echo true;
} else {
    echo false;
}


