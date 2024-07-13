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
                                                <h5 class="form-header">REGISTER</h5>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for=""> First Name</label>
                                                            <input value="{{ old('firstname') }}" class="form-control"  placeholder="First Name" required="required" name="firstname">
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="">Last Name</label>
                                                            <input value="{{ old('lastname') }}" class="form-control" placeholder="Last Name" required="required" name="lastname">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for=""> Date of Birth</label>
                                                            <input value="{{ old('dob') }}" class="form-control" placeholder="Date of birth"  name="dob" type="date">
                                                            
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for=""> Account Number</label>
                                                            <input value="{{ old('accountnumber') }}" class="form-control" placeholder="" name="accountnumber" type="text">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row ">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for=""> Email address</label>
                                                            <input value="{{ old('email') }}" class="form-control"  placeholder="Enter email" required="required" type="email" name="email">
                                                            
                                                        </div>

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for=""> Phone Number</label>
                                                            <input value="{{ old('phone') }}" class="form-control"  placeholder="Enter phone" required="required" type="text" name="phone">
                                                            
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row ">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="">Country</label>
                                                            <input value="{{ old('country') }}" class="form-control"  placeholder="Enter email" required="required" type="text" name="country">
                                                            
                                                        </div>

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for=""> State</label>
                                                            <input value="{{ old('state') }}" class="form-control"  placeholder="Enter phone" required="required" type="text" name="state">
                                                            
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row ">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for=""> House address</label>
                                                            <input value="{{ old('address') }}" class="form-control"  placeholder="Enter address" required="required" type="text" name="address">
                                                            
                                                        </div>


                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for=""> Gender</label>
                                                            <select id="" class="form-select" name="gender" value="{{ old('gender') }}">
                                                                <option value="female">Male</option>
                                                                <option value="male">Female</option>
                                                            </select>
                                                            
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for=""> Password</label>
                                                            <input value="{{ old('password') }}" class="form-control" data-minlength="6" placeholder="Password" required="required" type="password" name="password">
                                                            <div class="help-block form-text text-muted form-control-feedback">Minimum of 6 characters</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="">Confirm Password</label>
                                                            <input value="{{ old('password_confirmation') }}" class="form-control" placeholder="Confirm Password" required="required" type="password" name="password_confirmation">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for=""> 4 digit pin</label>
                                                            <input value="{{ old('pin') }}" class="form-control"  placeholder="Enter 4 digit pin" required="required" type="password" name="pin">
                                                            
                                                        </div>

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for=""> Account Status</label>
                                                            <select class="form-control" name="status" value="{{ old('status') }}">
                                                                <option value="active">Active</option>
                                                                <option value="freeze">Freeze</option>
                                                            </select>

                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for=""> Security Question</label>
                                                            <select class="form-control" name="question" value="{{ old('question') }}">
                                                                <option value="pet"> First pet's name</option>
                                                                <option value="daugther"> Daughter's name</option>
                                                                <option value="mother">Mother's maiden name</option>
                                                                <option value="food">Favourite food</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="">Answer</label>
                                                            <input value="{{ old('answer') }}" class="form-control"  placeholder="" required="required" type="text" name="answer">
                                                            
                                                        </div>

                                                    </div>

                                                </div>
                                                
                                                <div class="form-buttons-w">
                                                    <button class="btn btn-success" type="submit" name="register"> Register User</button>
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