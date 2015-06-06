<?php
    include 'dbinfo.php';
    $car=$_POST['car'];
    $result=mysql_query("select Pictures from car_models where Name='$car'");
    $row=mysql_fetch_row($result);
    for($i=1;$i<=$row[0];$i++)
    {
    unlink("images/".$car.$i.".jpeg");
    }
    mysql_query("delete from car_models where Name='$car'");
?>
<script type="text/javascript">
    alert("SUCESFULLY DELETED");
    window.location="admin.php";
</script>
