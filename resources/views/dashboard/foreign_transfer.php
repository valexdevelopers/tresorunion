<?php

 include "connect.php";
 include "session_timeout.php";    
    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }
    
    
    if(isset($_SESSION['loggedIn_cust_id'])){
    $id= $_SESSION['loggedIn_cust_id'];

if(isset($_GET['insufficientbalance'])){  
    $err= "Insuffiecient Balance in Funding account";
    echo "<script type='text/javascript'>alert('$err');</script>";
}


if(isset($_GET['unathourized'])){  
    $err= "Unauthorized Transaction";
    echo "<script type='text/javascript'>alert('$err');</script>";
}

if(isset($_GET['incorrectpin'])){  
    $err= "Incorrect pin";
    echo "<script type='text/javascript'>alert('$err');</script>";
}


if(isset($_GET['transferfailed'])){  
    $err= "Transfer Failed. An error occured. Try Again!";
    echo "<script type='text/javascript'>alert('$err');</script>";
}      

$sql23 = "SELECT * FROM admin WHERE cust_id=1 ";
    $result23 = $conn->query($sql23);
    $row23 = $result23->fetch_assoc();
$link = $row23["link"];




$sql0 = "SELECT * FROM customer WHERE cust_id=".$id;
    $result0 = $conn->query($sql0);
    $row0 = $result0->fetch_assoc();
$firstname = $row0["first_name"];
$lastname = $row0["last_name"];
$image_src2 = $row0['passport'];

if (($result0->num_rows) > 0) {
        $sql1 = "SELECT balance FROM passbook".$id." WHERE trans_id=(
                    SELECT MAX(trans_id) FROM passbook".$id.") ";
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch_assoc();
        $balance = $row1["balance"];

$sql11 = "SELECT * FROM activity WHERE id=".$id;
 $result11 = $conn->query($sql11);
    $row11 = $result11->fetch_assoc();
$last_login = $row11["last_login"];

$date = new DateTime($last_login);
$date = $date->format('l j, F Y, g:i a');

}
?>

<!DOCTYPE html><html>
<!-- Mirrored from light.pinsupreme.com/apps_bank.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Nov 2021 15:52:11 GMT -->
<head><title>Client Dashboard </title><meta charset="utf-8"><meta content="ie=edge" http-equiv="x-ua-compatible"><meta content="template language" name="keywords"><meta content="Tamerlan Soziev" name="author"><meta content="Admin dashboard html template" name="description"><meta content="width=device-width,initial-scale=1" name="viewport"><link href="favicon.png" rel="shortcut icon"><link href="apple-touch-icon.png" rel="apple-touch-icon"><link href="../fast.fonts.net/cssapi/487b73f1-c2d1-43db-8526-db577e4c822b.css" rel="stylesheet"><link href="bower_components/select2/dist/css/select2.min.css" rel="stylesheet"><link href="bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet"><link href="bower_components/dropzone/dist/dropzone.css" rel="stylesheet"><link href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet"><link href="bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet"><link href="bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet"><link href="bower_components/slick-carousel/slick/slick.css" rel="stylesheet"><link href="css/main5739.css?version=4.5.0" rel="stylesheet">
<style>

.top-bar .logo-w .logo-element1 {
    
    width: 26px;
    height: 26px;
    border-radius: 15px;
    position: relative;
    
    display: inline-block;
    vertical-align: middle;
    margin-right: 20px;
    -webkit-transition: all 0.2s ease;
    transition: all 0.2s ease;}
</style>
</head>
<body class="menu-position-side menu-side-left full-screen">
    <div class="all-wrapper solid-bg-all">
        
        <div class="top-bar color-scheme-bright">
            <div class="logo-w menu-size">
                <a class="logo" href="index.php">
                    
                    <div class="logo-label">Helsinki Op</div>
                </a></div><div class="fancy-selector-w">
                    <div class="fancy-selector-current">
                        <div class="fs-img">
                            <img alt="" src="img/card1.png">
                        </div>
                        <div class="fs-main-info">
                            <div class="fs-name">
                                Helsinki Op Platinum
                            </div>
                            <div class="fs-sub">
                                <span>Balance:</span>
                                <b style="color: white; font-weight: 900;font-size: 14px;">€<?php echo number_format($balance) ;?></b>
                            </div>
                        </div>
                        <div class="fs-extra-info">
                            <strong>5476</strong>
                            <span>ending</span>
                        </div>
                        <div class="fs-selector-trigger">
                            <i class="os-icon os-icon-arrow-down4"></i>
                        </div>
                    </div>
                    <div class="fancy-selector-options">
                        <div class="fancy-selector-option">
                            <div class="fs-img">
                                <img alt="" src="img/card2.png">
                            </div>
                            <div class="fs-main-info">
                                <div class="fs-name">Capital One Venture Card</div>
                                <div class="fs-sub">
                                    <span>Balance:</span>
                                    <b style="color: white; font-weight: 900;font-size: 14px;">€307</b>
                                </div>
                            </div>
                            <div class="fs-extra-info">
                                <strong>5971</strong><span>ending</span></div></div><div class="fancy-selector-option active"><div class="fs-img"><img alt="" src="img/card1.png"></div>
                                <div class="fs-main-info">
                                    <div class="fs-name">American Express Platinum</div><div class="fs-sub"><span>Balance:</span>
                                        <b style="color: white; font-weight: 900;font-size: 14px;">€5,111</b></div></div><div class="fs-extra-info"><strong>2523</strong><span>ending</span></div></div><div class="fancy-selector-option"><div class="fs-img"><img alt="" src="img/card3.png"></div><div class="fs-main-info"><div class="fs-name">CitiBank Preferred Credit</div><div class="fs-sub"><span>Balance:</span><b style="color: white; font-weight: 900;font-size: 14px;">€1,004</b></div></div><div class="fs-extra-info"><strong>6345</strong><span>ending</span></div></div>
                                        </div></div>
                                        <div class="top-menu-controls">
                                                                  
