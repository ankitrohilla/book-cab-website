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
    $name=$_GET['name'];
    $f_lower=$_GET['f_lower'];
    $f_upper=$_GET['f_upper'];
    $query="select * from car_models";
    $result=mysql_query($query) or die("ERROR IN QUERY");
    echo "THE RESPONSE TO YOUR SEARCH IS<br><br>
                <table border='2' id='search' class='table'>
                <tr><th>Car ID</th><th>Car Name</th><th>Rupees per kilometre</th><th>Capacity</th><th>Available cars</th></tr>
         ";
    while($row=mysql_fetch_row($result))
    {
        if($name==$row[1])
        {
            if($row[7]>0)
            {
    echo "<tr id='row'><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[7]."</td><td><a href='book.php?name=".$row[1]."'>Book Now</a></td></tr>";
            }
            else
            {
    echo "<tr id='row'><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[7]."</td><td>Book Now</td></tr>";             
            }
    
        }
        else if(($row[2]>$f_lower)&&($row[2]<$f_upper))
        {
            if($row[7]>0)
            {
    echo "<tr id='row'><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[7]."</td><td><a href='book.php?name=".$row[1]."'>Book Now</a></td></tr>";
            }
            else
            {
    echo "<tr id='row'><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[7]."</td><td>Book Now</td></tr>";        
            }
        }
    }
    echo "</table>";
    echo "NOTE : AC charges extra as per usage";
?>