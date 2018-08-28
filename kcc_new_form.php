<?php 
include 'dbc.php';
session_start();
page_protect();
$BlockNameLogged= $_SESSION['blockname'];
$page= $_GET['p'];

 
 if($_POST['Submit'] == 'Upload'){ //F1
$FormSlNo =  0;
//$FormSlNo =  mysql_real_escape_string(stripslashes($_REQUEST['FormSlNo']));
$BlockCode =  mysql_real_escape_string(stripslashes($_REQUEST['BlockCode']));
$Beneficiary =  mysql_real_escape_string(stripslashes($_REQUEST['Beneficiary']));
$ChequeLot =  0;
//$ChequeLot =  mysql_real_escape_string(stripslashes($_REQUEST['ChequeLot']));
$SBEPIC =  mysql_real_escape_string(stripslashes($_REQUEST['SBEPIC']));
$Amount =  0;
//$Amount =  mysql_real_escape_string(stripslashes($_REQUEST['Amount']));
$MouzaGP =  mysql_real_escape_string(stripslashes($_REQUEST['MouzaGP']));
$LandDetails =  mysql_real_escape_string(stripslashes($_REQUEST['LandDetails']));
$AreaDecimal =  mysql_real_escape_string(stripslashes($_REQUEST['AreaDecimal']));
$MobileNo =  mysql_real_escape_string(stripslashes($_REQUEST['MobileNo']));
$KCCNo =  mysql_real_escape_string(stripslashes($_REQUEST['KCCNo']));
$BankCode =  mysql_real_escape_string(stripslashes($_REQUEST['BankCode']));
$BankBranchCode =  mysql_real_escape_string(stripslashes($_REQUEST['BankBranch']));
$ACNo =  preg_replace("/[^a-zA-Z0-9]/", "", trim(mysql_real_escape_string(stripslashes($_REQUEST['BnkACNo']))));
$IFSC=  mysql_real_escape_string(stripslashes($_REQUEST['IFSC']));
$ExistingLoan=  mysql_real_escape_string(stripslashes($_REQUEST['ExistingLoan']));
$LoanNo=  mysql_real_escape_string(stripslashes($_REQUEST['LoanNo']));
$LoanDate=  mysql_real_escape_string(stripslashes($_REQUEST['LoanDate']));
$LoanType=  mysql_real_escape_string(stripslashes($_REQUEST['LoanType']));
$LoanAmount=  mysql_real_escape_string(stripslashes($_REQUEST['LoanAmount']));
$LoanDate = str_replace('/', '-', $fLoanDate);
$LoanDate = date("Y-m-d", strtotime($fLoanDate));
$AccountStattus=  mysql_real_escape_string(stripslashes($_REQUEST['AccountStatus']));
$FathersName =  mysql_real_escape_string(stripslashes($_REQUEST['FathersName']));
$AadharNo =  mysql_real_escape_string(stripslashes($_REQUEST['AadharNo']));
$LoanRepaymentDate = str_replace('/', '-', $fLoanRepaymentDate);
$LoanRepaymentDate = date("Y-m-d", strtotime($fLoanRepaymentDate));

mysql_query("INSERT INTO AgricultureKCC 
(`BlockName`,`BlockId`,`FormSlNo`,`ChqLot`,`Amount`,`BeneficiaryName`,`SBEPIC`,`MouGP`,`LandDetails`,`AreaDecimal`,`mobile_no`,`KCCNo`,`BankCode`,`BranchCode`,`BnkACNo`,`IFSC`,`ExistingLoan`,`LoanNo`,`LoanDate`,`LoanType`,`LoanAmount`,`AccountStatuse`,`LastRepaymentDate`,`FathersName`,`AadharNo`) values 
('BlockName','$BlockCode','$FormSlNo','$ChequeLot','$Amount','$Beneficiary','$SBEPIC','$MouzaGP','$LandDetails','$AreaDecimal','MobileNo','$KCCNo','$BankCode','$BankBranchCode','$ACNo','$IFSC','$ExistingLoan','$LoanNo','$LoanDate','$LoanType','$LoanAmount','$AccountStatus','$LoanRepaymentDate','$FathersName','$AadharNo')");

/* end eail for Editor HTML*/  
header ('Location: manage_all_forms.php?msg=e10&blid='.$BlockCode);  
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
  <script type="text/javascript">
  
<!--- Code for Casll Start Date Validation --!>

	  function LoanRepaymentDate(field)
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
		<div  class="backmenu"><a href="manage_all_forms.php?p=<? echo $_GET['p']; ?>"><input type="button" value="Back"></a></div>
		<form id="NewApplicant" name="NewApplicant" method="post" action="" >
		<input type="hidden" name="ID" value="<? echo $AppID; ?>" />
        <table width="100%" border="1" cellspacing="0" cellpadding="5" class="TFtable">
  <tr>
    <td colspan="4" align="center"><strong>KCC Form</strong></td>
  </tr>
  <tr>
         <td>Beneficiary:<font color="red">*</font></td>
    <td><input type="text" size="20" name="Beneficiary"></td>
      <td>Fathers Name:</td>
    <td><input type="text" size="20" name="FathersName"></td>
    </tr>
    
 <!--   <td width="19%">Form SL No:</td>
    <td width="27%"><input type="text" size="10" name="FormSlNo"></td> -->
    <td width="18%">Block Name</td>
    <td width="36%"><select name="BlockCode" id="BlockCode" class="required">
    <option value="">Select Block</option>
<?
// code for search Block name //
$query_block="SELECT * FROM BlockMuni ORDER BY blockmuni ASC";
$result_block = mysql_query($query_block);
while($row_block = mysql_fetch_assoc($result_block))
{
	$blockmuni=  $row_block['blockmuni'];
	$blockminicd=  $row_block['blockminicd'];
	
	?>

  <option value="<? echo $blockminicd; ?>"><? echo $blockmuni; ?> </option>
  
<? } 
// End code for search BlockName //
?></select></td>
  <td>Mouza / GP</td>
    <td><input type="text" size="15" name="MouzaGP"></td>
  </tr>
  <tr>
 
 <!--   <td>Cheque Lot:</td>
    <td><input type="text" size="10" name="ChequeLot"></td>
  </tr>
  <tr>
    <td>Amount:</td>
    <td><input type="text" size="10" name="Amount"></td> -->
    <td>EPIC Number</td>
    <td><input type="text" size="15" name="SBEPIC"></td>
    <td>Aadhar Number:</td>
    <td><input type="text" size="12" name="AadharNo"></td>
  </tr>
  <tr>
  
    <td>Land Details</td>
    <td><input type="text" size="15" name="LandDetails"></td>
    <td></td><td></td>
  </tr>
  <tr>
    <td>Area in Decimal:</td>
    <td><input type="text" name="AreaDecimal" size="10">  </td>
     <td>KCC Details (Like No. etc.)</td>
    <td><input type="text" name="KCCNo" size="20">    </td>
    
  </tr>
  <tr>
    <td>Bank AC No</td>
    <td><input type="text" size="15" name="BnkACNo" ></td>
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
    <td><input type="radio" name="ExistingLoan" value="Yes"/> Yes | <input name="ExistingLoan" type="radio" value="No" />No </td>
    <td>Loan AC No:</td>
    <td><input type="text" name="LoanNo" size="40" ></td>
  </tr>
  <tr>
    <td>Loan Date:</td>
    <td><input type="text" size="10" pattern="\d{1,2}/\d{1,2}/\d{4}" placeholder="dd/mm/yyyy" name="LoanDate" id="LoanDate" value="<? echo $NEWLoanDate; ?>"></td>
    <td>Loan Type:<font color="red"></font></td>
    <td><input type="text" name="LoanType" size="40" ></td>
  </tr>
  <tr>
    <td>Loan Amount:</td>
    <td><input type="text" name="LoanAmount" size="10" value="<? echo $LoanAmount; ?>"></td>
    <td></td>
    <td></td>
  </tr>
    <tr>
    <td>Account Status (Dormant/Running):</td>
    <td><input type="radio" name="AccountStatus" value="Yes"/> Yes | <input name="AccountStatus" type="radio" value="No" />No </td>
    <td>Last Repayment Date:</td>
    <td><input type="text" size="10" pattern="\d{1,2}/\d{1,2}/\d{4}" placeholder="dd/mm/yyyy" name="LoanRepaymentDate" id="LastRepaymentDate" value="<? echo $NEWLastRepaymentDate; ?>"></td>
  </tr>
  
  <tr>
    <td colspan="4" align="center"><input type="submit" name="Submit" value="Upload" onclick="return SubmitCheck()"/></td>
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