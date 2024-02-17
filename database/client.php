<?php
// Retrieve form data
$fname = isset($_POST['fname']) ? $_POST['fname'] : '';
$lname = isset($_POST['lname']) ? $_POST['lname'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';

// Check if required fields are empty
if (empty($fname) || empty($lname) || empty($phone) || empty($email)) {
    header("Location: https://supremetowersuniversal.com/");
}

// Database connection
$servername = "154.41.233.154";
$username = "u805817091_supreme";
$password = "DRAI9763603@drai";
$dbname = "u805817091_supreme_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute SQL statement
$stmt = $conn->prepare("INSERT INTO enquiries (fname, lname, phone, email) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $fname, $lname, $phone, $email);

if ($stmt->execute()) {
    // Close statement and connection
    $stmt->close();
    $conn->close();

    // Redirect back to the form page
    header("Location: https://supremetowersuniversal.com/thankyou");
    exit();
} else {
    // Handle error if insertion fails
    echo "Error: " . $stmt->error;

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>