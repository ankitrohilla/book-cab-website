<?php
    include 'dbinfo.php';
      $old_na=$_GET['car'];
      $na=$_GET['name'];
      $rs=$_GET['rs_per_km'];
      $ca=$_GET['capacity'];
      $co=$_GET['company'];
      $to=$_GET['total'];
      $query="select Total,Available from car_models where Name='$old_na'";
      $result=mysql_query($query) or die("ERROR IN QUERY");
      $row= mysql_fetch_row($result);
      $old_avail=$row[1];
      $old_total=$row[0];
      $total_diff=$to-$old_total;
      $new_avail=$old_avail+$total_diff;
      mysql_query("update car_models set Name='$na',Rupees_per_kilometre='$rs',Capacity='$ca',Company='$co',Total='$to',Available='$new_avail' where Name='$old_na'");
?>
<script type="text/javascript">
    alert("UPDATED SUCCESSFULLY");
    window.location="admin.php";
</script>
