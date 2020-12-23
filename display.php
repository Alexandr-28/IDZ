<?php
    session_start();
    require_once 'inc/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сообщения <?php echo $_SESSION['login'];?></title>

    <style>
        table{
            border-collapse:collapse;
        }

        th,td{
            border:1px solid black;
        }
    </style>
</head>
<body>
    <?php
    $temp=$_SESSION['login'];
    echo "Посты пользователя <b>".$temp."</b>:<br>";

   


    $expr="SELECT `NAME` FROM `TEMP` ORDER BY TIM DESC";
    $query=mysqli_query($db_connection,$expr);

    $rows=mysqli_num_rows($query);

    
    for($i=0;$i<$rows;$i++){
        $row=mysqli_fetch_row($query);
        $tmp=$row[0];

        $tmp2="";

        for($j=0;$j<strlen($tmp);$j++){
            if($tmp[$j]!=' '){
                $tmp2=$tmp2.$tmp[$j];
            }
        }
        echo "<i>$tmp2</i>:<br>";

        $expr2="SELECT b.TXT, b.DT FROM `AUTHOR` AS a INNER JOIN `$tmp2` AS b ON a.Id=b.AUTHID WHERE b.AUTHID=(SELECT Id FROM `AUTHOR` WHERE `LOGIN`='$temp')";
        $query2=mysqli_query($db_connection,$expr2);
        $rows2=mysqli_num_rows($query2);
        if($rows2==0){ 
            echo "Сообщений не найдено<br>";
            continue;
        }
        echo "<table><tr><th>Сообщение</th><th>Дата</th></tr>";
        for($j=0;$j<$rows2;$j++){
            $row2=mysqli_fetch_row($query2);
            echo "<tr><td>$row2[0]</td><td>$row2[1]</td></tr>";
        }
        echo "</table>";
    }

    ?>


    <a href="index.php">Назад</a>
</body>
</html>
