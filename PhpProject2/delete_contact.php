<?php
    include 'dbinfo.php';
    $id=$_GET['id'];
    mysql_query("delete from contact where ID='$id'") or die("ERROR");
    echo "CENTRE SUCESSFULLY DELETED!";
?>
