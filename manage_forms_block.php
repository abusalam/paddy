<?php 
include 'dbc.php';
session_start();
page_protect();
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
			<p>          
  <? 
$newp = $_GET['p'];
$plimit = "50";

$strSQL = mysql_query("SELECT * FROM scholarshipApplication WHERE is_deleted= '0' ");

$totalrows = mysql_num_rows($strSQL);
$pnums = ceil ($totalrows/$plimit);

if ($newp==''){ $newp='1'; }

$start = ($newp-1) * $plimit;
$starting_no = $start + 1;

if ($totalrows - $start < $plimit) { $end_count = $totalrows;
} elseif ($totalrows - $start >= $plimit) { $end_count = $start + $plimit; }


if ($totalrows - $end_count > $plimit) { $var2 = $plimit;
} elseif ($totalrows - $end_count <= $plimit) { $var2 = $totalrows - $end_count; }

?>


<?php
$query="SELECT *  FROM scholarshipApplication WHERE  is_deleted= '0' ORDER BY AppID DESC LIMIT $start,$plimit";
$result=mysql_query($query);

$num=mysql_numrows($result);

?>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><a href="scholarship_form.php">New Scholarship Form</a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>


<table border="0" align="center" cellpadding="0" cellspacing="0" class="TFtable">
    <tr>
      <td colspan="21" valign="top" scope="col"><b><?php print_r("$starting_no");?> - <?php print_r("$end_count");?> of <?php print_r("$totalrows");?></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       <b><?php if ($newp>1) { ?>
          <a href="<?php echo "manage_accepted_forms.php?p=".($newp-1) ;?>" style="text-decoration:none">Previous Page</a>
          
          <?php } for ($ii=1; $ii<=$pnums; $ii++) { if ($ii!=$newp){ ?>
          <a href="<?php echo "manage_accepted_forms.php?p=$ii";?>" style="text-decoration:none"><?php print_r("$ii");?></a>
          
          <?php } else { ?>
          <a href="<?php  echo "manage_accepted_forms.php?p=$ii"; ?>" style="text-decoration:none"><?php print_r("$ii");?> </a>
          
          <?php }} if ($newp<$pnums) { ?>
          <a href="<?php echo "manage_accepted_forms.php?p=".($newp+1);?>" style="text-decoration:none">Next Page</a>
          <?php } ?></b></td>
      </tr>
    <tr>
     <td align="center" valign="top" id="vzebra-comedy" scope="col"><strong>AppID</strong></td>
           <td align="center" valign="top" id="vzebra-action" scope="col"><strong>Edit</strong></td> 
      <td align="center" valign="top" id="vzebra-action" scope="col"><strong>View</strong></td> 
      <td align="center" valign="top" id="vzebra-action" scope="col"><strong>Approve</strong></td> 
      <td align="center" valign="top" id="vzebra-comedy" scope="col"><strong>Name of the Student</strong></td>
      <td align="center" valign="top" id="vzebra-comedy" scope="col"><strong>Guardian Name</strong></td>
        <td align="center" valign="top" id="vzebra-comedy" scope="col"><strong>DOB</strong></td>
      <td align="center" valign="top" id="vzebra-comedy" scope="col"><strong>Address</strong></td>             
       <td align="center" valign="top" id="vzebra-comedy" scope="col"><strong>Gender</strong></td>
       <td align="center" valign="top" id="vzebra-action" scope="col"><strong>Class</strong></td>
       <td align="center" valign="top" id="vzebra-action" scope="col"><strong>Category</strong></td>
       <td align="center" valign="top" id="vzebra-action" scope="col"><strong>SubCategory</strong></td>
       <td align="center" valign="top" id="vzebra-action" scope="col"><strong>Block/Municipality</strong></td>
       <td align="center" valign="top" id="vzebra-action" scope="col"><strong>School Name</strong></td>
       <td align="center" valign="top" id="vzebra-action" scope="col"><strong>BankName</strong></td>
       <td align="center" valign="top" id="vzebra-action" scope="col"><strong>Bank Branch</strong></td>
       <td align="center" valign="top" id="vzebra-action" scope="col"><strong>IFSC</strong></td>
       <td align="center" valign="top" id="vzebra-action" scope="col"><strong>ACNo</strong></td>
       <td align="center" valign="top" id="vzebra-action" scope="col"><strong>AadharNo</strong></td> 
      <td align="center" valign="top" id="vzebra-action" scope="col"><strong>MobileNo</strong></td> 
      <td align="center" valign="top" id="vzebra-action" scope="col"><strong>Block Auth</strong></td>      
      
      </tr>
        
    <?php
