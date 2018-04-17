<?php
if(!isset($_POST['submit']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "error; you need to submit the form!";
}
$name = $_POST['element_1_1']." ".$_POST['element_1_2'];
$email = $_POST['element_2'];
$phone = $_POST['element_6_1']."-".$_POST['element_6_2']."-".$_POST['element_6_3'];
$summary = $_POST['element_3'];
$severity = $_POST['element_7'];
$description = $_POST['element_4'];

//Validate first
if(empty($name)||empty($email)) 
{
    echo "Name and email are mandatory!";
    exit;
}

if(IsInjected($email))
{
    echo "Bad email value!";
    exit;
}

//if(empty($summary)||empty$(severity)||$(description))
//{
//  echo "You must fill in the following fields:\nSummary\nSeverity\nDescription"
//}

$email_from = $email;
$email_subject = "$severity - $summary";
$email_body = "You have received a new message from the user $name.\n".
    "Here is the message:\n\n\n Name: $name\nPhone: $phone\nEmail: $email\nDescription: $description\n\n".
    
$to = "sarman@tftsr.com,$email";//CSV list of people to get the email
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $name \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.
header('Location: thank-you.html');


// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
   
?> 