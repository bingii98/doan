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
    <section class="section-login">
        <div class="form-signup">
            <div class="form-group">
                <input type="text" id="name" name="fullname" placeholder="Full Name">
                <p class="note">Full mame with at most 3 words</p>
            </div>
            <div class="form-group">
                <input type="date" id="dateofbirth" name="dateofbirth" placeholder="Date Of Birth">
            </div>
            <div class="form-group">
                <input type="tel" id="tel" name="tel" placeholder="Phone Number">
            </div>
            <div class="form-group">
                <input type="email" id="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="text" id="username" name="username" placeholder="Username">
                <p class="note">Username is an alphanumeric string that may include _ and – having a length of 8 to 16 characters.</p>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Password">
                <p class="note">Minimum eight characters, at least one letter and one number</p>
            </div>
            <div class="form-group">
                <input type="password" id="re-password" name="repassword" placeholder="Confirm password">
            </div>
            <p class="error" id="message"></p>
            <button class="btn btn-primary" id="btn-signup">Sign Up</button>
            <a class="link" href="">Forgot password?</a>
            <a class="link" href="login.php">Have account, login.</a>
        </div>
    </section>
</main>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="assets/main.js"></script>
</body>
</html>