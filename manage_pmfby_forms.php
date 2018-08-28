<?php
include 'dbc.php';
session_start();
page_protect();
$newp = $_GET['p'];
$plimit = "250";
$blkid = $_GET['blid'];
$GPMou = $_GET['gp'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>

<title><? echo $pagetitle; ?></title> <!-- YOUR WEBSITE NAME -->

<!-- DO NOT TOUCH THIS -->

<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scaleable=no">
<script src="scripts/jquery-1.12.3.min.js"></script>
<script src="scripts/bootstrap.min.js"></script>
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
        <form id="NewApplicant" name="NewApplicant" method="get" action="manage_all_forms.php" >
        <input type="hidden" name="blid" value="<? echo $blkid;?>" />
        <table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td width="11%">Filter By GP</td>
    <td width="22%"><select name="gp" id="gp" class="required">
    <option value="">Select GP</option>
<?
// code for search Block name //
$query_gp="SELECT DISTINCT GP FROM PMFBYKCC  where Block ='$blkid' ORDER BY GP ASC";
$result_gp = mysql_query($query_gp);
while($row_gp = mysql_fetch_assoc($result_gp))
{
	$MouGP=  $row_gp['GP'];

	?>

  <option value="<? echo $MouGP; ?>"><? echo $MouGP; ?> </option>

<? }
// End code for search BlockName //
?></select></td>
    <td width="67%"><input name="Search" value="Search" type="submit" /></td>
  </tr>
</table>
</form>
			<p>
  <?

if(empty($GPMou)){ $strSQL = mysql_query("SELECT * FROM PMFBYKCC WHERE Block='$blkid' and is_deleted= '0' "); } else {

$strSQL = mysql_query("SELECT * FROM PMFBYKCC WHERE Block='$blkid' and MouGP='$GPMou' and is_deleted= '0' "); }

$totalrows = mysql_num_rows($strSQL);
$pnums = ceil ($totalrows/$plimit);

if ($newp==''){ $newp='1'; }

$start = ($newp-1) * $plimit;
$starting_no = $start + 1;

if ($totalrows - $start < $plimit) { $end_count = $totalrows;
} elseif ($totalrows - $start >= $plimit) { $end_count = $start + $plimit; }


if ($totalrows - $end_count > $plimit) { $var2 = $plimit;
} elseif ($totalrows - $end_count <= $plimit) { $var2 = $totalrows - $end_count; }

if(empty($GPMou)){  $query="SELECT *  FROM PMFBYKCC WHERE Block='$blkid' and is_deleted= '0' ORDER BY ID DESC LIMIT $start,$plimit"; } else
{  $query="SELECT *  FROM PMFBYKCC WHERE Block='$blkid' and MouGP='$GPMou' and is_deleted= '0' ORDER BY ID DESC LIMIT $start,$plimit"; }
$result=mysql_query($query);

$num=mysql_numrows($result);

?>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>


<table border="0" align="center" cellpadding="0" cellspacing="0" class="TFtable">
    <tr>
      <td colspan="21" valign="top" scope="col"><b><?php print_r("$starting_no");?> - <?php print_r("$end_count");?> of <?php print_r("$totalrows");?></b>  <b><?php if ($newp > 1) {?>
          <a href="<?php echo "manage_all_forms.php?blid=" . $blkid . "&p=" . ($newp - 1) . "&gp=" . $GPMou; ?>" style="text-decoration:none">Previous Page</a>

          <?php }
for ($ii = 1; $ii <= $pnums; $ii++) {if ($ii != $newp) {?>
          <a href="<?php echo "manage_all_forms.php?blid=" . $blkid . "&p=" . $ii . "&gp=" . $GPMou; ?>" style="text-decoration:none"><?php print_r("$ii");?></a>

          <?php } else {?>
          <a href="<?php echo "manage_all_forms.php?blid=" . $blkid . "&p=" . $ii . "&gp=" . $GPMou; ?>" style="text-decoration:none"><?php print_r("$ii");?> </a>

          <?php }}if ($newp < $pnums) {?>
          <a href="<?php echo "manage_all_forms.php?blid=" . $blkid . "&p=" . ($newp + 1) . "&gp=" . $GPMou; ?>" style="text-decoration:none">Next Page</a>
          <?php }?></b></td>
      </tr>
    <tr>
     <td align="center" valign="top" id="vzebra-comedy" scope="col"><strong>ID</strong></td>
           <td align="center" valign="top" id="vzebra-action" scope="col"><strong>Edit</strong></td>
           <td align="center" valign="top" id="vzebra-action" scope="col"><strong>Block Name</strong></td>
		    <td align="center" valign="top" id="vzebra-action" scope="col"><strong>MOU GP</strong></td>
      <td align="center" valign="top" id="vzebra-comedy" scope="col"><strong>Form Sl Not</strong></td>
      <td align="center" valign="top" id="vzebra-comedy" scope="col"><strong>CID</strong></td>
        <td align="center" valign="top" id="vzebra-comedy" scope="col"><strong>FID</strong></td>
      <td align="center" valign="top" id="vzebra-comedy" scope="col">
        <strong>Paddy Procured</strong>
      </td>
      <td align="center" valign="top" id="vzebra-comedy" scope="col">
        <strong>Beneficiary</strong>
      </td>
       <td align="center" valign="top" id="vzebra-comedy" scope="col"><strong>Fathers Name</strong></td>
       <td align="center" valign="top" id="vzebra-comedy" scope="col"><strong>Caste</strong></td>

       <td align="center" valign="top" id="vzebra-action" scope="col"><strong>Farmerscategory</strong></td>
       <td align="center" valign="top" id="vzebra-action" scope="col"><strong>Crop</strong></td>
       <td align="center" valign="top" id="vzebra-action" scope="col"><strong>Insuredarea</strong></td>
       <td align="center" valign="top" id="vzebra-action" scope="col"><strong>KCC</strong></td>
       <td align="center" valign="top" id="vzebra-action" scope="col"><strong>Bank AC No</strong></td>
       <td align="center" valign="top" id="vzebra-action" scope="col"><strong>BankName</strong></td>
       <td align="center" valign="top" id="vzebra-action" scope="col"><strong>Bank Branch</strong></td>
       <td align="center" valign="top" id="vzebra-action" scope="col"><strong>IFSC</strong></td>
       <td align="center" valign="top" id="vzebra-action" scope="col"><strong>Existing Loan</strong></td>
       <td align="center" valign="top" id="vzebra-action" scope="col"><strong>Loan No</strong></td>
      <td align="center" valign="top" id="vzebra-action" scope="col"><strong>Loan Date</strong></td>
      <td align="center" valign="top" id="vzebra-action" scope="col"><strong>Loan Type</strong></td>
      <td align="center" valign="top" id="vzebra-action" scope="col"><strong>Loan Amount</strong></td>
      <td align="center" valign="top" id="vzebra-action" scope="col"><strong>Aadhar Number</strong></td>

      </tr>

    <?php
$i = 0;
while ($i < $num) {
	$AppID = mysql_result($result, $i, "ID");
	$BlockName = mysql_result($result, $i, "Block");
	$FormSlNo = mysql_result($result, $i, "ApplicationNo");
	$FID = mysql_result($result, $i, "FID");
	$CID = mysql_result($result, $i, "CID");
	$BeneficiaryName = mysql_result($result, $i, "Name");
	$Caste = mysql_result($result, $i, "Caste");
	$MouGP = mysql_result($result, $i, "GP");
	$Farmerscategory = mysql_result($result, $i, "Farmerscategory");
	$Crop = mysql_result($result, $i, "Crop");
	$Insuredarea = mysql_result($result, $i, "Insuredarea");
	$KCCNo = mysql_result($result, $i, "KCCNo");
	$BnkACNo = mysql_result($result, $i, "BnkACNo");
	$BankName = mysql_result($result, $i, "BankName");
	$BankCode = mysql_result($result, $i, "BankCode");
	$BankBranch = mysql_result($result, $i, "BankBranch");
	$BranchCode = mysql_result($result, $i, "BranchCode");
	$IFSC = mysql_result($result, $i, "IFSC");
	$ExistingLoan = mysql_result($result, $i, "ExistingLoan");
	$LoanNo = mysql_result($result, $i, "LoanNo");
	$LoanDate = mysql_result($result, $i, "LoanDate");
	$LoanType = mysql_result($result, $i, "LoanType");
	$LoanAmount = mysql_result($result, $i, "LoanAmount");
	$FathersName = mysql_result($result, $i, "FatherName");
	$AadharNo = mysql_result($result, $i, "AadharNo");
	$Paddy = (mysql_result($result, $i, "paddy") > 0) ? true : false;
	?>

    <tr>
    <td valign="top"><? echo $AppID; ?></td>
    <td valign="top"><a href="kcc_pmfby_form_edit.php?blid=<? echo $blkid; ?>&id=<? echo $AppID; ?>&p=<? echo $_GET['p']; ?>&gp=<? echo $GPMou; ?>">Edit</a></td>
      <td valign="top"><? echo $BlockName; ?></td>
	   <td valign="top"><? echo $MouGP; ?></td>
        <td valign="top"><? echo $FormSlNo; ?></td>
        <td valign="top"><? echo $CID; ?></td>
        <td valign="top"><? echo $FID; ?></td>
        <td valign="top">
          <button type="button"
          class="btn btn-sm btn-secondary btn-toggle<? echo ($Paddy) ? ' active' : ''; ?>"
                  data-toggle="button" aria-pressed="true" autocomplete="off">
            <div class="handle"></div>
          </button>
        </td>
        <td valign="top"><? echo $BeneficiaryName; ?></td>
        <td valign="top"><? echo $FathersName; ?></td>
        <td valign="top"><? echo $Caste; ?></td>

        <td valign="top"><? echo $Farmerscategory; ?></td>
        <td valign="top"><? echo $Crop; ?></td>
        <td valign="top"><? echo $Insuredarea; ?></td>
        <td valign="top"><? echo $KCCNo; ?></td>
        <td valign="top"><? echo $BnkACNo; ?></td>
        <td valign="top"><? echo $BankName; ?></td>
		<td valign="top"><? echo $BankBranch; ?></td>
        <td valign="top"><? echo $IFSC; ?></td>
        <td valign="top"><? echo $ExistingLoan; ?></td>
        <td valign="top"><? echo $LoanNo; ?></td>
        <td valign="top"><? echo $LoanDate; ?></td>
		<td valign="top"><? echo $LoanType; ?></td>
		<td valign="top"><? echo $LoanAmount; ?></td>
		<td valign="top"><? echo $AadharNo; ?></td>

      </tr>
    <?php
$i++;
}
?>
    <tr><td colspan="22" valign="top"><?php if ($num == "0") {
	echo 'Sorry, There is no data availabe';
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