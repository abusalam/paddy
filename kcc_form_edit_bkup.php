<?php 
include 'dbc.php';
session_start();
page_protect();
$BlockNameLogged= $_SESSION['blockname'];
$blkid= $_GET['blid'];
$GPMou= $_GET['gp'];
$IdMD5 = $_GET['id'];
$page= $_GET['p'];
$query_application="SELECT * FROM `AgricultureKCC`  WHERE  `ID` = '$IdMD5'";
$result_application=mysql_query($query_application);
$num_application=mysql_numrows($result_application);
$BlockName = mysql_result($result_application,$i,"BlockName");
$FormSlNo = mysql_result($result_application,$i,"FormSlNo");
$ChqLot = mysql_result($result_application,$i,"ChqLot");
$Amount = mysql_result($result_application,$i,"Amount");
$BeneficiaryName =  mysql_result($result_application,$i,"BeneficiaryName");
$SBEPIC =  mysql_result($result_application,$i,"SBEPIC");
$MouGP=  mysql_result($result_application,$i,"MouGP");
$LandDetails =  mysql_result($result_application,$i,"LandDetails");
$AreaDecimal =  mysql_result($result_application,$i,"AreaDecimal");
$KCCNo =  mysql_result($result_application,$i,"KCCNo");
$BnkACNo =  mysql_result($result_application,$i,"BnkACNo");
// $BankCode =  mysql_result($result_application,$i,"BankCode");
$BankName =  mysql_result($result_application,$i,"BankName");
$BankBranch =  mysql_result($result_application,$i,"BankBranch");
$IFSC =  mysql_result($result_application,$i,"IFSC");
$ExistingLoan =  mysql_result($result_application,$i,"ExistingLoan");
$LoanNo =  mysql_result($result_application,$i,"LoanNo");
$LoanDate =  mysql_result($result_application,$i,"LoanDate");
$LoanType =  mysql_result($result_application,$i,"LoanType");
$LoanAmount =  mysql_result($result_application,$i,"LoanAmount");
$NewLoanDate = new DateTime($LoanDate);
$NEWLoanDate =date_format($NewLoanDate, 'd/m/Y');
$FathersName =  mysql_result($result_application,$i,"FathersName");
$AadharNo =  mysql_result($result_application,$i,"AadharNo");
 
 
 if($_POST['Submit'] == 'Edit'){ //F1

$fKCCNo =  mysql_real_escape_string(stripslashes($_REQUEST['KCCNo']));
$fBankCode =  mysql_real_escape_string(stripslashes($_REQUEST['BankCode']));
$fBankBranchCode =  mysql_real_escape_string(stripslashes($_REQUEST['BankBranch']));
$fACNo =  preg_replace("/[^a-zA-Z0-9]/", "", trim(mysql_real_escape_string(stripslashes($_REQUEST['BnkACNo']))));
$fIFSC=  mysql_real_escape_string(stripslashes($_REQUEST['IFSC']));
$fExistingLoan=  mysql_real_escape_string(stripslashes($_REQUEST['ExistingLoan']));
$fLoanNo=  mysql_real_escape_string(stripslashes($_REQUEST['LoanNo']));
$fLoanDate=  mysql_real_escape_string(stripslashes($_REQUEST['LoanDate']));
$fLoanType=  mysql_real_escape_string(stripslashes($_REQUEST['LoanAmount']));
$fLoanAmount=  mysql_real_escape_string(stripslashes($_REQUEST['LoanType']));
$fLoanDate = str_replace('/', '-', $fLoanDate);
$fLoanDate = date("Y-m-d", strtotime($fLoanDate));
$fFathersName=  mysql_real_escape_string(stripslashes($_REQUEST['FathersName']));
$fAadharNo=  mysql_real_escape_string(stripslashes($_REQUEST['AadharNo']));

mysql_query("update AgricultureKCC set 
`KCCNo`='$fKCCNo',
`BankCode`='$fBankCode',
`BranchCode`='$fBankBranchCode',
`BnkACNo`='$fACNo',
`IFSC`='$fIFSC',
`ExistingLoan`='$fExistingLoan',
`LoanNo`='$fLoanNo',
`LoanDate`='$fLoanDate',
`LoanType`='$fLoanType', 
`LoanAmount`='$fLoanAmount',
`FathersName`='$fFathersName',
`AadharNo`='$fAadharNo' where ID='$IdMD5 '");

/* end eail for Editor HTML*/  
header ('Location: manage_all_forms.php?msg=e10&p='.$page.'&blid='.$blkid.'&gp='.$GPMou);  
		} //F2


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>

<title><? echo $pagetitle; ?></title> <!-- YOUR WEBSITE NAME -->

<!-- DO NOT TOUCH THIS -->

<link rel="stylesheet" type="text/css" href="css/style.css">
<style type="text/css">
    .box{
        padding: 0px;
        display: none;
        margin-top: 0px;
        border: 0px solid #000;
    }
    .mgu{  }
    .DivSchollership{  }
	  #DivCastAuthority{  display:none; } 
	 .phy{  }
	 </style>
<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scaleable=no">
<!---script src="scripts/jquery-1.12.3.min.js"></script-->
<script src="scripts/main.js"></script>
<script src="http://code.jquery.com/jquery-1.8.3.min.js" type="text/javascript"></script> 

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js" type="text/javascript"></script>
 <script>
function showIFSC(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
				document.NewApplicant.IFSC.value = this.responseText;
            }
        };
        xmlhttp.open("GET","findbankifsc.php?brid="+str,true);
        xmlhttp.send();
    }
}

	
</script>
 <script>
	
	
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
	
	
	<!--- Script code for Bank Branch--!>
