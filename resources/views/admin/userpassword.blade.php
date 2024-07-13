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
                    <ul class="breadcrumb"><li class="breadcrumb-item"><a href="index.html">Home</a></li><li class="breadcrumb-item"><a href="index.html">Products</a></li><li class="breadcrumb-item"><span>Laptop with retina screen</span></li></ul>    
                    <div class="content-i">
                        <div class="content-box">
                            <div class="element-wrapper">
                                <h6 class="element-header">Profile</h6>
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
                                <div class="element-box">
                                    <form method="POST" action="{{ route('admin.user.password.store') }}">
                                        @csrf
                                        <h5 class="form-header">Change {{ $user->firstname }} {{ $user->lastname }} Password</h5>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="">Account Name</label>
                                                    <input class="form-control" value="{{ $user->firstname }} {{ $user->lastname }}" placeholder="" required="required" type="text" readonly="">
                                                    <input value="{{ $user->id }}"required="required" type="hidden" name="user_id">

                                                    
                                                </div>
                                            </div>       
                                            
                                            
                                        </div>
                                        <div class="row">       
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="">New Password</label>
                                                    <input class="form-control @error('password') is-invalid @enderror" placeholder="maximum profit for this plan" required="required" type="password" name="password">
                                                    @error('password') 
                                                        <div class="help-block form-text with-errors form-control-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="">Confirm Password</label>
                                                    <input class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Enter number of trading days" required="required" type="password" name="password_confirmation">
                                                    @error('password_confirmation') 
                                                        <div class="help-block form-text with-errors form-control-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-buttons-w">
                                            <button class="btn btn-primary" type="submit" name="register">Update Password</button>
                                        </div>
                                    </form>
                                
                                </div>
                            </div>

                            {{-- customizers start --}}
                            @include('layouts.admincustomizers')
                            {{-- customizers end --}}
                        </div>
                    </div>
                </div>
            </div>
       
            <div class="display-type"></div>
        </div>

        @include('layouts.adminscripts')
        
    </body>
</html> 