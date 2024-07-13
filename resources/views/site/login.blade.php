
<!DOCTYPE HTML>
<html>

    <head>
        @include('layouts.sitehead')
        <title>Login | Tresor Crest</title>
    </head>

    <body>

        <header class="header_type_2">
            @include('layouts.siteheader')
            <div class="breadcrumbs">  
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a class="first_element" href="https://html.modernwebtemplates.com/">Home</a><span>Sign In</span>
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
                            <h3 class="light_text">Sign In</h3>
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
                                <form method="post" action="{{ route('login.store') }}">
                                    @csrf
                                    <input class="subject" type="text"  placeholder="Email" name="email"/>
                                    
                                    <input class="subject" type="password"  placeholder="Password" name="password"/>
                                    
                                    <button type="submit" class="button_fat" id="send2" name="login">Submit</button>
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