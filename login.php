<?php
    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $date_log = date('Y-m-d H:i:s');

    $pass = md5($pass."etosol");

    $result = mysqli_query($db, "SELECT * FROM `users` WHERE `login`= '$login' AND `pass` = '$pass'");

    $user = $result->fetch_assoc();
    if(count($user) == 0){
        echo "Неверные данные";
        exit();
    }
    if($user['status'] != "active"){
        echo "Пользователь заблокирован";
        exit();
        header('Location: /');
    }
    mysqli_query($db, "UPDATE `users` SET `date_log` = '$date_log' WHERE `users` . `login` = '$login'  AND `pass` = '$pass'");
    $_SESSION['user']=[
        "id"=> $user['id'],
        "login"=>$user['login'],
        "name"=>$user['name'],
    ];


    header('Location: /');
?>