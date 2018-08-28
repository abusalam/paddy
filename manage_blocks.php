<?php 
include 'dbc.php';
session_start();
//page_protect();
$BlockNameLogged= $_SESSION['blockname'];
//if (checkAdmin()) {} else {  header("Location: login.php"); }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>

<title><? echo $pagetitle; ?></title> <!-- YOUR WEBSITE NAME -->

<!-- DO NOT TOUCH THIS -->

<link rel="stylesheet" type="text/css" href="css/style.css">
<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scaleable=no">
<!---script src="scripts/jquery-1.12.3.min.js"></script-->
<script src="scripts/main.js"></script>
<script src="http://code.jquery.com/jquery-1.8.3.min.js" type="text/javascript"></script> 

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js" type="text/javascript"></script>
 
 <script>
<!--- Script code for Cast Search --!>
function getXMLHTTP() { 
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
	}
	
	
	
	function getCity(strURL) {		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('CastDiv').innerHTML=req.responseText;	
						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
	

  $(document).ready(function(){
    
    $("#SetSchool").validate();
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
		<div  class="backmenu"></div>
		<? $msg = $_GET['msg']; if(!empty($msg)) { include 'msg.php'; }   ?>
        
        
<table border="1" cellspacing="0" cellpadding="5" width="100%" class="TFtable">
  <tr>
    <td colspan="4" align="center" valign="middle" nowrap="nowrap"><strong>Block Wise Kishan Credit Card</strong></td>
    </tr>
    <td align="left" valign="middle"><strong>Block Name</strong></td>
    <td align="center" valign="middle"><strong>Total Uploaded  Forms</strong></td>
	 <td align="center" valign="middle"><strong>KCC</strong></td>
	 <td align="center" valign="middle"><strong>Exsiting Loan</strong></td>
  </tr>
<? //Querry by Date//
$query_blockname ="SELECT * FROM BlockMuni ORDER BY blockmuni ASC";

$result_blockname = mysql_query($query_blockname) or die(mysql_error());
while($row_blockname = mysql_fetch_array($result_blockname)){
        $bnm=$row_blockname['blockmuni'];
     	$BlockName= addslashes($row_blockname['blockmuni']);
		$BlId= $row_blockname['blockminicd'];
	 ?>
	
	  <tr>
	       <? if ($BlockNameLogged==$bnm or $BlockNameLogged=="All") {
	 echo "<td align='left' valign='middle'>";
	 echo "<a href='manage_all_forms.php?blid=" .$BlId."'>" . $BlockName .  "</a>" ;  
    	    }
	    else
	     echo "<td align='left' valign='middle'>".$BlockName;
	    ?> 
	    
	    </td> 
<!---
  <td align="left" valign="middle"><a href="manage_all_forms.php?blid=<?  echo $BlId; ?>"><? echo $BlockName ; ?></a></td> --->
  
    <td align="center" valign="middle"><b><? $query_count_block="select COUNT(ID) AS TotalBlockForm, SUM(IF(KCCNo  !='', 1,0)) as TotalBlockKCCNo , SUM(IF(ExistingLoan !='', 1,0)) as TotalBlockExistingLoan  from AgricultureKCC where BlockName='$BlockName'";
$result_count_block=mysql_query($query_count_block);
$num_result_count_block= mysql_numrows($result_count_block);
 while($row_count_block=mysql_fetch_array($result_count_block)) 
 
 {   $TotalBlockForm = $row_count_block['TotalBlockForm'];
 $TotalBlockKCCNo = $row_count_block['TotalBlockKCCNo'];
 $TotalBlockExistingLoan =$row_count_block['TotalBlockExistingLoan'];
     
  }
  echo $TotalBlockForm;  ?></b></td>
 <td align="center"><? echo $TotalBlockKCCNo; ?></td>
  <td align="center"><? echo $TotalBlockKCCNo; ?></td>
  </tr><?  
} ?>
 <tr>
    <td align="left" valign="middle"><b>Total Forms:</b></td>
    <td align="center" valign="middle"><b><? $query_count_total="select COUNT(ID) AS TotalUpForm, SUM(IF(KCCNo  !='', 1,0)) as TotalKCCNo , SUM(IF(ExistingLoan !='', 1,0)) as TotalExistingLoan  from AgricultureKCC";
$result_count_total=mysql_query($query_count_total);
$num_result_count_total= mysql_numrows($result_count_total);
 while($row_count_total=mysql_fetch_array($result_count_total)) 
 
 {   $TotalUpForm = $row_count_total['TotalUpForm'];
 $TotalKCCNo = $row_count_total['TotalKCCNo'];
 $TotalExistingLoan =$row_count_total['TotalExistingLoan'];
     
  }
  echo $TotalUpForm;  ?></b></td>
   <td align="center"><? echo $TotalKCCNo; ?></td>
    <td align="center"><? echo $TotalExistingLoan; ?></td>
  </tr>
</table>
		  
		  <div id="footer">
			<? include'include/footer.php'; ?>

			</div>
			</div>

			
		</div>
		


		<!-- END -->

</body>

</html>