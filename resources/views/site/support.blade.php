<!DOCTYPE HTML>
<html>
    <head>
        @include('layouts.sitehead')	
        <title>Support | Tresor Union</title>	
        
    </head>

    <body>

        <!-- Header -->
        <header class="header_type_2">
            {{-- header --}}
            @include('layouts.siteheader')
            <div class="breadcrumbs">  
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a class="first_element" href="{{ route('site.page.index') }}">Home</a><a href="#features">Features</a><span>Support</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header end -->

        <!-- Content blocks -->
        <section class="support-section">
            <div class="container">
                <div class="row">
                    <article class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    
                        <div class="changed_h col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="support-section-heading">
                                <h5>Our Support Policy</h5>
                                <p>Ribeye tail rump proident, turducken adipisicing kielbasa jowl in jerky in ham meatball dolor eu.<br />
                                Strip steak pariatur labore et prosciutto, hamburger in alcatra culpa. Minim voluptate cupim beef pork chop pancetta ex tongue.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <ul class="unordered_ul">
                        <li>Ut in t-bone pork chop, in exercitation tempor capicola andouille eiusmod.</li>
                        <li>Ham irure deserunt chicken, andouille in laboris occaecat excepteur.</li>
                        <li>Do sed in, quis swine leberkas eiusmod venison.</li>
                        <li>Non bacon leberkas tail t-bone labore anim. Do labore ea esse fugiat non veniam.</li>
                        </ul>
                        </div> 
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <ul class="unordered_ul">
                        <li>Pariatur adipisicing short loin qui pig laborum irure cupidatat exercitation.</li>
                        <li>Qui sunt spare ribs, strip steak mollit bacon picanha corned beef est labore.</li>
                        <li>Chicken cow tongue kielbasa, ham pork loin brisket pork belly.</li>
                        <li>Eiusmod tongue occaecat, cillum magna nisi.</li>
                        </ul>
                        </div>     
                            
                        
                    </article>
                </div>
            </div>
        </section>

        <!-- Contact section -->
        <section class="contact-section home_page_h">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="contact-text col-lg-6 col-md-7 col-sm-7 col-xs-12">
                            <h5>Operator-Assist Feature</h5>
                            <strong>Standart Operator Assist</strong>
                            <p>Which toil and pain can procure him some great pleasure. To take a trivial example, 
                            which of us ever undertakes laborious physical exercise?</p>
                            <strong>Premium Operator Assist</strong>
                            <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising 
                            pain was born and I will give you a complete account of the system, 
                            and expound the actual teachings of the great explorer of the truth?</p>
                            
                            <div><a href="#" class="button_fat">Contact us</a><a class="button_flat" href="#">Call now</a></div>
                        </div>    
                    </div>
                </div>
            </div>
        </section>
            
        <!-- Banner section -->
        <section class="banner-section home_page_h">
            <div class="container">
                <div class="row">
                    <div class="changed_h col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"><h2>Try Our Perfect Services For <strong>FREE</strong></h2></div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><a class="button_flat" href="#">14 Days Free Trial</a></div>
                    </div>
                </div>
            </div>
        </section>   
        <section class="pricing-section home_page_h">
            <div class="container">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <div class="row row-15" >
                            <div class="pricing_help col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div>
                                    <img src="images/help.png"  alt=""/><br />
                                    <h5>Need Help?</h5>
                                    <p>Contact our customer support team if you have any further questions.<br /> 
                                    We are heare to help you out
                                    </p>
                                    <div class="row contact">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <span>1-800-300-2121</span>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <a href="https://html.modernwebtemplates.com/cdn-cgi/l/email-protection#760503060619040236111b171f1a5815191b"><span class="__cf_email__" data-cfemail="74270104041b0600341319151d185a171b19">[email&#160;protected]</span></a>
                                        </div>
                                    </div>
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