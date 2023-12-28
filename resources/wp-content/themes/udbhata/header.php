<!DOCTYPE html>
<html>
   <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="profile" href="https://gmpg.org/xfn/11">

		<link rel="icon" href="<?php echo home_url();?>/assets/img/favicon.png" sizes="16x16" type="image/png">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <!-- <link rel="stylesheet" href="<?php //echo get_template_directory_uri();?>/assets/css/reset.css"> -->
      <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/style-1.css">
      <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/style.css">
		

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
        .footer-form button {
    background-color: #fff!important;
    color: #173661!important;
    padding: 9px 34px!important;
    border: 2px solid #fff!important;
    margin-top: 0%!important;
    border-radius: 3px!important;
}
.heading-size-3{
  margin-bottom: 50px;
}
@font-face {
	font-family: helvetica-ultralight;
	src: url("assets/fonts/HelveticaNeue-UltraLight.woff");
}

@font-face {
	font-family: helvetica-regular;
	src: url("assets/fonts/Helvetica.woff");
}
@font-face
{
	font-family: helvetica-neue-light;
	src:url("assets/fonts/HelveticaNeue-Light.woff");
}
@font-face
{
	font-family: helvetica-neue-ultralight;
	src:url("assets/fonts/HelveticaNeue-UltraLight.woff");
}
@font-face {
	font-family: helvetica-bold;
	src: url("assets/fonts/HelveticaNeue-Bold.woff");
}

@font-face {
	font-family: helvetica-light;
	src: url("assets/fonts/Helvetica-Light.woff");
}
.social-icons a{
background-color: transparent !important;

h1 {
	font-family: helvetica-bold;
	font-size: 42px
}

h2 {
	font-size: 52px;
	font-weight: 500;
	font-family: helvetica-neue-light
}

p {
	font-family: helvetica-regular;
	line-height: 150%;
	font-size:15px;
}
ul li
{
	font-family: helvetica-regular;
	line-height: 150%;
	font-size:15px;
}
h4 {
	font-family: helvetica-light;
	font-size: 30px;
}

h3 {
	font-family: helvetica-regular;

}

li {
	font-family: helvetica-regular;
	font-size: 15px
}
h5
{
	line-height: 150%;
}
h2{
	color: #173661;
}


button {
	font-family: helvetica-regular;
	outline: none !important;
}
      </style>
		<?php wp_head(); ?>
		
		
		
		
    <script src="https://www.google.com/recaptcha/api.js?render=6LdUFrMeAAAAAIPk4CUUdUdRw9VwW8-acEPfWTsl"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('6LdUFrMeAAAAAIPk4CUUdUdRw9VwW8-acEPfWTsl', { action: 'contact' }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
    </script>

<!-- Google Tag Manager -->
      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
         new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
         j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
         'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
         })(window,document,'script','dataLayer','GTM-KSKG8LK');
      </script>
      <!-- End Google Tag Manager -->


	</head>

	<body>

<!-- Google Tag Manager (noscript) -->

      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KSKG8LK"

         height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

      <!-- End Google Tag Manager (noscript) -->

	<!---header Start---->

  <header id="Header">
    <div class="container header">
    <div class="row">
    <div class="col-xs-6 col-sm-4">
    <div class="logo">
    <a href="https://udbhata.com/" class="logo-link">  <img src="<?php echo home_url();?>/assets/img/Logo.png" class="img-fluid" alt="udbhata"> </a>
    </div>
    </div>
   <div class="col-xs-6 col-sm-8">
      <input type="checkbox" id="chk">
      <label for="chk" class="show-menu-btn">
     <div class="menuu">  <i class="fa fa-bars"></i> </div>
     </label>
    <ul class="menu">
      <a href="https://udbhata.com" class=" link_1" >Home</a>
      <a href="https://qoris.io/ " class="link_1" target="_blank">Qoris<sup>®</sup></a>
      <a href="https://udbhata.com/risk_consulting.html " class="link_1">Risk Consulting</a>
      <a href="https://udbhata.com/technology-services.html " class="link_1">Technology Services</a>
     <a href="https://udbhata.com/resources/" class="active blogg">Resources</a>
  
    <a href="https://udbhata.com/business-enquiry.html">Contact</a>
    <label for="chk" class="hide-menu-btn">
    <i class="fa fa-times"></i>
      </label>
      </ul>
    </div>
    </div>
    </div>
    </header> 