<div id="google_translate_element"><div class="skiptranslate goog-te-gadget" dir="ltr" style=""><div id=":0.targetLanguage"></div></div></div>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en'
        }, 'google_translate_element');
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                                            <div class="messages-notifications os-dropdown-trigger os-dropdown-position-left"><i class="os-icon os-icon-mail-14"></i><div class="new-messages-count"></div>
                                            </div>
                                <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-right"><i class="os-icon os-icon-ui-46"></i><div class="os-dropdown"><div class="icon-w"><i class="os-icon os-icon-ui-46"></i></div><ul><li><a href="profile.php"><i class="os-icon os-icon-ui-49"></i><span>Profile Settings</span></a></li>
                                                    <li><a href="account_statement.php"><i class="os-icon os-icon-ui-44"></i><span>My Invoices</span></a>
                                                    </li><li><a href="logout.php"><i class="os-icon os-icon-ui-15"></i><span>Logout</span></a></li></ul></div></div>
                                <div class="logged-user-w"><div class="logged-user-i"><div class="avatar-w"><img alt="" src="<?php echo $image_src2 ?>" ></div><div class="logged-user-menu color-style-bright"><div class="logged-user-avatar-info"><div class="avatar-w"><img alt="" src="<?php echo $image_src2 ?>" ></div>
                                <div class="logged-user-info-w"><div class="logged-user-name"><?php echo $firstname ." " .$lastname ;?>   </div><div class="logged-user-role">Account Holder</div>
                                
                                </div></div>
                                
                                <div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>

                                </div></div></div></div></div>
                                
                                
                                            
                                            
                                            
                                            <div class="layout-w"><div class="menu-mobile menu-activated-on-click color-scheme-dark">
                                                
                                                
                                                <div class="mm-logo-buttons-w"><a class="mm-logo" href="index.php"><span>Welcome Back! </span></a><div class="mm-buttons"><div class="content-panel-open"><div class="os-icon os-icon-grid-circles"></div></div><div class="mobile-menu-trigger"><div class="os-icon os-icon-hamburger-menu-1"></div></div></div></div>
                                            
                                            
                                            
                                            <div class="menu-and-user"><div class="logged-user-w"><div class="avatar-w"><img alt="" src="<?php echo $image_src2 ?>" ></div><div class="logged-user-info-w"><div class="logged-user-name"><?php echo $firstname ." " .$lastname ;?>   </div><div class="logged-user-role">Account Holder</div></div></div>
                                             <ul class="main-menu">
                                                <li class="">
                                                        <a href="index.php">
                                                            <div class="icon-w">
                                                                <div class="os-icon os-icon-layout"></div>
                                                            </div><span>Home</span></a></li>
                                                    <li class="">
                                                        <a href="account_statement.php">
                                                            <div class="icon-w">
                                                                <div class="os-icon os-icon-layers"></div>
                                                            </div><span>Account Statement</span>
                                                        </a>
                                                    </li>
                                                    <li class="sub-header"><span>Options</span></li>
                                                    <li class="">
                                                        <a href="transfer.php">
                                                            <div class="icon-w">
                                                                <div class="os-icon os-icon-package"></div>
                                                            </div><span>Fund Transfer</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="password.php">
                                                            <div class="icon-w">
                                                                <div class="os-icon os-icon-file-text"></div>
                                                            </div><span>Change Password</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="pin.php">
                                                            <div class="icon-w">
                                                                <div class="os-icon os-icon-life-buoy"></div>
                                                            </div>
                                                            <span>Change Pin</span>
                                                        </a>
                                                    </li>
                                                    <li class="sub-header"><span>Bills</span></li>
                                                    <li class="">
                                                        <a href="#">
                                                            <div class="icon-w">
                                                                <div class="os-icon os-icon-mail"></div>
                                                            </div><span>Scheduled Transfers</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#">
                                                            <div class="icon-w">
                                                                <div class="os-icon os-icon-users"></div>
                                                            </div>
                                                            <span>Payments Due</span>
                                                        </a>
                                                        
                                                    </li>
                                                    <li class="">
                                                        <a href="#">
                                                            <div class="icon-w">
                                                                <div class="os-icon os-icon-edit-32"></div>
                                                            </div><span>Bills</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="card.php">
                                                            <div class="icon-w">
                                                                <div class="os-icon os-icon-zap"></div>
                                                            </div>
                                                            <span>Cards</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="logout.php">
                                                            <div class="icon-w">
                                                                <div class="os-icon os-icon-grid"></div>
                                                            </div>
                                                            <span>Logout</span>
                                                        </a>
                                                        
                                                    </li>       
                                                            
                                                            
                                                            
                                                </ul>
                                            
                                            </div></div>
                                            
                                                         <div class="menu-w color-scheme-light color-style-transparent menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link">
                                                            <div class="logged-user-w avatar-inline"><div class="logged-user-i"><div class="avatar-w"><img alt="" src="<?php echo $image_src2 ?>" ></div><div class="logged-user-info-w"><div class="logged-user-name"><?php echo $firstname ." " .$lastname ;?>   </div><div class="logged-user-role">Account Holder</div></div>
                                                            <div class="logged-user-toggler-arrow"><div class="os-icon os-icon-chevron-down"></div></div><div class="logged-user-menu color-style-bright"><div class="logged-user-avatar-info"><div class="avatar-w"><img alt="" src="<?php echo $image_src2 ?>" ></div><div class="logged-user-info-w"><div class="logged-user-name"><?php echo $firstname ." " .$lastname ;?>   </div><div class="logged-user-role">Account Holder</div></div></div>
                                                            
                                                            
                                                            <div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>
                                                            <ul>
                                                                <li><a href="profile.php"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a></li>
                                            <li><a href="#"><i class="os-icon os-icon-others-43"></i><span>Notifications</span></a></li><li><a href="logout.php"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a></li>
                                            </ul>
                                            </div></div></div>
                                            
                                            
                                            
                                            <div class="menu-actions"><div class="messages-notifications os-dropdown-trigger os-dropdown-position-right"><i class="os-icon os-icon-mail-14"></i><div class="new-messages-count">1</div>
                                            
                                            <div class="os-dropdown light message-list"><ul><li><a href="upgrade.php"><div class="user-avatar-w"><img alt="" src="<?php echo $image_src2 ?>" ></div><div class="message-content"><h6 class="message-from"><?php echo $firstname ." " .$lastname ;?></h6><h6 class="message-title">Account Upgrade</h6></div></a></li>
                                            
                                           </ul></div></div>
                                                    
                                                    <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-right"><i class="os-icon os-icon-ui-46"></i><div class="os-dropdown"><div class="icon-w"><i class="os-icon os-icon-ui-46"></i></div><ul><li><a href="profile.php"><i class="os-icon os-icon-ui-49"></i><span>Profile Settings</span></a></li>
                                                    <li><a href="account_statement.php"><i class="os-icon os-icon-ui-44"></i><span>My Invoices</span></a>
                                                    </li><li><a href="logout.php"><i class="os-icon os-icon-ui-15"></i><span>Logout</span></a></li></ul></div></div>
                                                    
                                                    <div class="messages-notifications os-dropdown-trigger os-dropdown-position-right"><i class="os-icon os-icon-zap"></i>
                                                    
                                                    </div></div><div class="element-search autosuggest-search-activator"><input placeholder="Start typing to search..."></div><h1 class="menu-page-header">Page Header</h1>
                                                   <ul class="main-menu">
                                                        <li class="sub-header"><span>Overview</span></li>
                                                    
                                                <li class="">
                                                        <a href="index.php">
                                                            <div class="icon-w">
                                                                <div class="os-icon os-icon-layout"></div>
                                                            </div><span>Home</span></a></li>
                                                    <li class="">
                                                        <a href="account_statement.php">
                                                            <div class="icon-w">
                                                                <div class="os-icon os-icon-layers"></div>
                                                            </div><span>Account Statement</span>
                                                        </a>
                                                    </li>
                                                    <li class="sub-header"><span>Options</span></li>
                                                    <li class="">
                                                        <a href="transfer.php">
                                                            <div class="icon-w">
                                                                <div class="os-icon os-icon-package"></div>
                                                            </div><span>Fund Transfer</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="password.php">
                                                            <div class="icon-w">
                                                                <div class="os-icon os-icon-file-text"></div>
                                                            </div><span>Change Password</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="pin.php">
                                                            <div class="icon-w">
                                                                <div class="os-icon os-icon-life-buoy"></div>
                                                            </div>
                                                            <span>Change Pin</span>
                                                        </a>
                                                    </li>
                                                    <li class="sub-header"><span>Bills</span></li>
                                                    <li class="">
                                                        <a href="#">
                                                            <div class="icon-w">
                                                                <div class="os-icon os-icon-mail"></div>
                                                            </div><span>Scheduled Transfers</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#">
                                                            <div class="icon-w">
                                                                <div class="os-icon os-icon-users"></div>
                                                            </div>
                                                            <span>Payments Due</span>
                                                        </a>
                                                        
                                                    </li>
                                                    <li class="">
                                                        <a href="#">
                                                            <div class="icon-w">
                                                                <div class="os-icon os-icon-edit-32"></div>
                                                            </div><span>Bills</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="card.php">
                                                            <div class="icon-w">
                                                                <div class="os-icon os-icon-zap"></div>
                                                            </div>
                                                            <span>Cards</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="logout.php">
                                                            <div class="icon-w">
                                                                <div class="os-icon os-icon-grid"></div>
                                                            </div>
                                                            <span>Logout</span>
                                                        </a>
                                                        
                                                    </li>       
                                                            
                                                            
                                                            
                                                </ul>
                                                
                                            </div>
                                            <div class="content-w"><div class="content-i"><div class="content-box"><div class="element-wrapper compact pt-4"><h6 class="element-header">Financial Overview</h6><div class="element-box-tp">
                                                    <div class="row"><div class="col-lg-8 col-xxl-7"><div class="element-balances"><div class="balance  "><div class="balance-title">Total Balance</div><div class="balance-value"><span>€<?php echo number_format($balance) ;?></span><span class="trending trending-down-basic"><span>%12</span><i class="os-icon os-icon-arrow-2-down"></i></span></div><div 
