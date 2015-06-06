<style type="text/css">
    body
    {
        background-color: black;
    }
</style>
<?php
     include 'dbinfo.php'; 
     $car=$_POST['car'];
     $result=mysql_query("select Pictures from car_models where Name='$car'");
     $row=mysql_fetch_row($result);
     $i=$row[0]+1;
     $count=$i-1;
     $num=($_POST['num'])+$i-1;
     $c=0;
     for($i;$i<=$num;$i++)
     {  
         $c++;
         $img=getimagesize($_FILES['picture'.$c]['tmp_name']);
         if(!$img[0])
         {
         
         }
         else if($_FILES['picture'.$c]['name']!="")
         {
            $count++;
            if($count>10)
            {
                ?>
                <script type="text/javascript">
                alert("YOUR UPLOAD REACHED MAXIMUM LIMIT[10] , PLEASE DELETE SOME PICTURES TO UPLOAD MORE");           
                window.location="admin.php";
                </script>
                <?
                $count--;
            }
            else
            {
                $temp=$_FILES['picture'.$c]['tmp_name'];
                move_uploaded_file($temp,"C:/xampp/htdocs/PhpProject2/images/".$car.$count.".jpeg") or die("ERROR UPLOADING");
            }
         }  
     }
     mysql_query("update car_models set Pictures='$count' where Name='$car'") or die("ERROR UPDATING PICTURE DATA");
?>
<script type="text/javascript">
    alert("SUCCESSFULLY UPLOADED");
    window.location="admin.php";
</script>