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
        <?php
            require_once("admin/config.php");
            if(!isset($_GET['send'])){
        ?>
        <form action="login.php" method="GET">
            <div class="form-group">
                <label for="exampleInputEmailLogin1">Email или Login</label>
                <input name="loginemail" type="text" class="form-control" id="exampleInputEmailLogin1" placeholder="Введите Email или Login">
            </div>
            <div class="form-group">
                <label for="exampleInputPassLogin1">Пароль</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassLogin1" placeholder="Введите пароль">
            </div>
            <button name="send" type="submit" class="btn btn-primary">Войти</button>
        </form>
        <div>Нет аккаунта? <a href="reg.php">Зарегистрироваться</a></div>
        <?php
            }
            else if(isset($_GET['send'])&&!empty($_GET['loginemail'])&&!empty($_GET['password'])){
                $query = "SELECT * from users WHERE (login ='".$_GET['loginemail']."' or email ='".$_GET['loginemail']."') and password ='".$_GET['password']."'";
                $result = mysqli_query($db, $query) or die ("Error #3");
                if(mysqli_num_rows($result)==1){
                    $next = mysqli_fetch_array($result);
                    $_SESSION['user_id']=$next['id'];
                    $_SESSION['user_login']=$next['login'];
                    $_SESSION['user_email']=$next['email'];
                    $_SESSION['user_realname']=$next['realname'];
                    $_SESSION['user_birthdate']=$next['birthdate'];
                    $_SESSION['user_country']=$next['country'];

                    echo "Ваш логин - ".$next['login'].".<br> Ваш email - ".$next['email'].".<br> Ваше настоящее имя - ".$next['realname'].".<br> Дата рождения - ".$next['birthdate'].".<br> Страна проживания - ".$next['country'].".<br> <a href='login.php'>Выйти из аккаунта</a>";
                }else{
                    echo "Неверный логин или пароль! <a href='login.php'>Попробовать еще раз</a>";
                }
            }
            mysqli_close($db);
        ?>
    </div>
</body>
</html>