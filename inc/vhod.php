<?php
    session_start();
    require_once 'db.php';
     
    $login=$_POST['log'];
    $pasw1=md5($_POST['pass']);


    $sel=mysqli_query($db_connection, "SELECT * FROM `AUTHOR` WHERE `LOGIN`='$login' AND `PAROL`='$pasw1'");

    if(mysqli_num_rows($sel)>0){
        $user=mysqli_fetch_assoc($sel);

        $_SESSION['login']=$user['LOGIN'];
        header('Location: ../index.php');
    }
    else{
        $_SESSION['mes']='Неверный логин или пароль.';
        header('Location: ../signin.php');
    }
?>