<?php

/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response']))
	
	{
	//echo "Form Submitted";

    // Build POST request:
    $recaptcha_url = "https://www.google.com/recaptcha/api/siteverify";
    $recaptcha_secret = '6LdUFrMeAAAAAItlImIfd3LuQ7m4vzdD_eIhU4uU';
    $recaptcha_response = $_POST['recaptcha_response'];

    // Make and decode POST request:
	/*
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
	error_log("JSON ENCODE".$recaptcha);
    $recaptcha = json_decode($recaptcha);	
	error_log("JSON DECODE".$recaptcha);
	*/
	
	
	
  $recaptcha_vars             = array();
  $recaptcha_vars['response'] = $recaptcha_response;
  $recaptcha_vars['secret']   = $recaptcha_secret;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $recaptcha_url);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $recaptcha_vars);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);
  curl_close($ch);
  $recaptcha = json_decode($response);
	
    // Take action based on the score returned:
	
	

    if ($recaptcha->score >= 0.5) :
		

date_default_timezone_set("Asia/Kolkata");
require_once('functions.php');
$fname  = get_field('fname');
$lname  = get_field('lname');
$company = get_field('company');
$full_name=$fname;
$email      = get_field('email');
$phone      = get_field('phone');
$company      = get_field('company');
$designation      = get_field('designation');
$city      = get_field('city');
$benifits      = get_field('benifits');
$automating      = get_field('automating');

/*$fname_1    =get_field('fname_1');
$email_1    =get_field('email_id__1');
$phone_1    =get_field('phone_number__1');*/


$leadutmsource   = get_field('leadutmsource');
$leadutmmedium   = get_field('leadutmmedium');
$leadutmcampaign = get_field('leadutmcampaign');
$leadutmcontent  = get_field('leadutmcontent');
$leadutmterm     = get_field('leadutmterm');

if($leadutmsource=="")
{
	$leadutmsource="website";
}
else
{
	$leadutmsource=$leadutmsource;
}

if($leadutmmedium=="")
{
	$leadutmmedium ="web";
}
else
{
	$leadutmmedium=$leadutmmedium ;
}

if($leadutmcampaign=="")
{
	$leadutmcampaign  ="IRM India Event";
}
else
{
	$leadutmcampaign=$leadutmcampaign ;
}

$date 			= date('Y-m-d H:i:s', time());
$post_dump		= $_POST;
$post_dump 		= json_encode($post_dump);
$post_dump 		= $post_dump;
$form_page 		= get_form_page_url();

$type = "Udbhata | New Enquiry";
$ip = $_SERVER['REMOTE_ADDR'];
$page_url = $form_page;




/******** CURL method for Leadstore *********/ 		
$input_params=array(				
	'firstname'=> $fname,
	'email'=> $email,
	'phone'=> $phone,
	'city'=> $city,
	'message'=>'',
	'udf1'=> $company,
	'udf2'=> $designation,
	'udf3'=> $benifits,
	'udf4'=> $automating,	
	'udf5'=> $city,	
	'udf6'=>'',							
	'udf7'=>'',
	'udf8'=>'',
	'udf9'=>'',
	'udf10'=>'',																					
	'ua_ip'=> $ip,
	'ua_device'=> '',
	'ua_query_url'=> $page_url,
	'landing_page_title'=> $type,
	'utm_source'=> $leadutmsource,
	'utm_medium'=> $leadutmmedium,
	'utm_campaign'=> $leadutmcampaign,
	'utm_content'=> $leadutmcontent,
	'utm_term'=> $leadutmterm,
	'ua_city'=>'',
	'ua_country'=>'',
	'form_data'=> $post_dump,
);	
$fields = $input_params;
$postvars = '';
	foreach($fields as $key=>$value) {
		$postvars .= $key . "=" . $value . "&";
	}

if($email!=""){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"https://leadstore.in/capture_leads/capture/57");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$postvars);
		// in real life you should use something like:
		// curl_setopt($ch, CURLOPT_POSTFIELDS, 
		//http_build_query(array('postvar1' => 'value1')));
		// receive server response ...

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output = curl_exec ($ch);
		curl_close ($ch);  
}
/****************End CURL CALL**********************/


