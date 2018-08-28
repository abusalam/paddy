<?php 
include 'dbc.php';




/******************* ACTIVATION BY FORM**************************/
if ($_POST['doReset']=='Reset')
{
$err = array();
$msg = array();

foreach($_POST as $key => $value) {
	$data[$key] = filter($value);
}
if(!isEmail($data['user_email'])) {
$err[] = "ERROR - Please enter a valid email"; 
}

$user_email = $data['user_email'];

//check if activ code and user is valid as precaution
$rs_check = mysql_query("select id,user_name from AdminUsers where user_email='$user_email'") or die (mysql_error()); 

//$result_branch=mysql_query($query_branch);
//$num_result_branch= mysql_numrows($result_branch);
 while($row_username=mysql_fetch_array($rs_check)) 
 {  $user_name= $row_username['user_name']; 

 } 
$num = mysql_num_rows($rs_check);
  // Match row found with more than 1 results  - the user is authenticated. 
    if ( $num <= 0 ) { 
	$err[] = "Error - Sorry no such account exists or registered.";
	//header("Location: forgot.php?msg=$msg");
	//exit();
	}


if(empty($err)) {

$new_pwd = GenPwd();
$pwd_reset = PwdHash($new_pwd);
//$sha1_new = sha1($new);	
//set update sha1 of new password + salt
$rs_activ = mysql_query("update AdminUsers set password='$pwd_reset' WHERE 
						 user_email='$user_email'") or die(mysql_error());
						 
$host  = $_SERVER['HTTP_HOST'];
$host_upper = strtoupper($host);						 
						 
//send email

$message = 
"Here are your new password details ...\n
UserName: $user_name \n
User Email: $user_email \n
Passwd: $new_pwd \n

Thank You

Administrator
$host_upper
______________________________________________________
THIS IS AN AUTOMATED RESPONSE. 
***DO NOT RESPOND TO THIS EMAIL****
";

	mail($user_email, "Reset Password", $message,
    "From: \"Malda Zilla\" <auto-reply@$host>\r\n" .
     "X-Mailer: PHP/" . phpversion());						 
						 
$msg[] = "Your account password has been reset and a new password has been sent to your email address.";						 
						 
//$msg = urlencode();
//header("Location: forgot.php?msg=$msg");						 
//exit();
 }
}
?>



               
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>

<title><? echo $pagetitle; ?></title> <!-- YOUR WEBSITE NAME -->

<!-- DO NOT TOUCH THIS -->

<link rel="stylesheet" type="text/css" href="css/style.css">
<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scaleable=no">
<!--script src="scripts/jquery-1.12.3.min.js"></script-->
<script src="scripts/main.js"></script>
<script src="http://code.jquery.com/jquery-1.8.3.min.js" type="text/javascript"></script> 

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js" type="text/javascript"></script>
  <script>
  $(document).ready(function(){
    $("#actForm").validate();
  });
  </script>
 
</head>

<!-- END -->

<body>

	<div id="header">
		<? include'include/header.php'; ?>
	</div>

<div id="mhwebhold"></div>
<div id="hold">
	<a class="mobile" href="#">MENU</a></div></div>

	<div id="container">
		<div class="sidebar">
			<ul id="nav">
				<? include'include/menu.php'; ?>
			</ul>
			<a class="menuclose" href="#">X Close Menu</a></div></div>
		</div>

		

		<div class="content">
			
<h3 class="titlehdr">Forgot Password</h3><br />
<div style="height:450px">
      <p> 
        <?php
	  /******************** ERROR MESSAGES*************************************************
	  This code is to show error messages 
	  **************************************************************************/
	if(!empty($err))  {
	   echo "<div class=\"msg\">";
	  foreach ($err as $e) {
	    echo "* $e <br>";
	    }
	  echo "</div>";	
	   }
	   if(!empty($msg))  {
	    echo "<div class=\"msg\">" . $msg[0] . "</div>";

	   }
	  /******************************* END ********************************/	  
	  ?>
      
      <p>If you have forgot the account password, you can <strong>reset password</strong> 
        and a new password will be sent to your email address.</p>
	 
      <form action="forgotpassword.php" method="post" name="actForm" id="actForm" >
        <table width="400px" border="0" cellpadding="4" cellspacing="4" class="loginform">
          <tr> 
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr> 
            <td width="28%">Your Email</td>
            <td width="72%"><input name="user_email" type="text" class="required email" id="txtboxn" size="25"></td>
          </tr>
          <tr> 
            <td colspan="2" align="center" valign="middle"> <div align="center"> 
                
                  <input name="doReset" type="submit" id="doLogin3" value="Reset">
               
              </div></td>
          </tr>
        </table>
        <div align="center"></div>
        <p align="center">&nbsp; </p>
      </form> </div></div>
			
			

			
				<div id="footer">
			<? include'include/footer.php'; ?>

			</div>
			</div>

			
		</div>
		


		<!-- END -->

</body>

</html>