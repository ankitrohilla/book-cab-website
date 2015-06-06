<style type="text/css">
            body
            {
                background-image: url('images/Wallpaper.jpg');
                color: #006666;
                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                text-shadow: 0px 0px 10px green;
            }
            .heading
            {
                border-color: #ff9999;
                border-style: ridge;
                border-radius: 30px;
                box-shadow: 10px 10px 100px 50px #ff9999;
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
            #back
            {
                opacity:0.5;
            }
            #back:hover
            {
                cursor: pointer;
                opacity: 1;
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
</style>
        <div align="center"><img class="heading" src="images/taxi2.jpg" style="height:100;width: 300;" align="center"/></div>
        <br>
   
<?php
    include 'dbinfo.php';
    $passcode=$_GET['passcode'];
    $id=$_GET['id'];
    $result= mysql_query("select Passcode from bill where ID='$id'");
    $row=    mysql_fetch_row($result);
    if($passcode==$row[0])
    {
      ?><img src="images/home.jpg" style="height:120;" onclick="window.location='home.php'" id="home"/><?
        echo "<p align='center'>Your booking has been cancelled and you will recieve your refund in the next 7 days";
        echo "<br>Thank you for using our service.</p>";
        mysql_query("update bill set Deleted=1 where ID='$id'");
    }
    else
    {
      ?><img src="images/go back.jpg" style="height:90;" onclick="history.back(-1)" id="back"/><?
        echo "<p align='center' style='font-family:monospace;font-size:50px;'>INCORRECT PASSWORD</p>";
    }
?>
   