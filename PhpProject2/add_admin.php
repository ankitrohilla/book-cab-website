<?php
    session_start();
    include 'dbinfo.php';
    $user=$_GET['user'];
    $mail=$_GET['mail'];
    $result=mysql_query("select Username from admin");
    while ($row = mysql_fetch_row($result))
    {
        
        if($user==$row[0])
        {
            echo "USERNAME ALREADY EXISTS";
            die();
        }
    }
    $str=   str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789");
    $pass=  substr($str,10,10);    
    mysql_query("insert into `admin`(`Username`,`Password`,`Mail`) values('$user','$pass','$mail')");
    echo "SUCESSFULLY ADDED\nPASSWORD DETAILS HAS BEEN SENT TO ".$mail;
    $to=$mail;
    $from="abc@xyz.com";
    $subject="You have been added as an administrator by ".$_SESSION['username'];
    $message="Your username and password for http://localhost/PhpProject2/home.php is ".$user." and ".$pass." respectively\nNow you have the privileged access to the website";
    $headers = "From: ANYTIME TRAVELS<$from>";
    mail($to,$subject,$message,$headers);
?>
