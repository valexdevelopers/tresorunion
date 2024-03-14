<!DOCTYPE HTML>
<html>
    <head>
        @include('layouts.sitehead')
        <title>Contact Us | Tresor Union</title>	
        
    </head>

    <body>
        <!--Header -->
        <header class="header_type_2">
            {{-- header --}}
            @include('layouts.siteheader')
            <div class="breadcrumbs">  
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a class="first_element" href="{{ route('site.page.index') }}">Home</a><span>Contact us</span>
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
                        <div class="map-sector col-lg-4 col-md-4 col-sm-5 col-xs-12">
                            <h3 class="light_text">Contact Info</h3>
                            <div class="contact_us">
                                <span><img src="images/adress.png" alt=""/> ketokivenkaari 11 ,Helsinki 00700</span> 
                                <span><img src="images/mail.png" alt=""/><a href="mailto:customercare@"><span class="__cf_email__" >Send Mail</span></a></span>
                                <span><img src="images/phone.png" alt=""/>35-845-490-0280</span>
                            </div>
                            <div id="map"></div>
                        </div>
                        <div class="main_contact_form col-lg-8 col-md-8 col-sm-7 col-xs-12">
                            <h3 class="light_text">Send Us A Message</h3>
                            <div class="contact_us_form">
                                <input class="name" id="posName2" placeholder="Name"/>
                                <input class="email" id="posEmail2" placeholder="Email"/>
                                <input class="subject" id="posSubject2" placeholder="Subject"/>
                                <textarea id="posText2" placeholder="Mesage"></textarea>
                                <button type="button" class="button_fat" id="send2">Submit</button>
                                <div class="span4">
                                    <div class="lod_bar" id='loadBar2'></div>
                                </div>
                            </div>
                        </div>
                    </div>       
                                                        
                </div>
            </div>
            
        </section>



        @include('layouts.sitefooter')
    
    </body>


</html>