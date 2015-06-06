<?php
    include 'dbinfo.php';
    $id=     $_GET['id'];
    $str=    str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789");
    $pass=   substr($str,10,10);
    $result= mysql_query("select Date_time_from,Done,Mail,Deleted from bill where ID='$id'");
    $row=    mysql_fetch_row($result);
    if($row[1]==1)
    {
        echo "The departure time ".$row[0]." is gone";
        echo "<br>Please don't play with our system. ";
        die();
    }
    if($row[3]==1)
    {
        echo "Your booking is already cancelled";
        echo "<br>You will recieve appropriate refund amount. ";
        echo "<br>You can <a href='contact.php'>contact us</a> to troubleshoot any unresolved issue.";
        die();
    }
    echo "We have sent a passcode to ".$row[2];
    echo "<br>Please enter the passcode below to confirm your identity";
    mysql_query("update bill set Passcode='$pass' where ID='$id'");
    echo "<br><input type='text' name='passcode'/>";
    echo "<br><input type='submit' value='DONE'/>";
    
    $to=$row[2];
    $from="abc@xyz.com";
    $subject="Booking cancellation confirmation passcode";
    $message="Hello !\nYour passcode for cancellation is ".$pass;
    $headers = "From: ANYTIME TRAVELS<$from>";
    mail($to,$subject,$message,$headers);
?>
