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
    <title>Новая тема</title>
</head>
<body>
    <div id="nav">
            <div class="inner label" style="width:400px;"><span>Новая тема</span></div>
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

    <form action="inc/addtheme.php" method="POST" style="margin:7px; font-size:32px;">
        <h2>Создать новую тему:</h2>
        <!--<textarea name="txt" id="txt" cols="135" rows="14" style="resize:none;" required></textarea><br>-->
        <input type="text" required style="width:500px; font-size:32px; heigth:38px;" name="tmname">
        <input type="submit" style="font-size:32px;" value="Создать">
    </form>
</body>
</html>