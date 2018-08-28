<div class="logo"><a href="index.php"><? echo $pageheader; ?></a>
		</div>

		<div class="powered"><? if (isset($_SESSION['user_id'])) { ?><a href="logout.php"><font color="#FFFFFF"><b>Logout </b></font></a><? } else { echo 'Support by'; } ?></div>