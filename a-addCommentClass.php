<?php
include 'model/Comment.php';
$comment = new Comment();

if ($comment->insert($_POST['id'], $_POST['parent'], $_POST['content'])) {
    echo true;
} else {
    echo false;
}