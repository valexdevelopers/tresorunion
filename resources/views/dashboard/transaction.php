<?php
if(isset($_POST['register'])){


	$firstname = filter_input(INPUT_POST , 'firstname');

	$lastname = filter_input(INPUT_POST , 'lastname');
	
	$phone = filter_input(INPUT_POST , 'phone');
	$email = filter_input(INPUT_POST , 'email');
	$dob = filter_input(INPUT_POST , 'dob');
	
	$gender = filter_input(INPUT_POST , 'gender');


	$country = filter_input(INPUT_POST , 'country');
	$address = filter_input(INPUT_POST , 'address');

	
	$pin = filter_input(INPUT_POST , 'pin');
	$accountnumber = filter_input(INPUT_POST , 'accountnumber');
	$password = filter_input(INPUT_POST , 'password');
$cpassword = filter_input(INPUT_POST , 'cpassword');
	
    $status = filter_input(INPUT_POST , 'status');


        $host ="localhost";
		$dbusername ="premzgme_admin";
		$dbpassword ="Virtue@1998";
		$dbname ="premzgme_bank";
		$conn =new mysqli($host ,$dbusername ,$dbpassword ,$dbname);
		
		 
		//create connection
		
		
		if(mysqli_connect_error()){
		die('connect error(' .mysqli_connect_errno() .')' .mysqli_connect_error());
		}else{
    if($password ==$cpassword ) {

$sql0 = "SELECT MAX(cust_id) FROM customer";
$result = $conn->query($sql0);
$row = $result->fetch_assoc();
$id = $row["MAX(cust_id)"] + 1;

/*  Prevent mismatch between cust_id and benef/passbook table number.
    This is because when a row is deleted from customer AUTO_INCREMENT does
    not reset but keeps increasing.
    Hence resest AUTO_INCREMENT to $id and eleminate the error. */
$sql5 = "ALTER TABLE customer AUTO_INCREMENT=".$id;
if($conn->query($sql5)){

$sql1 = "CREATE TABLE passbook".$id."(
            `trans_id` int(11) NOT NULL AUTO_INCREMENT,
            `trans_date` datetime,
            `reference` varchar(255),
            `Description` varchar(255),
            `debit` int,
            `credit` int,
            `balance` int,
            PRIMARY KEY (`trans_id`)
        )";


if($conn->query($sql1)){
$sql3 = "INSERT INTO customer  (first_name, last_name, gender, dob, email, phone, country, address, accountnumber, pin, password, status) VALUES ( '$firstname', '$lastname', '$gender', '$dob', '$email', '$phone',  '$country', '$address', '$accountnumber', '$pin', '$password', '$status' )";

if (($conn->query($sql3) === TRUE)) {
    $p = "ACCOUNT OPENED";
}else{
    $p = "ACCOUNT failed";
}}}
}else{
    $p = "passwords do not match";
}}
echo "<script type='text/javascript'>alert('$p');</script>";
}
?>



