<?php
/*SendGrid Library*/
require_once ('vendor/autoload.php');

/*Post Data*/
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

/*Content*/
$from = new SendGrid\Email("David Lin", "FROM_PERSONAL_EMAIL");
$subject = "SUBJECT";
$to = new SendGrid\Email("Dave", "TO_PERSONAL_EMAIL");
$content = new SendGrid\Content("text/html", "
  Email : {$email}<br>
  Name : {$name}<br>
  Message : {$message}
  "

  );

/*Send the mail*/
$mail = new SendGrid\Mail($from, $subject, $to, $content);
$apiKey = ('SENDGRID_API_KEY');
$sg = new \SendGrid($apiKey);

/*Response*/
$response = $sg->client->mail()->send()->post($mail);
?>

<!--Print the response-->
<pre>
    <?php
    $link_address1 = '../index.php';
    echo "Your message has been sent";
    echo "<a href='".$link_address1."' class='btn btn-primary'>Back</a>";
    ?>
</pre>
