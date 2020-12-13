<?php
if(!isset($_SESSION))
    session_start();

if(isset($_SESSION['isLogin'])){
    if($_SESSION['isLogin']['role'] == 'admin' || $_SESSION['isLogin']['role'] == 'teacher'){
        header('Location: admin.php');
    }else{
        header('Location: index.php');
    }
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
<div class="loader">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
</div>
<main>
    <section class="section-login">
        <div class="form-login">
            <div class="form-group">
                <input type="text" id="username" autocomplete="off" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" id="password" autocomplete="off" placeholder="Password">
            </div>
            <p class="error" id="message"></p>
            <button class="btn btn-primary" id="btn-login">Login</button>
            <a class="link" href="">Forgot password?</a>
            <a class="link" href="signup.php">Create new account.</a>
        </div>
    </section>
</main>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="assets/main.js"></script>
</body>
</html>