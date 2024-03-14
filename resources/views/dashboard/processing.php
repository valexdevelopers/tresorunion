<?php

 include "connect.php";
 include "session_timeout.php";
   session_cache_limiter('private');
   session_cache_expire(0); 
   
    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }


	 $id= $_SESSION['loggedIn_cust_id']; 
 $month = date(" d M Y" );
if(isset($_POST['premier'])){


	
	
	$Description = mysqli_real_escape_string($conn, $_POST["description"]);
	$pin = mysqli_real_escape_string($conn, $_POST["pin"]);
	$amount = mysqli_real_escape_string($conn, $_POST["amount"]);
	$reference = 'TRF3524784';
	$accountnumber = mysqli_real_escape_string($conn, $_POST["daccountnumber"]);
	$holder = mysqli_real_escape_string($conn, $_POST["holder"]);
    $newdes="Transfer to ".$holder. " - ".$accountnumber." ";

$sql0 = "SELECT * FROM customer WHERE cust_id='".$id."' AND pin='".$pin."' ";

    $result0 = $conn->query($sql0);
    $row0 = $result0->fetch_assoc();

if (($result0->num_rows) > 0) {
    
   $firstname = $row0["first_name"];
   
    
     $email1 = $row0["email"];
       $lastname = $row0["last_name"];
       $accountnumber = $row0["accountnumber"];
       
        $sql1 = "SELECT balance FROM passbook".$id." WHERE trans_id=(
                    SELECT MAX(trans_id) FROM passbook".$id.") ";
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch_assoc();
        $balance = $row1["balance"];
	 if($amount > $balance){
	     header("location:https://helsinkiop.com/dashboard/transfer.php?insufficientbalance=true");
	 }else{
	    $new_balance = $balance-$amount;
	     
	     $sql2 = "INSERT INTO passbook".$id." VALUES(
            NULL,
            NOW(),
            '$reference',
            '$newdes',
            'debit',
            '$amount',
            '$new_balance'

)"	;
if($conn->query($sql2)){
    
    
$subject1 = 'Transaction Notification Helsinki Op';
$from1 = 'Helsinki Op <customercare@helsinkiop.com>';
 
// To send HTML mail, the Content-type header must be set
$headers1  = 'MIME-Version: 1.0' . "\r\n";
$headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers1 .= 'From: Helsinki Op <customercare@helsinkiop.com>' ."\r\n".
    'Reply-To: '.$from1."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message1 = '<html><body style="padding: 0;margin: 0;"><div style="width:100%;margin: 0 auto;"><div style="width: 100%; border-bottom:1px solid black ;"><div style="background-color:purple;width:100%;margin:0 auto;border-bottom:1px solid black ;"> Helsinki Op</div>';
$message1 .= '<div style="width:100%;margin:20px auto; "> <img src="https://helsinkiop.com/why-us.jpg" style="width: 100%; height:100px;margin:0 auto;"></div></div>';

$message1 .= '<div style="width: 90%;margin:0 auto;"><h5 style="font-family:   serif;">Dear '.$firstname.' '.$lastname.',</h5><p style="font-family: -apple-system, BlinkMacSystemFont, Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;"> Please see below details of the transaction on your account.</p></div>';
$message1 .= '<div style="width:100%;margin:0 auto;font-family: -apple-system, BlinkMacSystemFont, Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;"><table style="width: 80%;margin:10px auto;border: 0.5px solid grey;"><tbody>';



$message1 .= '<tr style="background-color: rgba(224, 220, 220, 0.404);width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Account Number</td><td style="font-size:12px;">'.$accountnumber.'</td></tr>';
$message1 .= '<tr style="background-color: white;width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Effective Date</td><td style="font-size:12px;">'.$month.'</td></tr>';
$message1 .= '<tr style="background-color: rgba(224, 220, 220, 0.404);width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Currency</td><td style="font-size:12px;">USD</td></tr>';
$message1 .= '<tr style="background-color: white;width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Description</td><td style="font-size:12px;">'.$Description.'</td></tr>';
$message1 .= '<tr style="background-color: rgba(224, 220, 220, 0.404);width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Reference Code</td><td style="font-size:12px;">'.$reference.'</td></tr>';
$message1 .= '<tr style="background-color: white;width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Branch</td><td style="font-size:12px;">Head Office</td></tr>';
$message1 .= '<tr style="background-color: rgba(224, 220, 220, 0.404);width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Transaction Type</td><td style="font-size:12px;">Debit</td></tr>';
$message1 .= '<tr style="background-color: white;width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Date of Transaction</td><td style="font-size:12px;">'.$month.'</td></tr>';
$message1 .= '<tr style="background-color: rgba(224, 220, 220, 0.404);width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Amount</td><td style="font-size:12px;">'.$amount.'</td></tr>';
$message1 .= '<tr style="background-color: white;width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Current Balance</td><td style="font-size:12px;">'.$new_balance.'</td></tr>';
$message1 .= '<tr style="background-color: rgba(224, 220, 220, 0.404);width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Available Balance</td><td style="font-size:12px;">'.$new_balance.'</td></tr>';

        
$message1 .= '</tbody></table></div><div style="width: 90%;margin:0 auto ;"><p style="font-size:8px;"> <strong>Remember: </strong>Helsinki Op would NEVER call, SMS or e-mail requesting for your card details, PIN, token codes, mobile/internet banking login details or other account related information. Please DO NOT respond to such messages. </p><p style="font-size:8px;"> You can reach our 24/7 contact center on the details below, livechat us at <a href="https://helsinkiop.com">www.helsinkiop.com </a>or emails us at customercare@helsinkiop.com</p></div>';

$message1 .= '<div style="width: 90%;margin:0 auto;font-family:  Roboto, sans-serif;line-height:6px; font-size:12px;"><p>Thank you for banking with us.</p><p><a href="https://helsinkiop.com">www.helsinkiop.com </a></p></div>';
$message1 .= '<div style="width: 100%;margin:0 auto;"><p style="font-size:7px;color:grey;"><strong>DISCLAIMER: </strong>Any views of this e-mail are those of the sender except where the sender specifically states them to be that of Helsinki Op or its subsidiaries. The message and its attachments are for designated recipient(s) only and may contain privileged, proprietary and private information. If you have received it in error, kindly delete it and notify the sender immediately. Helsinki Op accepts no liability for any loss or damage resulting directly and indirectly from the transmission of this e-mail message.
</p></div>';
$message1 .= '</div></body></html>';
if(mail($email1, $subject1, $message1, $headers1)){
     
    header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
header('location:https://helsinkiop.com/dashboard/transfer_sucessful.php');
 
}else{
       header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
header('location:https://helsinkiop.com/dashboard/transfer_sucessful.php');
 
}
    
    
    
    
   
}else{
    header('Cache-Control: no-cache, must-revalidate');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
    header("location:https://helsinkiop.com/dashboard/transfer.php?transferfailed=true");
}
	 }
	
}else{
    header("location:https://helsinkiop.com/dashboard/transfer.php?incorrectpin=true");
}
}
if(isset($_POST['local'])){
	$Description = mysqli_real_escape_string($conn, $_POST["description"]);
	$pin = mysqli_real_escape_string($conn, $_POST["pin"]);
	$amount = mysqli_real_escape_string($conn, $_POST["amount"]);
	$reference = 'TRF3524784';
	$accountnumber = mysqli_real_escape_string($conn, $_POST["daccountnumber"]);
	$bank = mysqli_real_escape_string($conn, $_POST["bank"]);
	$address = mysqli_real_escape_string($conn, $_POST["address"]);
	$holder = mysqli_real_escape_string($conn, $_POST["holder"]);
	$newdes="InterBank Transfer to ".$holder. " - ".$accountnumber." ";

$sql0 = "SELECT * FROM customer WHERE cust_id='".$id."' AND pin='".$pin."' ";

    $result0 = $conn->query($sql0);
    $row0 = $result0->fetch_assoc();

if (($result0->num_rows) > 0) {
     $firstname = $row0["first_name"];
   $email1 = $row0["email"];
    
     
       $lastname = $row0["last_name"];
       $accountnumber = $row0["accountnumber"];
        $sql1 = "SELECT balance FROM passbook".$id." WHERE trans_id=(
                    SELECT MAX(trans_id) FROM passbook".$id.") ";
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch_assoc();
        $balance = $row1["balance"];
	 if($amount > $balance){
	     header("location:https://helsinkiop.com/dashboard/local_transfer.php?insufficientbalance=true");
	 }else{
	    $new_balance = $balance-$amount;
	     
	     $sql2 = "INSERT INTO passbook".$id." VALUES(
            NULL,
            NOW(),
            '$reference',
            '$newdes',
            'debit',
            '$amount',
            '$new_balance'

)"	;
if($conn->query($sql2)){
    
    
$subject1 = 'Transaction Notification Helsinki Op';
$from1 = 'Helsinki Op <customercare@helsinkiop.com>';
 
// To send HTML mail, the Content-type header must be set
$headers1  = 'MIME-Version: 1.0' . "\r\n";
$headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers1 .= 'From: Helsinki Op <customercare@helsinkiop.com>' ."\r\n".
    'Reply-To: '.$from1."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message1 = '<html><body style="padding: 0;margin: 0;"><div style="width:100%;margin: 0 auto;"><div style="width: 100%; border-bottom:1px solid black ;"><div style="background-color:purple;width:100%;margin:0 auto;border-bottom:1px solid black ;"> Helsinki Op</div>';
$message1 .= '<div style="width:100%;margin:20px auto; "> <img src="https://helsinkiop.com/why-us.jpg" style="width: 100%; height:100px;margin:0 auto;"></div></div>';

$message1 .= '<div style="width: 90%;margin:0 auto;"><h5 style="font-family:   serif;">Dear '.$firstname.' '.$lastname.',</h5><p style="font-family: -apple-system, BlinkMacSystemFont, Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;"> Please see below details of the transaction on your account.</p></div>';
$message1 .= '<div style="width:100%;margin:0 auto;font-family: -apple-system, BlinkMacSystemFont, Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;"><table style="width: 80%;margin:10px auto;border: 0.5px solid grey;"><tbody>';



$message1 .= '<tr style="background-color: rgba(224, 220, 220, 0.404);width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Account Number</td><td style="font-size:12px;">'.$accountnumber.'</td></tr>';
$message1 .= '<tr style="background-color: white;width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Effective Date</td><td style="font-size:12px;">'.$month.'</td></tr>';
$message1 .= '<tr style="background-color: rgba(224, 220, 220, 0.404);width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Currency</td><td style="font-size:12px;">USD</td></tr>';
$message1 .= '<tr style="background-color: white;width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Description</td><td style="font-size:12px;">'.$Description.'</td></tr>';
$message1 .= '<tr style="background-color: rgba(224, 220, 220, 0.404);width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Reference Code</td><td style="font-size:12px;">'.$reference.'</td></tr>';
$message1 .= '<tr style="background-color: white;width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Branch</td><td style="font-size:12px;">Head Office</td></tr>';
$message1 .= '<tr style="background-color: rgba(224, 220, 220, 0.404);width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Transaction Type</td><td style="font-size:12px;">Debit</td></tr>';
$message1 .= '<tr style="background-color: white;width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Date of Transaction</td><td style="font-size:12px;">'.$month.'</td></tr>';
$message1 .= '<tr style="background-color: rgba(224, 220, 220, 0.404);width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Amount</td><td style="font-size:12px;">'.$amount.'</td></tr>';
$message1 .= '<tr style="background-color: white;width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Current Balance</td><td style="font-size:12px;">'.$new_balance.'</td></tr>';
$message1 .= '<tr style="background-color: rgba(224, 220, 220, 0.404);width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Available Balance</td><td style="font-size:12px;">'.$new_balance.'</td></tr>';

        
$message1 .= '</tbody></table></div><div style="width: 90%;margin:0 auto ;"><p style="font-size:8px;"> <strong>Remember: </strong>Helsinki Op would NEVER call, SMS or e-mail requesting for your card details, PIN, token codes, mobile/internet banking login details or other account related information. Please DO NOT respond to such messages. </p><p style="font-size:8px;"> You can reach our 24/7 contact center on the details below, livechat us at <a href="https://helsinkiop.com">www.helsinkiop.com </a>or emails us at customercare@helsinkiop.com</p></div>';

$message1 .= '<div style="width: 90%;margin:0 auto;font-family:  Roboto, sans-serif;line-height:6px; font-size:12px;"><p>Thank you for banking with us.</p><p><a href="https://helsinkiop.com">www.helsinkiop.com </a></p></div>';
$message1 .= '<div style="width: 100%;margin:0 auto;"><p style="font-size:7px;color:grey;"><strong>DISCLAIMER: </strong>Any views of this e-mail are those of the sender except where the sender specifically states them to be that of Helsinki Op or its subsidiaries. The message and its attachments are for designated recipient(s) only and may contain privileged, proprietary and private information. If you have received it in error, kindly delete it and notify the sender immediately. Helsinki Op accepts no liability for any loss or damage resulting directly and indirectly from the transmission of this e-mail message.
</p></div>';
$message1 .= '</div></body></html>';
if(mail($email1, $subject1, $message1, $headers1)){
    
   header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
header('location:https://helsinkiop.com/dashboard/transfer_sucessful.php');
 
}else{
     
      header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
header('location:https://helsinkiop.com/dashboard/transfer_sucessful.php');
 
}
    
    
    
    
   
}else{
    header("location:https://helsinkiop.com/dashboard/local_transfer.php?transferfailed=true");
}
	 }
	
}else{
    header("location:https://helsinkiop.com/dashboard/local_transfer.php?incorrectpin=true");
}
}

