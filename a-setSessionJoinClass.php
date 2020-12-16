<?php
if (!isset($_SESSION))
    session_start();

$_SESSION['class_join']['id'] = $_POST['id'];
