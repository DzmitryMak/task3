<?php
session_start();
require_once 'connect.php';

?>

<!doctype html>
<html lang="en">
<head>
    <script>
        function check()
        {
            var check=document.getElementsByTagName('input');
            for(var i=0;i<check.length;i++)
            {
                if(check[i].type=='checkbox')
                {
                    check[i].checked=true;
                }
            }
        }

        function uncheck()
        {
            var uncheck=document.getElementsByTagName('input');
            for(var i=0;i<uncheck.length;i++)
            {
                if(uncheck[i].type=='checkbox')
                {
                    uncheck[i].checked=false;
                }
            }
        }
    </script>
    <meta charset="UTF-8">
    <title>Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
if($_SESSION['user']):
?>
<div class="container mt-4">
    <p>Вы вошли как <?=$_SESSION['user']['name']?>. <a href="/logout.php">Выйти</a></p>
    <br>

    <table>
        <tr><form action="action.php" method="POST">
                <th>
                    <input type="button" value="Check All" onclick="check();"><br>
                    <input type="button" value="Uncheck All" onclick="uncheck();">
                </th>
                <th>ID</th>
                <th>name</th>
                <th>mail</th>
                <th>date registr</th>
                <th>date last login</th>
                <th>status</th>

        </tr>
        <?php
            $users = mysqli_query($db, "SELECT * FROM `users`");
            $users = mysqli_fetch_all($users);
            foreach ($users as $users){
                ?>
        <tr>
            <td><input type="checkbox" name="users[]" value=<?=$users[0] ?>></td>
            <td><?=$users[0] ?></td>
            <td><?=$users[3] ?></td>
            <td><?=$users[4] ?></td>
            <td><?=$users[5] ?></td>
            <td><?=$users[6] ?></td>
            <td><?=$users[7] ?></td>
        </tr>
        <?php
            }
        ?>
        <button type="submit" name="block" class="btn btn-dark">BLOCK</button>
        <button type="submit" name="unblock" class="btn btn-info">UNBLOCK</button>
        <button type="submit" name="delete" class="btn btn-danger">DELETE</button>
        </form>
    </table>
    </div>
<?php else:
    header('Location: /');
endif;
?>


</body>
</html>
