<?
    session_start();
    if(!isset($_SESSION['username']))
    {
        session_destroy();
        header("Location: home.php?direct=1");
    }
    elseif(time()>$_SESSION['expire'])
    {
        session_destroy();
        header("Location: home.php?expire=1");
    }
?>
<div align="center"><img class="heading" src="images/taxi2.jpg" style="height:100;width: 300;" align="center"/></div>
<br>
<img src="images/go back.jpg" style="height:90;" onclick="window.location='home.php'" id="back"/>
<br>
<br>
<?
    echo "<div align='center'>YOU HAVE LOGGED IN AS ".$_SESSION['username']."</div>";
?>
<style type="text/css">
            .heading
            {
                border-color: #ff9999;
                border-style: ridge;
                border-radius: 30px;
                box-shadow: 10px 10px 100px 50px #ff9999;
            }
            #back
            {
                opacity:0.5;
            }
            #back:hover
            {
                cursor: pointer;
                opacity: 1;
            }
            body
            {
                background-image: url('images/Wallpaper.jpg');
                color: #006666;
                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
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
            #main
            {
                color:black;
                font-weight: bolder;                
                border-width: thick;
                border-color: green;
                background-image: url('images/taxi3.jpg');
                background-size: contain;
                border-radius: 15;
                opacity: 0.7;
                table-layout: fixed;
            }
            .left_table
            {
                text-shadow: 0px 0px 10px black;
            }
            #left
            {
                border-right-color: greenyellow;
                border-width: 10px;
                border-right-width: 30px;
                
            }
            #right
            {
                border-left-color: greenyellow;
                border-width: 10px;
                border-left-width: 30px;
            }
</style>
<html>
    <head>
        
        <title>
            Admin home
        </title>
        <script type="text/javascript">
            function add_car()
            {   
                  var xmlhttp=new XMLHttpRequest();
                  xmlhttp.onreadystatechange= function()
                  {
                      if((xmlhttp.readyState==4)&&(xmlhttp.status==200))
                      {
                            alert(xmlhttp.responseText);
                      }      
                  }
                  var name=document.add__car.name.value;
                  var rs_per_km=document.add__car.rs_per_km.value;
                  var capacity=document.add__car.capacity.value;
                  var company=document.add__car.company.value;
                  var total=document.add__car.total.value;
                  xmlhttp.open("GET","add_car.php?name="+name+"&rs_per_km="+rs_per_km+"&capacity="+capacity+"&company="+company+"&total="+total,true);
                  xmlhttp.send();   
            }
            function update__car()
            {   
                  var xmlhttp=new XMLHttpRequest();
                  xmlhttp.onreadystatechange= function()
                  {
                      if((xmlhttp.readyState==4)&&(xmlhttp.status==200))
                      {
                            document.getElementById('update_form').innerHTML=xmlhttp.responseText;
                      }      
                  }
                  var car=document.update.car.value;
                  xmlhttp.open("GET","update_car_list.php?name="+car,true);
                  xmlhttp.send();   
            }
            function add__admin()
            {
                  var xmlhttp=new XMLHttpRequest();
                  xmlhttp.onreadystatechange= function()
                  {
                      if((xmlhttp.readyState==4)&&(xmlhttp.status==200))
                      {
                            alert(xmlhttp.responseText);
                      }      
                  }
                  var user=document.add_admin.user.value;
                  var mail=document.add_admin.mail.value;
                  xmlhttp.open("GET","add_admin.php?user="+user+"&mail="+mail,true);
                  xmlhttp.send();
            }
            function change__password()
            {
                  var pass=document.change_password.npass.value;
                  if(pass.length<6)
                      {
                          alert("PASSWORD MUST BE ATLEAST 6 CHARACTERS LONG");
                          return;
                      }
                  var xmlhttp=new XMLHttpRequest();
                  xmlhttp.onreadystatechange= function()
                  {
                      if((xmlhttp.readyState==4)&&(xmlhttp.status==200))
                      {
                            alert(xmlhttp.responseText);
                      }      
                  }
                  var user=document.add_admin.user.value;
                  var mail=document.add_admin.mail.value;
                  xmlhttp.open("GET","change_password.php?pass="+pass,true);
                  xmlhttp.send();
            }
            function add__contact()
            {
                  var m=document.contact.manager.value;
                  var ci=document.contact.city.value;
                  var a=document.contact.address.value;
                  var co=document.contact.contact_no.value;
                  var p=document.contact.pin.value;
                  var xmlhttp=new XMLHttpRequest();
                  xmlhttp.onreadystatechange= function()
                  {
                      if((xmlhttp.readyState==4)&&(xmlhttp.status==200))
                      {
                            alert(xmlhttp.responseText);
                      }      
                  }
                  xmlhttp.open("GET","add_contact.php?m="+m+"&ci="+ci+"&a="+a+"&co="+co+"&p="+p,true);
                  xmlhttp.send();
            }
            function del__contact()
            {
                var c=confirm("ARE YOU SURE YOU WANT TO DELETE THIS CENTRE FROM YOUR DATABASE?\nTHIS MEANS THIS CENTRE NO LONGER EXISTS.");
                if(c==false)
                    {
                        alert("FALSE");
                    }
                else
                    {
                        var xmlhttp=new XMLHttpRequest();
                        xmlhttp.onreadystatechange= function()
                        {
                            if((xmlhttp.readyState==4)&&(xmlhttp.status==200))
                            {
                                alert(xmlhttp.responseText);
                            }      
                        }
                        var id=document.getElementById('delcontact_id').value;
                        xmlhttp.open("GET","delete_contact.php?id="+id,true);
                        xmlhttp.send();
                    }
                    
            }
            function blank()
            {
                if(document.getElementById('search_report').value=="ENTER A KEY-WORD")
                    {
                        document.getElementById('search_report').value="";
                    }
            }
            function unblank()
            {
                if(document.getElementById('search_report').value=="")
                    {
                        document.getElementById('search_report').value="ENTER A KEY-WORD";
                    }
            }
            function suggest()
            {
                  var xmlhttp=new XMLHttpRequest();
                  xmlhttp.onreadystatechange= function()
                  {
                      if((xmlhttp.readyState==4)&&(xmlhttp.status==200))
                      {
                            document.getElementById('suggest').innerHTML=xmlhttp.responseText;
                      }      
                  }
                  var name=document.getElementById('search_report').value;
                  xmlhttp.open("GET","suggestname.php?name="+name,true);
                  xmlhttp.send();
            }
            function value_change(str)
            {
                document.getElementById('search_report').value=str;
            }
        </script>
    </head>
    <body>
        <TABLE BORDER="2" id="main">
        <TR>
        <TD valign="top" width="350" id="left">
            <h3 align="center">MANAGEMENT SECTION</h3>
            <h5 align="center" id="add_button" style="cursor: pointer;">ADD A CAR</h5>
            <h5 align="center" id="delete_button" style="cursor: pointer">DELETE A CAR</h5>
            <h5 align="center" id="update_button" style="cursor: pointer">UPDATE A CAR</h5>
            <h5 align="center" id="add_admin_button" style="cursor: pointer">ADD AN ADMIN</h5>
            <h5 align="center" id="change_password_button" style="cursor: pointer">CHANGE PASSWORD</h5>
            <h5 align="center" id="contact_button" style="cursor: pointer">ADD A CENTRE LOCATION</h5>
            <h5 align="center" id="delcontact_button" style="cursor: pointer">DELETE A CENTRE LOCATION</h5>
            
            <div id="add_slide">
            <form name="add__car">
<table class="left_table"><tr><td>NAME</td><td><input type="text" name="name"/></td></tr>
       <tr><td>RUPEES PER KILOMETRE</td><td>   <input type="number" name="rs_per_km" maxlength="3" size="1"/></td></tr>
       <tr><td>CAPACITY</td><td>               <input type="number" name="capacity" maxlength="2" size="1"/></td></tr>
       <tr><td>COMPANY</td><td>                <input type="text" name="company"/></td></tr>
       <tr><td>TOTAL CARS AVAILABLE</td><td>   <input type="number" name="total" maxlength="3" size="1"/></td></tr> 
       <tr><td></td><td align="center">        <input type="button" value="ADD" onclick="add_car();"/></td></tr>
</table>
            </form>
            </div>
            
            <div id="delete_slide" class="left_table">
                <form action="delete_car.php" METHOD="POST">
                I WANT TO DELETE <select name="car">
                <?
                    include 'dbinfo.php';
                    $result=mysql_query("select Name,Company from car_models order by Company");
                    while($row=mysql_fetch_row($result))
                    {
                ?>
                <option value="<?echo $row[0]?>"><?echo $row[1]." ".$row[0];?></option>
                <?  
                    }
                ?>
            </select> FROM MY RECORDS 
            <p align="center"><input type="submit" value="CONFIRM" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THIS CAR FROM YOUR RECORDS ?\nYOUR SITE VISITORS WILL NO LONGER BE ABLE TO VIEW OR BOOK THIS CAR');"/></p>
                </form>
            </div>
            
            <div id="update_slide">
I WANT TO MODIFY DETAILS OF
<form name="update" action="update_car.php">
                <select name="car" onchange="update__car();">
                <?
                    include 'dbinfo.php';
                    $result=mysql_query("select Name,Company from car_models order by Company");
                    while($row=mysql_fetch_row($result))
                    {
                ?>
                <option value="<?echo $row[0]?>"><?echo $row[1]." ".$row[0];?></option>
                <?  
                    }
                ?>
                </select>
            <p id="update_form">
                
            </p>
<table class="left_table"><tr><td>NAME</td><td> <input type="text" name="name"/></td></tr>
       <tr><td>RUPEES PER KILOMETRE</td><td>    <input type="number" name="rs_per_km" maxlength="3" size="1"/></td></tr>
       <tr><td>CAPACITY</td><td>                <input type="number" name="capacity" maxlength="2" size="1"/></td></tr>
       <tr><td>COMPANY</td><td>                 <input type="text" name="company"/></td></tr>
       <tr><td>TOTAL CARS</td><td>              <input type="number" name="total" maxlength="3" size="1"/></td></tr> 
       <tr><td></td><td align="center">         <input type="submit" value="UPDATE" onclick="add_car();"/></td></tr>
</table>
</form>            
            </div>
            
            <div id="add_admin_slide">
                <form name="add_admin">
<table class="left_table"><tr><td>USERNAME</td><td>             <input type="text" name="user"/></td></tr>
                          <tr><td>E-MAIL ADDRESS</td><td>       <input type="text" name="mail"/></td></tr>                
                          <tr><td></td><td>                     <input type="button" value="ADD ADMIN" onclick="add__admin();"/></td></tr>
</table>
                </form>
            </div>
            
            <div id="change_password_slide">
                <form name="change_password">
<table class="left_table"><tr><td>CURRENT PASSWORD</td><td>             <input type="password" name="cpass"/></td></tr>
       <tr><td>CONFIRM CURRENT PASSWORD</td><td>       <input type="password" name="ccpass"/></td></tr>                
       <tr><td>NEW PASSWORD</td><td>       <input type="password" name="npass"/></td></tr>
       <tr><td></td><td>                     <input type="button" value="CONFIRM" onclick="change__password();"/></td></tr>
</table>
                </form>
            </div>
            
            <div id="contact_slide">
                <form name="contact">
<table class="left_table"><tr><td>CENTRE MANAGER NAME    </td><td>       <input type="text" name="manager"/></td></tr>
                          <tr><td>CITY                   </td><td>       <input type="text" name="city"/></td></tr>                
                          <tr><td>COMPLETE POSTAL ADDRESS</td><td>       <textarea name="address"/></textarea></td></tr>
                          <tr><td>PIN                    </td><td>       <input type="text" name="pin" maxlength="10"/></td></tr>
                          <tr><td>CONTACT NUMBER         </td><td>       <input type="text" name="contact_no" maxlength="10"></td></tr>
                          <tr><td></td><td>                              <input type="button" value="CONFIRM" onclick="add__contact();"/></td></tr>
</table>
                </form>
            </div>
            
            <div id="delcontact_slide" class="left_table">
                SELECT A CENTRE LOCATION
                <br>
                <select id="delcontact_id">
                <?
                    include 'dbinfo.php';
                    $query="select * from contact";
                    $result=mysql_query($query);
                    while($row=mysql_fetch_row($result))
                    {
                        ?>
                            <option value="<?echo $row[0];?>"><?echo $row[3]." ".$row[2]." - ".$row[1];?></option>
                        <?
                    }
                ?>
                </select>
                <br>
                <br>
                <input type="submit" value="CONFIRM DELETE" onclick="del__contact();"/>
            </div>
            
            </TD>
            <TD valign="top" id="right">    
                <h3 align="center">CAR DISPLAY IMAGES MANAGEMENT</h3>
            <form name="add_car_picture" method="POST" action="add_car_picture.php" enctype="multipart/form-data">
            ENTER THE NAME OF THE CAR :
            <select name="car" onchange="pictures_show();">
                <?
                    include 'dbinfo.php';
                    $result=mysql_query("select Name from car_models");
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
                    var car=document.add_car_picture.car.value;
                    var xmlhttp=new XMLHttpRequest();
                    xmlhttp.onreadystatechange= function()
                    {
                      if((xmlhttp.readyState==4)&&(xmlhttp.status==200))
                      {
                            document.getElementById('car_show').innerHTML=xmlhttp.responseText;
                      }      
                    }
                    xmlhttp.open("GET","pictures_no.php?car="+car+"&auth=1",true);
                    xmlhttp.send();            
                }
                pictures_show();
            </script>
            <br>   
            <br>
            ENTER THE NUMBER OF PICTURES YOU WANT TO UPLOAD   
            <input type="number" name="num"/>
            <input type="button" value="DONE" onclick="upload_form();"/>
            <script type="text/javascript">
                function upload_form()
                {
                    if(document.add_car_picture.num.value>10)
                        {
                            alert("YOU CAN ONLY ADD A MAXIMUM OF 10 PICTURES");
                        }
                    else
                        {
                            document.getElementById('form').innerHTML="<br>PICTURE 1 :<input type='file' name='picture1'/>";
                            for(var i=2;i<=document.add_car_picture.num.value;i++)
                                {
                                    document.getElementById('form').innerHTML+="<br>PICTURE "+i+" :<input type='file' name='picture"+i+"'/>";
                                }
                            document.getElementById('form').innerHTML+="<br><br><input type='submit' value='UPLOAD'/>";
                        }
                }
            </script>
                   [MAXIMUM 10]
                   <p id="form">
                       
                   </p>
        </form>
        </TD>
        </TR>
        </TABLE>   
                   <div align="center"><a href="" onclick="return full_report();">CLICK HERE TO GENERATE A REPORT OF ALL THE BOOKINGS</a><br>OR<br>
                                       <table><tr><td><b style="color:red;">SEARCH BY CUSTOMER NAME</b></td><td><input style="color:green;" type="text" value="ENTER A KEY-WORD" onblur="unblank();" onclick="blank();" onkeyup="suggest();" id="search_report"/></td><td><input type="button" value="SEARCH NOW" onclick="search_report();"/></td></tr>
                                              <tr><td></td><td id="suggest"></td><td></td></tr>
                                       </table>
                   </div>
                   <p id="report" align="center">
                       
                   </p>
    </body>
