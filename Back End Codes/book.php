<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
<div class="container">
<?php
// Database connection
$servername = "localhost";
$username = "id21950216_root";
$password = "Tejas96k$";
$dbname = "id21950216_docter";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare data for insertion
$patient_name = $_POST['patient_name'];
$age = $_POST['age'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$appointment_date = $_POST['appointment_date'];
$appointment_time = $_POST['appointment_time'];
$email = $_POST['email'];
$contact_number = $_POST['contact_number'];
$symptoms = $_POST['symptoms'];

// SQL query to insert data into database
$sql = "INSERT INTO appointments (patient_name, age, address, gender, appointment_date, appointment_time, email, contact_number, symptoms)
VALUES ('$patient_name', '$age', '$address', '$gender', '$appointment_date', '$appointment_time', '$email', '$contact_number', '$symptoms')";

try {
    if ($conn->query($sql) === TRUE) {
        echo '<div class="message success">Appointment Booked Successfully!!</div>';
    } else {
        echo '<div class="message error">Error: ' . $sql . '<br>' . $conn->error . '</div>';
    }
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1062) { // MySQL error code for duplicate entry
        echo '<div class="message error">Appointment date and time are already booked. Please choose a different date and time.</div>';
    } else {
        echo '<div class="message error">Error: ' . $e->getMessage() . '</div>';
    }
}

$conn->close();
?>
</div>
</body>
</html>
