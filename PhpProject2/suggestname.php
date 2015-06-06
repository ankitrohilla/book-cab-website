<?php
    include 'dbinfo.php';
    $name=ucwords($_GET['name']);
    if($name==""||$name==null)
    {
        echo "";
        die();
    }
    $result=mysql_query("select Name from bill");
    while($row=mysql_fetch_row($result))
    {
        if(strchr($row[0],$name))
        {
            echo "<b style='color:blue;font-family:monospace;cursor:pointer;'><span onclick='value_change(innerHTML);'>".$row[0]."</span></b><br>";
        }
    }
?>