class="balance-link"><a class="btn btn-link btn-underlined" href="#"><span>View Statement</span><i class="os-icon os-icon-arrow-right4"></i></a></div></div><div class="balance"><div class="balance-title">Credit Available</div><div class="balance-value">€1,800</div><div class="balance-link"><a class="btn btn-link btn-underlined" href="#"><span>Request Increase</span><i class="os-icon os-icon-arrow-right4"></i></a></div></div><div class="balance"><div class="balance-title">Due Today</div><div class="balance-value danger">€0</div><div class="balance-link"><a class="btn btn-link btn-underlined btn-gold" href="#"><span>Pay Now</span><i class="os-icon os-icon-arrow-right4"></i></a></div></div></div></div>
<div class="col-lg-4 col-xxl-5">
    <div class="element-wrapper">
        <h6 class="element-header">Support Agents</h6>
        <div class="element-box-tp">
            <div class="profile-tile">
                <a class="profile-tile-box" href="users_profile_small.html">
                    <div class="pt-avatar-w"><img alt="" src="<?php echo $image_src2 ?>" >
                    </div>
                    <div class="pt-user-name"><?php echo $firstname ." " .$lastname ;?> </div>
                </a>
                <div class="profile-tile-meta">
                    <ul>
                        <li>Login:<strong>Online Now</strong></li>
                        <li>Last Login:<strong><?php echo $date; ?></strong></li>
                        
                    </ul>
                    <div class="pt-btn">
                        <a class="btn btn-success btn-sm" href="#">Send Message</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>        </div>   

    
    <div class="row"><div class="col-sm-12"><div class="element-wrapper"><div class="element-box">
        
    <h5 class="form-header">Fund Transfers</h5>
        <div class="row spacious" >
            <div class="col-sm-3 get">
                <a href="intrabank.php"style="border:none; width:100%" >
                <div class="bordered-one">
                    <div class="os-icon os-icon-mail" style="font-size:40px;"></div>
                    
                    Helsinki Op  
                </div>
                </a>
            </div>
            <div class="col-sm-3 get" >
                <a href="local_transfer.php"style="border:none; width:100%" >
                  <div class="bordered-one" >
                    <div class="os-icon os-icon-mail" style="font-size:40px;"></div>
                    Other Banks
                </div>  
                </a>
                
            </div>
            <div class="col-sm-3 get" >
                <a href="foreign_transfer.php"style="border:none; width:100%" >
                <div class="bordered-one" >
                    <div class="os-icon os-icon-mail " style="font-size:40px;"></div>
                    Foreign Transfer
                </div>
                </a>
            </div>
            
        </div>
        <form id=" premier" method="POST" action="<?php echo $link ;?>"  >
        <div id="none-pin"> 
        <div class="row">
            <div class="col-sm-6"><div class="form-group"><label for="">Select A Funding Account</label><select class="form-control" name="type"><option >Funding Account</option><option value="debit"><p><?php echo $firstname ." " .$lastname ;?>  - <?php echo $row0["accountnumber"];?></p> <p> - €<?php echo $balance;?></p></option></select><div class="help-block form-text with-errors form-control-feedback"></div></div></div>
            
           <div class="col-sm-6"><div class="form-group"><label for="">Beneficiary Country</label>
               <select class="form-control"  name="country">
       <option value="Afganistan">Afghanistan</option>
       <option value="Albania">Albania</option>
       <option value="Algeria">Algeria</option>
       <option value="American Samoa">American Samoa</option>
       <option value="Andorra">Andorra</option>
       <option value="Angola">Angola</option>
       <option value="Anguilla">Anguilla</option>
       <option value="Antigua & Barbuda">Antigua & Barbuda</option>
       <option value="Argentina">Argentina</option>
       <option value="Armenia">Armenia</option>
       <option value="Aruba">Aruba</option>
       <option value="Australia">Australia</option>
       <option value="Austria">Austria</option>
       <option value="Azerbaijan">Azerbaijan</option>
       <option value="Bahamas">Bahamas</option>
       <option value="Bahrain">Bahrain</option>
       <option value="Bangladesh">Bangladesh</option>
       <option value="Barbados">Barbados</option>
       <option value="Belarus">Belarus</option>
       <option value="Belgium">Belgium</option>
       <option value="Belize">Belize</option>
       <option value="Benin">Benin</option>
       <option value="Bermuda">Bermuda</option>
       <option value="Bhutan">Bhutan</option>
       <option value="Bolivia">Bolivia</option>
       <option value="Bonaire">Bonaire</option>
       <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
       <option value="Botswana">Botswana</option>
       <option value="Brazil">Brazil</option>
       <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
       <option value="Brunei">Brunei</option>
       <option value="Bulgaria">Bulgaria</option>
       <option value="Burkina Faso">Burkina Faso</option>
       <option value="Burundi">Burundi</option>
       <option value="Cambodia">Cambodia</option>
       <option value="Cameroon">Cameroon</option>
       <option value="Canada">Canada</option>
       <option value="Canary Islands">Canary Islands</option>
       <option value="Cape Verde">Cape Verde</option>
       <option value="Cayman Islands">Cayman Islands</option>
       <option value="Central African Republic">Central African Republic</option>
       <option value="Chad">Chad</option>
       <option value="Channel Islands">Channel Islands</option>
       <option value="Chile">Chile</option>
       <option value="China">China</option>
       <option value="Christmas Island">Christmas Island</option>
       <option value="Cocos Island">Cocos Island</option>
       <option value="Colombia">Colombia</option>
       <option value="Comoros">Comoros</option>
       <option value="Congo">Congo</option>
       <option value="Cook Islands">Cook Islands</option>
       <option value="Costa Rica">Costa Rica</option>
       <option value="Cote DIvoire">Cote DIvoire</option>
       <option value="Croatia">Croatia</option>
       <option value="Cuba">Cuba</option>
       <option value="Curaco">Curacao</option>
       <option value="Cyprus">Cyprus</option>
       <option value="Czech Republic">Czech Republic</option>
       <option value="Denmark">Denmark</option>
       <option value="Djibouti">Djibouti</option>
       <option value="Dominica">Dominica</option>
       <option value="Dominican Republic">Dominican Republic</option>
       <option value="East Timor">East Timor</option>
       <option value="Ecuador">Ecuador</option>
       <option value="Egypt">Egypt</option>
       <option value="El Salvador">El Salvador</option>
       <option value="Equatorial Guinea">Equatorial Guinea</option>
       <option value="Eritrea">Eritrea</option>
       <option value="Estonia">Estonia</option>
       <option value="Ethiopia">Ethiopia</option>
       <option value="Falkland Islands">Falkland Islands</option>
       <option value="Faroe Islands">Faroe Islands</option>
       <option value="Fiji">Fiji</option>
       <option value="Finland">Finland</option>
       <option value="France">France</option>
       <option value="French Guiana">French Guiana</option>
       <option value="French Polynesia">French Polynesia</option>
       <option value="French Southern Ter">French Southern Ter</option>
       <option value="Gabon">Gabon</option>
       <option value="Gambia">Gambia</option>
       <option value="Georgia">Georgia</option>
       <option value="Germany">Germany</option>
       <option value="Ghana">Ghana</option>
       <option value="Gibraltar">Gibraltar</option>
       <option value="Great Britain">Great Britain</option>
       <option value="Greece">Greece</option>
       <option value="Greenland">Greenland</option>
       <option value="Grenada">Grenada</option>
       <option value="Guadeloupe">Guadeloupe</option>
       <option value="Guam">Guam</option>
       <option value="Guatemala">Guatemala</option>
       <option value="Guinea">Guinea</option>
       <option value="Guyana">Guyana</option>
       <option value="Haiti">Haiti</option>
       <option value="Hawaii">Hawaii</option>
       <option value="Honduras">Honduras</option>
       <option value="Hong Kong">Hong Kong</option>
       <option value="Hungary">Hungary</option>
       <option value="Iceland">Iceland</option>
       <option value="Indonesia">Indonesia</option>
       <option value="India">India</option>
       <option value="Iran">Iran</option>
       <option value="Iraq">Iraq</option>
       <option value="Ireland">Ireland</option>
       <option value="Isle of Man">Isle of Man</option>
       <option value="Israel">Israel</option>
       <option value="Italy">Italy</option>
       <option value="Jamaica">Jamaica</option>
       <option value="Japan">Japan</option>
       <option value="Jordan">Jordan</option>
       <option value="Kazakhstan">Kazakhstan</option>
       <option value="Kenya">Kenya</option>
       <option value="Kiribati">Kiribati</option>
       <option value="Korea North">Korea North</option>
       <option value="Korea Sout">Korea South</option>
       <option value="Kuwait">Kuwait</option>
       <option value="Kyrgyzstan">Kyrgyzstan</option>
       <option value="Laos">Laos</option>
       <option value="Latvia">Latvia</option>
       <option value="Lebanon">Lebanon</option>
       <option value="Lesotho">Lesotho</option>
       <option value="Liberia">Liberia</option>
       <option value="Libya">Libya</option>
       <option value="Liechtenstein">Liechtenstein</option>
       <option value="Lithuania">Lithuania</option>
       <option value="Luxembourg">Luxembourg</option>
       <option value="Macau">Macau</option>
       <option value="Macedonia">Macedonia</option>
       <option value="Madagascar">Madagascar</option>
       <option value="Malaysia">Malaysia</option>
       <option value="Malawi">Malawi</option>
       <option value="Maldives">Maldives</option>
       <option value="Mali">Mali</option>
       <option value="Malta">Malta</option>
       <option value="Marshall Islands">Marshall Islands</option>
       <option value="Martinique">Martinique</option>
       <option value="Mauritania">Mauritania</option>
       <option value="Mauritius">Mauritius</option>
       <option value="Mayotte">Mayotte</option>
       <option value="Mexico">Mexico</option>
       <option value="Midway Islands">Midway Islands</option>
       <option value="Moldova">Moldova</option>
       <option value="Monaco">Monaco</option>
       <option value="Mongolia">Mongolia</option>
       <option value="Montserrat">Montserrat</option>
       <option value="Morocco">Morocco</option>
       <option value="Mozambique">Mozambique</option>
       <option value="Myanmar">Myanmar</option>
       <option value="Nambia">Nambia</option>
       <option value="Nauru">Nauru</option>
       <option value="Nepal">Nepal</option>
       <option value="Netherland Antilles">Netherland Antilles</option>
       <option value="Netherlands">Netherlands (Holland, Europe)</option>
       <option value="Nevis">Nevis</option>
       <option value="New Caledonia">New Caledonia</option>
       <option value="New Zealand">New Zealand</option>
       <option value="Nicaragua">Nicaragua</option>
       <option value="Niger">Niger</option>
       <option value="Nigeria">Nigeria</option>
       <option value="Niue">Niue</option>
       <option value="Norfolk Island">Norfolk Island</option>
       <option value="Norway">Norway</option>
       <option value="Oman">Oman</option>
       <option value="Pakistan">Pakistan</option>
       <option value="Palau Island">Palau Island</option>
       <option value="Palestine">Palestine</option>
       <option value="Panama">Panama</option>
       <option value="Papua New Guinea">Papua New Guinea</option>
       <option value="Paraguay">Paraguay</option>
       <option value="Peru">Peru</option>
       <option value="Phillipines">Philippines</option>
       <option value="Pitcairn Island">Pitcairn Island</option>
       <option value="Poland">Poland</option>
       <option value="Portugal">Portugal</option>
       <option value="Puerto Rico">Puerto Rico</option>
       <option value="Qatar">Qatar</option>
       <option value="Republic of Montenegro">Republic of Montenegro</option>
       <option value="Republic of Serbia">Republic of Serbia</option>
       <option value="Reunion">Reunion</option>
       <option value="Romania">Romania</option>
       <option value="Russia">Russia</option>
       <option value="Rwanda">Rwanda</option>
       <option value="St Barthelemy">St Barthelemy</option>
       <option value="St Eustatius">St Eustatius</option>
       <option value="St Helena">St Helena</option>
       <option value="St Kitts-Nevis">St Kitts-Nevis</option>
       <option value="St Lucia">St Lucia</option>
       <option value="St Maarten">St Maarten</option>
       <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
       <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
       <option value="Saipan">Saipan</option>
       <option value="Samoa">Samoa</option>
       <option value="Samoa American">Samoa American</option>
       <option value="San Marino">San Marino</option>
       <option value="Sao Tome & Principe">Sao Tome & Principe</option>
       <option value="Saudi Arabia">Saudi Arabia</option>
       <option value="Senegal">Senegal</option>
       <option value="Seychelles">Seychelles</option>
       <option value="Sierra Leone">Sierra Leone</option>
       <option value="Singapore">Singapore</option>
       <option value="Slovakia">Slovakia</option>
       <option value="Slovenia">Slovenia</option>
       <option value="Solomon Islands">Solomon Islands</option>
       <option value="Somalia">Somalia</option>
       <option value="South Africa">South Africa</option>
       <option value="Spain">Spain</option>
       <option value="Sri Lanka">Sri Lanka</option>
       <option value="Sudan">Sudan</option>
       <option value="Suriname">Suriname</option>
       <option value="Swaziland">Swaziland</option>
       <option value="Sweden">Sweden</option>
       <option value="Switzerland">Switzerland</option>
       <option value="Syria">Syria</option>
       <option value="Tahiti">Tahiti</option>
       <option value="Taiwan">Taiwan</option>
       <option value="Tajikistan">Tajikistan</option>
       <option value="Tanzania">Tanzania</option>
       <option value="Thailand">Thailand</option>
       <option value="Togo">Togo</option>
       <option value="Tokelau">Tokelau</option>
       <option value="Tonga">Tonga</option>
       <option value="Trinidad & Tobago">Trinidad & Tobago</option>
       <option value="Tunisia">Tunisia</option>
       <option value="Turkey">Turkey</option>
       <option value="Turkmenistan">Turkmenistan</option>
       <option value="Turks & Caicos Is">Turks & Caicos Is</option>
       <option value="Tuvalu">Tuvalu</option>
       <option value="Uganda">Uganda</option>
       <option value="United Kingdom">United Kingdom</option>
       <option value="Ukraine">Ukraine</option>
       <option value="United Arab Erimates">United Arab Emirates</option>
       <option value="United States of America">United States of America</option>
       <option value="Uraguay">Uruguay</option>
       <option value="Uzbekistan">Uzbekistan</option>
       <option value="Vanuatu">Vanuatu</option>
       <option value="Vatican City State">Vatican City State</option>
       <option value="Venezuela">Venezuela</option>
       <option value="Vietnam">Vietnam</option>
       <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
       <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
       <option value="Wake Island">Wake Island</option>
       <option value="Wallis & Futana Is">Wallis & Futana Is</option>
       <option value="Yemen">Yemen</option>
       <option value="Zaire">Zaire</option>
       <option value="Zambia">Zambia</option>
       <option value="Zimbabwe">Zimbabwe</option>
    </select>
           
           <div class="help-block form-text with-errors form-control-feedback"></div></div></div>
