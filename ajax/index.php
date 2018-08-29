<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

require_once __DIR__ . '/../dbc.php';

page_protect();

$IdMD5 = $_REQUEST['id'];
$Paddy = ($_REQUEST['val'] == 'false') ? 1 : 'NULL';
$Table = ($_REQUEST['scheme'] == 'KCC' ? 'AgricultureKCC' : 'PMFBYKCC');

$result = mysql_query("update $Table set `paddy`=$Paddy where ID=$IdMD5");

$resp['post'] = $_REQUEST;
$resp['msg'] = $result;

array_push($resp, $Paddy);
array_push($resp, $IdMD5);
array_push($resp, $Table);

echo json_encode($resp);
?>