<?

	$interfaces_template = "/etc/network/interfaces.template";
	$interfaces_file = "/etc/network/interfaces";
	
	$my_network_name = $_POST['wifi_networkname'];
	$my_network_password = $_POST['wifi_password'];
	#fancy biz.
	exec("sudo chmod 777 /etc/network/interfaces");
	if (is_writable($interfaces_file)) {
	
   		# make sure your file is writable
   		if (!$fp = fopen($interfaces_file, 'w')) {
			errorTown("Can't open the file ".$interfaces_file);
			exit;
		}
		
	   	#read in current interfaces file
	   	$interfaces_newtext = implode("\n", file($interfaces_template));
	
   		#replace the wifi and password
   		$interfaces_newtext = str_replace("my_network_name", $my_network_name, $interfaces_newtext);
   		$interfaces_newtext = str_replace("my_network_password", $my_network_password, $interfaces_newtext);

		if (fwrite($fp, $interfaces_newtext) === FALSE) {
			errorTown("Cannot write to the file ".$interfaces_newtext);
			exit;
		}
		fclose($fp);
		print $interfaces_newtext;
		print "i'll shit myself if this works.";

		exec("sudo chmod 644 /etc/network/interfaces");
   	} else {
		errorTown("The file ".$interfaces_file." isn't writable, doofus!");
		exit;
	}
	
	
#	print "Form submitted successfully: <br>Your wifi network is <b>".$_POST['wifi_networkname']."</b> and your passowrd is <b>".$_POST['wifi_password']."</b><br>";
	
	
	function errorTown($error_message) {
		print "Welcome to Error Town, bozo! " . $error_message;
	}
	
?>