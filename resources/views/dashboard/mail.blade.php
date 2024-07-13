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
                                <h2>Mail Support</h2>
                            </div>

                            <div class="page_content">
                                <div class="left_page_content">
                                    
                                    <div class="transfer_form_wrap">
                                        
                                        <div class="transfer_form" id="intra_form">
                                            @if($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                    
                                                </div>
                                            
                                            @endif
                                            @if(Session::has('message'))
                                                <div class="alert {{ Session::get('message-color') }} alert-dismissible fade show " role="alert">
                                                    <strong>{{ Session::get('message') }}</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                                                </div>
                                            @endif
                                            <form action="{{ route('user.sendmail.index') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row form-row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-label">Subject</label>
                                                            <input type="text" class="form-control" name="subject">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-label">Priority</label>
                                                            <select name="priority" id="" class="form-select">
                                                                <option value="low priority">Low Priority</option>
                                                                <option value="medium priority">Medium Priority</option>
                                                                <option value="high priority">High Priority</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row form-row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="" class="form-label">Message</label>
                                                            <textarea class="" name="message" id="" cols="60" rows="10"></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row form-row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="" class="form-label">Attachment</label>
                                                            <input type="file" class="form-control" name="attachment">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row form-row">
                                                    
                                                    <div class="col-sm-6">
                                                        <div class="form-group d-block">
                                                          
                                                            <button type="submit" class="btn btn-success ">Send Message</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </form>
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