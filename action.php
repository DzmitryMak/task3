<?php
session_start();
require_once 'connect.php';

if(isset($_POST['delete'])) {
    $checked = $_POST['users'];
    foreach ($checked as $id)
    {

        mysqli_query($db, "DELETE FROM `users` WHERE `users` . `id` = '$id'");
        if($_SESSION['user']['id'] == $id){
            unset($_SESSION['user']);
        }
    }
    header('Location: /table.php');
}
elseif(isset($_POST['block'])){
    $blocked = $_POST['users'];
    $status = 'block';
    foreach ($blocked as $id) {
        mysqli_query($db, "UPDATE `users` SET `status` = '$status' WHERE `users` . `id` = '$id' ");

        if ($_SESSION['user']['id'] == $id) {
            unset($_SESSION['user']);
        }
    }
    header('Location: /table.php');
}
elseif(isset($_POST['unblock'])){
    $blocked = $_POST['users'];
    $status = 'active';
    foreach ($blocked as $id)
    {
        mysqli_query($db, "UPDATE `users` SET `status` = '$status' WHERE `users` . `id` = '$id' ");
    }
    header('Location: /table.php');
}
?>