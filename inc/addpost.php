<?php session_start();
    require_once 'db.php';
     
    $text=$_POST['messs'];

    date_default_timezone_set('Europe/Kiev'); 


    $dt=date("h:i:sa").", ".date("d.m.yy");

    $nm=$_SESSION['nn'];
    $current_user=$_SESSION['login'];
    mysqli_query($db_connection, "INSERT INTO `$nm`(`TXT`,`DT`,`AUTHID`) VALUES('$text', '$dt', (SELECT Id FROM AUTHOR WHERE `LOGIN`='$current_user'))");

    header('Location: ../disppost.php');
?>