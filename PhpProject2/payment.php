<div align="center"><img class="heading" src="images/taxi2.jpg" style="height:100;width: 300;" align="center"/></div>
<br>
<img align="left" src="images/go back.jpg" style="height:90;" onclick="history.back(-1)" id="back"/>
<br>
<br>
<br>
<br>
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
            #back
            {
                opacity:0.5;
            }
            #back:hover
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
                text-shadow: 0px 0px 10px green;
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
    date_default_timezone_set('Asia/Kolkata');
    echo date('d/m/y h:i:s A');
    $car=$_POST['car'];
    $name=ucwords($_POST['name']);
    $age=$_POST['age'];
    $from=$_POST['from'];
    $to=$_POST['to'];
    $ac=$_POST['ac'];
    $date=$_POST['date'];
    $month=$_POST['month'];
    $year=$_POST['year'];
    $hour=$_POST['hour'];
    $minute=$_POST['minute'];
    $A=$_POST['A'];
    $address=ucwords($_POST['address']);
    $PIN=$_POST['PIN'];
    $contact_no=$_POST['contact_no'];
    $payment_type=$_POST['payment'];
    $card_bank_type=$_POST['type'];
    $cardholder_name=ucwords($_POST['cardholder_name']);
    $expiry_month=$_POST['expiry_month'];
    $expiry_year=$_POST['expiry_year'];
    $card_number1=$_POST['card_number1'];
    $card_number2=$_POST['card_number2'];
    $card_number3=$_POST['card_number3'];
    $card_number4=$_POST['card_number4'];
    $card_number=$card_number1.$card_number2.$card_number3.$card_number4;
    $cvv=$_POST['cvv'];
    $date_time=$date."/".$month."/".$year."  ".$hour.":".$minute." ".$A;
    $exp_date_time=$expiry_month."/".$expiry_year;
    $mail=$_POST['mail'];
    if((!checkdate($month, $date, $year)))
    {
        ?>
<script type="text/javascript">
    alert("PLEASE ENTER A VALID DATE");
    history.back(-1);
</script>
        <?
    }
    if($A=="PM")
    {
        if(time()>  mktime($hour+12, $minute,0, $month, $date, $year))
        {
            ?>
<script type="text/javascript">
    alert("THE TIME YOU HAVE ENTERED HAS ALREADY BEEN PASSED OUT , PLEASE RE-SUBMIT");
    history.back(-1);
</script>
            <?
        }
    }
    if($A=="AM")
    {
        if(time()>  mktime($hour, $minute,0, $month, $date, $year))
        {
            ?>
<script type="text/javascript">
    alert("THE TIME YOU HAVE ENTERED HAS ALREADY BEEN PASSED OUT , PLEASE RE-SUBMIT");
    history.back(-1);
</script>
            <?
        }
    }
    if(time()>mktime(0,0,0,$expiry_month,0,$expiry_year))
    {
        ?>
<script type="text/javascript">
    alert("YOUR CREDIT/DEBIT CARD HAS BEEN EXPIRED");
    history.back(-1);
</script>
        <?
    }
         $distance_fetch=mysql_query("select ".$from." from distance where Locations='$to'");
         $row1=mysql_fetch_row($distance_fetch);
         $distance=$row1[0];
         $fare_fetch=mysql_query("select Rupees_per_kilometre from car_models where Name='$car'");
         $row2=mysql_fetch_row($fare_fetch);
         $fare=$row1[0]*$row2[0];
    echo "<h2 align='center'>BILL DETAILS</h2>";
    echo "<table align='center' border='1'>";
    echo "<tr><td>NAME</td><td>".$name."</td></tr>";
    echo "<tr><td>AGE</td><td>".$age." yrs.</td></tr>";
    echo "<tr><td>POSTAL ADDRESS</td><td>".$address."</td></tr>";
    echo "<tr><td>E-MAIL ADDRESS</td><td>".$mail."</td></tr>";
    echo "<tr><td>PIN</td><td>".$PIN."</td></tr>";
    echo "<tr><td>LEAVING FROM</td><td>".$from."</td></tr>";
    echo "<tr><td>GOING TO</td><td>".$to."</td></tr>";
    echo "<tr><td>CAR BOOKED</td><td>".$car."</td></tr>";
    echo "<tr><td>DEPARTURE DATE AND TIME</td><td>".$date_time."</td></tr>";
    echo "<tr><td>CONTACT NUMBER</td><td>".$contact_no."</td></tr>";
    echo "<tr><td>OPTED FOR AC ?</td><td>".$ac."</td></tr>";
    echo "<tr><td>DISTANCE</td><td>".$distance." kms.</td></tr>";
    echo "<tr><td>FARE</td><td>Rs. ".$fare."</td></tr>";
    echo "<tr><td>PAYMENT TYPE</td><td>".$payment_type."</td></tr>";
    if($payment_type=="Credit card")
    {
        echo "<tr><td>CARD TYPE</td><td>".$card_bank_type."</td></tr>";
    }
    else
    {
        echo "<tr><td>BANK NAME</td><td>".$card_bank_type."</td></tr>";
    }
    echo "</table>";
?>    
<style type="text/css">
    body
    {
        text-align: center;
    }
</style>
    <input type="button" value="CLICK HERE TO CONFIRM YOUR REQUEST" onclick="return final_confirm();"/>
<?
    include 'dbinfo.php';
    echo "<h3 align='center'>TRANSACTION INFORMATION</h3>";
    echo "<table align='center' border='1'>";
    echo "<tr><td>CARD HOLDER NAME</td><td>".$cardholder_name."</td></tr>";
    echo "<tr><td>CARD EXPIRY DATE</td><td>".$exp_date_time."</td></tr>";
    echo "<tr><td>CARD NUMBER</td><td>".$card_number."</td></tr>";
    echo "<tr><td>CVV  NUMBER</td><td>Not shown for privacy purpose</td></tr>";
    echo "</table>";
    $query="insert into `temp_bill`(`From`,`To`,`Car_Name`,`Name`,`Age`,`AC`,`Date_time_from`,`Address`,`PIN`,`Contact_no`,`Payment_type`,`Card_Bank_type`,`Card_holder_name`,`Expiry_date`,`Card_no`,`CVV_no`,`Distance`,`Amount`,`Mail`) values('$from','$to','$car','$name','$age','$ac','$date_time','$address','$PIN','$contact_no','$payment_type','$card_bank_type','$cardholder_name','$exp_date_time','$card_number','$cvv','$distance','$fare','$mail')";
    mysql_query($query) or die("ERROR INSERTING");
?>
<script type="text/javascript">
    function final_confirm()
    {   
        var c=confirm("ARE YOU SURE YOU WANT TO PROCEED TO PAYMENT!!");
        if(c==false)
            {
                return false;
            }
        window.location="payment_done.php";
    }
</script>