<!DOCTYPE html><html>
<!-- Mirrored from light.pinsupreme.com/forms_validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Nov 2021 15:52:35 GMT -->
<head><title>Form | premier Banque</title><meta charset="utf-8"><meta content="ie=edge" http-equiv="x-ua-compatible"><meta content="template language" name="keywords"><meta content="Tamerlan Soziev" name="author"><meta content="Admin dashboard html template" name="description"><meta content="width=device-width,initial-scale=1" name="viewport"><link href="favicon.png" rel="shortcut icon"><link href="apple-touch-icon.png" rel="apple-touch-icon"><link href="../fast.fonts.net/cssapi/487b73f1-c2d1-43db-8526-db577e4c822b.css" rel="stylesheet"><link href="bower_components/select2/dist/css/select2.min.css" rel="stylesheet"><link href="bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet"><link href="bower_components/dropzone/dist/dropzone.css" rel="stylesheet"><link href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet"><link href="bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet"><link href="bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet"><link href="bower_components/slick-carousel/slick/slick.css" rel="stylesheet"><link href="css/main5739.css?version=4.5.0" rel="stylesheet"></head><body class="menu-position-side menu-side-left full-screen">
    <div class="all-wrapper solid-bg-all">
        
        <div class="top-bar color-scheme-bright">
            <div class="logo-w menu-size">
                <a class="logo" href="index.php">
                    
                    <div class="logo-label">Ohanas Pacific</div>
                </a></div><div class="fancy-selector-w">
                    <div class="fancy-selector-current">
                        <div class="fs-img">
                            <img alt="" src="img/card1.png">
                        </div>
                        <div class="fs-main-info">
                            <div class="fs-name">
                                Ohanas Pacific Platinum
                            </div>
                            <div class="fs-sub">
                                <span>Balance:</span>
                                <b style="color: white; font-weight: 900;font-size: 14px;">$<?php echo number_format($balance) ;?></b>
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
                                    <b style="color: white; font-weight: 900;font-size: 14px;">$5,304</b>
                                </div>
                            </div>
                            <div class="fs-extra-info">
                                <strong>5476</strong><span>ending</span></div></div><div class="fancy-selector-option active"><div class="fs-img"><img alt="" src="img/card1.png"></div>
                                <div class="fs-main-info">
                                    <div class="fs-name">American Express Platinum</div><div class="fs-sub"><span>Balance:</span>
                                        <b style="color: white; font-weight: 900;font-size: 14px;">$5,304</b></div></div><div class="fs-extra-info"><strong>2523</strong><span>ending</span></div></div><div class="fancy-selector-option"><div class="fs-img"><img alt="" src="img/card3.png"></div><div class="fs-main-info"><div class="fs-name">CitiBank Preferred Credit</div><div class="fs-sub"><span>Balance:</span><b style="color: white; font-weight: 900;font-size: 14px;">$5,304</b></div></div><div class="fs-extra-info"><strong>6345</strong><span>ending</span></div></div>
                                        </div></div>
                                        <div class="top-menu-controls">
                                            <div ><div id='MicrosoftTranslatorWidget' class='Dark' style='color:white;background-color:#0532fc'></div><script type='text/javascript'>setTimeout(function(){{var s=document.createElement('script');s.type='text/javascript';s.charset='UTF-8';s.src=((location && location.href && location.href.indexOf('https') == 0)?'https://ssl.microsofttranslator.com':'http://www.microsofttranslator.com')+'/ajax/v3/WidgetV3.ashx?siteData=ueOIGRSKkd965FeEGM5JtQ**&ctf=False&ui=true&settings=Manual&from=';var p=document.getElementsByTagName('head')[0]||document.documentElement;p.insertBefore(s,p.firstChild); }},0);</script></div>
                                            <div class="messages-notifications os-dropdown-trigger os-dropdown-position-left"><i class="os-icon os-icon-mail-14"></i><div class="new-messages-count">12</div>
                                            </div>
                                <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-left"><i class="os-icon os-icon-ui-46"></i>
                                    </div>
                                <div class="logged-user-w"><div class="logged-user-i"><div class="avatar-w"><img alt="" src="<?php echo $image_src2 ?>" ></div><div class="logged-user-menu color-style-bright"><div class="logged-user-avatar-info"><div class="avatar-w"><img alt="" src="<?php echo $image_src2 ?>" ></div>
                                <div class="logged-user-info-w"><div class="logged-user-name"><?php echo $firstname ." " .$lastname ;?>   </div><div class="logged-user-role">Account Holder</div>
                                
                                </div></div>
                                
                                <div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>

                                </div></div></div></div></div><div class="search-with-suggestions-w"><div class="search-with-suggestions-modal"><div class="element-search"><input class="search-suggest-input" placeholder="Start typing to search..."><div class="close-search-suggestions"><i class="os-icon os-icon-x"></i></div></div><div class="search-suggestions-group"><div class="ssg-header"><div class="ssg-icon"><div class="os-icon os-icon-box"></div></div><div class="ssg-name">Projects</div><div class="ssg-info">24 Total</div></div><div class="ssg-content"><div class="ssg-items ssg-items-boxed"><a class="ssg-item" href="#"><div class="item-media" style="background-image: url(img/company6.png)"></div><div class="item-name">Integ<span>ration</span> with API</div></a><a class="ssg-item" href="#"><div class="item-media" style="background-image: url(img/company7.png)"></div><div class="item-name">Deve<span>lopm</span>ent Project</div></a></div></div></div><div class="search-suggestions-group"><div class="ssg-header"><div class="ssg-icon"><div class="os-icon os-icon-users"></div></div><div class="ssg-name">Customers</div><div class="ssg-info">12 Total</div></div><div class="ssg-content"><div class="ssg-items ssg-items-list"><a class="ssg-item" href="#"><div class="item-media" style="background-image: url(img/avatar1.jpg)"></div><div class="item-name">John Mayers</div></a><a class="ssg-item" href="#"><div class="item-media" style="background-image: url(img/avatar2.jpg)"></div><div class="item-name">Th<span>omas</span> Mullier</div></a><a class="ssg-item" href="#">
                                    <div class="item-media" style="background-image: url(img/avatar3.jpg)"></div><div class="item-name">Kim C<span>olli</span>ns</div></a></div></div></div><div class="search-suggestions-group"><div class="ssg-header"><div class="ssg-icon"><div class="os-icon os-icon-folder"></div></div><div class="ssg-name">Files</div><div class="ssg-info">17 Total</div></div><div class="ssg-content"><div class="ssg-items ssg-items-blocks"><a class="ssg-item" href="#"><div class="item-icon"><i class="os-icon os-icon-file-text"></i></div><div class="item-name">Work<span>Not</span>e.txt</div></a><a class="ssg-item" href="#"><div class="item-icon"><i class="os-icon os-icon-film"></i></div>
                                        <div class="item-name">V<span>ideo</span>.avi</div></a><a class="ssg-item" href="#"><div class="item-icon"><i class="os-icon os-icon-database"></i></div><div class="item-name">User<span>Tabl</span>e.sql</div></a><a class="ssg-item" href="#"><div class="item-icon"><i class="os-icon os-icon-image"></i></div>
                                            <div class="item-name">wed<span>din</span>g.jpg</div></a></div><div class="ssg-nothing-found"><div class="icon-w"><i class="os-icon os-icon-eye-off"></i></div><span>No files were found. Try changing your query...</span></div></div></div></div></div><div class="layout-w"><div class="menu-mobile menu-activated-on-click color-scheme-dark"><div class="mm-logo-buttons-w"><a class="mm-logo" href="index.php"><span>Welcome Back! </span></a><div class="mm-buttons"><div class="content-panel-open"><div class="os-icon os-icon-grid-circles"></div></div><div class="mobile-menu-trigger"><div class="os-icon os-icon-hamburger-menu-1"></div></div></div></div><div class="menu-and-user"><div class="logged-user-w"><div class="avatar-w"><img alt="" src="<?php echo $image_src2 ?>" ></div><div class="logged-user-info-w"><div class="logged-user-name"><?php echo $firstname ." " .$lastname ;?>   </div><div class="logged-user-role">Account Holder</div></div></div>
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

