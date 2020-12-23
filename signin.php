<?php session_start();
    if(isset($_SESSION['login'])){
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Авторизация</title>
    <style>
        form{
            max-width:750px;
            padding:10px;
            font-size:28px;
        }

        input{
            width:650px;
            height:50px;
            border-radius:5px;
            outline:none;
        }

        input[type="submit"]{
            height:62px;
            background:lime;
            color:white;
            cursor:pointer;
        }

        body{
            display:flex;
            align-items:center;
            justify-content:center;
            height:100vh;
        }

        a{
            text-decoration:none;
            color:blue;
        }
        .err{ 
            border:2px red dotted;
            width:650px;
            height:45px;
            text-align:center;
            color:maroon;
            font-size:24px;
        }
        a:visited{ color:blue; }
    </style>
</head>
<body>
    <div>
        <form action="inc/vhod.php" method="POST">
            <input type="text" name="log" placeholder="Username" required autocomplete="off"><br>
            <input type="password" name="pass" placeholder="Password" required autocomplete="off"><br>
            <input type="submit" value="Войти">
            <p>
                Нет аккаунта?&nbsp;<a href="signup.php">Регистрация</a>
            </p>
            <?php  
                if(isset($_SESSION['mes']))
                {
                    $temp=$_SESSION['mes'];
                    echo "<div class='err'>$temp</div>";
                    unset($_SESSION['mes']);
                }
                ?>
        </form>
    </div>
</body>
</html>