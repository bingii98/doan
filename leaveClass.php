<?php
if (!isset($_SESSION))
    session_start();
unset($_SESSION['class_join']);
header('Location: index.php');