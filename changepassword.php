<? session_start();
include 'dbc.php';
page_protect();

if($_POST['doUpdate'] == 'Update')  
{


$rs_pwd = mysql_query("select password from AdminUsers where id='$_SESSION[user_id]'");
list($old) = mysql_fetch_row($rs_pwd);
$old_salt = substr($old,0,9);

//check for old password in md5 format
	if($old === PwdHash($_POST['pwd_old'],$old_salt))
	{
	$newsha1 = PwdHash($_POST['pwd_new']);
	mysql_query("update AdminUsers set password='$newsha1' where id='$_SESSION[user_id]'");
	$msg[] = "Your new password is updated";
	//header("Location: mysettings.php?msg=Your new password is updated");
	} else
	{
	 $err[] = "Your old password is invalid";
	 //header("Location: mysettings.php?msg=Your old password is invalid");
	}

}
?>



               
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>

<title>Backward Classes Welfare Department</title> <!-- YOUR WEBSITE NAME -->

<!-- DO NOT TOUCH THIS -->

<link rel="stylesheet" type="text/css" href="css/style.css">
<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scaleable=no">
<!--script src="scripts/jquery-1.12.3.min.js"></script-->
<script src="scripts/main.js"></script>
<script src="http://code.jquery.com/jquery-1.8.3.min.js" type="text/javascript"></script> 

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js" type="text/javascript"></script>
  <script>
  $(document).ready(function(){
    $("#pform").validate();
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
			
<h3 class="titlehdr">Change Password</h3>
<div style="height:450px">
       <?php	
	if(!empty($err))  {
	   echo "<div class=\"msg\">";
	  foreach ($err as $e) {
	    echo "* Error - $e <br>";
	    }
	  echo "</div>";	
	   }
	   if(!empty($msg))  {
	    echo "<div class=\"msg\">" . $msg[0] . "</div>";

	   }
	  ?><form name="pform" id="pform" method="post" action="">
        <table width="80%" border="0" align="center" cellpadding="3" cellspacing="3" class="TFtable">
        <tr>
    <td colspan="2" align="center" valign="middle"> <h4>Change Password:</h4> </td>
    </tr>
          <tr> 
            <td width="31%">Old Password</td>
            <td width="69%"><input name="pwd_old" type="password" class="required password"  id="pwd_old"></td>
          </tr>
          <tr> 
            <td>New Password</td>
            <td><input name="pwd_new" type="password" id="pwd_new" class="required password"  ></td>
          </tr>
        </table>
        <p align="center"> 
          <input name="doUpdate" type="submit" id="doUpdate" value="Update">
        </p>
 
        </form>    </div>  </div>
			
			

			
				<div id="footer">
			<? include'include/footer.php'; ?>

			</div>
			</div>

			
		</div>
		


		<!-- END -->

</body>

</html>