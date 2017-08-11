  <?php
if(!isset($_POST['submit']))
{
    //This page should not be accessed directly. Need to submit the form.
    echo "error; you need to submit the form!";
}
$Name = $_POST['Name'] ;
$Email = $_POST['Email'] ;
$Phone = $_POST['Phone'] ;
$Term = $_POST['Term'] ;
$Aboutyou = $_POST['Aboutyou'] ;
$Linkedin = $_POST['Linkedin'] ;
$Links = $_POST['Links'] ;
$Job= $_POST['Job'] ;
$Company = $_POST['Company'] ;
$How = $_POST['How'] ;
$Goals = $_POST['Goals'] ;
$Exp = $_POST['Exp'] ;
$Details = $_POST['Details'] ;
$Ready = $_POST['Ready'] ;


//Validate first
if(empty($Name)||empty($Email))
{
   echo "Name and email are mandatory!";
   exit;
}

if(IsInjected($Email))
{
   echo "Bad email value!";
   exit;
}

$email_from = 'apply@ableisd.com';//<== update the email address
$email_subject = "New Form submission";
$email_body = "You have received a new message from $Name.\n".
   "Here is the message:\n Name: $Name \n Email: $Email \n Cell: $Phone \n Term choice: $Term \n Personal Details: $Aboutyou \n LinkedIn: $Linkedin \n Links to work: $Links \n Job Title: $Job \n Company/Organization: $Company \n How did you hear?: $How \n Relevant Experiences: $Exp \n Further Details: $Details \n Are they ready?: $Ready" .
   
$to = "apply@ableisd.com";//<== update the email address
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $Email \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.
header('Location: thank_you.html');


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