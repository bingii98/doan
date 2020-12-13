<?php
include 'model/User.php';
$user = new User();
echo $user->signUp($_POST['username'], $_POST['password'], $_POST['name'], $_POST['email'], $_POST['tel'], $_POST['dateofbirth']);