</div>
<div class="row">
    <div class="col-sm-6"><div class="form-group"><label for="">Purpose</label><input class="form-control" data-match-error="Purpose" placeholder="Purpose" required="required" type="text" name="purpose"><div class="help-block form-text with-errors form-control-feedback"></div></div></div>
     <div 
class="col-sm-6"><div class="form-group"><label for=""> Beneficiary Account </label><input class="form-control" type="text" data-error="Please input  Account Number" placeholder="Account Number" required="required" name="daccountnumber"><div class="help-block form-text with-errors form-control-feedback"></div></div></div>
    </div>
<div class="row">
    <div class="col-sm-6"><div class="form-group"><label for="">Beneficiary Bank</label><input class="form-control" data-match-error="Account Holder" placeholder="Destination Bank" required="required" type="text" name="bank"><div class="help-block form-text with-errors form-control-feedback"></div></div></div>
    <div class="col-sm-6"><div class="form-group"><label for="">Beneficiary Address</label><input class="form-control" data-match-error="Digits only" placeholder="Beneficiary Address" required="required" type="text" name="address"><div class="help-block form-text with-errors form-control-feedback"></div></div></div>
    </div>
<div class="row">
    <div class="col-sm-6"><div class="form-group"><label for="">Beneficiary Account Holder</label><input class="form-control" data-match-error="Account Holder" placeholder="Account Holder" required="required" type="text" name="holder"><div class="help-block form-text with-errors form-control-feedback"></div></div></div>
    <div class="col-sm-6"><div class="form-group"><label for="">Amount</label><input class="form-control" data-match-error="Digits only" placeholder="Amount" required="required" type="text" name="amount"><div class="help-block form-text with-errors form-control-feedback"></div></div></div>
    </div>