$i=0;
while ($i < $num) {
$AppID=mysql_result($result,$i,"AppID");
$StudentName=mysql_result($result,$i,"ApplicantName");
$GuardianName=mysql_result($result,$i,"GuardianName");
$DOB=mysql_result($result,$i,"DOB");
$BlockMunicipality=mysql_result($result,$i,"BlockMunicipality");
$Gender=mysql_result($result,$i,"Gender");
$Class=mysql_result($result,$i,"Class");
$Category=mysql_result($result,$i,"Category");
$SubCategory=mysql_result($result,$i,"CategorySub");
$BlockMunicipality=mysql_result($result,$i,"BlockMunicipality");
$SchoolName=mysql_result($result,$i,"SchoolName");
$BankName=mysql_result($result,$i,"BankName");
$BankBranchName=mysql_result($result,$i,"BankBranchName");
$IFSC=mysql_result($result,$i,"IFSC");
$ACNo=mysql_result($result,$i,"ACNo");
$AadharNo=mysql_result($result,$i,"AadharNo");
$MobileNo=mysql_result($result,$i,"MobileNo");
$AdviceID=mysql_result($result,$i,"AdviceID");
$SchoolAuth=mysql_result($result,$i,"SchoolAuth");
$BlockAuth=mysql_result($result,$i,"BlockAuth");
$DistAuth=mysql_result($result,$i,"DistAuth");

$query_branch="select * from BankBranch WHERE `BrID`='$BankBranchName'";
$result_branch=mysql_query($query_branch);
$num_result_branch= mysql_numrows($result_branch);
 while($row_branch=mysql_fetch_array($result_branch)) 
 {  $BankBranch= $row_branch['BankBranchName'];  }

?>

<style type="text/css"> 
#hidden<? echo $AppID; ?> {
    width:auto;
    height:auto;
    display: none;
	text-align:justify;
	float:left;
	color:#000;
	
}

</style>
    
    <tr>
    <td valign="top"><? echo $AppID; ?></td>
    <td valign="top"><a href="scholarship_edit_form.php?id=<? echo $AppID; ?>">Edit</a></td>
     <td valign="top"><a href="application_view_form.php?id=<? echo $AppID; ?>">View</a></td>
     <td valign="top"><a href="application_edit_form.php?id=<? echo $AppID; ?>">Edit</a></td>
      <td valign="top"><? echo $StudentName; ?></td>
        <td valign="top"><? echo $GuardianName; ?></td>
        <td valign="top"><? echo $DOB; ?></td>
        <td valign="top"><? echo $BlockMunicipality; ?></td>
        <td valign="top"><? echo $Gender; ?></td>
        <td valign="top"><? echo $Class; ?></td>
        <td valign="top"><? echo $Category; ?></td>
        <td valign="top"><? echo $SubCategory; ?></td>
        <td valign="top"><? echo $BlockMunicipality; ?></td>
        <td valign="top"><? echo $SchoolName; ?></td>
        <td valign="top"><? echo $BankName; ?></td>
        <td valign="top"><? echo $BankBranch; ?></td>
        <td valign="top"><? echo $IFSC; ?></td>
        <td valign="top"><? echo $ACNo; ?></td>
        <td valign="top"><? echo $AadharNo; ?></td>
        <td valign="top"><? echo $MobileNo; ?></td>
        <td valign="top"><? echo $BlockAuth; ?></td>
        
      </tr>
    <?php
$i++;
}
?>
    <tr><td colspan="22" valign="top"><?php if ($num == "0") {
   echo 'Sorry, There is no data availabe' ;
}?>
      
      
  </tr>
</table></p>
			
  
			
			

			
				<div id="footer">
			<? include'include/footer.php'; ?>

			</div>
			</div>

			
		</div>
		


		<!-- END -->

</body>

</html>