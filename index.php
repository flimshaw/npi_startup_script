
<?php
	$wifi_networks = shell_exec('sudo iwlist wlan0 scan | grep ESSID');
	$wifi_arr = explode("ESSID", $wifi_networks);


?>
<html>
<head>
	<title> Hello. Welcome to NPI!</title>

	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<header>
		<h1>
			<span>Welcome to NPI.</span>
		</h1>
	</header>



	<div id="main">
<? 
echo $wifi_networks;
print_r($wifi_arr); ?>		

		<section>
			<p>
				We're going to connect you to the wide world of other<br/>No Pants Islands. But first, we need to get on the internet.
			</p>
			<p class="dominant">step 1: choose your wireless network</p>
			<div class="wifi_choice">
			<form>
				<select name="mydropdown">

<? foreach ($wifi_arr as $wifi_quotes) {
	$wifi = trim($wifi_quotes, ':');

        $wifi = trim($wifi_quotes, '"');
	$wifi = trim($wifi_quotes);
	if (strlen($wifi) > 0) {
		echo $wifi;
	}
}
?>
					<option value="Milk">Fresh Milk</option>
					<option value="Cheese">Old Cheese</option>
					<option value="Bread">Hot Bread</option>
				</select>	
	
				<input type="submit" value="Submit">
			</form>
		</section>
	</div>
</body>
</html>