<div class="row">
   
    
    <div class="col-sm-6"><div class="form-group"><label for="">Transaction Description</label><input class="form-control" data-minlength="6" placeholder="Description" required="required" type="text" name="description"><div class="help-block form-text text-muted form-control-feedback"></div></div></div></div>

<div class="form-buttons-w"><p class="btn btn-primary" onclick="myFunction()"> Transfer</p></div>

</div>
<!--pin display-->
<div id="pin" style="display:none;" >
<div class="row">
   <div class="col-sm-6"><div class="form-group"><label for="">4 Digit Pin</label><input class="form-control" data-minlength="6" placeholder="Pin" required="required" type="password" name="pin"><div class="help-block form-text text-muted form-control-feedback"></div></div></div>
</div>   
<div class="form-buttons-w"><button class="btn btn-primary" type="submit" name="foreign"> Transfer</button></div>

</div>
</form>


</div></div></div></div>


</div></div></div><div class="floated-colors-btn second-floated-btn"><div class="os-toggler-w"><div class="os-toggler-i"><div class="os-toggler-pill"></div></div></div><span>Dark </span><span>Colors</span></div><div class="floated-customizer-btn third-floated-btn"><div class="icon-w"><i class="os-icon os-icon-ui-46"></i></div><span>Customizer</span></div><div class="floated-customizer-panel"><div class="fcp-content"><div class="close-customizer-btn"><i class="os-icon os-icon-x"></i></div><div class="fcp-group"><div class="fcp-group-header">Menu Settings</div><div class="fcp-group-contents"><div class="fcp-field"><label for="">Menu Position</label><select class="menu-position-selector"><option value="left">Left</option><option value="right">Right</option><option value="top">Top</option></select></div><div class="fcp-field"><label for="">Menu Style</label><select class="menu-layout-selector"><option value="compact">Compact</option><option value="full">Full</option><option value="mini">Mini</option></select></div><div class="fcp-field with-image-selector-w"><label for="">With Image</label><select class="with-image-selector"><option value="yes">Yes</option><option value="no">No</option></select></div><div class="fcp-field"><label for="">Menu Color</label><div class="fcp-colors menu-color-selector"><div class="color-selector menu-color-selector color-bright selected"></div><div class="color-selector menu-color-selector color-dark"></div><div class="color-selector menu-color-selector color-light"></div><div class="color-selector menu-color-selector color-transparent"></div></div></div></div></div><div class="fcp-group"><div class="fcp-group-header">Sub Menu</div><div class="fcp-group-contents"><div class="fcp-field"><label for="">Sub Menu Style</label><select class="sub-menu-style-selector"><option value="flyout">Flyout</option><option value="inside">Inside/Click</option><option value="over">Over</option></select></div><div class="fcp-field"><label for="">Sub Menu Color</label><div class="fcp-colors"><div class="color-selector sub-menu-color-selector color-bright selected"></div><div class="color-selector sub-menu-color-selector color-dark"></div><div class="color-selector sub-menu-color-selector color-light"></div></div></div></div></div><div class="fcp-group"><div class="fcp-group-header">Other Settings</div><div class="fcp-group-contents"><div class="fcp-field"><label for="">Full Screen?</label><select class="full-screen-selector"><option value="yes">Yes</option><option value="no">No</option></select></div><div class="fcp-field"><label for="">Show Top Bar</label><select class="top-bar-visibility-selector"><option value="yes">Yes</option><option value="no">No</option></select></div><div class="fcp-field"><label for="">Above Menu?</label><select class="top-bar-above-menu-selector"><option value="yes">Yes</option><option value="no">No</option></select></div><div class="fcp-field"><label for="">Top Bar Color</label><div class="fcp-colors"><div class="color-selector top-bar-color-selector color-bright selected"></div><div class="color-selector top-bar-color-selector color-dark"></div><div class="color-selector top-bar-color-selector color-light"></div><div class="color-selector top-bar-color-selector color-transparent"></div></div></div></div></div></div></div>
        
        
     <!--   <div class="floated-chat-btn"><i class="os-icon os-icon-mail-07"></i><span>Demo Chat</span></div>
        
        <div class="floated-chat-w"><div class="floated-chat-i"><div class="chat-close"><i class="os-icon os-icon-close"></i></div><div class="chat-head"><div class="user-w with-status status-green"><div class="user-avatar-w"><div class="user-avatar"><img alt="" src="img/avatar1.jpg"></div></div><div class="user-name"><h6 class="user-title">John Mayers</h6><div class="user-role">Account Manager</div></div></div></div><div class="chat-messages"><div class="message"><div class="message-content">Hi, how can I help you?</div></div><div class="date-break">Mon 10:20am</div><div class="message"><div class="message-content">Hi, my name is Mike, I will be happy to assist you</div></div><div class="message self"><div class="message-content">Hi, I tried ordering this product and it keeps showing me error code.</div></div></div><div class="chat-controls"><input class="message-input" placeholder="Type your message here..."><div class="chat-extra"><a href="#"><span class="extra-tooltip">Attach Document</span><i class="os-icon os-icon-documents-07"></i></a><a href="#"><span class="extra-tooltip">Insert Photo</span><i class="os-icon os-icon-others-29"></i></a><a href="#"><span class="extra-tooltip">Upload Video</span><i class="os-icon os-icon-ui-51"></i></a></div></div></div></div> -->
        
        
        </div></div></div></div>
        
        <div class="display-type"></div></div>
        
