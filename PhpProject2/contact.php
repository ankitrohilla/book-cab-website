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
    </head>
    <body>
        <div align="center"><img class="heading" src="images/taxi2.jpg" style="height:100;width: 300;" align="center"/></div>
        <img src="images/go back.jpg" style="height:90;" onclick="history.back(-1)" id="back"/>
        <br>
        <h2 ALIGN="center">OUR LIST OF CENTRES WHERE YOU CAN DIRECTLY BOOK YOUR CAB</h5>
        <br>
        <?
            include 'dbinfo.php';
            $i=0;
            $result=mysql_query("select * from contact");
            echo "<table border='2' align='center'>";
            echo "<tr><th>Serial No.</th><th>Manager name</th><th>City</th><th>Address</th><th>PIN</th><th>Contact number</th></tr>";
            while($row=mysql_fetch_row($result))
            {
                $i++;
                echo "<tr><td>".$i."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</tr>";
            }
            echo "</table>";
        ?>
    </body>
</html>