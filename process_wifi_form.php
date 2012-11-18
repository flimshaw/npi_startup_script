<?

	$interfaces_template = "/etc/network/interfaces.template";
	$interfaces_file = "/etc/network/interfaces";
	
	$my_network_name = "hrugle"; #$_POST['wifi_networkname'];
	$my_network_password = "oh god"; #$_POST['wifi_password'];
	
	
	if (is_writable($interfaces_file)) {
	
   		# make sure your file is writable
   		if (!$fp = fopen($interfaces_file, 'w')) {
			errorTown("Can't open the file ".$interfaces_file);
			exit;
		}
		
	   	#read in current interfaces file
	   	$interfaces_newtext = implode("\n", file($interfaces_template));
	
   		#replace the wifi and password
   		str_replace("my_network_name", $my_network_name, $interfaces_newtext);
   		str_replace("my_network_password", $my_network_password, $interfaces_newtext);

		if (fwrite($fp, $interfaces_newtext) === FALSE) {
			errorTown("Cannot write to the file ".$interfaces_newtext);
			exit;
		}
		fclose($fp);

		print "i'll shit myself if this works.";

   	} else {
		errorTown("The file ".$interfaces_file." isn't writable, doofus!");
		exit;
	}
	
	
#	print "Form submitted successfully: <br>Your wifi network is <b>".$_POST['wifi_networkname']."</b> and your passowrd is <b>".$_POST['wifi_password']."</b><br>";
	
	
	function errorTown($error_message) {
		print "Welcome to Error Town, bozo! " . $error_message;
	}
	
?>