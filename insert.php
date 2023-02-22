<?php
// Connect to MySQL
$servername = "34.142.209.209";
$username = "root";
$password = "1234";
$dbname = "test";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$age = $_POST["age"];
$phone = $_POST["phone"];
$address = $_POST["address"];

// Insert data into MySQL
$sql = "INSERT INTO users (firstname, lastname, age, phone, address)
VALUES ('$firstname', '$lastname', $age, '$phone', '$address')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
