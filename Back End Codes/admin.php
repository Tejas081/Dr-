<?php
// Database connection parameters
$servername = "localhost";
$username = "id21950216_root";
$password = "Tejas96k$";
$dbname = "id21950216_docter";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $username = $_POST['admin_username'];
    $password = $_POST['admin_password'];

    // Prepare a SQL statement
    $query = "SELECT * FROM admin WHERE username=? AND password=?";
    $stmt = mysqli_prepare($connection, $query);

    // Bind parameters and execute query
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);

    // Get result
    $result = mysqli_stmt_get_result($stmt);

    // Check if a row is returned
    if (mysqli_num_rows($result) == 1) {
        // Redirect to data.php if credentials are correct
        header("Location: calender.php");
        exit(); // Ensure script stops execution after redirection
    } else {
        // Credentials are incorrect, display an error message or redirect to login page
        echo "Invalid username or password";
    }
}

// Close connection
mysqli_close($connection);
?>
