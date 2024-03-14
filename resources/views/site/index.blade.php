<!DOCTYPE HTML>
<html>
	
    <head>
        @include('layouts.sitehead')
		<title>Home | Tresor Union</title>
		
	</head>
	<body class="home_page_h">
		<!-- Top 
		<div class="over_header">
			<div class="container">
				<div class="row">
					<div class="over_header_ins col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div class="sotials_top col-lg-2 col-md-2 col-sm-12 col-xs-12"><a class="facebook" href="#"><img src="images/f_b.png" alt=""/></a><a class="twitter" href="#"><img src="images/t_b.png" alt=""/></a><a class="youtube" href="#"><img src="images/y_b.png" alt=""/></a><a class="google" href="#"><img src="images/g_b.png" alt=""/></a></div>
							<div class="text-right col-lg-10 col-md-10 col-sm-12 col-xs-12">
								<span class="hr_last"><img src="images/phone.png" alt=""/>1-800-300-2121</span>
								<span><img src="images/mail.png" alt=""/><a href="https://html.modernwebtemplates.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="eab99f9a9a85989eaa8d878b8386c4898587">[email&#160;protected]</a></span>
								<span><img src="images/adress.png" alt=""/>528 tenth Avenue Boston, BT 58966</span> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		 Header -->
		<header class="header_type_1">
			<div class="header-wrapper page_header">
				<div id="fixblock" class="fixblock_main">
					<div class="container">
						<div class="border_bottom col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12"><a class="logo" href="{{ route('site.page.index') }}"><img src="{{ asset('sitecontent/images/logo.png') }}" alt=""/></a></div>
								<nav class="menu col-lg-6 col-md-6 col-sm-4 col-xs-12">
									<div class="menu-button"><i class="fa fa-bars"></i></div>
									<ul class="flexnav" data-breakpoint="">
										<li><a class="active" href="{{ route('site.page.index') }}">Home</a></li>
										<li><a class="active" href="{{ route('site.page.about') }}">About Us</a></li>
										
										
										<li><a href="{{ route('site.page.news') }}">News & Insights</a></li>
										
										<li><a href="{{ route('site.page.index') }}">Support</a></li>
										
										<li><a href="{{ route('site.page.support') }}">Contact us</a></li>
									</ul>
								</nav>
								<div class="button_header col-lg-3 col-md-3 col-sm-4 col-xs-12"><a class="button_flat button_flat_menu" href="{{ route('login') }}">Sign In</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Header slider -->
			<div id="owl-demo" class="owl-carousel owl-theme">
				<div class="item">
					<span class="slide_light_text">Women in Finance</span><br />
					<span class="slide_middle_text">Advisor Services</span><br />
					<span class="slide_small_text">May is European Diversity Month, and we kick it off by <br />moving along in our blog series, “Women in Finance” - and<br /> being very much aware, that diversity is <br />so much more than gender. </span><br />
					<a class="button_fat" href="#">Read More</a>
				</div>
				<div class="item">
					<span class="slide_light_text">Reliable &</span><br />
					<span class="slide_middle_text">Trusted Advice</span><br />
					<span class="slide_small_text">We provide worry-free services you can always count on.</span><br />
					<a class="button_fat" href="/services">Read More</a>
				</div>
				<div class="item">
					<span class="slide_light_text">Sustainable choices </span><br />
					<span class="slide_middle_text">for everyone</span><br />
					<span class="slide_small_text">We see a growing need and desire among our customers to make <br /> sustainable choices, enabling customers to make a difference in their finances, and for a <br />greater good. </span><br />
					<a class="button_fat" href="#">Read More</a>
				</div>
			</div>
			<!-- Header tips -->       
			<div class="container tips">
				<div class="row">
					<div class="tip_1 col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<img src="images/tip1.png" alt=""/><br />
						<h4>Financial Planner</h4>
						<p>We will work through the process to identify your needs, goals and strategy, and put your plan into action</p>
					</div>
					<div class="tip_2 col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<img src="images/tip2.png" alt=""/>
						<h4>Mortgage Advisor</h4>
						<p>We will give you independent advice and help you search over thousands of mortgages to find the right deal for you</p>
					</div>
					<div class="tip_3 col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<img src="images/tip3.png" alt=""/>
						<h4>Investment Advisor</h4>
						<p>Our professionals will provide you with independent and custom-tailored investment analysis and advice</p>
					</div>
				</div>
			</div>
		</header>
		<!-- Header end -->
		<!-- Content blocks -->
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
		<!-- Calculate section -->
		<section class="calculate-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="col-lg-7 col-md-9 col-sm-10 col-xs-12">
							<div class="row">
								<h5>Lease Calculator</h5>
								<div class="inputs">
									<div class="row">
										<div class="input">
											<label for="amount">Loan Amount</label>
											<input id="amount" placeholder="2000"/>
										</div>
										<div class="input">
											<label for="value">Residual Value</label>
											<input id="value" placeholder="1000"/>
										</div>
										<div class="input">
											<label for="rate">Interest Rate%</label>
											<input id="rate" placeholder="7.5"/>
										</div>
										<div class="input">
											<label for="months">Number of Months</label>
											<input id="months" placeholder="36"/>
										</div>
									</div>
								</div>
								<p>Results based in the data entered above</p>
								<div class="inputs results">
									<div class="row">
										<div class="input">
											<label>Monthly Payment</label>
											<input id="payment" value="3732.56"/>
										</div>
										<div class="input">
											<label>Interest Amount</label>
											<input id="amount2" value="37,32"/>
										</div>
										<div class="input">
											<label>Total Payment</label>
											<input id="total" value="13448.23"/>
										</div>
										<div class="input">
											<a href="#" class="button_fat">Order now</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Pricing section -->
		<section class="pricing-section">
			<div class="container">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
					<div class="row row-15" >
						<div class="pricing_help col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div>
								<img src="images/help.png"  alt=""/><br />
								<h5>Need Help?</h5>
								<p>Contact our customer support team if you have any further questions.<br /> 
									We are here to help you !
								</p>
								<div class="row contact">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<span>35-845-490-0280</span>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<a href="mailto:customercare@"><span class="__cf_email__" >Send Mail</span></a>
									</div>
								</div>
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
		<!-- Testimonials section -->
		<section class="testimonials-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="testi_heading">
							<h5>We Want To Hear What Our Clients Saying</h5>
						</div>
						
						<p style="text-align:center; font-size:20px; "><a class="" href="#" style=" padding:5px 15px; background: #00b6dd; border-radius:5px; color:white;" >Connect with us</a></p>
						<p  style="text-align:center; font-size:18px;padding:5px 15px;">Listening to what you have to say about our services matters to us.</p>
						
					</div>
				</div>
			</div>
		</section>
		<!-- Contact section -->
		<section class="contact-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="contact-text col-lg-6 col-md-7 col-sm-7 col-xs-12">
							<h5>Operator-Assist Feature</h5>
							<strong>Premium Operator Assist</strong>
							<p>Get personalized assistance on insights and guidance to help you stay on top of your finances. Your operator assistant can help you replace lost or stolen cards, lock or unlock your debit card.
							</p>
							
							<div><a href="mailto:customercare@helsinkiop.com" class="button_fat">Get Assistance</a></div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Banner section -->
		
	<!-- Footer -->
    @include('layouts.sitefooter') 
  
</body>


</html>