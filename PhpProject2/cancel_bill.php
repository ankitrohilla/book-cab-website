<?php
    include 'dbinfo.php';
    $result_check= mysql_query("select Date_time_from,ID,Car_name from bill where Done=0");
    while($row=mysql_fetch_row($result_check))
    {
            $date=strtok($row[0],"/");
            $month=strtok("/");
            $year=strtok(" ");
            if((date('Y')>$year)||(date('Y')==$year&&date('m')>$month)||(date('Y')==$year&&date('m')==$month&&date('d')>$date))
            {
                mysql_query("update bill set Done=1 where ID='$row[1]'");
                $result_done= mysql_query("select Available from car_models where Name='$row[2]'");
                $old_avail=mysql_fetch_row($result_done);
                $updated_avail=$old_avail[0]+1;
                mysql_query("update car_models set Available='$updated_avail' where Name='$row[2]'");
            }
    }
    $id=$_GET['ID'];
    $result=mysql_query("select * from bill where ID='$id'") or die("ERROR QUERY");
    $row=mysql_fetch_row($result);
    if(sizeof($row)!=1)
    {
    echo "<style type='text/css'>
            table
            {   
                text-align : center;
            }
          </style>";
    echo "<h2 align='center'>BILL DETAILS</h2>";
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
    echo "<h3 align='center'>TRANSACTION INFORMATION</h3>";
    echo "<table align='center' border='2'>";
    echo "<tr><td>CARD HOLDER NAME</td><td>".$row[14]."</td></tr>";
    echo "<tr><td>CARD EXPIRY DATE</td><td>".$row[15]."</td></tr>";
    echo "<tr><td>CARD NUMBER</td><td>".$row[16]."</td></tr>";
    echo "<tr><td>CVV  NUMBER</td><td>Not shown for privacy purpose</td></tr>";
    echo "</table>";
    }
    else
    {
        echo "<h3 align='center'>NO SUCH BOOKING ID EXISTS</h3>";
    }
?>
