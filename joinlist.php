<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Interior Touches : Mailing List Subscription</title>

<style type="text/css">
<!--
.BodyText {
	font-family: Arial, Helvetica, sans-serif;
}
body p {
	text-align: center;
}
-->
</style>
<head>
<SCRIPT LANUAGE="JavaScript 1.2">
<!--
function RSto() {window.resizeTo(585,400)}
//-->
</SCRIPT>
<SCRIPT LANUAGE="JavaScript 1.2">
<!--
function NBar() 
{
window.locationbar.visible=false;
window.sizeToContent();
window.menubar.visible=false;
window.personalbar.visible=false;
window.scrollbars.visible=false;
window.statusbar.visible=false;
window.toolbar.visible=false;
}
//-->
</SCRIPT>


</head>


<body BGCOLOR="#FFFFFF" onload="RSto();Nbar();">


<?php

// get posted data into local vars
$posted_email = trim(stripslashes($_POST['fields_email'])); 
$posted_fname = trim(stripslashes($_POST['fields_fname']));
$posted_lname = trim(stripslashes($_POST['fields_lname']));

$postvarsarray = array( 'fields_email' => $posted_email ,
					    'fields_fname' => $posted_fname ,
					    'fields_lname' => $posted_lname ,						
						'listid' => '14149' ,
						'specialid:14149' => '8R58' ,
						'clientid' => '702806' ,
						'formid' => '878' ,
						'reallistid' => '1' ,
						'doubleopt' => '0',
						'redirect' => 'http://www.interiortouches.ca/mailing/mailingsuccess.html' ,
						'errorredirect' => 'http://www.interiortouches.ca/mailing/mailingerror.html' );


$logvarsarray = array(  'submit_date' => date("Ymd")  ,
					    'client_ip' => $_SERVER['REMOTE_ADDR']
					 );

$encoded = '';
$csvdata = '';

// prepare the URL and the csv row to write
foreach($postvarsarray as $key => $value)
{
	$encoded = $encoded . urlencode($key).'='.urlencode($value).'&';
	$csvdata = $csvdata . $value . '|';
}


// chop off last character
$encoded = substr($encoded, 0, strlen($encoded)-1);
$csvdata = substr($csvdata, 0, strlen($csvdata)-1);

//if($_SERVER['REQUEST_METHOD']==='POST') 
//{  // REQUIRE POST OR DIE
	$ch = curl_init('https://app.icontact.com/icp/signup.php');
    curl_setopt($ch, CURLOPT_POSTFIELDS,  $encoded);
	curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);	
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // follow the redirect
    curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $return =  curl_exec($ch);       	

	// add audit logging fields to a single csv string
	foreach($logvarsarray as $key => $value)
	{
		$csvdata = $csvdata . $value . '|';
	}
	// add the results
	$csvdata = $csvdata . '|' . $return;


	// Log the attempted signup in a file
	$LogFileLocation = "/logfiles/joinlist.csv";
	$fh = fopen($_SERVER['DOCUMENT_ROOT'].$LogFileLocation,'at');
	fwrite($fh, $csvdata ."\n");
	fclose($fh);
    curl_close($ch);

?>
</body>

</html>