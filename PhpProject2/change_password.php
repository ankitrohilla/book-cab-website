<?php
    session_start();
    include 'dbinfo.php';
    $user=$_SESSION['username'];
    $pass=$_GET['pass'];
    mysql_query("update admin set Password='$pass' where Username='$user'");
    echo "PASSWORD UPDATED SUCESSFULLY";
?>