function getXMLHTTP2() { 
		var xmlhttp2=false;	
		try{
			xmlhttp2=new XMLHttpRequest();
		}
		catch(e2)	{		
			try{			
				xmlhttp2= new ActiveXObject("Microsoft.XMLHTTP2");
			}
			catch(e2){
				try{
				xmlhttp2 = new ActiveXObject("Msxml2.XMLHTTP2");
				}
				catch(e12){
					xmlhttp2=false;
				}
			}
		}
		 	
		return xmlhttp2;
	}
	
	
	
	function getBranch(strURL2) {		
		
		var req2 = getXMLHTTP2();
		
		if (req2) {
			
			req2.onreadystatechange = function() {
				if (req2.readyState == 4) {
					// only if "OK"
					if (req2.status == 200) {						
						document.getElementById('BranchDiv').innerHTML=req2.responseText;	
						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req2.statusText);
					}
				}				
			}			
			req2.open("GET2", strURL2, true);
			req2.send(null);
			showIFSC();
		}
				
	}

	</script>
    
     <script>
  $(document).ready(function(){
    
    $("#NewApplicant").validate();
  });
  </script>
  <script type="text/javascript">
  
<!--- Code for Casll Start Date Validation --!>

	  function LoanDate(field)
  {
    var allowBlank = true;
    var minYear = 1902;
    var maxYear = (new Date()).getFullYear();

    var errorMsg = "";

    // regular expression to match required date format
    re = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;

    if(field.value != '') {
      if(regs = field.value.match(re)) {
        if(regs[1]< 1 || regs[1] > 31) {
          errorMsg = "Invalid value for day in class date start: " + regs[1];
        } else if(regs[2] < 1 || regs[2] > 12) {
          errorMsg = "Invalid value for month in class date start: " + regs[2];
        } else if(regs[3] < minYear || regs[3] > maxYear) {
          errorMsg = "Invalid value for year in class date start: " + regs[3] + " - must be between " + minYear + " and " + maxYear;
        }
      } else {
        errorMsg = "Invalid date format in class date start: " + field.value;
      }
    } else if(!allowBlank) {
      errorMsg = "Empty date not allowed in class date start!";
    }

    if(errorMsg != "") {
      alert(errorMsg);
      field.focus();
      return false;
    }

    return true;
  }


  
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
		<div  class="backmenu"><a href="manage_all_forms.php?blid=<? echo $_GET['blid']; ?>&p=<? echo $_GET['p']; ?>&gp=<? echo $GPMou; ?>"><input type="button" value="Back"></a></div>
		<form id="NewApplicant" name="NewApplicant" method="post" action="" >
		<input type="hidden" name="ID" value="<? echo $AppID; ?>" />
        <table width="100%" border="1" cellspacing="0" cellpadding="5" class="TFtable">
  <tr>
    <td colspan="4" align="center"><strong>KCC Form</strong></td>
  </tr>
  <tr>
    <td width="19%">Form SL No:</td>
    <td width="27%"><? echo $FormSlNo; ?></td>
    <td width="18%">Block Name</td>
    <td width="36%"><? echo $BlockName; ?></td>
  </tr>
  <tr>
    <td>Beneficiary:<font color="red">*</font></td>
    <td><? echo $BeneficiaryName; ?></td>
    <td>Cheque Lot:</td>
    <td><? echo $ChqLot; ?></td>
  </tr>
  <tr>
    <td>Amount:</td>
    <td><? echo $Amount; ?></td>
    <td>S_BEPIC</td>
    <td><? echo $SBEPIC; ?></td>
  </tr>
  <tr>
    <td>Mouza / GP</td>
    <td><? echo $MouGP; ?></td>
    <td>Land Details</td>
    <td><? echo $LandDetails; ?></td>
  </tr>
  <tr>
    <td>Area in Decimal:</td>
    <td><? echo $AreaDecimal; ?></td>
     <td>KCC</td>
    <td><input type="text" name="KCCNo" size="20" value="<? echo $KCCNo; ?>" >    </td>
    
  </tr>
  <tr>
    <td>Bank AC No</td>
    <td><input type="text" size="15" name="BnkACNo"  value="<? echo $BnkACNo; ?>"></td>
    <td>Bank Name</td>
    <td><select name="BankCode" id="BankCode" class="required"  onChange="getBranch('findbankbranch.php?bank='+this.value)">
    <option value="">Select Bank</option>
