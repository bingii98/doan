<?php
if (!isset($_SESSION))
    session_start();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="loading-box">
    <div class="loader">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>
</div>
<header>
    <nav class="navbar">
        <ul class="main-menu">
            <li><a href="index.php">Home</a></li>
            <?php if ($_SESSION['isLogin']['role'] == 'admin' || $_SESSION['isLogin']['role'] == 'teacher'): ?>
                <li><a href="admin.php">Admin Dashboard</a></li>
            <?php else: ?>
                <li><a href="history.php">History</a></li>
            <?php endif; ?>
        </ul>
        <div class="user-info">
            <?= $_SESSION['isLogin']['fullname'] ?>
            <a href="logout.php" class="logout">Logout</a>
        </div>
    </nav>
</header>
<main>
    <div style="width: 100%; display: flex; justify-content: center">
        <iframe src="uploads/<?= $_GET['s'] ?>" frameborder="0" width="700px" height="1000px" style="margin: 100px auto;"></iframe>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="assets/main.js"></script>
</body>
</html>