<?php
      include 'dbinfo.php';
      $na=$_GET['name'];
      $rs=$_GET['rs_per_km'];
      $ca=$_GET['capacity'];
      $co=$_GET['company'];
      $to=$_GET['total'];
      $av=$to;
      $flag=0;
      $query="select Name from car_models";
      $result=mysql_query($query) or die("ERROR IN QUERY");
      while($row=mysql_fetch_row($result))
      {
          if($row[0]==$na)
          {
                 echo "The name you entered is already in the database , Please consider modifying it";
                 $flag=1;
          }
      }
      if($flag==0)
      {
            mysql_query("insert into `car_models`(`Name`,`Rupees_per_kilometre`,`Capacity`,`Company`,`Total`,`Available`) values('$na','$rs','$ca','$co','$to','$av')") or die("BHASAD");
            echo "SUCCESSFULLY ADDED";
      }
?>
