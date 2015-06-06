<?php
    include 'dbinfo.php';
    $m=$_GET['m'];
    $ci=$_GET['ci'];
    $a=$_GET['a'];
    $co=$_GET['co'];
    $p=$_GET['p'];
    mysql_query("insert into `contact`(`Manager`,`City`,`Address`,`Contact_no`,`PIN`) values('$m','$ci','$a','$co','$p')");
    echo "CONTACT ADDED SUCCESSFULLY";
?>
