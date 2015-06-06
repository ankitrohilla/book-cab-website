<?php
    $host="localhost";
    $uid="root";
    $pass="";
    $dbname="travel";
    mysql_connect($host, $uid, $pass) or die("ERROR CONNECTING");
    mysql_select_db($dbname) or die("ERROR SELECTING");
?>