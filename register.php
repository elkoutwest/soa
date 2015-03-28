<?PHP
//cite http://www.html-form-guide.com/php-form/php-registration-form.html
//cite http://www.html-form-guide.com/php-form/php-login-form.htmls
require_once("include/membersite_config.php");

if(isset($_POST['submitted']))
{
   if($main->RegisterUser())
   {
        $main->RedirectToURL("login.php");
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

    <script type='text/javascript' src='public/js/gen_validatorv31.js'></script>
    <script src="public/js/pwdwidget.js" type="text/javascript"></script>    

</head>

<body>

<!-- Form Code Start -->
<section class="container">
<br><br>
<div class="soa" align="center"><p><h1>Welcome to soa<h1></p></div>

<div class="login" align="center">

<form id='register' action='<?php echo $main->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>

<div><span class='error'><?php echo $main->GetErrorMessage(); ?></span></div>


    <input type='hidden' name='submitted' id='submitted' value='1'/>

    <input type='text' name='name' id='name' placeholder="Name" value='<?php echo $main->SafeDisplay('name') ?>' maxlength="50" /></p>
    <span id='register_name_errorloc' class='error'></span>

    <input type='text' name='username' id='username' placeholder="Username" value='<?php echo $main->SafeDisplay('username') ?>' maxlength="50" /></p>
    <span id='register_username_errorloc' class='error'></span>

    <input type='email' name='email' id='email' placeholder="Email" maxlength="50" />
    <div id='register_password_errorloc' class='error' style='clear:both'></div>

    <input type='password' name='password' id='password' placeholder="Password" maxlength="50" />
    <div id='register_password_errorloc' class='error' style='clear:both'></div>

<br>
<p><input type="submit"  name='Submit' value="Sign Up"></p>

</form>
</div>
</section>

<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

<script type='text/javascript'>
// <![CDATA[
    var pwdwidget = new PasswordWidget('thepwddiv','password');
    pwdwidget.MakePWDWidget();
    
    var frmvalidator  = new Validator("register");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("name","req","Please provide your name");

    frmvalidator.addValidation("username","req","Please provide a username");
    
    frmvalidator.addValidation("password","req","Please provide a password");

// ]]>
</script>

<!--
Form Code End (see html-form-guide.com for more info.)
-->

</body>
</html>