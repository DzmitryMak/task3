<?php
    session_start();
    require_once 'connect.php';

    $login =$_POST['login'];
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $mail = $_POST['mail'];
    $date_reg = date('Y-m-d H:i:s');
    $date_log = date('Y-m-d H:i:s');

    $pass = md5($pass."etosol");

    mysqli_query($db, "INSERT INTO `users` (`login`, `pass`, `name`,`mail`,`date_reg`, `date_log`)
    VALUES('$login','$pass', '$name', '$mail','$date_reg', '$date_log')");

    header('Location: /');
    ?>
