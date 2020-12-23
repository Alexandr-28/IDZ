<?php 
    session_start();
    require_once 'inc/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="stl.css">
    <title>Document</title>
    <style>
        form{
            margin-left:14px;
            margin-top:7px;
        }
    </style>
   
</head>
<body>
    <div id="nav">
        <div class="inner label" style="width:400px;"><span>Ваше сообщение<span></div>
        <div class="inner">
            <div class="dropdown" style="float:right; width: 200px;">
                <button class="dropbtn" style="width:200px;" onclick="window.location.href=('index.php');"><?php echo $_SESSION['login'];?></button>
                <div class="dropdown-content" style="width:200px;">
                <a href="display.php">Посты</a>
                <a href="inc/logout.php">Выход</a>
                </div>
            </div>
        </div>
    </div>
    <form action="inc/addpost.php" method="POST">
        <textarea name="messs" cols="50" rows="12" style="resize:none;"></textarea><br>
        <input type="submit" value="Написать">
    </form>
</body>
</html>