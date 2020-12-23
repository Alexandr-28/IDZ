<?php
    session_start();
    require_once 'db.php';

    $login=$_POST['log'];
    $pasw1=$_POST['pass1'];
    $pasw2=$_POST['pass2'];

    $proove="SELECT * FROM `AUTHOR` WHERE `LOGIN`='$login'";

    $res=mysqli_query($db_connection,$proove);

    if(mysqli_num_rows($res)>0){
        $_SESSION['mes']="Такое имя пользователя уже недоступно.";
        header('Location: ../signup.php');
    }
    else{
        if($pasw1 === $pasw2){
            $password=md5($pasw1);
            $expr="INSERT INTO `AUTHOR`(`LOGIN`,`PAROL`) VALUES ('$login','$password')";
            mysqli_query($db_connection,$expr);

            
            header('Location: ../signin.php');
        }
        else{
            $_SESSION['mes']="Пароли отличаются или такое имя уже занято.";
            header('Location: ../signup.php');
        }
    }
?>