<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Taskmaker</title>
</head>
<body>
<nav class="navbar navbar-light bg-light">
  <div class="container">
    <a class="btn btn-success" href="/">
      Главная
    </a>
    <?php if (!$_SESSION["isAdmin"]): ?>
      <a class="btn btn-outline-success" href="?controller=admin&action=login">
        Войти как Администратор
      </a>
    <?php else: ?>
      <a class="btn btn-outline-danger" href="?controller=admin&action=logout">
        Выйти
      </a>
    <?php endif; ?>
  </div>
</nav>


<?
  switch($_GET['controller'])
  { 
    case "admin" :
        include "controllers/admin/AdminController.php";
        break;
    default : 
        include "controllers/main/MainController.php"; 
        break;
  }
?>
</body>
</html>