<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "info@gonations.com";
    $email_subject = "Reg : Student Enquiry";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        //echo '<a href='http://worldread.in/contact.html'>Click</a>';
		die();
		
    }
 
 
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
		
		!isset($_POST['degree_field']) ||
		!isset($_POST['course_field']) ||
		!isset($_POST['date_field']) ||
		
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
	
	$degree_field = $_POST['degree_field']; // not required
	$course_field = $_POST['course_field']; // not required
	$date_field = $_POST['date_field']; // not required
	
    $comments = $_POST['comments']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'Your name entered does not appear to be valid.<br />';
  }
 
  if(!preg_match("/^[0-9]+$/",$last_name)) {
    $error_message .= 'The Age should be numeric value.<br />';
  }
 

  
  if(!preg_match($string_exp,$degree_field)) {
    $error_message .= 'The Degree you entered does not appear to be valid.<br />';
  }
  
  if(!preg_match($string_exp,$course_field)) {
    $error_message .= 'The Course you entered does not appear to be valid.<br />';
  }
  
  if(!preg_match("%\A(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d\z%",$date_field)==true) {
    $error_message .= 'The Date you entered does not appear to be valid.<br />';
  }
  
  
 
  if(!preg_match("/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/",$comments)==true) {
    $error_message .= 'The Time you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
	
  }
 
    
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message = "A new e-mail from ".clean_string($first_name)."\n\n";
 
    $email_message .= "Student Name: ".clean_string($first_name)."\n";
    $email_message .= "Age: ".clean_string($last_name)."\n";
    $email_message .= "Your Email: ".clean_string($email_from)."\n";
    $email_message .= "Mobile: ".clean_string($telephone)."\n";
	
	$email_message .= "UG Degree: ".clean_string($degree_field)."\n";
	$email_message .= "Preferred Course: ".clean_string($course_field)."\n";
	$email_message .= "Appointment Date: ".clean_string($date_field)."\n";
	
    $email_message .= "Appointment Time: ".clean_string($comments)."\n\n";
    
    $email_message .= "Thank You \n\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 


<?php // Demonstrate the use of header() function 
// to refresh the current page 
   
echo "Thank you for contacting us. We will be in touch with you very soon.</br>"; 
echo "Page will refresh in every 3 seconds</br></br>"; 
    
// The function will refresh the page  
// in every 3 second 
header("refresh: 3"); 
    
echo date('H:i:s Y-m-d'); 
exit; 
 
//include("http://worldread.in/index.html");
 //echo 'Thank you for contacting us. We will be in touch with you very soon.';
 
}
include("index.html");
?>

