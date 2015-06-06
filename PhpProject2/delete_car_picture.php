<?php
    include 'dbinfo.php';
    $no=$_GET['no'];
    $car=$_GET['car'];
    unlink("images/".$car.$no.".jpeg");
    $result=mysql_query("select Pictures from car_models where Name='$car'");
    $row=mysql_fetch_row($result);
    $updated=$row[0]-1;
    mysql_query("update car_models set Pictures='$updated' where Name='$car'");
    if($no<$row[0])
    {
        $i=$no+1;
        for($i;$i<=$row[0];$i++)
        {
            $j=$i-1;
            rename("images/".$car.$i.".jpeg","images/".$car.$j.".jpeg");
        }
    }
?>
<script type="text/javascript">
    alert("SUCCESSFULLY DELETED");
    window.location="admin.php";
</script> 