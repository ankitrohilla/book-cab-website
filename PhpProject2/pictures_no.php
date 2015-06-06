<?php
    include 'dbinfo.php';
    $car=$_GET['car'];
    $auth=$_GET['auth'];
    $result=mysql_query("select Pictures from car_models where Name='$car'");
    $row=mysql_fetch_row($result) or die($result);
    if($auth==1)
    {
                echo "<TABLE>";
        for($i=1;$i<=$row[0];$i++)
        {
            if(($i==1)||($i==4)||($i==7)||($i==10))
            {
                echo "</TR><TR><TD>";
                echo "<table><tr><td><img border='2' height='100' width='150' src='images/".$car.$i.".jpeg'/></td></tr>";
                echo "<tr><td align='center'><a href='delete_car_picture.php?no=".$i."&car=".$car."'>Delete</a></td></tr>";
                echo "</table>";
                echo "</TD>";
            }
            else
            {
                echo "<TD>";
                echo "<table><tr><td><img border='2' height='100' width='150' src='images/".$car.$i.".jpeg'/></td></tr>";
                echo "<tr><td align='center'><a href='delete_car_picture.php?no=".$i."&car=".$car."'>Delete</a></td></tr>";
                echo "</table>";
                echo "</TD>";
            }
        }
                echo "</TR>";
    }                
    else
    {
        for($i=1;$i<=$row[0];$i++)
        {
                echo "<img border='2' height='100' width='150' src='images/".$car.$i.".jpeg'/>";
        }
    }
                echo "</TABLE>";
?>
