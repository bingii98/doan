<?php
if (!isset($_SESSION))
    session_start();
if (!isset($_SESSION['isLogin'])) {
    header('Location: login.php');
}

include 'model/Class_.php';
include 'model/User.php';
$class = new Class_();
$user = new User();

$arr = $class->getByStudent($_SESSION['isLogin']['id']);
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
            <li><a href="history.php">History</a></li>
        </ul>
        <div class="user-info">
            <?= $_SESSION['isLogin']['fullname'] ?>
            <a href="logout.php" class="logout">Logout</a>
        </div>
    </nav>
</header>
<main>
    <section class="section-class">
        <div class="table-class">
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Subject</th>
                    <th>Room</th>
                    <th>Teacher</th>
                    <th>Status</th>
                    <th>View</th>
                </tr>
                </thead>
                <tbody>
                <?php if (!empty($arr)) : ?>
                    <?php foreach ($arr as $i) : ?>
                        <?php $item = $class->get($i['idClass']) ?>
                        <tr>
                            <td><?= $item['id'] ?></td>
                            <td><?= $item['name'] ?></td>
                            <td><img src="uploads/<?= $item['image'] ?>" alt="<?= $item['name'] ?>" width="100px"></td>
                            <td><?= $item['subject'] ?></td>
                            <td><?= $item['room'] ?></td>
                            <td><?= $user->getUserById($item['author'])['fullname'] ?></td>
                            <td><?= count($class->getListStudent($item['id'])) ?> student</td>
                            <td><button class="btn btn-secondary btn-sm" id="btn-view-class-history" data-id="<?= $i['idClass'] ?>">View</button></td>
                        </tr>
                    <?php endforeach;
                endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="assets/main.js"></script>
</body>
</html>

