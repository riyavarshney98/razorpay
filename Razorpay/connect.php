<?php
	$partyName = $_POST['partyName'];
	$amount = $_POST['amount'];
	$status = $_POST['status'];
	$utr = $_POST['utr'];
	$accountnumber = $_POST['accountnumber'];
	$IFSC = $_POST['IFSC'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(partyName, amount, status, utr, accountnumber, IFSC) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $partyName, $amount, $status, $utr, $accountnumber, $IFSC);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>