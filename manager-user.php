<?php
if(!isset($_SESSION))
    session_start();

if ($_SESSION['isLogin']['role'] != 'admin') {
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
<main>
    <div class="admin-section">
        <nav class="sidebar">
            <button class="btn btn-secondary btn-collapse"></button>
            <div class="user-info">
                <div class="avatar">
                    <img src="assets/img/generic-avatar.jpg" alt="Avatar Placeholder">
                </div>
                <p class="name"><?= $_SESSION['isLogin']['fullname'] ?></p>
                <a class="link w" href="logout.php">Logout</a>
            </div>
            <ul class="menu">
                <li class=""><a class="link" href="admin.php">Manager Class</a></li>
                <li class="active"><a class="link" href="manager-user.php">Manager User</a></li>
            </ul>
        </nav>
        <section class="section-class">
            <div class="container">
                <div class="table-user">
                    <form action="">
                        <table>
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full name</th>
                                <th>Role</th>
                                <th>Birthday</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </form>
                </div>
            </div>
        </section>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="assets/main.js"></script>
<script>
    loadUser()
</script>
</body>
</html>