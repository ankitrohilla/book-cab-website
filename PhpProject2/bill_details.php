<?
    session_start();
    if(!(isset($_SESSION['username'])))
    {
        header("Location: home.php?direct=1");
    }
    elseif(time()>$_SESSION['expire'])
    {
        session_destroy();
        header("Location: home.php?expire=1");
    }
?>
<div align="center"><img class="heading" src="images/taxi2.jpg" style="height:100;width: 300;" align="center"/></div>
<br>
<img align="left" src="images/go back.jpg" style="height:90;" onclick="window.location='admin.php'" id="back"/>
<br>
<br>
<br>
<br>
<style type="text/css">
            body
            {
                background-image: url('images/Wallpaper.jpg');
                color: #006666;
                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
            .heading
            {
                border-color: #ff9999;
                border-style: ridge;
                border-radius: 30px;
                box-shadow: 10px 10px 100px 50px #ff9999;
            }
            #back
            {
                opacity:0.5;
            }
            #back:hover
            {
                cursor: pointer;
                opacity: 1;
            }
            table
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
<?php
    include 'dbinfo.php';
    $id=$_GET['ID'];
    $result=mysql_query("select * from bill where ID='$id'") or die("ERROR QUERY");
    $row=mysql_fetch_row($result);
    echo "<style type='text/css'>
            body
            {   
                text-align : center;
            }
          </style>";
    echo "<h2>BILL DETAILS</h2>";
    echo "<table align='center' border='2'>";
    echo "<tr><td>NAME</td><td>".$row[4]."</td></tr>";
    echo "<tr><td>AGE</td><td>".$row[5]." yrs.</td></tr>";
    echo "<tr><td>POSTAL ADDRESS</td><td>".$row[9]."</td></tr>";
    echo "<tr><td>E-MAIL ADDRESS</td><td>".$row[20]."</td></tr>";
    echo "<tr><td>PIN</td><td>".$row[10]."</td></tr>";
    echo "<tr><td>LEAVING FROM</td><td>".$row[1]."</td></tr>";
    echo "<tr><td>GOING TO</td><td>".$row[2]."</td></tr>";
    echo "<tr><td>CAR BOOKED</td><td>".$row[3]."</td></tr>";
    echo "<tr><td>DEPARTURE DATE AND TIME</td><td>".$row[8]."</td></tr>";
    echo "<tr><td>CONTACT NUMBER</td><td>".$row[11]."</td></tr>";
    echo "<tr><td>OPTED FOR AC ?</td><td>".$row[6]."</td></tr>";
    echo "<tr><td>DISTANCE</td><td>".$row[18]." kms.</td></tr>";
    echo "<tr><td>FARE</td><td>Rs. ".$row[19]."</td></tr>";
    echo "<tr><td>PAYMENT TYPE</td><td>".$row[12]."</td></tr>";
    if($row[12]=="Credit card")
    {
        echo "<tr><td>CARD TYPE</td><td>".$row[13]."</td></tr>";
    }
    else
    {
        echo "<tr><td>BANK NAME</td><td>".$row[13]."</td></tr>";
    }
    echo "</table>";
    echo "<h3>TRANSACTION INFORMATION</h3>";
    echo "<table align='center' border='2'>";
    echo "<tr><td>CARD HOLDER NAME</td><td>".$row[14]."</td></tr>";
    echo "<tr><td>CARD EXPIRY DATE</td><td>".$row[15]."</td></tr>";
    echo "<tr><td>CARD NUMBER</td><td>".$row[16]."</td></tr>";
    echo "<tr><td>CVV  NUMBER</td><td>Not shown for privacy purpose</td></tr>";
    echo "</table>";
?>
