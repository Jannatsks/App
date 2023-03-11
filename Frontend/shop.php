<!DOCTYPE html>
<html>
<head>
	<title>Shop Rent Status</title>
</head>
<body>
	<h1>Shop Rent Status</h1>
	<?php
	//Connect to MySQL database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "complex_rent_db";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	//Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	//Retrieve shop ID from URL parameter
	$id = $_GET["id"];

	//Fetch rent status of the shop
	$sql = "SELECT rent_status FROM shops WHERE id = " . $id;
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    //Output data of each row
	    while($row = mysqli_fetch_assoc($result)) {
	        echo "Rent Status: " . $row["rent_status"];
	    }
	} else {
	    echo "0 results";
	}

	mysqli_close($conn);
	?>
</body>
</html>
