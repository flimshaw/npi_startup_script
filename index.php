
<?php
	$wifi_networks = shell_exec('sudo iwlist wlan0 scan | grep ESSID');
	$wifi_arr = explode("ESSID", $wifi_networks);
	$trimmed_wifi_arr = array();
	
	foreach ($wifi_arr as $wifi_quotes) {
		$wifi = trim($wifi_quotes, ':');
	    $wifi = trim($wifi, '"');
		$wifi = trim($wifi);
		$wifi = trim($wifi, '"');
    
		if (strlen($wifi) > 0) {
    		array_push($trimmed_wifi_arr, $wifi);
		}
	}
		
?>
<html>
<head>
	<title> Hello. Welcome to NPI!</title>
	<link rel="icon" href="favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<header>
		<h1>
			<span>Welcome to NPI.</span>
		</h1>
	</header>



	<div id="main">
		
		<section>
			<p>
				We're going to connect you to the wide world of other<br/>No Pants Islands. But first, we need to get on the internet.
			</p>
			<p class="dominant">step 1: choose your wireless network</p>
			<div class="wifi_choice">
			<form>
				<select name="wifi_networkname">
<?
				foreach ($trimmed_wifi_arr as $wifi) {
					echo '<option value="' . $wifi . '">' . $wifi . '</option>';
				}

?>
				</select>	
	
	
				<p class="dominant">step 2: enter your password</p>
				
				<input type="text" name="wifi_password">
				
				<input type="submit" value="Submit">
			</form>
		</section>
	</div>
</body>
</html>
