<?php
if (isset($_SESSION['user_id']) == false) {
    /**
     * @desc if user don't have permission. Will redirect to login page
     */
    header('Location: http://localhost/website/dang-nhap.php');
} else {
    if (!$_SESSION['isLogin']) {
        echo "Access denied<br>";
        echo "<a href='login.php'> Back to Home</a>";
        exit();
    }
}