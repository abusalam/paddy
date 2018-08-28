
<? if (isset($_SESSION['user_id'])) {

	    
	  
if (checkAdmin()) {
/*******************************END**************************/
?>
     <li style="text-align:center"><font color="#FF9912"> - Admin Menu -</font></li>	
	 <li><a  href="manage_blocks.php"> - View Forms</a></li>
	  <li><a  href="kcc_new_form.php"> - Upload New Form</a></li>
	
		  <?php }     ?>
		  		
                <li> <a href="changepassword.php">- Change Password -</a></li>
                <li><a href="logout.php"><font color="#EEC900">- Logout <? echo $_SESSION['user_name']; ?> -</font></a></li>
                    <?php } else {?>   <li><a href="login.php">- Login -</a> </li>       <?php } ?>
					
                </ul>
