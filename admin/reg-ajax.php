<?php
    if(!empty($_GET)&&!empty($_GET['login'])&&!empty($_GET['email'])&&!empty($_GET['password'])&&!empty($_GET['agree'])){
        require_once("config.php");
        $queryLog = "SELECT id from users WHERE login ='".$_GET['login']."' or email ='".$_GET['email']."'";
        $resultLog = mysqli_query($db, $queryLog) or die ("Error #1");

        if(mysqli_num_rows($resultLog)>0){
            echo "Этот логин или email заняты! <a href='reg.php'>Попробовать еще раз!</a>";
        }else{
            $email = mysqli_real_escape_string($db, $_GET['email']);
            $login = mysqli_real_escape_string($db, $_GET['login']);
            $realname = mysqli_real_escape_string($db, $_GET['realname']);
            $pass = mysqli_real_escape_string($db, $_GET['password']);

            $query = "INSERT INTO users (id, email, login, realname, password, birthdate, country, agree) VALUE (NULL, '{$email}', '{$login}', '{$realname}', '{$pass}', '{$_GET['birthdate']}', '{$_GET['country']}', '{$_GET['agree']}')";

            $result = mysqli_query($db, $query) or die ("Error #2");

            if( $result ){
                echo "Ваш логин - ".$login.".<br> Ваш email - ".$email.".<br> Ваше настоящее имя - ".$realname.".<br> Дата рождения - ".$_GET['birthdate'].".<br> Страна проживания - ".$_GET['country'].".<br> <a href='login.php'>Выйти из аккаунта</a>";
            }
        }
    }else{
        echo "Регистрация невозможна либо Вы не дали согласие на обработку данных! <a href='reg.php'>Попробовать еще раз</a>";
    }
    mysqli_close($db);
?>