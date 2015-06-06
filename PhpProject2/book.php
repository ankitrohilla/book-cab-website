<div align="center"><img class="heading" src="images/taxi2.jpg" style="height:100;width: 300;" align="center"/></div>
<br>
<img src="images/go back.jpg" style="height:90;" onclick="window.location='home.php'" id="back"/>
<br>
<br>
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
                text-shadow: 0px 0px 10px green;
            }
</style>
<?
    include 'dbinfo.php';
    $car=$_GET['name'];
    $result=mysql_query("select * from car_models where Name='$car'") or die("BHASAD");
    $row=mysql_fetch_row($result);
    for($i=1;$i<=$row[5];$i++)
    {
        echo "<img border='2' height='200' width='300' src='images/".$car.$i.".jpeg'/>    ";
    }
   
?>
<html>
    <head>
        <title></title>
        <style type="text/css">
            #payment
            {
                font-family: monospace;
            }
        </style>
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript">
            var again=0;
            var flag_payment="f";
            var ac=0;
            function credit()
            {
                flag_payment="c";
                document.getElementById('payment').innerHTML="\n\
<table><tr><td> Select card-type</td><td>                   :<input type='radio' name='type' value='Visa'>Visa\n\
                                                            <input type='radio' name='type' value='Master Card'>Master Card\n\
                                                            <input type='radio' name='type' value='American Express'>American Express</td></tr>\n\
                                                            \n\
<tr><td>        Card holder name</td><td>                   :<input type='text' name='cardholder_name' id='cardholder_name'/></td></tr>\n\
                                                            \n\
<tr><td>        Expiry date mentioned on the card</td><td>  :<input type='text' name='expiry_month' size='1' maxlength='2'/>\n\
                                                            <input type='text' name='expiry_year' size='2' maxlength='4'/><span id='exp'>(MM/YYYY)</span></td></tr>\n\
                                                            \n\
<tr><td>        Card number (16 digits)</td><td>            :<input type='text' name='card_number1' size='2' maxlength='4'/>\n\
                                                            <input type='text' name='card_number2' size='2' maxlength='4'/>\n\
                                                            <input type='text' name='card_number3' size='2' maxlength='4'/>\n\
                                                            <input type='text' name='card_number4' size='2' maxlength='4' id='card_number'/></td></tr>\n\
                                                            \n\
<tr><td>        CVV number on the back of the card</td><td> :<input name='cvv' type='password' size='2' maxlength='3' id='cvv'/></td><td>\n\
                                                            <img src='images/cvv.jpeg' height='150'/></td></tr>\n\
</table>";
            }
            function debit()
            {
                flag_payment="d";
                document.getElementById('payment').innerHTML="\n\
<table><tr><td> Select bank</td><td>                        <input type='radio' name='type' value='Indian Bank'>Indian Bank\n\
                                                        <br><input type='radio' name='type' value='Bank of Baroda'>Bank of Baroda\n\
                                                        <br><input type='radio' name='type' value='State Bank of India'>State Bank of India</td><td>\n\
                                                            <input type='radio' name='type' value='Axis Bank'>Axis Bank                \n\
                                                        <br><input type='radio' name='type' value='HDFC Bank'>HDFC Bank            \n\
                                                        <br><input type='radio' name='type' value='ICICI Bank'>ICICI Bank</td><td>        \n\
                                                            <input type='radio' name='type' value='Andhra Bank'>Andhra Bank\n\
                                                        <br><input type='radio' name='type' value='Indian Overseas Bank'>Indian Overseas Bank     \n\
                                                        <br><input type='radio' name='type' value='Bank of India'>Bank of India</td><td>            \n\
                                                            <input type='radio' name='type' value='Kotak Mahindra'>Kotak Mahindra                \n\
                                                        <br><input type='radio' name='type' value='Canara Bank'>Canara Bank\n\
                                                        <br><input type='radio' name='type' value='Reserve Bank of India'>Reserve Bank of India</td></tr>       \n\
              \n\
<tr><td>        Card holder name</td><td>                   :<input type='text' name='cardholder_name' id='cardholder_name'/></td></tr>\n\
                                                            \n\
<tr><td>        Expiry date of card</td><td>                :<input type='text' name='expiry_month' size='1' maxlength='2'/>\n\
                                                            <input type='text' name='expiry_year' size='2' maxlength='4'/><span id='exp'>(MM/YYYY)</span></td></tr>\n\
                                                            \n\
<tr><td>        Card number (16 digits)</td><td>            :<input type='text' name='card_number1' size='2' maxlength='4'/>\n\
                                                            <input type='text' name='card_number2' size='2' maxlength='4'/>\n\
                                                            <input type='text' name='card_number3' size='2' maxlength='4'/>\n\
                                                            <input type='text' name='card_number4' size='2' maxlength='4' id='card_number'/></td></tr>\n\
                                                            \n\
<tr><td>        CVV number of card</td><td>                 :<input name='cvv' type='password' size='2' maxlength='3' id='cvv'/></td><td>\n\
                                                            <img src='images/cvv.jpeg' height='100'/></td></tr>\n\
</table>";
            }
            
        function distance()
            {
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.onreadystatechange= function()
                {
                    if((xmlhttp.readyState==4)&&(xmlhttp.status==200))
                    {
                          document.getElementById('distance').innerHTML=xmlhttp.responseText;
                    }      
                }
                var from=document.getElementById('from').value;
                var to=document.getElementById('to').value;
                var car=document.getElementById('car').value;
                xmlhttp.open("GET","distance_retrieve.php?from="+from+"&to="+to+"&car="+car,true);
                xmlhttp.send();   
            }
            function ac_change()
            {
                ac=1;
            }
            function check()
            {
                var flag_check=0;
                if(flag_payment=="f")
                    {
                        alert("PLEASE SELECT A PAYMENT OPTION");
                        
                        return false;
                    }
                var from=document.getElementById('from').value;
                var to=document.getElementById('to').value;
                if(from==to)
                    {
                        $('#to').after("<span style='color:red; font-family:monospace; font-size:15px;'>   INVALID DESTINATION</span>");
                        flag_check=1;
                    }
                var name=document.book.name.value;
                if(name=="")
                    {
                        $('#name').after("<span style='color:red; font-family:monospace; font-size:15px;'>   FIELD REQUIRED</span>");
                        flag_check=1;
                    }
                for(var i in name)
                    {
                          var c=name.charCodeAt(i);
                          if(!(((64<c)&&(c<91))||((91<c)&&(c<123))||(c==32)))
                          {
                              $('#name').after("<span style='color:red; font-family:monospace; font-size:15px;'>   ONLY ALPHABETS ACCEPTED</span>");
                              flag_check=1;
                          }
                    }
                var mail=document.book.mail.value;
                if(mail=="")
                    {
                        $('#mail').after("<span style='color:red; font-family:monospace; font-size:15px;'>   FIELD REQUIRED</span>");
                        flag_check=1;
                    }
                else
                {
                var mflag=0;
                for(var i in mail)
                    {
                          if(mail[i]=="@")
                              {
                                  mflag++;
                              }
                          if(mail[i]==".")
                              {
                                  mflag++;
                              }
                    }
                    if(mflag<2)
                    {
                        $('#mail').after("<span style='color:red; font-family:monospace; font-size:15px;'>   EXAMPLE - abc@xyz.com</span>");
                        flag_check=1;
                    }
                }
                var h=document.book.hour.value;
                var m=document.book.minute.value;
                if((m>60)||(h>12))
                {
                    $('#date_time').after("<span style='color:red; font-family:monospace; font-size:15px;'>   PLEASE ENTER A VALID TIME</span>");
                    flag_check=1;
                }
                if(ac==0)
                {
                    $('#ac').after("<span style='color:red; font-family:monospace; font-size:15px;'>   FIELD REQUIRED</span>");
                    flag_check=1;
                }
                var cont=document.book.contact_no.value;
                if(cont=="")
                {
                    $('#contact_no').after("<span style='color:red; font-family:monospace; font-size:15px;'>   FIELD REQUIRED</span>");
                    flag_check=1;
                }
                for(var i in cont)
                    {
                          var c=cont.charCodeAt(i);
                          if((c<48)||(c>57))
                          {
                              $('#contact_no').after("<span style='color:red; font-family:monospace; font-size:15px;'>   ONLY 0-9 ACCEPTED</span>");
                              flag_check=1;
                          }
                    }
                var pin=document.book.PIN.value;
                if(pin=="")
                {
                    $('#pin').after("<span style='color:red; font-family:monospace; font-size:15px;'>   FIELD REQUIRED</span>");
                    flag_check=1;
                }
                for(var i in pin)
                    {
                          var c=pin.charCodeAt(i);
                          if((c<48)||(c>57))
                          {
                              $('#pin').after("<span style='color:red; font-family:monospace; font-size:15px;'>   ONLY 0-9 ACCEPTED</span>");
                              flag_check=1;
                          }
                    }
                var add=document.book.address.value;
                if(add=="")
                {
                              $('#address').after("<span style='color:red; font-family:monospace; font-size:15px;'>   FIELD REQUIRED</span>");
                              flag_check=1;
                }
                var cardholder_name=document.book.cardholder_name.value;
                if(cardholder_name=="")
                    {
                        $('#cardholder_name').after("<span style='color:red; font-family:monospace; font-size:15px;'>   FIELD REQUIRED</span>");
                        flag_check=1;
                    }
                for(var i in cardholder_name)
                    {
                          var c=cardholder_name.charCodeAt(i);
                          if(!(((64<c)&&(c<91))||((91<c)&&(c<123))||(c==32)))
                          {
                              $('#cardholder_name').after("<span style='color:red; font-family:monospace; font-size:15px;'>   ONLY ALPHABETS ACCEPTED</span>");
                              flag_check=1;
                          }
                    }
                var c1=document.book.card_number1.value;
                var c2=document.book.card_number2.value;
                var c3=document.book.card_number3.value;
                var c4=document.book.card_number4.value;
                if((c1.length<4)||(c2.length<4)||(c3.length<4)||(c4.length<4))
                {
                    $('#card_number').after("<span style='color:red; font-family:monospace; font-size:15px;'>   FIELD REQUIRED</span>");
                    flag_check=1;
                }
                for(var i in c1)
                    {
                          var c=c1.charCodeAt(i);
                          if((c<48)||(c>57))
                          {
                              alert("PLEASE ENTER A VALID CARD NUMBER");
                              flag_check=1;
                          }
                    }
                for(var i in c2)
                    {
                          var c=c2.charCodeAt(i);
                          if((c<48)||(c>57))
                          {
                              alert("PLEASE ENTER A VALID CARD NUMBER");
                              flag_check=1;
                          }
                    }
                    for(var i in c3)
                    {
                          var c=c3.charCodeAt(i);
                          if((c<48)||(c>57))
                          {
                              alert("PLEASE ENTER A VALID CARD NUMBER");
                              flag_check=1;
                          }
                    }
                    for(var i in c4)
                    {
                          var c=c4.charCodeAt(i);
                          if((c<48)||(c>57))
                          {
                              alert("PLEASE ENTER A VALID CARD NUMBER");
                              flag_check=1;
                          }
                    }
                var cvv=document.book.cvv.value;
                if(cvv.length<3)
                {
                    $('#cvv').after("<span style='color:red; font-family:monospace; font-size:15px;'>   FIELD REQUIRED</span>");
                    flag_check=1;
                }
                for(var i in cvv)
                    {
                          var c=cvv.charCodeAt(i);
                          if((c<48)||(c>57))
                          {
                              $('#cvv').after("<span style='color:red; font-family:monospace; font-size:15px;'>   ONLY 0-9 ACCEPTED</span>");
                              flag_check=1;
                          }
                    }    
                    var exp_month=document.book.expiry_month.value;
                    var exp_year=document.book.expiry_year.value;
                    if((exp_month>12)||(exp_year>2099)||(exp_year<2000))
                        {
                            $('#exp').after("<span style='color:red; font-family:monospace; font-size:15px;'> INVALID ENTRY</span>");
                            flag_check=1;
                        }
                    if(flag_check==1)
                    {
                        if(again==1)
                            {
                                alert("PLEASE FILL THE FORM PROPERLY");
                                window.location.reload();
                            }
                            again=1;
                        return false;
                    }
            }           
        </script>
    </head>
    <body>
        <br>
        <form name="book" action="payment.php" method="POST">
                      <input id="car" name="car" type="hidden" value="<?echo $car?>"/>
        Leaving from :<select id="from" name="from" onchange="distance();">
                            <?
                            include 'dbinfo.php';
                            $result=mysql_query("select Locations from distance order by`Locations`");
                            while($row=mysql_fetch_row($result))
                            {
                                ?>
                                <option value="<?echo $row[0]?>"><?echo $row[0]?></option>
                                <?
                            }
                            ?>
                      </select>
        Going to     :<select id="to" name="to" onchange="distance();">
                            <?
                            include 'dbinfo.php';
                            $result=mysql_query("select Locations from distance order by`Locations`");
                            while($row=mysql_fetch_row($result))
                            {
                                ?>
                                <option value="<?echo $row[0]?>"><?echo $row[0]?></option>
                                <?
                            }
                            ?>
                      </select>
        <div id="distance"></div>
        <table>
