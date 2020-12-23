<?php 
    session_start();
    require_once 'inc/db.php';
    if(isset($_SESSION['login'])==false){
        header('Location: signin.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="stl.css">
    <title>Document</title>

    <style>
        .themes{
        width:900px; 
        height:45px;
        border:1px solid black;
        background :linear-gradient(to bottom,grey,rgb(167, 161, 161),rgb(196, 193, 193), white);*/
        display:flex; 
        align-items:center; 
        margin:0 auto;
    }

    

    .themes button{
        font-size:38px;
        text-decoration:none;
        color:black;
        font-weight:bolder;
        background:transparent;
        outline:none;
        border:none;
    }

    .themes button:hover{
        color:white;
    }
    </style>
</head>
<body>
    <div id="nav">
        <div class="inner label" style="width:400px;"><a id ="cr" href="createmes.php">&nbsp;Новая тема</a></div>
        <div class="inner">
            <div class="dropdown" style="float:right; width: 200px;">
                <button class="dropbtn" style="width:200px;"><?php echo $_SESSION['login'];?></button>
                <div class="dropdown-content" style="width:200px;">
                <a href="display.php">Посты</a>
                <a href="inc/logout.php">Выход</a>
                </div>
            </div>
        </div>
    </div>
    
   <!-- SELECT a.TXT,a.DT,b.IMIA FROM MES AS a INNER JOIN AUTHOR AS b ON a.AUTHID=b.Id-->
    <?php
        /*$expr="SELECT a.TXT,a.DT,b.LOGIN FROM MES AS a INNER JOIN AUTHOR AS b ON a.AUTHID=b.Id";
        $query=mysqli_query($db_connection,$expr);

        $rows=mysqli_num_rows($query);

        for($i=0;$i<$rows;$i++){
            $row=mysqli_fetch_row($query);

            $name=$row[2];
            $txt=$row[0];
            $dat=$row[1];

            echo "<div class='blck'><div class='tm_user'><span class='user'>$name</span><span class='time'><div id='tm'>$dat</div></span></div><div class='mes'>$txt</div></div>";
        }*/
        echo "<br><br><br>";
        $expr="SELECT `NAME` FROM `TEMP` ORDER BY `TIM` DESC";

        $query=mysqli_query($db_connection,$expr);

        $rows=mysqli_num_rows($query);

        for($i=0;$i<$rows;$i++){
            $row=mysqli_fetch_row($query);

            $name=$row[0];
            //echo "<div class='themes'><a href='disppost.php'>$name</a></div><br>";
            echo "<div class='themes'><form method='POST' action='disppost.php'><textarea name='nam' style='display:none;'>$name</textarea><button>$name</button></form></div><br>";
        }
        ?>

        
</body>
</html>