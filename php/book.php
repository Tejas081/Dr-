<?php
// Database connection
$dbHost = 'https://docterappoitment.000webhostapp.com/';
$dbUsername = 'id21950216_root';
$dbPassword = 'Tejas96k$';
$dbName = 'id21950216_docter';

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_name = $_POST['patient_name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $appointment_date = $_POST['appointment_date'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $symptoms = $_POST['symptoms'];

    // Insert data into database
    $sql = "INSERT INTO appointments (patient_name, age, address, gender, appointment_date, email, contact_number, symptoms) VALUES ('$patient_name', '$age', '$address', '$gender', '$appointment_date', '$email', '$contact_number', '$symptoms')";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment booked successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
