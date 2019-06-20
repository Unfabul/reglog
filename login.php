<?php
SESSION_START();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container login">

        <form action="login.php" method="GET" id="login-form">
            <div class="form-group">
                <label for="exampleInputEmailLogin1">Email или Login</label>
                <input name="loginemail" type="text" class="form-control" id="exampleInputEmailLogin1" placeholder="Введите Email или Login">
            </div>
            <div class="form-group">
                <label for="exampleInputPassLogin1">Пароль</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassLogin1" placeholder="Введите пароль">
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
            <div>Нет аккаунта? <a href="reg.php">Зарегистрироваться</a></div>
        </form>

        <div class="success-state"></div>

    </div>

    <script src="js/login.js"></script>
</body>
</html>