<tr><td>        Enter your name</td><td>       <input type="text" name="name" id="name"/></td></tr>
<tr><td>        Enter your age</td><td>        
                                   <select name="age" id="age">
                                   <? for($i=18;$i<=100;$i++)
                                   {
                                       ?><option value="<?echo $i?>"><?echo $i?></option><?
                                   }
                                   ?>
                                   </select></td></tr>
<tr><td>        Enter your e-mail address</td><td>
                                               <input type="text" name="mail" id="mail"/></td></tr> 
<tr><td>        Select one</td><td>            <input type="radio" name="ac" value="Yes" onclick="ac_change();"/><span>AC</span>
                                             or<input type="radio" name="ac" value="No" onclick="ac_change();"/><span id="ac">NON AC</span></td></tr>
<tr><td>        Enter date and time of departure</td><td> 
                                   <select name="date">
                                   <? for($i=1;$i<=31;$i++)
                                   {
                                       ?><option value="<?echo $i?>"><?echo $i?></option><?
                                   }
                                   ?>
                                   </select>
                                  /<select name="month">
                                   <? for($i=1;$i<=12;$i++)
                                   {
                                       ?><option value="<?echo $i?>"><?echo $i?></option><?
                                   }
                                   ?>
                                   </select>
                                  /<select name="year">
                                   <? for($i=2012;$i<=2020;$i++)
                                   {
                                       ?><option value="<?echo $i?>"><?echo $i?></option><?
                                   }
                                   ?>
                                   </select>
                         (DD/MM/YY)</td></tr>
