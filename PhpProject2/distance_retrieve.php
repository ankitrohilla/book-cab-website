<?php
    $car=$_GET['car'];
    $from=$_GET['from'];
    $to=$_GET['to'];
    include 'dbinfo.php';
    $distance=mysql_query("select ".$from." from distance where Locations='$to'");
    $row1=mysql_fetch_row($distance);
    echo "DISTANCE - ".$row1[0]." kms.<br>";
    $fare=mysql_query("select Rupees_per_kilometre from car_models where Name='$car'");
    $row2=mysql_fetch_row($fare);
    echo "FARE     - Rs.".$row2[0]*$row1[0];
?>
