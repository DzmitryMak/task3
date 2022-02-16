<?php
$db = mysqli_connect('127.0.0.1:3308','mysql','','register_db');

if (!$db){
    die('не удалось подключиться с базе данных');
}
?>