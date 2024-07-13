<div class="top_logo_wrapper">
    <div class="brand_container">
        <img src="{{ asset('userdashboard/img/logo.png') }}" alt="" class="brand_logo">
    </div>
    <div class="brand_side_icon" id="close_menu">
        <i class="bi bi-arrow-left-right"></i>
    </div>
</div>
<div class="user_details">
    <div class="user_avatar">
        <img src="{{ asset('storage/'.Auth::user()->passport) }}" alt="{{ Auth::user()->firstname }}">
    </div>
    <div class="user_name">
        <p style="text-transform: capitalize">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</p>
    </div>
    <div class="user_edit">
        <i class="bi bi-pen"></i>
    </div>
</div>

<div class="main_menu_wrapper">
    <ul>
        
        <div class="menu_section">
            <li class="menu_group_title no_list_style">General</li>
            <li class="no_list_style active"><a class="no_text_deco active" href="{{ route('user.dashboard.index') }}"><i class="bi bi-arrows-fullscreen"></i> <span>Overview</span> <i class="bi bi-chevron-right"></i></a></li>
            <li class="no_list_style "><a class="no_text_deco " href="{{ route('user.history.index') }}"><i class="bi bi-receipt"></i> <span>Transaction History</span><i class="bi bi-chevron-right"></i></a></li>
            <li class="no_list_style "><a class="no_text_deco " href="{{ route('user.transfer.index') }}"><i class="bi bi-arrow-left-right"></i> <span>Funds Transfer</span><i class="bi bi-chevron-right"></i></a></li>
            
        </div>

        {{-- <div class="menu_section">
            <li class="menu_group_title no_list_style">Cards</li>
            <!-- <li class="no_list_style"><a class="no_text_deco" href="#"><i class="bi bi-credit-card"></i> <span>Disable Card</span><i class="bi bi-chevron-right"></i></a></li> -->
            <li class="no_list_style"><a class="no_text_deco" href="#"><i class="bi bi-credit-card-2-back"></i> <span>Request New Card</span><i class="bi bi-chevron-right"></i></a></li>
            <!-- <li class="no_list_style"><a class="no_text_deco" href="#"><i class="bi bi-credit-card-2-front"></i> <span>Remove Card</span><i class="bi bi-chevron-right"></i></a></li> -->
            
        </div> --}}

        <div class="menu_section">
            <li class="menu_group_title no_list_style">Bills & Payments</li>
           
            <li class="no_list_style "><a class="no_text_deco " href="{{ route('user.scheduledpayment.index') }}"><i class="bi bi-coin"></i> <span>Scheduled Payments</span><i class="bi bi-chevron-right"></i></a></li>
            <li class="no_list_style "><a class="no_text_deco " href="{{ route('user.paymentsdue.index') }}"><i class="bi bi-calendar-date"></i> <span>Payments Due</span><i class="bi bi-chevron-right"></i></a></li>
        </div>
        <div class="menu_section">
            <li class="menu_group_title no_list_style">Customer Support</li>
            <li class="no_list_style "><a class="no_text_deco " href="{{ route('site.page.contact') }}"><i class="bi bi-headset"></i> <span>Help & Support</span><i class="bi bi-chevron-right"></i></a></li>
            <li class="no_list_style "><a class="no_text_deco " href="{{ route('user.mail.index') }}"><i class="bi bi-envelope"></i> <span>Mail Us</span><i class="bi bi-chevron-right"></i></a></li>
            
        </div>
        <div class="menu_section">
            <li class="menu_group_title no_list_style">Security</li>
           
            <li class="no_list_style "><a class="no_text_deco " href="{{ route('user.changepassword.index') }}"><i class="bi bi-person-lock"></i><span>Change Password</span><i class="bi bi-chevron-right"></i></a></li>
            <li class="no_list_style "><a class="no_text_deco " href="{{ route('user.changepin.index') }}"><i class="bi bi-house-lock"></i><span>Change Pin</span><i class="bi bi-chevron-right"></i></a></li>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="logout_btn"><i class="bi bi-arrow-bar-right"></i> Logout</button>
            </form>
        </div>
    </ul>
    
</div>