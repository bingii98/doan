<?php
include 'model/Comment.php';
$comment = new Comment();

$image_name = '';
$document_name = '';

if (!empty($_FILES['file_image'])) {
    $image_name = $_FILES['file_image']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file_image']['name']);
}

if (!empty($_FILES['file_document'])) {
    $document_name = $_FILES['file_document']['name'];
    move_uploaded_file($_FILES['file_document']['tmp_name'], 'uploads/' . $_FILES['file_document']['name']);
}

if ($comment->insert($_POST['id'], $_POST['parent'], $_POST['content'], $image_name, $document_name)) {
    echo true;
} else {
    echo false;
}