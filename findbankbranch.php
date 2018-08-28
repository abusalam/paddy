<? 
include('dbc.php');


$bank=$_REQUEST['bank'];

$query_vol="SELECT * FROM BankName where `bank_name`='$bank'";
$result_vol = mysql_query($query_vol);
while($row_vol = mysql_fetch_assoc($result_vol))
{
		$BankCode=  $row_vol['bank_cd'];
	

  }
$query_branch="select * from BankBranch WHERE `bank_cd`='$BankCode'  ORDER BY branch_name ASC";
$result_branch=mysql_query($query_branch);
$num_result_branch= mysql_numrows($result_branch);
session_start();
$_SESSION['bankcd']= $BankCode;  
?>
<select name="BankBranch" class="required" id="BankBranch" onchange="showIFSC(this.value)" >
<option value="">Select Branch</option>
<? while($row_branch=mysql_fetch_array($result_branch)) { 
$banchcd= $row_branch['branchcd'];
?>

<option value="<? echo $row_branch['branch_name']; ?>"><? echo $row_branch['branch_name']; ?></option>
<? } ?>
</select>
