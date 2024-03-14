<!DOCTYPE HTML>
<html>

    <head>
        
        @include('layouts.sitehead')
        <title>Admin | Register</title>	
        
    </head>

    <body>

        <header class="header_type_2">
            {{-- header --}}
            @include('layouts.siteheader')
            <div class="breadcrumbs">  
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a class="first_element" href="{{ route('site.page.index') }}">Home</a><a href="{{ route('site.page.index') }}">Admin</a><span>Register</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header end -->

        <!-- Content blocks -->
        <section class="contact-us-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        
                        <div class="main_contact_form col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="light_text">Admin Register</h3>
                            <div class="contact_us_form">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
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
                                <form method="post" action="{{ route('admin.register.store') }}">
                                    @csrf
                                    <div class="row form-row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">Username</label>
                                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username">
                                                @error('username')
                                                    <div class="help-block with-errors form-control-feedback form-text">{{ $message }}</div>
                                                @enderror
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">Email</label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">
                                                @error('email')
                                                    <div class="help-block with-errors form-control-feedback form-text">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">Password</label>
                                                <input type="password" class="form-control  " name="password">
                                                @error('password')
                                                    <div class="help-block with-errors form-control-feedback form-text">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">Confirm Password</label>
                                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                                                @error('password_confirmation')
                                                    <div class="help-block with-errors form-control-feedback form-text">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary py-2 px-4" style="font-size: 14px">Register</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>       
                                                        
                </div>
            </div>
            
        </section>



        <!-- Footer -->
        @include('layouts.sitefooter')
        
    </body>

</html> 