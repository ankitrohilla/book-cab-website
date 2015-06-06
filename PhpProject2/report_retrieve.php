<?php
    include 'dbinfo.php';
    $name=$_GET['name'];
    if($name=="")
    {
    $result=mysql_query("select * from bill") or die("ERROR QUERY");
    }
    else
    {
    $result=mysql_query("select * from bill where Name='$name'") or die("ERROR QUERY");
    }
        echo "<div align='center'>LIST OF CUSTOMERS</div>";
        echo "<table class='table' border='2'>";
        echo "<tr><th>BOOKING ID</th><th>CUSTOMER NAME</th><th>DATE AND TIME OF BOOKING</th><th>FROM</th><th>TO</th><th>CAR BOOKED</th><th>AMOUNT (Rs.)</th><th>PIN</th><th>MAIL ADDRESS</th><th>CONTACT NUMBER</th></tr>";
    while($row=mysql_fetch_row($result))
    {
        echo "<tr id='row'><td>".$row[0]."</td><td>".$row[4]."</td><td>".$row[7]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[19]."</td><td>".$row[10]."</td><td>".$row[20]."</td><td>".$row[11]."</td><td><a href='bill_details.php?ID=".$row[0]."'>BILL DETAILS</a></td></tr>";
    }
        echo "</table>";
?>
<style type="text/css">
    a:link
    {
        color: red;
    }
    a:visited
    {
        color: red;
    }
    a:active
    {
        color: lawngreen;
    }
    #row:hover
    {
        background-color: captiontext;
        color: gold;
    }
    .table
    {
                color:black;
                font-weight: bolder;                
                border-width: thick;
                border-color: green;
                background-image: url('images/taxi3.jpg');
                background-size: contain;
                border-radius: 10;
                opacity: 0.7;
    }
</style>
