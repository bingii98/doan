<?php
if (!isset($_SESSION))
    session_start();
if (!isset($_SESSION['isLogin'])) {
    header('Location: login.php');
}
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
    <section class="section-intro">
        <?php if (!isset($_SESSION['class_join'])): ?>
            <div class="data">
                <h1>Now it's free for everyone.</h1>
                <p>We redesigned Google Meet - a highly secure business meeting hosting service - to make it free for everyone.</p>
                <div class="button-box">
                    <div class="join-box">
                        <input type="text" id="id-join-class"/>
                        <button class="btn btn-secondary" id="btn-join-class">Join</button>
                    </div>
                </div>
            </div>
            <div class="image">
                <img src="assets/img/google_meet_marketing_ongoing_meeting_grid_427cbb32d746b1d0133b898b50115e96.jpg" alt="">
            </div>
        <?php endif; ?>
    </section>
</main>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="assets/main.js"></script>
<?php if (isset($_SESSION['class_join'])): ?>
    <script>
        $.ajax({
            url: 'a-joinClass.php',
            type: 'post',
            data: {
                'id': <?= $_SESSION['class_join']['id'] ?>
            },
            beforeSend: function () {
                $('.loading-box').addClass('loading')
            },
            success: function (response) {
                if (response) {
                    setTimeout(function () {
                        $('.loading-box').removeClass('loading')
                        $('.section-intro').html(response)
                        $('.section-intro').addClass('loaded')
                    }, 500)
                } else {
                    setTimeout(function () {
                        $('.loading-box').removeClass('loading')
                        alert("Id invalid, please fill another class's id!")
                    }, 500)
                }
            }
        });
    </script>
<?php endif; ?>
</body>
</html>

