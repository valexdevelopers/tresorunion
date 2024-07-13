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
                                <h2>Transaction History</h2>
                            </div>

                            <div class="page_content">
                                <div class="left_page_content">
                                    <!-- <div class="balance_card">
                                        <div class="balance_card_header">
                                            <div class="left_card_header">
                                                <p>Balance</p>
                                            </div>
                                            <div class="right_card_header">
                                                <i class="bi bi-three-dots"></i>
                                            </div>
                                        </div>
                                        <div class="balance_card_body">
                                            <p><span>$850,000.00</span> <button type="button" class="view_balance"><i class="bi bi-eye-slash"></i></button></p>
                                            <div class="progress_bar"><div></div></div>
                                        </div>
                                        <div class="balance_card_footer">
                                            <div class="account_details">
                                                <p>Egerega Virtue</p>
                                                <p>22012345234</p>
                                            </div>
                                            <div class="daily_limit">
                                                <p>$10,000/$35,000</p>
                                                <small>Daily Limit</small>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="main_content">
                                        <div class="invoice-w">
                                            <div class="infos">
                                                <div class="info-1">
                                                    <div class="invoice-logo-w">
                                                        {{-- <img alt="" width="140px"; src="{{ asset('userdashboard/img/logo.png') }}"> --}}
                                                    </div>
                                                    <div class="invoice-heading">
                                                        <h3>Transaction Receipt</h3>
                                                        <div class="invoice-date">
                                                            {{ date('l j, F Y, g:i a') }}
                                                        </div>
                                                    </div>
                                                    <div class="invoice-body">
                                                        <div class="invoice-desc">
                                                            <div class="desc-label">Receipt #</div>
                                                            <div class="desc-value">TRF{{ bin2hex(random_bytes(4)) }}</div>
                                                        </div>
                                                        <div class="invoice-table">
                                                            <table class="table receipt_table " style="background-color: red !important">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Description</th>
                                                                    </tr>
                                                                </thead>
                                                                
                                                                <tbody>
                                                                    <tr>
                                                                        <td> Transfer to {{ $account_holder }} {{ $destination_bank }} {{ $destination_account }}- ${{ number_format($transferamount, 2) }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                    
                                                            <div class="terms">
                                                                <div class="terms-header">Terms and Conditions</div>
                                                                    <div class="terms-content">International Transfers May be slow and take up to 3 working days to reflect . A 5% fee is applied to your account.</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="invoice-footer">
                                                        <div class="invoice-logo">
                                                            {{-- <img alt="" src=""> --}}
                                                            <span>Tresor Crest Inc</span>
                                                        </div>
                                                        <div class="invoice-info">
                                                            <span>support@tresorcrest.com</span>
                                                            <span></span>
                                                        </div>
                                                    </div>
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