<tr><td></td>            
            
                               <td><input type="number" name="hour" maxlength="2" size="1" value="0"/>
                                  :<input type="number" name="minute" maxlength="2" size="1" value="0"/>
                                   <select name="A">
                                       <option value="AM">AM</option>
                                       <option value="PM">PM</option>
                                   </select>
<span id="date_time">(hh:mm)</span></td></tr>
<tr><td>        Enter your complete postal address</td><td>
                                  <br><textarea name="address" id="address"></textarea></td></tr>
<tr><td>        PIN</td><td>      <input type="number" name="PIN" id="pin" maxlength="10"/></td></tr>
<tr><td>        Enter your contact number</td><td>
                                  <input type="number" name="contact_no" maxlength="10" id="contact_no"/></td></tr>
<tr><td>        Select your payment option</td><td>
                                  <input type="radio" name="payment" value="Credit card" onclick="credit();"/>CREDIT CARD
                                  <input type="radio" name="payment" value="Debit card"  onclick="debit();"/>DEBIT CARD</td></tr>
        </table>
        <span id="payment">
        </span>
        <br>
        <input type="submit" value="BOOK NOW" onclick="return check();"/>
        </form>
    </body>
</html>
<?php
    include 'dbinfo.php';
    $car=$_GET['name'];
    $result=mysql_query("select * from car_models where Name='$car'") or die("BHASAD");
    $row=mysql_fetch_row($result);
    echo "<br><list style='font-family : monospace ; font-size : 14'>";
    echo "<li>You are going to book a ".$row[4]." ".$row[1].".</li>";
    echo "<li>This car has a capacity of ".$row[3]." people (18+ in age).</li>";
    echo "<li>There are currently ".$row[7]." cars available for booking.</li>";
    echo "<li>You will be charged Rs.".$row[2]." per kilometre without AC.</li>";
    echo "<li>Extra charges applies for use of AC , please refer to our <a>TERMS AND CONDITIONS.</a></li>";
    echo "</list>";
?>