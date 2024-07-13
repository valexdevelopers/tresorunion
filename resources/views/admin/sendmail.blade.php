<!DOCTYPE html>
<html>
    <head>
        <title>Admin | Tresor Crest</title>
        @include('layouts.admindashboardhead')
    </head>
    <body class="menu-position-side menu-side-left full-screen">
        <div class="all-wrapper solid-bg-all">
            
            @include('layouts.admindashboardheader')
            <div class="layout-w">
                @include('layouts.adminmenu')
                <div class="content-w">    
                    <div class="content-i">
                        <div class="content-box">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="element-wrapper">
                                        <div class="element-box">
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
                                                <div class="alert {{ Session::get('message-color') }} alert-dismissible fade show" role="alert">
                                                    <strong>{{ Session::get('message') }}</strong> 
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            @endif
                                            <form id="formValidate" method="POST" action="{{ route('user.register.store') }}">
                                                @csrf
                                                <h5 class="form-header">Send Email</h5>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="">Account Name</label>
                                                            <input class="form-control" value="{{ $user->firstname }} {{ $user->lastname }}" placeholder="" required="required" type="text" readonly="">
                                                            <input value="{{ $user->id }}"required="required" type="hidden" name="user_id">
        
                                                            
                                                        </div>
                                                    </div>       

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="">Subject</label>
                                                            <input value="{{ old('lastname') }}" class="form-control" placeholder="Last Name" required="required" name="lastname">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="">Message</label>
                                                            <textarea name="message_body" id="" cols="30" rows="10"></textarea>
                                                            
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for=""> Account Number</label>
                                                            <input value="{{ old('accountnumber') }}" class="form-control" placeholder="" name="accountnumber" type="text">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                
                                                
                                                
                                                <div class="form-buttons-w">
                                                    <button class="btn btn-success" type="submit" name="register"> Mail User</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="display-type"></div>
        </div>
        @include('layouts.adminscripts')
    </body>
</html> 