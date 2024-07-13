<!DOCTYPE HTML>
<html>

    <head>
        @include('layouts.sitehead')
        <title>News | Tresor Crest</title>	
    
    </head>

    <body>

        <header class="header_type_2">
            {{-- header --}}
            @include('layouts.siteheader')
            <div class="breadcrumbs">  
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <a class="first_element" href="{{ route('site.page.index') }}">Home</a><a href="#features">Pages</a><span>News</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header end -->

        <!-- Content blocks -->
        <section class="typography-section about-us-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <article class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <script type="text/javascript">
                                DukascopyApplet = 
                                {"type":"online_news",
                                "params":{"header":false,
                                        "borders":false,
                                        "defaultLanguage":"en",
                                        "availableLanguages":["ar","bg","cs","de","en","es","fa","fr","he","hu","it","ja","ms","pl","pt","ro","ru","sk","sv","th","uk","zh"],"newsCategories":["finance","forex","stocks","commodities"],
                                        "width":"100%","height":"100%","adv":"popup"}};</script>
                            <script type="text/javascript" src="https://freeserv-static.dukascopy.com/2.0/core.js"></script>
                        </article>
                    </div>
                </div>
            </div>
        </section>
            <section class="offer-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="offer-section-heading col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <h5>We Offer Services That Work</h5>
                                    <p>
                                    </p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
                                    <div class="offers">
                                        <img src="images/offer1.png" alt=""/><br />
                                        <h4>Borrowing</h4>
                                        <p>Flexible borrowing solutions just for you. Achieve your goals at every stage of life. Find the financing solution that's right for you.</p>
                                    </div>
                                    <div class="offers">
                                        <img src="images/offer2.png" alt=""/><br />
                                        <h4>Investing</h4>
                                        <p> Your financial needs change at each stage of life. Good financial planning can help you break things down by cost and decide which tools you need now to prepare for the future.</p>
                                    </div>
                                    <div class="offers offer_last">
                                        <img src="images/offer3.png" alt=""/><br />
                                        <h4>Loan insurance</h4>
                                        <p>When you take out insurance on a personal loan or line of credit, you can benefit from three types of coverage (disability, critical illness, life).</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"></div>
                                <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
                                    <div class="offers">
                                        <img src="images/offer4.png" alt=""/><br />
                                        <h4>Insurance</h4>
                                        <p>Life is full of surprises. An unexpected event could jeopardize everything you've worked for—you might find yourself unable to meet your financial obligations. Take out an insurance policy to guarantee your peace of mind.</p>
                                    </div>
                                    <div class="offers">
                                        <img src="images/offer5.png" alt=""/><br />
                                        <h4>Mortgage</h4>
                                        <p>Thinking about buying? Find the mortgage that’s right for you. Our mortgage advisors are there to give you advice tailored to your needs.</p>
                                    </div>
                                    <div class="offers offer_last">
                                        <img src="images/offer6.png" alt=""/><br />
                                        <h4>Accumulation goals</h4>
                                        <p>Generally, the goal is to keep funds invested, reinvest income and capital gains, and have these compound for as long as possible.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
        <!-- Solutions section -->
            <section class="solutions-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="solutions-text col-lg-6 col-md-7 col-sm-7 col-xs-12">
                                        <h5>Helping small businesses like yours</h5>
                                        <p>Some businesses are inherently more profitable than others. This can be due to expenses and overhead being low or the business charging a lot for its services or products. Still, all businesses, no matter how profitable they are, can be a challenge getting started. If you are thinking of starting a small business, you might care about potential profits. While your skills as an entrepreneur and the quality of your business idea certainly influence what you will earn, so does the industry in which you operate. In fact, as figures from business data aggregator show small business profitability varies a lot across industries.
                                        </p>
                                        
                                        <div><a href="contact_us.html" class="button_fat">Apply</a><a class="button_flat" href="contact_us.html">Learn more</a></div>
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