<div class="menu-w color-scheme-light color-style-transparent menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link"><div class="logo-w"><a class="logo" href="index-2.html"><div class="logo-element"></div><div class="logo-label">Clean Admin</div></a></div><div class="logged-user-w avatar-inline"><div class="logged-user-i"><div class="avatar-w"><img alt="" src="img/avatar1.jpg"></div><div class="logged-user-info-w"><div class="logged-user-name">Maria Gomez</div><div class="logged-user-role">Administrator</div></div><div class="logged-user-toggler-arrow"><div class="os-icon os-icon-chevron-down"></div></div><div class="logged-user-menu color-style-bright"><div class="logged-user-avatar-info"><div class="avatar-w"><img alt="" src="img/avatar1.jpg"></div><div class="logged-user-info-w"><div class="logged-user-name">Maria Gomez</div><div class="logged-user-role">Administrator</div></div></div><div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div><ul><li><a href="apps_email.html"><i class="os-icon os-icon-mail-01"></i><span>Incoming Mail</span></a></li><li><a href="users_profile_big.html"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a></li><li><a href="users_profile_small.html"><i class="os-icon os-icon-coins-4"></i><span>Billing Details</span></a></li><li><a href="#"><i class="os-icon os-icon-others-43"></i><span>Notifications</span></a></li><li><a href="#"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a></li></ul></div></div></div><div class="menu-actions"><div class="messages-notifications os-dropdown-trigger os-dropdown-position-right"><i class="os-icon os-icon-mail-14"></i><div class="new-messages-count">12</div><div class="os-dropdown light message-list"><ul><li><a href="#"><div class="user-avatar-w"><img alt="" src="img/avatar1.jpg"></div><div class="message-content"><h6 class="message-from">John Mayers</h6><h6 class="message-title">Account Update</h6></div></a></li><li><a href="#"><div class="user-avatar-w"><img alt="" src="img/avatar2.jpg"></div><div class="message-content"><h6 class="message-from">Phil Jones</h6><h6 class="message-title">Secutiry Updates</h6></div></a></li><li><a href="#"><div class="user-avatar-w"><img alt="" src="img/avatar3.jpg"></div><div class="message-content"><h6 class="message-from">Bekky Simpson</h6><h6 class="message-title">Vacation Rentals</h6></div></a></li><li><a href="#"><div class="user-avatar-w"><img alt="" src="img/avatar4.jpg"></div><div class="message-content"><h6 class="message-from">Alice Priskon</h6><h6 class="message-title">Payment Confirmation</h6></div></a></li></ul></div></div><div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-right"><i class="os-icon os-icon-ui-46"></i><div class="os-dropdown"><div class="icon-w"><i class="os-icon os-icon-ui-46"></i></div><ul><li><a href="users_profile_small.html"><i class="os-icon os-icon-ui-49"></i><span>Profile Settings</span></a></li><li><a href="users_profile_small.html"><i class="os-icon os-icon-grid-10"></i><span>Billing Info</span></a></li><li><a href="users_profile_small.html"><i class="os-icon os-icon-ui-44"></i><span>My Invoices</span></a></li><li><a href="users_profile_small.html"><i class="os-icon os-icon-ui-15"></i><span>Cancel Account</span></a></li></ul></div></div><div class="messages-notifications os-dropdown-trigger os-dropdown-position-right"><i class="os-icon os-icon-zap"></i><div class="new-messages-count">4</div><div class="os-dropdown light message-list"><div class="icon-w"><i class="os-icon os-icon-zap"></i></div><ul><li><a href="#"><div class="user-avatar-w"><img alt="" src="img/avatar1.jpg"></div><div class="message-content"><h6 class="message-from">John Mayers</h6><h6 class="message-title">Account Update</h6></div></a></li><li><a href="#"><div class="user-avatar-w"><img alt="" src="img/avatar2.jpg"></div><div class="message-content"><h6 class="message-from">Phil Jones</h6><h6 class="message-title">Secutiry Updates</h6></div></a></li><li><a href="#"><div class="user-avatar-w"><img alt="" src="img/avatar3.jpg"></div><div class="message-content"><h6 class="message-from">Bekky Simpson</h6><h6 class="message-title">Vacation Rentals</h6></div></a></li><li><a href="#"><div class="user-avatar-w"><img alt="" src="img/avatar4.jpg"></div><div class="message-content"><h6 class="message-from">Alice Priskon</h6><h6 class="message-title">Payment Confirmation</h6></div></a></li></ul></div></div></div><div class="element-search autosuggest-search-activator"><input placeholder="Start typing to search..."></div><h1 class="menu-page-header">Page Header</h1><ul class="main-menu"><li class="sub-header"><span>Layouts</span></li><li class="selected has-sub-menu"><a href="index-2.html"><div class="icon-w"><div class="os-icon os-icon-layout"></div></div><span>Dashboard</span></a><div class="sub-menu-w"><div class="sub-menu-header">Dashboard</div><div class="sub-menu-icon"><i class="os-icon os-icon-layout"></i></div><div class="sub-menu-i"><ul class="sub-menu"><li><a href="index-2.html">Dashboard 1</a></li><li><a href="apps_crypto.html">Crypto Dashboard <strong class="badge badge-danger">Hot</strong></a></li><li><a href="apps_support_dashboard.html">Dashboard 3</a></li><li><a href="apps_projects.html">Dashboard 4</a></li><li><a href="apps_bank.html">Dashboard 5</a></li><li><a href="layouts_menu_top_image.html">Dashboard 6</a></li></ul></div></div></li><li class="has-sub-menu"><a href="layouts_menu_top_image.html"><div class="icon-w"><div class="os-icon os-icon-layers"></div></div><span>Menu Styles</span></a><div class="sub-menu-w"><div class="sub-menu-header">Menu Styles</div><div class="sub-menu-icon"><i class="os-icon os-icon-layers"></i></div><div class="sub-menu-i"><ul class="sub-menu"><li><a href="layouts_menu_side_full.html">Side Menu Light</a></li><li><a href="layouts_menu_side_full_dark.html">Side Menu Dark</a></li><li><a href="layouts_menu_side_transparent.html">Side Menu Transparent <strong class="badge badge-danger">New</strong></a></li><li><a href="apps_pipeline.html">Side &amp; Top Dark</a></li><li><a href="apps_projects.html">Side &amp; Top</a></li><li><a href="layouts_menu_side_mini.html">Mini Side Menu</a></li></ul><ul class="sub-menu"><li><a href="layouts_menu_side_mini_dark.html">Mini Menu Dark</a></li><li><a href="layouts_menu_side_compact.html">Compact Side Menu</a></li><li><a href="layouts_menu_side_compact_dark.html">Compact Menu Dark</a></li><li><a href="layouts_menu_right.html">Right Menu</a></li><li><a href="layouts_menu_top.html">Top Menu Light</a></li><li><a href="layouts_menu_top_dark.html">Top Menu Dark</a></li></ul><ul class="sub-menu"><li><a href="layouts_menu_top_image.html">Top Menu Image <strong class="badge badge-danger">New</strong></a></li><li><a href="layouts_menu_sub_style_flyout.html">Sub Menu Flyout</a></li><li><a href="layouts_menu_sub_style_flyout_dark.html">Sub Flyout Dark</a></li><li><a href="layouts_menu_sub_style_flyout_bright.html">Sub Flyout Bright</a></li><li><a href="layouts_menu_side_compact_click.html">Menu Inside Click</a></li></ul></div></div></li><li class="sub-header"><span>Options</span></li><li class="has-sub-menu"><a href="apps_bank.html"><div class="icon-w"><div class="os-icon os-icon-package"></div></div><span>Applications</span></a><div class="sub-menu-w"><div class="sub-menu-header">Applications</div><div class="sub-menu-icon"><i class="os-icon os-icon-package"></i></div><div class="sub-menu-i"><ul class="sub-menu"><li><a href="apps_email.html">Email Application</a></li><li><a href="apps_support_dashboard.html">Support Dashboard</a></li><li><a href="apps_support_index.html">Tickets Index</a></li><li><a href="apps_crypto.html">Crypto Dashboard <strong class="badge badge-danger">New</strong></a></li><li><a href="apps_projects.html">Projects List</a></li><li><a href="apps_bank.html">Banking <strong class="badge badge-danger">New</strong></a></li></ul><ul class="sub-menu"><li><a href="apps_full_chat.html">Chat Application</a></li><li><a href="apps_todo.html">To Do Application <strong class="badge badge-danger">New</strong></a></li><li><a href="misc_chat.html">Popup Chat</a></li><li><a href="apps_pipeline.html">CRM Pipeline</a></li><li><a href="rentals_index_grid.html">Property Listing <strong class="badge badge-danger">New</strong></a></li><li><a href="misc_calendar.html">Calendar</a></li></ul></div></div></li><li class="has-sub-menu"><a href="#"><div class="icon-w"><div class="os-icon os-icon-file-text"></div></div><span>Pages</span></a><div class="sub-menu-w"><div class="sub-menu-header">Pages</div><div class="sub-menu-icon"><i class="os-icon os-icon-file-text"></i></div><div class="sub-menu-i"><ul class="sub-menu"><li><a href="misc_invoice.html">Invoice</a></li><li><a href="ecommerce_order_info.html">Order Info <strong class="badge badge-danger">New</strong></a></li><li><a href="rentals_index_grid.html">Property Listing <strong class="badge badge-danger">New</strong></a></li><li><a href="misc_charts.html">Charts</a></li><li><a href="auth_login.html">Login</a></li></ul><ul class="sub-menu"><li><a href="auth_register.html">Register</a></li><li><a href="auth_lock.html">Lock Screen</a></li><li><a href="misc_pricing_plans.html">Pricing Plans</a></li><li><a href="misc_error_404.html">Error 404</a></li><li><a href="misc_error_500.html">Error 500</a></li></ul></div></div></li><li class="has-sub-menu"><a href="#"><div class="icon-w"><div class="os-icon os-icon-life-buoy"></div></div><span>UI Kit</span></a><div class="sub-menu-w"><div class="sub-menu-header">UI Kit</div><div class="sub-menu-icon"><i class="os-icon os-icon-life-buoy"></i></div><div class="sub-menu-i"><ul class="sub-menu"><li><a href="uikit_modals.html">Modals <strong class="badge badge-danger">New</strong></a></li><li><a href="uikit_alerts.html">Alerts</a></li><li><a href="uikit_grid.html">Grid</a></li><li><a href="uikit_progress.html">Progress</a></li><li><a href="uikit_popovers.html">Popover</a></li></ul><ul class="sub-menu"><li><a href="uikit_tooltips.html">Tooltips</a></li><li><a href="uikit_buttons.html">Buttons</a></li><li><a href="uikit_dropdowns.html">Dropdowns</a></li><li><a href="uikit_typography.html">Typography</a></li></ul></div></div></li><li class="sub-header"><span>Elements</span></li><li class="has-sub-menu"><a href="#"><div class="icon-w"><div class="os-icon os-icon-mail"></div></div><span>Emails</span></a><div class="sub-menu-w"><div class="sub-menu-header">Emails</div><div class="sub-menu-icon"><i class="os-icon os-icon-mail"></i></div><div class="sub-menu-i"><ul class="sub-menu"><li><a href="emails_welcome.html">Welcome Email</a></li><li><a href="emails_order.html">Order Confirmation</a></li><li><a href="emails_payment_due.html">Payment Due</a></li><li><a href="emails_forgot.html">Forgot Password</a></li><li><a href="emails_activate.html">Activate Account</a></li></ul></div></div></li><li class="has-sub-menu"><a href="#"><div class="icon-w"><div class="os-icon os-icon-users"></div></div><span>Users</span></a><div class="sub-menu-w"><div class="sub-menu-header">Users</div><div class="sub-menu-icon"><i class="os-icon os-icon-users"></i></div><div class="sub-menu-i"><ul class="sub-menu"><li><a href="users_profile_big.html">Big Profile</a></li><li><a href="users_profile_small.html">Compact Profile</a></li></ul></div></div></li><li class="has-sub-menu"><a href="#"><div class="icon-w"><div class="os-icon os-icon-edit-32"></div></div><span>Forms</span></a><div class="sub-menu-w"><div class="sub-menu-header">Forms</div><div class="sub-menu-icon"><i class="os-icon os-icon-edit-32"></i></div><div class="sub-menu-i"><ul class="sub-menu"><li><a href="forms_regular.html">Regular Forms</a></li><li><a href="forms_validation.html">Form Validation</a></li><li><a href="forms_wizard.html">Form Wizard</a></li><li><a href="forms_uploads.html">File Uploads</a></li><li><a href="forms_wisiwig.html">Wisiwig Editor</a></li></ul></div></div></li><li class="has-sub-menu"><a href="#"><div class="icon-w"><div class="os-icon os-icon-grid"></div></div><span>Tables</span></a><div class="sub-menu-w"><div class="sub-menu-header">Tables</div><div class="sub-menu-icon"><i class="os-icon os-icon-grid"></i></div><div class="sub-menu-i"><ul class="sub-menu"><li><a href="tables_regular.html">Regular Tables</a></li><li><a href="tables_datatables.html">Data Tables</a></li><li><a href="tables_editable.html">Editable Tables</a></li></ul></div></div></li><li class="has-sub-menu"><a href="#"><div class="icon-w"><div class="os-icon os-icon-zap"></div></div><span>Icons</span></a><div class="sub-menu-w"><div class="sub-menu-header">Icons</div><div class="sub-menu-icon"><i class="os-icon os-icon-zap"></i></div><div class="sub-menu-i"><ul class="sub-menu"><li><a href="icon_fonts_simple_line_icons.html">Simple Line Icons</a></li><li><a href="icon_fonts_feather.html">Feather Icons</a></li><li><a href="icon_fonts_themefy.html">Themefy Icons</a></li><li><a href="icon_fonts_picons_thin.html">Picons Thin</a></li><li><a href="icon_fonts_dripicons.html">Dripicons</a></li><li><a href="icon_fonts_eightyshades.html">Eightyshades</a></li></ul><ul class="sub-menu"><li><a href="icon_fonts_entypo.html">Entypo</a></li><li><a href="icon_fonts_font_awesome.html">Font Awesome</a></li><li><a href="icon_fonts_foundation_icon_font.html">Foundation Icon Font</a></li><li><a href="icon_fonts_metrize_icons.html">Metrize Icons</a></li><li><a href="icon_fonts_picons_social.html">Picons Social</a></li><li><a href="icon_fonts_batch_icons.html">Batch Icons</a></li></ul><ul class="sub-menu"><li><a href="icon_fonts_dashicons.html">Dashicons</a></li><li><a href="icon_fonts_typicons.html">Typicons</a></li><li><a href="icon_fonts_weather_icons.html">Weather Icons</a></li><li><a href="icon_fonts_light_admin.html">Light Admin</a></li></ul></div></div></li></ul><div class="side-menu-magic"><h4>Light Admin</h4><p>Clean Bootstrap 4 Template</p><div class="btn-w"><a class="btn btn-white btn-rounded" href="https://themeforest.net/item/light-admin-clean-bootstrap-dashboard-html-template/19760124?ref=Osetin" target="_blank">Purchase Now</a></div></div></div><div class="content-w"><div class="top-bar color-scheme-transparent"><div class="top-menu-controls"><div class="element-search autosuggest-search-activator"><input placeholder="Start typing to search..."></div><div class="messages-notifications os-dropdown-trigger os-dropdown-position-left"><i class="os-icon os-icon-mail-14"></i><div class="new-messages-count">12</div><div class="os-dropdown light message-list"><ul><li><a href="#"><div class="user-avatar-w"><img alt="" src="img/avatar1.jpg"></div><div class="message-content"><h6 class="message-from">John Mayers</h6><h6 class="message-title">Account Update</h6></div></a></li><li><a href="#"><div class="user-avatar-w"><img alt="" src="img/avatar2.jpg"></div><div class="message-content"><h6 class="message-from">Phil Jones</h6><h6 class="message-title">Secutiry Updates</h6></div></a></li><li><a href="#"><div class="user-avatar-w"><img alt="" src="img/avatar3.jpg"></div><div class="message-content"><h6 class="message-from">Bekky Simpson</h6><h6 class="message-title">Vacation Rentals</h6></div></a></li><li><a href="#"><div class="user-avatar-w"><img alt="" src="img/avatar4.jpg"></div><div class="message-content"><h6 class="message-from">Alice Priskon</h6><h6 class="message-title">Payment Confirmation</h6></div></a></li></ul></div></div><div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-left"><i class="os-icon os-icon-ui-46"></i><div class="os-dropdown"><div class="icon-w"><i class="os-icon os-icon-ui-46"></i></div><ul><li><a href="users_profile_small.html"><i class="os-icon os-icon-ui-49"></i><span>Profile Settings</span></a></li><li><a href="users_profile_small.html"><i class="os-icon os-icon-grid-10"></i><span>Billing Info</span></a></li><li><a href="users_profile_small.html"><i class="os-icon os-icon-ui-44"></i><span>My Invoices</span></a></li><li><a href="users_profile_small.html"><i class="os-icon os-icon-ui-15"></i><span>Cancel Account</span></a></li></ul></div></div><div class="logged-user-w"><div class="logged-user-i"><div class="avatar-w"><img alt="" src="img/avatar1.jpg"></div><div class="logged-user-menu color-style-bright"><div class="logged-user-avatar-info"><div class="avatar-w"><img alt="" src="img/avatar1.jpg"></div><div class="logged-user-info-w"><div class="logged-user-name">Maria Gomez</div><div class="logged-user-role">Administrator</div></div></div><div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div><ul><li><a href="apps_email.html"><i class="os-icon os-icon-mail-01"></i><span>Incoming Mail</span></a></li><li><a href="users_profile_big.html"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a></li><li><a href="users_profile_small.html"><i class="os-icon os-icon-coins-4"></i><span>Billing Details</span></a></li><li><a href="#"><i class="os-icon os-icon-others-43"></i><span>Notifications</span></a></li><li><a href="#"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a></li></ul></div></div></div></div></div><ul class="breadcrumb"><li class="breadcrumb-item"><a href="index-2.html">Home</a></li><li class="breadcrumb-item"><a href="index-2.html">Products</a></li><li class="breadcrumb-item"><span>Laptop with retina screen</span></li></ul>
<div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div><div class="content-i"><div class="content-box"><div class="row"><div class="col-sm-12"><div class="element-wrapper"><div class="element-box">
    <form id="formValidate" method="POST" action="forms_validation.php">
        <h5 class="form-header">OPEN AN ACCOUNT</h5>
        
        
        <div class="row"><div 
