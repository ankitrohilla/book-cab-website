<?  
    session_start();
    $flag=0;
    include 'dbinfo.php';
    $u=$_POST['user'];
    $p=$_POST['pass'];
    $result=mysql_query("select Username,Password from admin");
    while($row=mysql_fetch_row($result))
    {
        echo $row[0].$row[1];
        if(($u==$row[0])&&($p==$row[1]))
        {
            $flag=1;
            $_SESSION['username']=$u;
            $_SESSION['expire'] = time()+60*60*12; //12 hours
            header("Location: admin.php");
        }
    }
    if($flag==0)
    {
    session_destroy();
    header("Location: home.php?try=1");
    }
?>