</html>
<script type="text/javascript">
    function full_report()
    {
                    var xmlhttp=new XMLHttpRequest();
                    xmlhttp.onreadystatechange= function()
                    {
                      if((xmlhttp.readyState==4)&&(xmlhttp.status==200))
                      {
                            document.getElementById('report').innerHTML=xmlhttp.responseText;
                      }      
                    }
                    xmlhttp.open("GET","report_retrieve.php?name=",true);
                    xmlhttp.send();
                    return false;
    }
    function search_report()
    {
                    var xmlhttp=new XMLHttpRequest();
                    xmlhttp.onreadystatechange= function()
                    {
                      if((xmlhttp.readyState==4)&&(xmlhttp.status==200))
                      {
                            document.getElementById('report').innerHTML=xmlhttp.responseText;
                      }      
                    }
                    var name=document.getElementById('search_report').value;
                    xmlhttp.open("GET","report_retrieve.php?name="+name,true);
                    xmlhttp.send();
    }
</script>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
    $("#add_slide").hide();
    $("#delete_slide").hide();
    $("#update_slide").hide();
    $("#add_admin_slide").hide();
    $("#change_password_slide").hide();
    $("#contact_slide").hide();
    $("#delcontact_slide").hide();
        
        $("#add_button").click(function(){
         $("#add_slide").slideDown();
         $("#delete_slide").slideUp();
         $("#update_slide").slideUp();
         $("#add_admin_slide").slideUp();
         $("#change_password_slide").slideUp();
         $("#contact_slide").slideUp();
         $("#delcontact_slide").slideUp();
});
        $("#delete_button").click(function(){
         $("#delete_slide").slideDown();
         $("#add_slide").slideUp();
         $("#update_slide").slideUp();
         $("#add_admin_slide").slideUp();
         $("#change_password_slide").slideUp();
         $("#contact_slide").slideUp();
         $("#delcontact_slide").slideUp();
});
        $("#update_button").click(function(){
         update__car();
         $("#update_slide").slideDown();
         $("#add_slide").slideUp();
         $("#delete_slide").slideUp();
         $("#add_admin_slide").slideUp();
         $("#change_password_slide").slideUp();
         $("#contact_slide").slideUp();
         $("#delcontact_slide").slideUp();
}); 
        $("#add_admin_button").click(function(){
         update__car();
         $("#add_admin_slide").slideDown();
         $("#add_slide").slideUp();
         $("#delete_slide").slideUp();
         $("#update_slide").slideUp();
         $("#change_password_slide").slideUp();
         $("#contact_slide").slideUp();
         $("#delcontact_slide").slideUp();
}); 
        $("#change_password_button").click(function(){
         update__car();
         $("#change_password_slide").slideDown();
         $("#add_slide").slideUp();
         $("#delete_slide").slideUp();
         $("#update_slide").slideUp();
         $("#add_admin_slide").slideUp();
         $("#contact_slide").slideUp();
         $("#delcontact_slide").slideUp();
}); 
        $("#contact_button").click(function(){
         update__car();
         $("#contact_slide").slideDown();
         $("#add_slide").slideUp();
         $("#delete_slide").slideUp();
         $("#update_slide").slideUp();
         $("#add_admin_slide").slideUp();
         $("#change_password_slide").slideUp();
         $("#delcontact_slide").slideUp();
}); 
        $("#delcontact_button").click(function(){
         $("#delcontact_slide").slideDown();
         $("#delete_slide").slideUp();
         $("#update_slide").slideUp();
         $("#add_admin_slide").slideUp();
         $("#change_password_slide").slideUp();
         $("#contact_slide").slideUp();
         $("#add_slide").slideUp();
});
</script>
<input type="button" value="SIGN OUT" onclick="logout();"/>
<script type="text/javascript">
    function logout()
    {
        window.location="admin_logout.php";
    }
</script>