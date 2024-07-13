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
                                    <p ><span>Main</span> <i class="bi bi-chevron-right"></i><span>Overview</span></p>
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
                            <h2>Overview</h2>
                        </div>

                        <div class="page_content">
                            <div class="left_page_content">
                                <div class="balance_card">
                                    <div class="balance_card_header">
                                        <div class="left_card_header">
                                            <p>Balance</p>
                                        </div>
                                        <div class="right_card_header">
                                            <i class="bi bi-three-dots"></i>
                                        </div>
                                    </div>
                                    <div class="balance_card_body">
                                        <p><span>${{ number_format($balance, 2) }}</span> <button type="button" class="view_balance"><i class="bi bi-eye-slash"></i></button></p>
                                        <div class="progress_bar"><div></div></div>
                                    </div>
                                    <div class="balance_card_footer">
                                        <div class="account_details">
                                            <p style="text-transform: capitalize">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</p>
                                            <p class="acct_no">{{ Auth::user()->accountnumber }}</p>
                                        </div>
                                        <div class="daily_limit">
                                            <p>$10,000/$35,000</p>
                                            <small>Daily Limit</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="money_analytics">
                                    <div class="chart_container">
                                        <canvas id="myChart"></canvas>
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