ob_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <!--[if !mso]><!-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--<![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You | Udbhata</title>
    <!--[if (gte mso 9)|(IE)]>
    <style type="text/css">
        table {border-collapse: collapse;}
    </style>
    <![endif]-->
	<style type="text/css">
/* Basics */
		body {
			margin: 0 !important;
			padding: 0;
			background-color: #ffffff;
		}
		table {
			border-spacing: 0;
			font-family: sans-serif;
			color: #333333;
		}
		td {
			padding: 0;
		}
		img {
			border: 0;
		}
		div[style*="margin: 16px 0"] { 
			margin:0 !important;
		}
		.wrapper {
			width: 100%;
			table-layout: fixed;
			-webkit-text-size-adjust: 100%;
			-ms-text-size-adjust: 100%;
		}
		.webkit {
			max-width: 600px;
			margin: 0 auto;
		}
		.outer {
			Margin: 0 auto;
			width: 100%;
			max-width: 600px;
		}
		
		
/* End of Basics */

/* Media Queries */
	
	@media screen and (max-width: 400px) {
	.two-column .column,
		.three-column .column {
			max-width: 100% !important;
		}
		.two-column img {
			max-width: 100% !important;
		}
		.three-column img {
			max-width: 50% !important;
		}
	}
	
	@media screen and (min-width: 401px) and (max-width: 620px) {
	.three-column .column {
			max-width: 33% !important;
		}
		.two-column .column {
			max-width: 50% !important;
		}
	}

/* End of Media Queries
		
/* Mailer Styles */
		
		.full-width-image img {
			width: 100%;
			max-width: 600px;
			height: auto;
		}
		.inner {
			padding: 10px;
		}
		p {
			Margin: 0;
		}
		a {
			color: #ee6a56;
			text-decoration: underline;
		}
		.h1 {
			color:#665744;
			font-size: 15px !important;
			font-weight: bold;
			Margin-bottom: 18px;
		}
		.h2 {
			font-size: 18px;
			font-weight: bold;
			Margin-bottom: 12px;
		}
		 
	/* One column layout */
	
		.one-column .contents {
			text-align: left;
		}
		.one-column p {
			font-size: 16px;
			line-height: 135%;
			Margin-bottom: 10px;
		}
	
	/* End of One column layout */	
		
	/* Two column layout */
	
		.two-column {
			text-align: center;
			font-size: 0;
		}
		.two-column .column {
			width: 100%;
			max-width: 300px;
			display: inline-block;
			vertical-align: top;
		}		
		.contents {
			width: 100%;
		}		
		.two-column .contents {
			font-size: 14px;
			text-align: left;
		}
		.two-column img {
			width: 100%;
			max-width: 280px;
			height: auto;
		}
		.two-column .text {
			padding-top: 10px;
		}
		
	/* End of Two column layout */	
		
/* End of Mailer Styles */
		
	</style>
</head>
<body>
    <center class="wrapper">
        <div class="webkit">
            <!--[if (gte mso 9)|(IE)]>
			<table width="600" align="center">
				<tr>
					<td>
					<![endif]-->
					<table class="outer" align="center">
						<tr>
							<td class="full-width-image" bgcolor="#E2DACC">
							<img src="https://i.imgur.com/4HFFnnE.png" style="width:auto" alt="Udbhata" />
							</td>
						</tr>
					<!---FULL WIDTH COLUMN LAYOUT-->
			
						<tr>
							<td class="one-column">
								<table width="100%">
									<tr>
										<td class="inner contents">

												<h1 style="font-size: 21px;display:block;margin-bottom: 0;">New Enquiry<br></h1>												
												<div style="font-size: 13px;color: #333;display:block;margin: 15px 0 15px;max-width:360px;">
												<p style="font-size: 12px; color: #888;margin: 0 0 6px;"><?php echo date('M d, Y', strtotime($date)); ?></p>
												<p style="margin: 0 0 6px;"><strong>Name: </strong><?php echo ucwords($full_name); ?></p>
												<p style="margin: 0 0 6px;"><strong>Email: </strong><?php echo $email; ?></p>
												<p style="margin: 0 0 6px;"><strong>Phone: </strong><?php echo $phone; ?></p>
												<p style="margin: 0 0 6px;"><strong>Company: </strong><?php echo $company; ?></p>
												<p style="margin: 0 0 6px;"><strong>Designation: </strong><?php echo $designation; ?></p>
												<p style="margin: 0 0 6px;"><strong>City: </strong><?php echo $city; ?></p>
												<p style="margin: 0 0 6px;"><strong>In your opinion, how much can ERM benefit from standardisation & automation: </strong><?php echo $benifits; ?></p>
												<p style="margin: 0 0 6px;"><strong>Are you looking at automating your ERM Program: </strong><?php echo $automating; ?></p>

												</div>
										</td>
									</tr>
								</table>
							</td>
						</tr>

					</table>
					<!--[if (gte mso 9)|(IE)]>
					</td>
				</tr>
			</table>
			<![endif]-->
        </div>
    </center>
</body>
</html>

<?php
$email_message = ob_get_clean();
$subject = 'New Lead - ' . ucwords($type);
require_once('irm_emails_list_testing.php');
if($email!=""){
	send_email($from, $from_name, $to, $to_name, $subject, $email_message, '', $cc_emails, $bcc_emails);
}
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <!--[if !mso]><!-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--<![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You | Udbhata</title>
    <!--[if (gte mso 9)|(IE)]>
    <style type="text/css">
        table {border-collapse: collapse;}
    </style>
    <![endif]-->
	<style type="text/css">
/* Basics */
		body {
			margin: 0 !important;
			padding: 0;
			background-color: #ffffff;
		}
		table {
			border-spacing: 0;
			font-family: sans-serif;
			color: #333333;
		}
		td {
			padding: 0;
		}
		img {
			border: 0;
		}
		div[style*="margin: 16px 0"] { 
			margin:0 !important;
		}
		.wrapper {
			width: 100%;
			table-layout: fixed;
			-webkit-text-size-adjust: 100%;
			-ms-text-size-adjust: 100%;
		}
		.webkit {
			max-width: 600px;
			margin: 0 auto;
		}
		.outer {
			Margin: 0 auto;
			width: 100%;
			max-width: 600px;
		}
		
		
/* End of Basics */

/* Media Queries */
	
	@media screen and (max-width: 400px) {
	.two-column .column,
		.three-column .column {
			max-width: 100% !important;
		}
		.two-column img {
			max-width: 100% !important;
		}
		.three-column img {
			max-width: 50% !important;
		}
	}
	
	@media screen and (min-width: 401px) and (max-width: 620px) {
	.three-column .column {
			max-width: 33% !important;
		}
		.two-column .column {
			max-width: 50% !important;
		}
	}

/* End of Media Queries
		
/* Mailer Styles */
		
		.full-width-image img {
			width: 100%;
			max-width: 600px;
			height: auto;
		}
		.inner {
			padding: 10px;
		}
		p {
			Margin: 0;
		}
		a {
			color: #ee6a56;
			text-decoration: underline;
		}
		.h1 {
			color:#665744;
			font-size: 15px !important;
			font-weight: bold;
			Margin-bottom: 18px;
		}
		.h2 {
			font-size: 18px;
			font-weight: bold;
			Margin-bottom: 12px;
		}
		 
	/* One column layout */
	
		.one-column .contents {
			text-align: left;
		}
		.one-column p {
			font-size: 16px;
			line-height: 135%;
			Margin-bottom: 10px;
		}
	
	/* End of One column layout */	
		
	/* Two column layout */
	
		.two-column {
			text-align: center;
			font-size: 0;
		}
		.two-column .column {
			width: 100%;
			max-width: 300px;
			display: inline-block;
			vertical-align: top;
		}		
		.contents {
			width: 100%;
		}		
		.two-column .contents {
			font-size: 14px;
			text-align: left;
		}
		.two-column img {
			width: 100%;
			max-width: 280px;
			height: auto;
		}
		.two-column .text {
			padding-top: 10px;
		}
		
	/* End of Two column layout */	
		
/* End of Mailer Styles */
		
	</style>
</head>
<body>
    <center class="wrapper">
        <div class="webkit">
            <!--[if (gte mso 9)|(IE)]>
			<table width="600" align="center">
				<tr>
					<td>
					<![endif]-->
					<table class="outer" align="center">
					<!---FULL WIDTH COLUMN LAYOUT-->
						<tr>
							<td class="full-width-image" bgcolor="#E2DACC">
								<img src="https://imgur.com/1f44GnL.jpg"  alt="" />
							</td>
						</tr>
						<tr>
							<td class="one-column">
								<table width="100%">
									<tr>
										<td class="inner contents">
											<p>Hi <strong><?php echo ucwords($full_name); ?></strong>,</p><br>
											<p>Registration confirmed!</p><br>
											<p>Thank you for registering for the webinar on ‘Unlocking Risk Management bandwidth with technology' to be held on 8th July, 2020,  04:30 PM- 06:00 PM</p>
											<p>You’ll receive a confirmation email and also a reminder email with your viewing link.</p>
											<p class="h1">For further queries, you can reach us at <a href="mailto:customer@udbhata.com">customer@udbhata.com</a> or call us at 
<a href="tel:+91 9121004559" >+91 9121004559 </a></p>
											<br/>
											<p>Regards<br/>Udbhata</p>
										</td>
									</tr>
								</table>
							</td>
						</tr>

					</table>
					<!--[if (gte mso 9)|(IE)]>
					</td>
				</tr>
			</table>
			<![endif]-->
        </div>
    </center>
</body>
</html>
<?php
$fre_email_message = ob_get_clean();
$subject = 'New Lead - ' . ucwords($type);
require_once('emails_list_testing.php');
if($email!=""){
	send_email($from, $from_name, $email, ucwords($full_name), 'Thank You', $fre_email_message, '', NULL, NULL);
}
$output['error'] = FALSE;
$output['error_messages'] = array();
$output['success'] = TRUE;
$output['brochure_form'] = $brochure_form;
$output['success_message'] = "Thank you for your interest.<br>We will get in touch with you soon.";
else:
endif;

header("Location:thankyou.html");
	}

else{
	
}




?>