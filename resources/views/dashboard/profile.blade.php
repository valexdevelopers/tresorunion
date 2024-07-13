<!DOCTYPE html>
<html>
    @include('layouts.dashboard.dashboardhead')
    <body>
        <div class="page_wrapper">
            <div class="page_inner_wrapper">
                <div class="menu_wrapper" id="menu_wrapper">
                    @include('layouts.dashboard.dashboardmenu')
                </div>
                <div class="main_page_wrapper">
                    <section class="sticky_header_section">
                        <header>
                            <div class="sticky_header">
                                <div class="mobile_menu_btn">
                                    <button type="button" class="menu_btn" id="menu_btn"><i class="bi bi-list-stars"></i></button>
                                </div>
                                <div class="page_navigation">
                                    <p ><span>Main</span> <i class="bi bi-chevron-right"></i><span>Profile</span></p>
                                </div>
                                <div class="sticky_header_right_nav">
                                    <div class="todays_date">
                                        <p>{{ date('l d m Y H:i a') }}</p>
                                    </div>
                                    <div class="notification bordered_btn">
                                       <a href="" class="notification_btn"><i class="bi bi-bell"></i></a> 
                                    </div>
                                    <div class="send_mail bordered_btn">
                                        <a href=""><i class="bi bi-envelope"></i></a>
                                        
                                    </div>
                                   
                                </div>
                            </div>
                        </header>
                    </section>
                    <main>
                        <div class="this_page_title">
                            <h2>Personal Profile</h2>
                        </div>

                        <div class="page_content">
                            <div class="left_page_content">
                                <div class="balance_card">
                                    <div class="profile_card">
                                        <div class="user_profile_image">
                                            <div class="user_image_wrap">
                                                <img class="user_image" src="../assets/img/avatar1.jpg" alt="virtue">
                                            </div>
                                        </div>
                                        <div class="user_extra_details">
                                            <div class="detail_group">
                                                <h3>Email</h3>
                                                <p>{{ Auth::user()->email }}</p>
                                            </div>
                                            <div class="detail_group">
                                                <h3>Mobile Number</h3>
                                                <p>+{{ Auth::user()->phone }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="profile_details_wrap">
                                    <div class="basic_info">
                                        <div class="detail_header">
                                            <h2>Basic Information</h2>
                                        </div>
                                        <div class="details_info">
                                            <div class="detail_group">
                                                <h3>First Name</h3>
                                                <p>{{ Auth::user()->first }}</p>
                                            </div>
                                            <div class="detail_group">
                                                <h3>Middle Name</h3>
                                                <p>Null</p>
                                            </div>
                                            <div class="detail_group">
                                                <h3>Last Name</h3>
                                                <p>{{ Auth::user()->lastname }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="contact_info">
                                        <div class="detail_header">
                                            <h2>Contact Information</h2>
                                        </div>
                                        <div class="details_info">
                                            <div class="detail_group">
                                                <h3>Email</h3>
                                                <p>{{ Auth::user()->email }}</p>
                                            </div>
                                            <div class="detail_group">
                                                <h3>Mobile Number</h3>
                                                <p>+{{ Auth::user()->phone }}</p>
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="right_page_content">
                                @include('layouts.dashboard.right_page_content')
                            </div>
                            
                        </div>
                    </main>
                    
                    
                </div>
            </div>
            
        </div>
        @include('layouts.dashboard.dashboardscripts')
    </body>
</html>