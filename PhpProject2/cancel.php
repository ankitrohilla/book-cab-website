<html>
    <head>
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
            table
            {
                color:black;
                font-weight: bolder;                
                border-width: thick;
                border-color: green;
                background-image: url('images/taxi3.jpg');
                background-size: contain;
                border-radius: 10;
                opacity: 0.7;
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
</style>
<script type="text/javascript">
    function show_bill()
    {
                    var xmlhttp=new XMLHttpRequest();
                    xmlhttp.onreadystatechange= function()
                    {
                      if((xmlhttp.readyState==4)&&(xmlhttp.status==200))
                      {
                            document.getElementById('show').innerHTML=xmlhttp.responseText;
                      }      
                    }
                    var id=document.getElementById('id').value;
                    xmlhttp.open("GET","cancel_bill.php?ID="+id,true);
                    xmlhttp.send();
    }
    function check()
    {
        if(document.getElementById('id').value=="")
            {
                alert("PLEASE ENTER YOUR BOOKING ID");
                return;
            }
            
        var c=confirm("ARE YOU SURE YOU WANT TO PROCEED?");
        if(c==false)
            {
                return;
            }
                    var xmlhttp=new XMLHttpRequest();
                    xmlhttp.onreadystatechange= function()
                    {
                      if((xmlhttp.readyState==4)&&(xmlhttp.status==200))
                      {
                            document.getElementById('passcode').innerHTML=xmlhttp.responseText;
                      }      
                    }
                    var id=document.getElementById('id').value;
                    xmlhttp.open("GET","cancel_check.php?id="+id,true);
                    xmlhttp.send();      
    }
</script>
        <div align="center"><img class="heading" src="images/taxi2.jpg" style="height:100;width: 300;" align="center"/></div>
        <img src="images/go back.jpg" style="height:90;" onclick="window.location='home.php'" id="back"/>
        <br>
        <h2 ALIGN="center">CANCELLATION</h5>
    </head>
    <body align="center">
        <form action="cancel_done.php">
        <p align="center">ENTER YOUR BOOKING ID : <input type="number" NAME="id" id="id"/><br><br><input value="SHOW BILL DETAILS" type="button" onclick="show_bill();"/><br><br><input value="CONFIRM CANCELLATION" type="button" onclick="check();"/></p>
        
        <p id="passcode" align="center"></p>
        
        </form>
        <p id="show">
        </p>
    </body>
</html>
<?php
    
?>
