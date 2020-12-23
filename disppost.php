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

</head>
<body>
    <div id="nav">
        <div class="inner label" style="width:400px;"><a id ="cr" href="writepost.php">&nbsp;Новое сообщение</a></div>
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
    
   <!-- SELECT a.TXT,a.DT,b.IMIA FROM MES AS a INNER JOIN AUTHOR AS b ON a.AUTHID=b.Id-->
    <?php
        $name="";
        if(isset($_POST['nam']))
        {
            $tmp=$_POST['nam'];
            for($i=0;$i<strlen($tmp);$i++)
            {
                if($tmp[$i]!=' ')
                {
                    $name=$name.$tmp[$i];
                }
            }
            $_SESSION['nn']=$name;
        
        }
        else{
            $name=$_SESSION['nn'];
        }
    
       
        $expr="SELECT a.TXT,a.DT,b.LOGIN FROM `$name` AS a INNER JOIN AUTHOR AS b ON a.AUTHID=b.Id";
        $query=mysqli_query($db_connection,$expr);
        
        $rows=mysqli_num_rows($query);
        if($rows!=0){
            for($i=0;$i<$rows;$i++){
                $row=mysqli_fetch_row($query);

                $name2=$row[2];
                $txt=$row[0];
                $dat=$row[1];
            

                echo "<div class='blck'><div class='tm_user'><span class='user'>$name2</span><span class='time'><div id='tm'>$dat</div></span></div><div class='mes'>$txt</div></div>";
            }
        }
    ?>
</body>
</html>