<!DOCTYPE html>
<html>
<head>
	<title>Display Data</title>
</head>
<body>
	<?php
	$servername = "localhost";
	$username = "your_username";
	$password = "your_password";
	$dbname = "mydatabase";

	// Create a new MySQL connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check for errors
	if ($conn->connect_error) {
	   die("Connection failed: " . $conn->connect_error);
	}

	// Query the database to retrieve all the form data
	$sql = "SELECT * FROM form_data";
	$result = $conn->query($sql);

	// Generate HTML to display the form data in a table
	if ($result->num_rows > 0) {
	   echo "<table>";
	   echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Age</th><th>Phone</th><th>Address</th></tr>";
	   while($row = $result->fetch_assoc()) {
	       echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]."</td><td>".$row["lastname"]."</td><td>".$row["age"]."</td><td>".$row["phone"]."</td><td>".$row["address"]."</td></tr>";
	   }
	   echo "</table>";
	} else {
	   echo "No form data found.";
	}

	// Close the database connection
	$conn->close();
	?>
</body>
</html>