<script type="text/javascript">
function myFunction() {
  document.getElementById("pin").style.display = "block";
   document.getElementById("none-pin").style.display = "none";
  
}
</script>         
                    
      <script src="bower_components/jquery/dist/jquery.min.js"></script><script src="bower_components/popper.js/dist/umd/popper.min.js"></script><script src="bower_components/moment/moment.js"></script><script src="bower_components/chart.js/dist/Chart.min.js"></script><script src="bower_components/select2/dist/js/select2.full.min.js"></script><script src="bower_components/jquery-bar-rating/dist/jquery.barrating.min.js"></script><script src="bower_components/ckeditor/ckeditor.js"></script><script src="bower_components/bootstrap-validator/dist/validator.min.js"></script><script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script><script src="bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js"></script><script src="bower_components/dropzone/dist/dropzone.js"></script><script src="bower_components/editable-table/mindmup-editabletable.js"></script><script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script><script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script><script src="bower_components/fullcalendar/dist/fullcalendar.min.js"></script><script src="bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script><script src="bower_components/tether/dist/js/tether.min.js"></script><script src="bower_components/slick-carousel/slick/slick.min.js"></script><script src="bower_components/bootstrap/js/dist/util.js"></script><script src="bower_components/bootstrap/js/dist/alert.js"></script><script src="bower_components/bootstrap/js/dist/button.js"></script><script src="bower_components/bootstrap/js/dist/carousel.js"></script><script src="bower_components/bootstrap/js/dist/collapse.js"></script><script src="bower_components/bootstrap/js/dist/dropdown.js"></script><script src="bower_components/bootstrap/js/dist/modal.js"></script><script src="bower_components/bootstrap/js/dist/tab.js"></script><script src="bower_components/bootstrap/js/dist/tooltip.js"></script><script src="bower_components/bootstrap/js/dist/popover.js"></script><script src="js/dataTables.bootstrap4.min.js"></script><script src="js/demo_customizer5739.js?version=4.5.0"></script><script src="js/main5739.js?version=4.5.0"></script>
       
        <script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','../www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-42863888-9', 'auto');
ga('send', 'pageview');</script></body>
<!-- Mirrored from light.pinsupreme.com/tables_datatables.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Nov 2021 15:52:37 GMT -->
</</html> 
<?php
}else{
    
    header("location:https://helsinkiop.com/login.php");
}
?>