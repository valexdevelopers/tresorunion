<?php 
include "connect.php";

 if(!isset($_SESSION)) {
      session_start();
 } 
   $id= $_SESSION['loggedIn_cust_id'] ;
 
 if (isset($_GET['sessionExpired'])) {
     
   $sql0 =  "SELECT * FROM activity WHERE id='$id' ";
    $result = $conn->query($sql0);
    $row = $result->fetch_assoc();
    
     if (($result->num_rows) > 0) {
         $current = $row["current_login"];
          
       $sql2= "UPDATE activity SET last_login ='$current' WHERE id='$id'" ;
                 if($conn->query($sql2)){
     
       unset ($_SESSION['loggedIn_cust_id']);
        unset ($_SESSION['id']);
         session_destroy();
        header("location:https://helsinkiop.com/session_expired.php");
     }else{
        unset ($_SESSION['loggedIn_cust_id']);
        unset ($_SESSION['id']);
         session_destroy();
        header("location:https://helsinkiop.com/session_expired.php");
     }
         
     }
     
    

    
        
    }
    else {
        
        $sql0 =  "SELECT * FROM activity WHERE cust_id='$id' ";
    $result = $conn->query($sql0);
    $row = $result->fetch_assoc();
    
     if (($result->num_rows) > 0) {
         $current = $row["current_login"];
          
       $sql2= "UPDATE activity SET last_login ='$current' WHERE cust_id='$id'" ;
                 if($conn->query($sql2)){
     
       unset ($_SESSION['loggedIn_cust_id']);
        unset ($_SESSION['id']);
         session_destroy();
        header("location:https://swissinternationalplc.com/login.php");
     }else{
        unset ($_SESSION['loggedIn_cust_id']);
        unset ($_SESSION['id']);
         session_destroy();
        header("location:https://swissinternationalplc.com/login.php");
     }
         
     }
            
    }
    
 
 
 
?>