<!DOCTYPE html>
<html>
<head>
	<title>Complex Rent</title>
</head>
<body>
	<h1>List of Shops</h1>
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

	//Fetch shop details
	$sql = "SELECT id, shop_name ,rent_status FROM shops";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    //Output data of each row
	    while($row = mysqli_fetch_assoc($result)) {
	        echo "<p>Shop Name: " . $row["shop_name"] . "</p>";
	        echo "<p>Rent Status: " . $row["rent_status"] . "</p>";

	        //Assign id value for download links
	        $id = $row["id"];

	        //Create PDF download link
	        echo "<p><a href='download.php?id=" . $id . "&format=pdf'>Download Rent Status as PDF</a></p>";

	        //Create Excel download link
	        echo "<p><a href='download.php?id=" . $id . "&format=excel'>Download Rent Status as Excel</a></p>";
	    }
	} else {
	    echo "0 results";
	}

	mysqli_close($conn);
	?>
</body>
</html>
