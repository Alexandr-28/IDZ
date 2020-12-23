<?php   
    session_start();
    require_once 'db.php';

    $text=$_POST['tmname'];

    $text2="";

    for($i=0;$i<strlen($text);$i++){
        if($text[$i]!=' '){
            $text2=$text2.$text[$i];
        }
    }

    $proove="SELECT * FROM `TEMP` WHERE NAME='$text2'";
    $proove2=mysqli_query($db_connection,$proove);
    $row_count=mysqli_num_rows($proove2);
    if($row_count>0){
        $tmp=++$row_count;
        $text2=$text2."$tmp";
        $text=$text." $tmp";
    }
    $dt=date("Y-m-d H:i:s");
    $FK="FK_".$text2."_AUTH";
    $expr1="CREATE TABLE $text2(Id INT PRIMARY KEY AUTO_INCREMENT, TXT VARCHAR(1000),DT VARCHAR(100),AUTHID INT, CONSTRAINT $FK FOREIGN KEY (AUTHID) REFERENCES AUTHOR(Id))";
    $expr2="INSERT INTO TEMP(`NAME`,`TIM`) VALUES ('$text', '$dt')";
    mysqli_query($db_connection,$expr1);
    mysqli_query($db_connection, $expr2);

    header('Location: ../index.php');
?>