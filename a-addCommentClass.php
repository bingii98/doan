<?php
include 'model/Comment.php';
$comment = new Comment();

echo $comment->insert($_POST['id'], $_POST['parent'], $_POST['content']);