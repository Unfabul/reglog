<?php

$db = mysqli_connect('localhost', 'root', '', 'reglog') or die ("DataBase Error");
mysqli_set_charset($db, 'utf8');