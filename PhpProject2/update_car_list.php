<?php
    include 'dbinfo.php';
    $car=$_GET['name'];
    $result= mysql_query("select * from car_models where Name='$car'");
    $row=    mysql_fetch_row($result);
    echo "<table style='color:blue;font-family:monospace ;font-size:11px;' align='center'>";
    echo "<tr><td>NAME</td><td>                 ".$row[1]."</td></tr>";
    echo "<tr><td>RUPEES PER KILOMETRE</td><td> ".$row[2]."</td></tr>";
    echo "<tr><td>CAPACITY</td><td>             ".$row[3]."</td></tr>";
    echo "<tr><td>COMPANY</td><td>              ".$row[4]."</td></tr>";
    echo "<tr><td>TOTAL CARS</td><td>           ".$row[6]."</td></tr>";
    echo "</table>";
?>