if(isset($_POST['foreign'])){
	$Description = mysqli_real_escape_string($conn, $_POST["description"]);
	$pin = mysqli_real_escape_string($conn, $_POST["pin"]);
	$amount = mysqli_real_escape_string($conn, $_POST["amount"]);
	$reference = 'TRF3524784';
	$accountnumber = mysqli_real_escape_string($conn, $_POST["daccountnumber"]);
	$bank = mysqli_real_escape_string($conn, $_POST["bank"]);
	$address = mysqli_real_escape_string($conn, $_POST["address"]);
	$holder = mysqli_real_escape_string($conn, $_POST["holder"]);
	
	$country = mysqli_real_escape_string($conn, $_POST["country"]);
	$purpose = mysqli_real_escape_string($conn, $_POST["purpose"]);
	$newdes="InterBank Transfer to ".$holder. " - ".$accountnumber." ";

$sql0 = "SELECT * FROM customer WHERE cust_id='".$id."' AND pin='".$pin."' ";

    $result0 = $conn->query($sql0);
    $row0 = $result0->fetch_assoc();

if (($result0->num_rows) > 0) {
 
  $firstname = $row0["first_name"];
   
    $email1 = $row0["email"];
     
       $lastname = $row0["last_name"];
       $accountnumber = $row0["accountnumber"];
       
        $sql1 = "SELECT balance FROM passbook".$id." WHERE trans_id=(
                    SELECT MAX(trans_id) FROM passbook".$id.") ";
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch_assoc();
        $balance = $row1["balance"];
	 if($amount > $balance){
	     header("location:https://helsinkiop.com/dashboard/foreign_transfer.php?insufficientbalance=true");
	 }else{
	    $new_balance = $balance-$amount;
	     
	     $sql2 = "INSERT INTO passbook".$id." VALUES(
            NULL,
            NOW(),
            '$reference',
            '$newdes',
            'debit',
            '$amount',
            '$new_balance'

)"	;
if($conn->query($sql2)){
    
    
$subject1 = 'Transaction Notification Helsinki Op';
$from1 = 'Helsinki Op <customercare@helsinkiop.com>';
 
// To send HTML mail, the Content-type header must be set
$headers1  = 'MIME-Version: 1.0' . "\r\n";
$headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers1 .= 'From: Helsinki Op <customercare@helsinkiop.com>' ."\r\n".
    'Reply-To: '.$from1."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message1 = '<html><body style="padding: 0;margin: 0;"><div style="width:100%;margin: 0 auto;"><div style="width: 100%; border-bottom:1px solid black ;"><div style="background-color:purple;width:100%;margin:0 auto;border-bottom:1px solid black ;"> Helsinki Op</div>';
$message1 .= '<div style="width:100%;margin:20px auto; "> <img src="https://helsinkiop.com/why-us.jpg" style="width: 100%; height:40vh;margin:0 auto;"></div></div>';

$message1 .= '<div style="width: 90%;margin:0 auto;"><h5 style="font-family:   serif;">Dear '.$firstname.' '.$lastname.',</h5><p style="font-family: -apple-system, BlinkMacSystemFont, Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;"> Please see below details of the transaction on your account.</p></div>';
$message1 .= '<div style="width:100%;margin:0 auto;font-family: -apple-system, BlinkMacSystemFont, Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;"><table style="width: 80%;margin:10px auto;border: 0.5px solid grey;"><tbody>';



$message1 .= '<tr style="background-color: rgba(224, 220, 220, 0.404);width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Account Number</td><td style="font-size:12px;">'.$accountnumber.'</td></tr>';
$message1 .= '<tr style="background-color: white;width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Effective Date</td><td style="font-size:12px;">'.$month.'</td></tr>';
$message1 .= '<tr style="background-color: rgba(224, 220, 220, 0.404);width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Currency</td><td style="font-size:12px;">USD</td></tr>';
$message1 .= '<tr style="background-color: white;width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Description</td><td style="font-size:12px;">'.$Description.'</td></tr>';
$message1 .= '<tr style="background-color: rgba(224, 220, 220, 0.404);width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Reference Code</td><td style="font-size:12px;">'.$reference.'</td></tr>';
$message1 .= '<tr style="background-color: white;width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Branch</td><td style="font-size:12px;">Head Office</td></tr>';
$message1 .= '<tr style="background-color: rgba(224, 220, 220, 0.404);width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Transaction Type</td><td style="font-size:12px;">Debit</td></tr>';
$message1 .= '<tr style="background-color: white;width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Date of Transaction</td><td style="font-size:12px;">'.$month.'</td></tr>';
$message1 .= '<tr style="background-color: rgba(224, 220, 220, 0.404);width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Amount</td><td style="font-size:12px;">'.$amount.'</td></tr>';
$message1 .= '<tr style="background-color: white;width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Current Balance</td><td style="font-size:12px;">'.$new_balance.'</td></tr>';
$message1 .= '<tr style="background-color: rgba(224, 220, 220, 0.404);width: 100%;border-bottom: 1px solid black;"><td style="font-size:12px;justify-content:center;"> Available Balance</td><td style="font-size:12px;">'.$new_balance.'</td></tr>';

        
$message1 .= '</tbody></table></div><div style="width: 90%;margin:0 auto ;"><p style="font-size:8px;"> <strong>Remember: </strong>Helsinki Op would NEVER call, SMS or e-mail requesting for your card details, PIN, token codes, mobile/internet banking login details or other account related information. Please DO NOT respond to such messages. </p><p style="font-size:8px;"> You can reach our 24/7 contact center on the details below, livechat us at <a href="https://helsinkiop.com">www.helsinkiop.com </a>or emails us at customercare@helsinkiop.com</p></div>';

$message1 .= '<div style="width: 90%;margin:0 auto;font-family:  Roboto, sans-serif;line-height:6px; font-size:12px;"><p>Thank you for banking with us.</p><p><a href="https://helsinkiop.com">www.helsinkiop.com </a></p></div>';
$message1 .= '<div style="width: 100%;margin:0 auto;"><p style="font-size:7px;color:grey;"><strong>DISCLAIMER: </strong>Any views of this e-mail are those of the sender except where the sender specifically states them to be that of Helsinki Op or its subsidiaries. The message and its attachments are for designated recipient(s) only and may contain privileged, proprietary and private information. If you have received it in error, kindly delete it and notify the sender immediately. Helsinki Op accepts no liability for any loss or damage resulting directly and indirectly from the transmission of this e-mail message.
</p></div>';
$message1 .= '</div></body></html>';
if(mail($email1, $subject1, $message1, $headers1)){
  header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
header('location:https://helsinkiop.com/dashboard/transfer_sucessful.php');
 
}else{
     
   header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
header('location:https://helsinkiop.com/dashboard/transfer_sucessful.php');
 
   
}
    
    
    
    
   
}else{
    header("location:https://helsinkiop.com/dashboard/foreign_transfer.php?transferfailed=true");
}
	 }
	
}else{
    header("location:https://helsinkiop.com/dashboard/foreign_transfer.php?incorrectpin=true");
}
}

?>

