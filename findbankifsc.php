<? 
include('dbc.php');
session_start();

$brid=trim($_REQUEST['brid']);
$bankcd=trim($_SESSION['bankcd']);


$query_IFSC="select * from BankBranch WHERE `branchcd`='$brid' and `bank_cd`='$bankcd'";
$result_IFSC=mysql_query($query_IFSC);
$num_result_IFSC= mysql_numrows($result_IFSC);
while($row_IFSC=mysql_fetch_array($result_IFSC)) {  echo $row_IFSC['ifsc_code']; } ?>



