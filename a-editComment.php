<?php
include 'model/Comment.php';
$comment = new Comment();
if ($comment->edit($_POST['id'], $_POST['content'])) {
    echo true;
} else {
    echo false;
}


