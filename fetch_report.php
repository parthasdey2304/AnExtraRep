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

// Get the email ID from the query parameter
$email = $_GET["email"];

// Fetch the report path based on the email ID
$sql = "SELECT report_path FROM user_details WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $reportPath = $row["report_path"];

    // Send the PDF file to the browser
    header("Content-type: application/pdf");
    readfile($reportPath);
} else {
    echo "Report not found!";
}

// Close the database connection
$conn->close();
?>
