<?php
// Check if form was submitted:
/*
{
    [success] => 1
    [challenge_ts] => 2018-11-01T22:31:14Z
    [hostname] => recaptcha.local
    [score] => 0.9
    [action] => contact
}
*/
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {
	//echo "Form Submitted";

    // Build POST request:
    $recaptcha_url = "https://www.google.com/recaptcha/api/siteverify";
    $recaptcha_secret = '6LdRHuAUAAAAAOS4vDLYTtYMFUAKdxYPI5NoHzFs';
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
	
	print_r($recaptcha);


    // Take action based on the score returned:
    if ($recaptcha->score >= 0.5) {
		
		echo "Verified";
        // Verified - send email
    } else {
		echo "Not verified";
		
        // Not verified - show form error
    }

} 
else{
	
	echo "Form Not Submit";
	
}


//echo YOUR_RECAPTCHA_SITE_KEY;

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Google reCAPTCHA v3</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <script src="https://www.google.com/recaptcha/api.js?render=6LdRHuAUAAAAAJhM2qrKwgc1tuTKRAKwKGtCX2DE"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('6LdRHuAUAAAAAJhM2qrKwgc1tuTKRAKwKGtCX2DE', { action: 'contact' }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
    </script>
</head>

<body>

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-half">

                    <form method="POST">

                        <h1 class="title">
                            reCAPTCHA v3 example
                        </h1>

                        <div class="field">
                            <label class="label">Name</label>
                            <div class="control">
                                <input type="text" name="name" class="input" placeholder="Name" required value="Venkat">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control">
                                <input type="email" name="email" class="input" placeholder="Email Address" required value="venkat@deepredink.com">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Message</label>
                            <div class="control">
                                <textarea name="message" class="textarea" placeholder="Message" required>Testing spam leads</textarea>
                            </div>
                        </div>

                        <div class="field is-grouped">
                            <div class="control">
                                <button type="submit" class="button is-link">Send Message</button>
                            </div>
                        </div>

                        <input type="text" name="recaptcha_response" id="recaptchaResponse">

                    </form>

                </div>
            </div>
        </div>
    </section>

</body>

</html>