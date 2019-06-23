<?php

require 'vendor/autoload.php';
$result = new WhichBrowser\Parser(getallheaders());

?><!DOCTYPE HTML>
<html >
<head>
   <title>Browser Verification</title>
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Cache-Control" content="no-store" />
    <link rel="stylesheet" type="text/css" href="../css/main.css" />
    <link rel="stylesheet" type="text/css" href="../css/draganddrop.css" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Istok+Web:400,700,400italic,700italic" rel='stylesheet' type='text/css'>
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
</head>

 <body >
    <div style="width:100%;height:100%;">
        <div class="header-ctn">


            <div class="header-col2">
<!--
				<button id="exit-button" onclick="window.close()">Exit</button>
-->
            </div>
        </div>

        <div  style="margin: 0 15px; display: i">
		<br /><br /><br />
        	<h2>
			
			<div id='container'>

<?php
$_using = "You are using " . $result->toString();
$_unknown = '<br><br><small>We were unable to determine if you system does not meet the minimum requirements to run this course. Please check the Course System Requirements, which are available under Learner Support on the course homepage.</small>';
$_valid = "<br><br><small>Your system meets the requirements to run this course. You may proceed with taking the course.</small>";
$_ffold = '<br><br><small>Your Internet browser does not meet the minimum requirements to run this course. Please update to the latest version of <a href="https://www.mozilla.org/en-US/firefox/new/">Firefox</a> or switch to a different Internet browser that meets the Course System Requirements, which are available under Learner Support on the course homepage.</small>';
$_ieold = '<br><br><small>Your Internet browser does not meet the minimum requirements to run this course. Please update to the latest version of <a href="http://www.microsoft.com/en-ca/download/internet-explorer.aspx">Internet Explorer</a> or switch to a different Internet browser that meets the Course System Requirements, which are available under Learner Support on the course homepage.</small>';
$_safariold = '<br><br><small>Your Internet browser does not meet the minimum requirements to run this course. Please update to the latest version of <a href="http://support.apple.com/en-us/HT6104">Safari</a> or switch to a different Internet browser that meets the Course System Requirements, which are available under Learner Suppport on the course homepage.</small>';
$_iosold = '<br><br><small>Your system does not meet the requirements to run this course. Please update your version of iOS through the <a href="http://support.apple.com/en-us/ht4623">iOS Software Update</a> tool to meet the Course System Requirements, which are available under Learner Support on the course homepage.</small>';
$_desktopinvalid = '<br><br><small>Your Internet browser does not meet the minimum requirements to run this course. Please install the version of Chrome or Firefox to meet the Course System Requirements, which are available under Learner Support on the course homepage.</small>';
$_iosUseSafari = '<br><br><small>Your system meets the course requirements but does not support any course features. You should use Safari to access the course. See the Course System Requirements under Learner Support on the course homepage for more information.</small>';
$_androidUseChrome = '<br><br><small>Your system does not meet the requirements to run this course. Please install Chrome from the Google Play store to access the course. See the Course System Requirements under Learner Support on the homepage for more information.</small>';
$_androidold = '<br><br><small>Your system does not meet the requirements to run this course. Please update your version of Android through the System Update tool to meet the Course System Requirements, which are available under Learner Support on the course homepage.</small>';


if ($result->isType("desktop")) {
	if ($result->isBrowser("Chrome")) {
		echo $_using . $_valid;
	}
	else if ($result->isBrowser("Edge")) {
		echo $_using . $_valid;
	}
	else if ($result->isBrowser("Firefox")) {
		if ($result->isBrowser("Firefox", ">=", "4")) {
			echo $_using . $_valid;
		}
		else {
			echo $_using . $_ffold;
		}
	}
	else if ($result->isBrowser("Safari")) {
		if ($result->isBrowser("Safari", ">=", "4")) {
			echo $_using . $_valid;
		}
		else {
			echo $_using . $_safariold;
		}
	}
	else if ($result->isBrowser("Internet Explorer")) {
		echo $_using . $_ieold;
	}
	else {
		echo $_using . $_desktopinvalid;
	}
}
else if ($result->isOs('iOS')) {
	if ($result->isOs('iOS', '>=', '7')) {
		if ($result->isBrowser("Safari")) {
			echo $_using . $_valid;
		}
		else {
			echo $_using . $_iosUseSafari;
		}
	}
	else {
		echo $_using . $_iosold;
	}
}
else if ($result->isOs('Android')) {
	if ($result->isOs('Android', '>=', '4')) {
		if ($result->isBrowser("Chrome")) {
			echo $_using . $_valid;
		}
		else {
			echo $_using . $_androidUseChrome;
		}
	}
	else {
		echo $_using . $_androidold;
	}
}
else {
	echo $_using . $_unknown;
}
?>
</div>
		
		</h2>
        </div>

</body>
</html>
  
  
  


