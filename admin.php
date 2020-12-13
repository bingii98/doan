<?php
if (!isset($_SESSION))
    session_start();
if ($_SESSION['isLogin']['role'] == 'admin' || $_SESSION['isLogin']['role'] == 'teacher') {

} else {
    header('Location: login.php');
} ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
                <li class="active"><a class="link" href="admin.php">Manager Class</a></li>
                <?php if ($_SESSION['isLogin']['role'] == 'admin'): ?>
                    <li><a class="link" href="manager-user.php">Manager User</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <section class="section-class">
            <div class="container">
                <div class="form-class">
                    <div class="form-group">
                        <input type="text" id="name" name="name" placeholder="Name">
                        <input type="hidden" id="class_id">
                        <p class="note">Name with at most 3 words</p>
                    </div>
                    <div class="form-group">
                        <input type="file" id="image" name="name" placeholder="Image">
                    </div>
                    <div class="form-group">
                        <input type="text" id="subject" name="subject" placeholder="Subject">
                        <p class="note">Name with at most 3 words</p>
                    </div>
                    <div class="form-group">
                        <input type="text" id="room" name="room" placeholder="Class room">
                    </div>
                    <p class="error" id="message"></p>
                    <button class="btn btn-primary" id="btn-add-class">Create new class</button>
                    <button class="btn btn-primary" id="btn-edit-class">Edit class</button>
                    <button class="btn btn-secondary" id="btn-cancel-edit-class">Cancel</button>
                </div>
                <div class="table-class">
                    <form action="">
                        <table>
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Subject</th>
                                <th>Room</th>
                                <?php if ($_SESSION['isLogin']['role'] == 'admin'): ?>
                                    <th>Author</th>
                                <?php endif; ?>
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
    loadClass()
</script>
</body>
</html>