<?PHP
//cite http://www.html-form-guide.com/php-form/php-registration-form.html
//cite http://www.html-form-guide.com/php-form/php-login-form.html
require_once("include/membersite_config.php");

$main->LogOut();

if(isset($_POST['submitted']))
{
   if($main->Login())
   {
        $main->RedirectToURL("home.php");
   }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>

  <title>Soa</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="public/css/soa.css">
  <!--// Copyright Design Week Portland All rights reserved.-->
  <link href="public/css/portland.css" media="screen" rel="stylesheet" type="text/css">

      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <script type='text/javascript' src='public/js/gen_validatorv31.js'></script>

</head>

<body>

<section class="container">
     <div id="soa" class="soa" align="center"><p> <h3>You have logged out</h3></p></div>
  <div id="soa" class="soa" align="center"><p><h1>soa<h1></p></div>
    <div class="login" align="center">

      <form id='login' action='<?php echo $main->GetSelfScript(); ?>' 
        method='post' accept-charset='UTF-8'>

      <input type='hidden' name='submitted' id='submitted' value='1'/>

      <div><span class='error'><?php echo $main->GetErrorMessage(); ?></span></div>

          <input type='text' name='username' id='username' placeholder='Username' 
          value='<?php echo $main->SafeDisplay('username') ?>' maxlength="50" /><br/>
          
          <span id='login_username_errorloc' class='error'></span>

          <br>

          <input type='password' name='password' id='password' placeholder='Password' maxlength="50" /><br/>
          <span id='login_password_errorloc' class='error'></span>

          <br><br>
          <input type='submit' name='Submit' value='Sign In' />
          <br><br>

      <div class='short_explanation'><a href='register.php'>Sign up</a></div>
      <br>

      </form>
</div>

</section>

<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("login");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("username","req","Please provide your username");
    
    frmvalidator.addValidation("password","req","Please provide the password");

// ]]>
</script>
</div>
<!--
Form Code End (see html-form-guide.com for more info.)
-->

</body>
</html>