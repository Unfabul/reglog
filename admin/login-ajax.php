<?php
    if(!empty($_GET)){
        require_once("config.php");
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
?>