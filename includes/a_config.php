<?php

	$servername = "localhost";
	$database = "check";
	$username = "root";
	$password = "netproduct25";
	 
	$conn = mysqli_connect($servername, $username, $password, $database);
	 
	if (!$conn) {	 
	    die("Connection failed: " . mysqli_connect_error());	 
	}

	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/forming.php":
			$CURRENT_PAGE = "Forming"; 
			$PAGE_TITLE = "Forming Checks";
			break;
		case "/view.php":

			if (isset($_POST['action'])) {
			    $action = explode('_', $_POST['action']);
			    if ($action[0]==$_POST['table']) {

			    	$result = mysqli_query($conn, "UPDATE `chek_otpravki` SET ".$action[0]."='".$_POST['id']."' WHERE id=".$action[1]);
			    	if ($result) {
			    		echo 1;
			    	} else {
			    		echo 2;
			    	}
			    }
			    
			}

			$filename = mysqli_real_escape_string($conn, $_GET['file']);
			$chek_otpravki = [];
			$sql = "SELECT * FROM chek_otpravki WHERE filename='".$filename."' limit 1";
			$result = mysqli_query($conn, $sql) or die(mysql_error());
			
			
			if ($result->num_rows==1) {
				$chek_otpravki['status'] = 1;
				while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
					$chek_otpravki['data'][] = $row;
				}
			} else {
				$chek_otpravki['status'] = 2;
				$chek_otpravki['data'] = [];

				if (isset($_POST['action'])) {
				    $action = explode('_', $_POST['action']);
				    if ($action[0]=='checkotpravki') {

				    	$result = mysqli_query($conn, "INSERT INTO `chek_otpravki` (`nomer_cheka`, `data_otpravki`, `nomer_otslejivanie`, `status`, `filename`) values ('".$_POST['nomer_cheka']."','".$_POST['data_otpravki']."','".$_POST['nomer_otslejivanie']."','".$_POST['status']."','".$action[1]."')");
				    	if ($result) {
				    		echo 1;
				    	} else {
				    		echo 2;
				    	}
				    }
				    
				}
			}

			$sql = "SELECT * FROM podpischik";
			$result = mysqli_query($conn, $sql) or die(mysql_error());
			$podpischik = [];
			while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				$podpischik[] = $row;
			}

			$sql = "SELECT * FROM podpiska";
			$result = mysqli_query($conn, $sql) or die(mysql_error());
			$podpiska = [];
			while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				$podpiska[] = $row;
			}

			$sql = "SELECT * FROM jurnal";
			$result = mysqli_query($conn, $sql) or die(mysql_error());
			$jurnal = [];
			while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				$jurnal[] = $row;
			}
			$CURRENT_PAGE = "View"; 
			$PAGE_TITLE = "View";
			
			break;
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "Checks!";
	}
?>