<?php
include 'model/Comment.php';
$comment = new Comment();
if ($comment->delete($_POST['id'])) {
    echo true;
} else {
    echo false;
}


