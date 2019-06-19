<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reg</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container reg">
        <?php
            require_once("admin/config.php");
            if(!isset($_GET['send'])){
        ?>
        <form action="reg.php" method="GET">
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" type="text" class="form-control" id="exampleInputEmail1" placeholder="Введите email">
            </div>
            <div class="form-group">
                <label for="exampleInputLogin1">Логин</label>
                <input name="login" type="text" class="form-control" id="exampleInputLogin1" placeholder="Введите логин">
            </div>
            <div class="form-group">
                <label for="exampleInputRealName1">Имя</label>
                <input name="realname" type="text" class="form-control" id="exampleInputRealName1" placeholder="Введите настоящее имя">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Пароль</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль">
            </div>
            <div class="form-group">
                <label for="exampleInputDateOfBirth1">Дата рождения</label>
                <input name="birthdate" type="text" class="form-control" id="exampleInputDateOfBirth1" placeholder="День-месяц-год">
            </div>
            <div class="form-group">
                <label for="inputState">Страна</label>
                <select name="country" id="inputState" class="form-control">
                    <option selected>Выберите страну</option>
                    <?php
                        $country = "SELECT * from country";
                        $resultCountry = mysqli_query($db, $country) or die ("Error #4");
                        while($row = mysqli_fetch_assoc($resultCountry)){
                            $result_data[] = $row;
                        }
                        foreach($result_data as $data){
                            echo "<option>".$data['country']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group form-check">
                <input name="agree" type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Даю согласие на обработку данных</label>
            </div>
            <button name="send" type="submit" class="btn btn-primary">Войти</button>
        </form>
        <?php
            }

            else if(isset($_GET['send'])&&!empty($_GET['login'])&&!empty($_GET['email'])&&!empty($_GET['password'])&&!empty($_GET['agree'])){
                $queryLog = "SELECT id from users WHERE login ='".$_GET['login']."' or email ='".$_GET['email']."'";
                $resultLog = mysqli_query($db, $queryLog) or die ("Error #1");

                if(mysqli_num_rows($resultLog)>0){
                    echo "Этот логин или email заняты! <a href='reg.php'>Попробовать еще раз!</a>";
                }else{
                    $query = "INSERT INTO users (id, email, login, realname, password, birthdate, country, agree) VALUE (NULL, '{$_GET['email']}', '{$_GET['login']}', '{$_GET['realname']}', '{$_GET['password']}', '{$_GET['birthdate']}', '{$_GET['country']}', '{$_GET['agree']}')";

                    $result = mysqli_query($db, $query) or die ("Error #2");

                    if( $result ){
                        echo "Ваш логин - ".$_GET['login'].".<br> Ваш email - ".$_GET['email'].".<br> Ваше настоящее имя - ".$_GET['realname'].".<br> Дата рождения - ".$_GET['birthdate'].".<br> Страна проживания - ".$_GET['country'].".<br> <a href='login.php'>Выйти из аккаунта</a>";
                    }
                }
            }else{
                echo "Регистрация невозможна либо Вы не дали согласие на обработку данных! <a href='reg.php'>Попробовать еще раз</a>";
            }
            mysqli_close($db);
        ?>
    </div>
</body>
</html>