class="col-sm-6"><div class="form-group"><label for=""> First Name</label><input class="form-control" data-error="Please input your First Name" placeholder="First Name" required="required" name="firstname"><div class="help-block form-text with-errors form-control-feedback"></div></div></div>
<div class="col-sm-6"><div class="form-group"><label for="">Last Name</label><input class="form-control" data-error="Please input your Last Name" placeholder="Last Name" required="required" name="lastname"><div class="help-block form-text with-errors form-control-feedback"></div></div></div></div><div class="row"><div class="col-sm-6"><div class="form-group"><label for=""> Date of Birth</label><input class="single-daterange form-control" placeholder="Date of birth"  name="dob"></div></div><div class="col-sm-6"><div class="form-group"><label for=""> Username</label><div class="input-group"><div class="input-group-prepend"><div class="input-group-text">@</div></div><input class="form-control" placeholder="Twitter Username"></div></div></div></div>


       
<div class="form-group"><label for=""> Email address</label><input class="form-control" data-error="Your email address is invalid" placeholder="Enter email" required="required" type="email" name="email"><div class="help-block form-text with-errors form-control-feedback"></div></div>
<div class="form-group"><label for=""> Phone Number</label><input class="form-control" data-error="Your email address is invalid" placeholder="Enter phone" required="required" type="text" name="phone"><div class="help-block form-text with-errors form-control-feedback"></div></div>
<div class="form-group"><label for=""> Country</label><input class="form-control" data-error="Your email address is invalid" placeholder="Enter country" required="required" type="text" name="country"><div class="help-block form-text with-errors form-control-feedback"></div></div>
<div class="form-group"><label for=""> House address</label><input class="form-control" data-error="Your email address is invalid" placeholder="Enter address" required="required" type="text" name="address"><div class="help-block form-text with-errors form-control-feedback"></div></div>
<div class="row"><div class="col-sm-6"><div class="form-group"><label for=""> Male</label><input class="form-control" data-minlength="6" placeholder="Password" required="required" type="radio" name="gender" value="female"></div></div><div class="col-sm-6"><div class="form-group"><label for="">Female</label><input class="form-control" data-match-error="Passwords don&#39;t  match" placeholder="Confirm Password" required="required" type="radio" name="gender" value="female"><div class="help-block form-text with-errors form-control-feedback"></div></div></div></div>
<div class="row"><div class="col-sm-6"><div class="form-group"><label for=""> Password</label><input class="form-control" data-minlength="6" placeholder="Password" required="required" type="password" name="password"><div class="help-block form-text text-muted form-control-feedback">Minimum of 6 characters</div></div></div><div class="col-sm-6"><div class="form-group"><label for="">Confirm Password</label><input class="form-control" data-match-error="Passwords don&#39;t match" placeholder="Confirm Password" required="required" type="password" name="cpassword"><div class="help-block form-text with-errors form-control-feedback"></div></div></div></div>
<div class="form-group"><label for=""> Account Number</label><input class="form-control" data-error="Your email address is invalid" placeholder="Enter accountnumber" required="required" type="text" name="accountnumber"><div class="help-block form-text with-errors form-control-feedback"></div></div>
<div class="form-group"><label for=""> 4 digit pin</label><input class="form-control" data-error="Your email address is invalid" placeholder="Enter 4 digit pin" required="required" type="text" name="pin"><div class="help-block form-text with-errors form-control-feedback"></div></div>

