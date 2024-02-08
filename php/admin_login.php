<?php
// Assuming you have a MySQL database
$servername = "localhost";
$username = "id21737268_appoitments";
$password = "Atharva56$";
$dbname = "id21737268_appoitments";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize session
session_start();

// Handle admin login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST["admin_username"];
    $input_password = $_POST["admin_password"];

    // Check admin credentials in the database
    $sql = "SELECT * FROM admin WHERE username = '$input_username' AND password = '$input_password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Admin login successful, set session variable and redirect to admin dashboard
        $_SESSION["admin_logged_in"] = true;
        header("Location: admin.php");
        exit();
    } else {
        echo "Invalid username or password";
    }
}

$conn->close();
?>
