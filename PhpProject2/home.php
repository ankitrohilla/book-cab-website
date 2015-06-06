<?
    session_start();
    if(isset($_GET['expire']))
    {   
        ?>
        <script type="text/javascript">
        alert("YOUR SESSION HAS BEEN EXPIRED\nPLEASE LOGIN AGAIN");
        window.location="home.php";
        </script>
        <?
    }
?>
        <table align="right" style="font-family:monospace;font-size: 11;color:purple;"><tr valign="top"><td><a href="contact.php" align="right">Contact us </a></td><td> | </td><td><a href="cancel.php" align="right"> Cancellation of booking</a></td></tr></table>
        <br>
        <div align="center"><img class="heading" src="images/taxi2.jpg" style="height:100;width: 300;" align="center"/></div>
<br>        
<style type="text/css">
            body
            {
                background-image: url('images/Wallpaper.jpg');
                color: #006666;
                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                text-shadow: 0px 0px 10px green;
            }
            .heading
            {
                border-color: #ff9999;
                border-style: ridge;
                border-radius: 30px;
                box-shadow: 10px 10px 100px 50px #ff9999;
            }
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
</style>
<html>
    <head>
        <title>
            Home page
        </title>
        <script type="text/javascript">
            function search_car()
            {
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.onreadystatechange= function()
                {
                    if((xmlhttp.readyState==4)&&(xmlhttp.status==200))
                    {
                          document.getElementById('response').innerHTML=xmlhttp.responseText;
                    }      
                }
                var name=document.search.car.value;
                var f_lower=document.search.f_lower.value;
                var f_upper=document.search.f_upper.value;
                xmlhttp.open("GET","search_car.php?name="+name+"&f_lower="+f_lower+"&f_upper="+f_upper,true);
                xmlhttp.send();   
            }
            function search_all_car()
            {
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.onreadystatechange= function()
                {
                    if((xmlhttp.readyState==4)&&(xmlhttp.status==200))
                    {
                          document.getElementById('response').innerHTML=xmlhttp.responseText;
                    }      
                }
                var f_lower=0;
                var f_upper=9999;
                xmlhttp.open("GET","search_car.php?name=&f_lower="+f_lower+"&f_upper="+f_upper,true);
                xmlhttp.send();   
            }
        </script>
    <h1 align="center">
        BEST CABS ACCORDING TO WHAT YOU NEED
    </h1>
        
    </head>
    <body>
        <h4>
            SEARCH ACCORDING TO YOUR SUITABILITY
        </h4>
        <form name="search">
            <br>
            CHOOSE THE CAR YOU WANT TO BOOK :<select name="car" onchange="pictures_show();">
                                <?
                                    include 'dbinfo.php';
                                    $result=mysql_query("select Name from car_models") or die("BHASAD");
                                    while($row=mysql_fetch_row($result))
                                    {
                                        ?>
                                        <option value="<?echo $row[0]?>"><?echo $row[0]?></option> 
                                        <?
                                    }
                                ?>
                             </select>
            <p id="car_show">
                
            </p>
            <script type="text/javascript">
                function pictures_show()
                {
                    var car=document.search.car.value;
                    var xmlhttp=new XMLHttpRequest();
                    xmlhttp.onreadystatechange= function()
                    {
                      if((xmlhttp.readyState==4)&&(xmlhttp.status==200))
                      {
                            document.getElementById('car_show').innerHTML=xmlhttp.responseText;
                      }      
                    }
                    xmlhttp.open("GET","pictures_no.php?car="+car+"&auth=0",true);
                    xmlhttp.send();            
                }
                pictures_show();
            </script>
            <br>
            OR SEARCH ACCORDING TO YOUR - RS/KM. RANGE    :<input type="number" name="f_lower" value="0"/>to
                             <input type="number" name="f_upper" value="0"/>  
            <br>
            <input type="button" value="SEARCH DETAILS" onclick="search_car();"/>
            OR
            <input type="button" value="SEARCH ALL CARS" onclick="search_all_car();"/>
        </form>
        <h4>
            AND WE WILL GIVE YOU THE BEST DEALS
        </h4>
        <p id="response" style="height:5;">
         
        </p>
        <p align="right">
        <?
        if(!isset($_SESSION['username']))
            {
        ?>
            <form name="login" action="admin_login.php" method="POST">
            <table align="right" valign="bottom" style="background-attachment: fixed;">
                <tr><td style="font-weight: bold;">ADMIN LOGIN</td></tr>
                <tr><td>USERNAME</td><td><input name="user" type="text"/></td></tr>
                <tr><td>PASSWORD</td><td><input name="pass" type="password"/></td></tr>
                <?if(isset($_GET['try']))
                {?>
                <tr><td></td><td width="200" style="color: red;font;font-family: monospace;font-size: 12px;">User ID and password didn't matched</td>
                <?}?>
                <?if(isset($_GET['direct']))
                {?>
                <tr><td></td><td width="200" style="color: red;font;font-family: monospace;font-size: 12px;">Please login first to go to admin page</td>
                <?}?>    
                <tr><td></td><td>        <input type="submit" value="SIGN IN"/></td></tr>
            </table>
            </form>
        <?
            }
            else
            {
        ?>
            <input type="button" onclick="window.location='admin.php'" value="ADMIN PAGE"/>
            <br>
            <input type="button" onclick="window.location='admin_logout.php'" value="ADMIN LOGOUT"/>
        <?
            }
        ?>
        </p>
    </body>
</html> 