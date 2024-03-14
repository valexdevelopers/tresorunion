

<?php


 include "connect.php";
 
 
$sql = "SHOW TABLES LIKE 'partialtransfer".$id."'";
$resultT = $conn->query($sql);
    if($resultT->num_rows > 0) {
       
       echo "yeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeesssssssssss";
    }else{
        echo "noooooooooooooooooooooo";
       
    }

  $redirect= "window.location.replace('https://ohanapacifics.com/')";
         
   echo "<script type='text/javascript'>$redirect;</script>";

?>