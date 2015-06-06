<div align="center"><img class="heading" src="images/taxi2.jpg" style="height:100;width: 300;" align="center"/></div>
<br>
<img src="images/home.jpg" style="height:120;" onclick="window.location='home.php'" id="home"/>
<br>
<br>
<style type="text/css">
            .heading
            {
                border-color: #ff9999;
                border-style: ridge;
                border-radius: 30px;
                box-shadow: 10px 10px 100px 50px #ff9999;
            }
            #home
            {
                margin-left: 50;
                box-shadow: 0px 0px 10px 10px black;
                opacity:0.5;
            }
            #home:hover
            {
                cursor: pointer;
                opacity: 1;
            }
            body
            {
                background-image: url('images/Wallpaper.jpg');
                color: #006666;
                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
</style>
<?php
    include 'dbinfo.php';
    $result=mysql_query("select `From`,`To`,`Car_Name`,`Name`,`Age`,`AC`,`Date_time_from`,`Address`,`PIN`,`Contact_no`,`Payment_type`,`Card_Bank_type`,`Card_holder_name`,`Expiry_date`,`Card_no`,`CVV_no`,`Distance`,`Amount`,`Mail` from temp_bill order by `ID` desc");
    $row=mysql_fetch_row($result);
    if($row[0]==""||$row[0]==null)
    {
        header("Location: home.php");
    }
    $query="insert into `bill`(`From`,`To`,`Car_Name`,`Name`,`Age`,`AC`,`Date_time_from`,`Address`,`PIN`,`Contact_no`,`Payment_type`,`Card_Bank_type`,`Card_holder_name`,`Expiry_date`,`Card_no`,`CVV_no`,`Distance`,`Amount`,`Mail`) values('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$row[10]','$row[11]','$row[12]','$row[13]','$row[14]','$row[15]','$row[16]','$row[17]','$row[18]')";
    mysql_query($query) or die("ERROR INSERTING");
    mysql_query("delete from temp_bill");
    
    $car=$row[2];
    $avail=mysql_query("select Available from car_models where Name='$car'");
    $available=mysql_fetch_row($avail);
    $avail_updated=$available[0]-1;
    mysql_query("update car_models set Available='$avail_updated' where Name='$car'");
    
    $id=      mysql_query("select ID from bill order by `ID` desc");
    $id_row=  mysql_fetch_row($id);
    $to=$row[18];
    $from="abc@xyz.com";
    $subject="Congratulations";
    $message="Your booking ID is ".$id_row[0]." .\nYou can view your booking information anytime on http://localhost/PhpProject2/home.php\nFor any query , checkout http://localhost/PhpProject2/contact.php";
    $headers="From: ANYTIME TRAVELS<$from>";
    mail($to,$subject,$message,$headers);
?>
<html>
    <head>
        <title>
            Payment Sucessful
        </title>
    <h2 align="center">
        YOUR PAYMENT WAS SUCCESSFUL
        <br>
        YOUR BOOKING ID IS <?echo $id_row[0];?>
    </h2>
    <h4 align="center">
        YOUR BILL DETAILS HAS BEEN SENT TO <?echo $row[18]; ?> 
    </h4>
    </head>
    <body>
        
    </body>
</html>