<div class="form-group"><label for=""> Account Status</label><select class="form-control" name="status"><option value="active">Active</option><option value="freeze">Freeze</option></select>
</div>
<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox">I agree to terms and conditions</label></div><div class="form-buttons-w"><button class="btn btn-primary" type="submit" name="register"> Submit</button></div></form></div></div></div></div><div class="floated-colors-btn second-floated-btn"><div class="os-toggler-w"><div class="os-toggler-i"><div class="os-toggler-pill"></div></div></div><span>Dark </span><span>Colors</span></div><div class="floated-customizer-btn third-floated-btn"><div class="icon-w"><i class="os-icon os-icon-ui-46"></i></div><span>Customizer</span></div><div class="floated-customizer-panel"><div class="fcp-content"><div class="close-customizer-btn"><i class="os-icon os-icon-x"></i></div><div class="fcp-group"><div class="fcp-group-header">Menu Settings</div><div class="fcp-group-contents"><div class="fcp-field"><label for="">Menu Position</label><select class="menu-position-selector"><option value="left">Left</option><option value="right">Right</option><option value="top">Top</option></select></div><div class="fcp-field"><label for="">Menu Style</label><select class="menu-layout-selector"><option value="compact">Compact</option><option value="full">Full</option><option value="mini">Mini</option></select></div><div class="fcp-field with-image-selector-w"><label for="">With Image</label><select class="with-image-selector"><option value="yes">Yes</option><option value="no">No</option></select></div><div class="fcp-field"><label for="">Menu Color</label><div class="fcp-colors menu-color-selector"><div class="color-selector menu-color-selector color-bright selected"></div><div class="color-selector menu-color-selector color-dark"></div><div class="color-selector menu-color-selector color-light"></div><div class="color-selector menu-color-selector color-transparent"></div></div></div></div></div><div class="fcp-group"><div class="fcp-group-header">Sub Menu</div><div class="fcp-group-contents"><div class="fcp-field"><label for="">Sub Menu Style</label><select class="sub-menu-style-selector"><option value="flyout">Flyout</option><option value="inside">Inside/Click</option><option value="over">Over</option></select></div><div class="fcp-field"><label for="">Sub Menu Color</label><div class="fcp-colors"><div class="color-selector sub-menu-color-selector color-bright selected"></div><div class="color-selector sub-menu-color-selector color-dark"></div><div class="color-selector sub-menu-color-selector color-light"></div></div></div></div></div><div class="fcp-group"><div class="fcp-group-header">Other Settings</div><div class="fcp-group-contents"><div class="fcp-field"><label for="">Full Screen?</label><select class="full-screen-selector"><option value="yes">Yes</option><option value="no">No</option></select></div><div class="fcp-field"><label for="">Show Top Bar</label><select class="top-bar-visibility-selector"><option value="yes">Yes</option><option value="no">No</option></select></div><div class="fcp-field"><label for="">Above Menu?</label><select class="top-bar-above-menu-selector"><option value="yes">Yes</option><option value="no">No</option></select></div><div class="fcp-field"><label for="">Top Bar Color</label><div class="fcp-colors"><div class="color-selector top-bar-color-selector color-bright selected"></div><div class="color-selector top-bar-color-selector color-dark"></div><div class="color-selector top-bar-color-selector color-light"></div><div class="color-selector top-bar-color-selector color-transparent"></div></div></div></div></div></div></div><div class="floated-chat-btn"><i class="os-icon os-icon-mail-07"></i><span>Demo Chat</span></div><div class="floated-chat-w"><div class="floated-chat-i"><div class="chat-close"><i class="os-icon os-icon-close"></i></div><div class="chat-head"><div class="user-w with-status status-green"><div class="user-avatar-w"><div class="user-avatar"><img alt="" src="img/avatar1.jpg"></div></div><div class="user-name"><h6 class="user-title">John Mayers</h6><div class="user-role">Account Manager</div></div></div></div><div class="chat-messages"><div class="message"><div class="message-content">Hi, how can I help you?</div></div><div class="date-break">Mon 10:20am</div><div class="message"><div class="message-content">Hi, my name is Mike, I will be happy to assist you</div></div><div class="message self"><div class="message-content">Hi, I tried ordering this product and it keeps showing me error code.</div></div></div><div class="chat-controls"><input class="message-input" placeholder="Type your message here..."><div class="chat-extra"><a href="#"><span class="extra-tooltip">Attach Document</span><i class="os-icon os-icon-documents-07"></i></a><a href="#"><span class="extra-tooltip">Insert Photo</span><i class="os-icon os-icon-others-29"></i></a><a href="#"><span class="extra-tooltip">Upload Video</span><i class="os-icon os-icon-ui-51"></i></a></div></div></div></div></div><div class="content-panel"><div class="content-panel-close"><i class="os-icon os-icon-close"></i></div><div class="element-wrapper"><h6 class="element-header">Support Agents</h6><div class="element-box-tp"><div class="profile-tile"><a class="profile-tile-box" href="users_profile_small.html"><div class="pt-avatar-w"><img alt="" src="img/avatar1.jpg"></div><div class="pt-user-name">John Mayers</div></a><div class="profile-tile-meta"><ul><li>Last Login:<strong>Online Now</strong></li><li>Tickets:<strong><a href="apps_support_index.html">12</a></strong></li><li>Response Time:<strong>2 hours</strong></li></ul><div class="pt-btn"><a class="btn btn-success btn-sm" href="apps_full_chat.html">Send Message</a></div></div></div><div class="profile-tile"><a class="profile-tile-box" href="users_profile_small.html"><div class="pt-avatar-w"><img alt="" src="img/avatar3.jpg"></div><div class="pt-user-name">Ben Gossman</div></a><div class="profile-tile-meta"><ul><li>Last Login:<strong>Offline</strong></li><li>Tickets:<strong><a href="apps_support_index.html">9</a></strong></li><li>Response Time:<strong>3 hours</strong></li></ul><div class="pt-btn"><a class="btn btn-secondary btn-sm" href="apps_full_chat.html">Send Message</a></div></div></div><div class="profile-tile"><a class="profile-tile-box" href="users_profile_small.html"><div class="pt-avatar-w"><img alt="" src="img/avatar2.jpg"></div><div class="pt-user-name">Ken Sorrons</div></a><div class="profile-tile-meta"><ul><li>Last Login:<strong>Offline</strong></li><li>Tickets:<strong><a href="apps_support_index.html">17</a></strong></li><li>Response Time:<strong>1 hour</strong></li></ul><div class="pt-btn"><a class="btn btn-danger btn-sm" href="apps_full_chat.html">Send Message</a></div></div></div></div></div><div class="element-wrapper"><h6 class="element-header">Side Tables</h6><div class="element-box"><h5 class="form-header">Table in white box</h5><div class="form-desc">You can put a table tag inside an <code>.element-box</code> class wrapper and add <code>.table</code> class to it to get something like this:</div><div class="controls-above-table"><div class="row"><div class="col-sm-12"><a class="btn btn-sm btn-primary" href="#">Download CSV</a><a class="btn btn-sm btn-danger" href="#">Delete</a></div></div></div><div class="table-responsive"><table class="table table-lightborder"><thead><tr><th>Customer</th><th class="text-center">Status</th></tr></thead><tbody><tr><td>John Mayers</td><td class="text-center"><div class="status-pill green" data-title="Complete" data-toggle="tooltip"></div></td></tr><tr><td>Kelly Brans</td><td class="text-center"><div class="status-pill red" data-title="Cancelled" data-toggle="tooltip"></div></td></tr><tr><td>Tim Howard</td><td class="text-center"><div class="status-pill green" data-title="Complete" data-toggle="tooltip"></div></td></tr><tr><td>Joe Trulli</td><td class="text-center"><div class="status-pill yellow" data-title="Pending" data-toggle="tooltip"></div></td></tr><tr><td>Fred Kolton</td><td class="text-center"><div class="status-pill green" data-title="Complete" data-toggle="tooltip"></div></td></tr></tbody></table></div></div></div></div></div></div></div><div class="display-type"></div></div><script src="bower_components/jquery/dist/jquery.min.js"></script><script src="bower_components/popper.js/dist/umd/popper.min.js"></script><script src="bower_components/moment/moment.js"></script><script src="bower_components/chart.js/dist/Chart.min.js"></script><script src="bower_components/select2/dist/js/select2.full.min.js"></script><script src="bower_components/jquery-bar-rating/dist/jquery.barrating.min.js"></script><script src="bower_components/ckeditor/ckeditor.js"></script><script src="bower_components/bootstrap-validator/dist/validator.min.js"></script><script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script><script src="bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js"></script><script src="bower_components/dropzone/dist/dropzone.js"></script><script src="bower_components/editable-table/mindmup-editabletable.js"></script><script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script><script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script><script src="bower_components/fullcalendar/dist/fullcalendar.min.js"></script><script src="bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script><script src="bower_components/tether/dist/js/tether.min.js"></script><script src="bower_components/slick-carousel/slick/slick.min.js"></script><script src="bower_components/bootstrap/js/dist/util.js"></script><script src="bower_components/bootstrap/js/dist/alert.js"></script><script src="bower_components/bootstrap/js/dist/button.js"></script><script src="bower_components/bootstrap/js/dist/carousel.js"></script><script src="bower_components/bootstrap/js/dist/collapse.js"></script><script src="bower_components/bootstrap/js/dist/dropdown.js"></script><script src="bower_components/bootstrap/js/dist/modal.js"></script><script src="bower_components/bootstrap/js/dist/tab.js"></script><script src="bower_components/bootstrap/js/dist/tooltip.js"></script><script src="bower_components/bootstrap/js/dist/popover.js"></script><script src="js/demo_customizer5739.js?version=4.5.0"></script><script src="js/main5739.js?version=4.5.0"></script><script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','../www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-42863888-9', 'auto');
ga('send', 'pageview');</script></body>
<!-- Mirrored from light.pinsupreme.com/forms_validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Nov 2021 15:52:35 GMT -->
</html> 