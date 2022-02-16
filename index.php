<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Форма регистрации</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
if($_SESSION['user']):
?>
<div class="container mt-4">
<p>Вы вошли как <?=$_SESSION['user']['name']?>. <a href="/logout.php">Выйти</a></p>

<button class="btn btn-info">
    <a href="/table.php">Таблица пользователей</a>
</button>
</div>


<?php
else:
?>
    <div class="container mt-4">
        <h1>Войдите или зарегистрируйтесь</h1>

            <a href="/authorization.html">Войти</a>
        <br><br>
            <a href="/register.html">Зарегистрироваться</a>
        <br><br>

<?php
endif;
?>
    </div>
</body>
</html>