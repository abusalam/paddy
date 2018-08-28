<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

include 'dbc.php';
session_start();
$BlockNameLogged = $_SESSION['blockname'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>

<title><? echo $pagetitle; ?></title> <!-- YOUR WEBSITE NAME -->

<!-- DO NOT TOUCH THIS -->

<link rel="stylesheet" type="text/css" href="css/style.css">
<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scaleable=no">
<script src="scripts/jquery-1.12.3.min.js"></script>
<script src="scripts/main.js"></script>

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
			<div style="width:1000px;"><h2 align="center">Welcome to KCC, Malda District</h2></div>
			<br>
		<div style="height:450px">


		</div></div>


				<div id="footer">
			<? include'include/footer.php'; ?>

			</div>
			</div>


		</div>



		<!-- END -->

</body>

</html>