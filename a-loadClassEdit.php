<?php
include 'model/Class_.php';
$class = new Class_();
$rs = $class->get($_POST['class_id']);
echo json_encode($rs);
?>