<?
// code for search Bank name //
$query_vol="SELECT * FROM BankName ORDER BY bank_name ASC";
$result_vol = mysql_query($query_vol);
while($row_vol = mysql_fetch_assoc($result_vol))
{
	$BankName=  $row_vol['bank_name'];
	$BankCode=  $row_vol['bank_cd'];
	
	?>

  <option value="<? echo $BankCode; ?>"><? echo $BankName; ?> </option>
  
<? } 
// End code for search Bank Name //
?></select>
	</td>
  </tr>
 
   <tr>
    <td>Bank Branch</td>
    <td><div id="BranchDiv">
<select name="BankBranch" class="required" id="BankBranch" onchange="showIFSC(this.value)" >
<option value="">Select Branch</option>
<? while($row_branch=mysql_fetch_array($result_branch)) { ?>

<option value="<? echo $row_branch['BrID']; ?>"><? echo $row_branch['BankBranchName']; ?></option>
<? } ?>
</select></div></td>
    <td>IFSC:</td>
    <td> <input  type="hidden" name="IFSC" id="IFSC"> <div id="txtHint"></div></td>
  </tr>
  <tr>
    <td>Existing Loan:</td>
    <td><input type="radio" name="ExistingLoan" value="Yes" <? if($ExistingLoan=='Yes') { echo 'checked=checked'; }?> /> Yes | <input name="ExistingLoan" type="radio" value="No" <? if($ExistingLoan=='No') { echo 'checked=checked'; } ?> />No </td>
    <td>Loan AC No:</td>
    <td><input type="text" name="LoanNo" size="40" value="<? echo $LoanNo; ?>"></td>
  </tr>
  <tr>
    <td>Loan Date:</td>
    <td><input type="text" size="10" pattern="\d{1,2}/\d{1,2}/\d{4}" placeholder="dd/mm/yyyy" name="LoanDate" id="LoanDate" value="<? echo $NEWLoanDate; ?>"></td>
    <td>Loan Type:<font color="red"></font></td>
    <td><input type="text" name="LoanType" size="40" value="<? echo $LoanType; ?>"></td>
  </tr>
  <tr>
    <td>Loan Amount:</td>
    <td><input type="text" name="LoanAmount" size="10" value="<? echo $LoanAmount; ?>"></td>
    <td>Father's Name</td>
    <td><input type="text" name="FathersName" size="40" value="<? echo $FathersName; ?>"></td>
  </tr>
   <tr>
    <td>Aadhar Number:</td>
    <td><input type="text" name="AadharNo" size="12" value="<? echo $AadharNo; ?>"></td>
    <td></td>
    <td></td>
  </tr>
  
  <tr>
    <td colspan="4" align="center"><input type="submit" name="Submit" value="Edit" onclick="return SubmitCheck()"/></td>
    </tr>
</table>
        </form>

			
				<div id="footer">
			<? include'include/footer.php'; ?>

			</div>
			</div>

			
		</div>
		


		<!-- END -->

</body>

</html>