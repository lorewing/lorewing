<!doctype html>
<html>
    <head>
        <title>Google reCAPTCHA demo</title>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>
        <form method="post" action="recaptcha.php">
           <div class="g-recaptcha" data-sitekey="6LcrQP8SAAAAAD7eA3wXJr4_yHZWzxVP0u1ZbNpT"></div>
            <input type="submit" />
        </form>
    </body>
</html>

<?php

    if(isset($_POST['g-recaptcha-response']))
    {
        //form submitted

        //check if other form details are correct

        //verify captcha
        $recaptcha_secret = "6LcrQP8SAAAAAAYx9LPzEv28EJi2_vQEX9QSxQGw";
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$recaptcha_secret."&response=".$_POST['g-recaptcha-response']);
        
		if($response == '{ "success": true }')
        {
            echo "Logged In Successfully";
        }
        else
        {
            echo "You are a robot";
        }
    }
    
?>