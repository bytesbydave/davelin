<?php
/*SendGrid Library*/
require_once ('vendor/autoload.php');

/*Post Data*/
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];


/*Content*/
$from = new SendGrid\Email("David Lin", "david.lin21@gmail.com");
$subject = "SUBJECT";
$to = new SendGrid\Email("Dave", "dave.lin21@gmail.com");
$content = new SendGrid\Content("text/html", "
  Email : {$email}<br>
  Name : {$name}<br>
  Message : {$message}
  "

  );
  


/*Send the mail*/
$mail = new SendGrid\Mail($from, $subject, $to, $content);
$apiKey = ($SENDGRID_API_KEY);
$sg = new \SendGrid($apiKey);

/*Response*/
$response = $sg->client->mail()->send()->post($mail);
?>

<!--Print the response-->
<pre>
    <?php
    var_dump($response);
    ?>
</pre>
