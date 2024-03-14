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
    
    if(isset($_SESSION['loggedIn_cust_id'])){
    $id= $_SESSION['loggedIn_cust_id'];
      

$sql0 = "SELECT * FROM customer WHERE cust_id='".$id."' ";
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

$sql11 = "SELECT * FROM activity WHERE id='".$id."' ";
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
                                            <div class="content-w">
<div class="content-i"><div class="content-box"><div class="element-wrapper"><div class="invoice-w"><div class="infos"><div class="info-1"><div class="invoice-logo-w"><img alt="" width="100px"; src="https://helsinkiop.com/images/logo.png"></div><div class="invoice-heading"><h3>Invoice</h3><div class="invoice-date"><?php echo date('l j, F Y, g:i a'); ?></div></div><div class="invoice-body"><div class="invoice-desc"><div class="desc-label">Invoice #</div><div class="desc-value">TRF3524784</div></div><div class="invoice-table"><table class="table"><thead><tr><th>Description</th></tr></thead>
<?php
$sql11 = "SELECT * FROM passbook".$id." WHERE trans_id=(
                    SELECT MAX(trans_id) FROM passbook".$id.") ";
        $result11 = $conn->query($sql11);
        $row11 = $result11->fetch_assoc();
        $amount = $row11["amount"];
        $des = $row11["Description"];
        $ref = $row11["reference"];
?>
<tbody><tr><td><?php echo $des. "-" .$ref. "  €".$amount; ?></td></tr></tbody></table>

<div class="terms"><div class="terms-header">Terms and Conditions</div><div class="terms-content">International Transfers May be slow and take up to 3 working days to reflect . A 5% fee is applied to your account.</div></div></div></div><div class="invoice-footer"><div class="invoice-logo"><img alt="" src="https://helsinkiop.com/images/logo.png"><span>HELSINKI OP Inc</span></div><div class="invoice-info"><span>customercare@helsinkiop.com</span><span></span></div></div></div></div>

</div></div></div></div><div class="display-type"></div></div><script src="bower_components/jquery/dist/jquery.min.js"></script><script src="bower_components/popper.js/dist/umd/popper.min.js"></script><script src="bower_components/moment/moment.js"></script><script src="bower_components/chart.js/dist/Chart.min.js"></script><script src="bower_components/select2/dist/js/select2.full.min.js"></script><script src="bower_components/jquery-bar-rating/dist/jquery.barrating.min.js"></script><script src="bower_components/ckeditor/ckeditor.js"></script><script src="bower_components/bootstrap-validator/dist/validator.min.js"></script><script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script><script src="bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js"></script><script src="bower_components/dropzone/dist/dropzone.js"></script><script src="bower_components/editable-table/mindmup-editabletable.js"></script><script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script><script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script><script src="bower_components/fullcalendar/dist/fullcalendar.min.js"></script><script src="bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script><script src="bower_components/tether/dist/js/tether.min.js"></script><script src="bower_components/slick-carousel/slick/slick.min.js"></script><script src="bower_components/bootstrap/js/dist/util.js"></script><script src="bower_components/bootstrap/js/dist/alert.js"></script><script src="bower_components/bootstrap/js/dist/button.js"></script><script src="bower_components/bootstrap/js/dist/carousel.js"></script><script src="bower_components/bootstrap/js/dist/collapse.js"></script><script src="bower_components/bootstrap/js/dist/dropdown.js"></script><script src="bower_components/bootstrap/js/dist/modal.js"></script><script src="bower_components/bootstrap/js/dist/tab.js"></script><script src="bower_components/bootstrap/js/dist/tooltip.js"></script><script src="bower_components/bootstrap/js/dist/popover.js"></script><script src="js/demo_customizer5739.js?version=4.5.0"></script><script src="js/main5739.js?version=4.5.0"></script><script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','../www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-42863888-9', 'auto');
ga('send', 'pageview');</script></body>
<!-- Mirrored from light.pinsupreme.com/misc_invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Nov 2021 15:52:19 GMT -->
</html> 

<?php
}else{
    
    header("location:https://helsinkiop.com/login.php");
}
?>