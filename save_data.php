<?php
// Database configuration
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST["name"];
$age = $_POST["age"];
$weight = $_POST["weight"];
$email = $_POST["email"];

// Get the file details
$reportName = $_FILES["report"]["name"];
$reportTmpName = $_FILES["report"]["tmp_name"];

// Move the uploaded file to a desired location
$uploadDirectory = "uploads/"; // Specify the directory to store uploaded files
$uploadedReportPath = $uploadDirectory . $reportName;
move_uploaded_file($reportTmpName, $uploadedReportPath);

// Insert data into the database
$sql = "INSERT INTO user_details (name, age, weight, email, report_path) VALUES ('$name', $age, $weight, '$email', '$uploadedReportPath')";
if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
