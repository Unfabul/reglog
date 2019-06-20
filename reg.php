<?php
require_once("admin/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reg</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/jquery-ui.min.css">
</head>
<body>
    <div class="container reg">
    
        <form action="reg.php" method="GET" id="reg-form">
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
                <label for="datepicker">Дата рождения</label>
                <input name="birthdate" type="text" class="form-control" id="datepicker" placeholder="мм-дд-гг" readonly>
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
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>

        <div class="success-state"></div>

    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/reg.js"></script>

<script>
    $("#datepicker").datepicker();
</script>

</body>
</html>