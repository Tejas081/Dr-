<!DOCTYPE html>
<html>
<head>
    <title>Selected Date Information</title>
</head>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-image: url(bg.jpg);
        background-color: white;
        background-size: cover; /* Ensures the background image covers the entire container */
        background-position: center; /* Centers the background image */
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    h1 {
        color:black;
        text-align: center;
        margin-bottom: 20px;
    }

    table {
        width: 80%;
        margin: 20px auto; /* Center the table horizontally */
        border-collapse: collapse;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #4caf50;
        color: #fff;
    }

    td a {
        text-decoration: none;
        color: #e74c3c;
        cursor: pointer;
    }

    td a:hover {
        text-decoration: underline;
    }

    #container {
        margin-bottom: 20px; /* Add margin to separate it from the table */
        background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
        padding: 20px; /* Add padding for some spacing around the content */
        border-radius: 8px; /* Rounded corners */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Drop shadow for a subtle effect */
        text-align: center; /* Center align the content within the container */
    }
</style>
<body>

<div id='container'>
    <?php
    if(isset($_POST['selectedDate'])) {
        $selectedDate = $_POST['selectedDate'];

        // Database connection parameters
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

        // Fetch appointment details from the database for the selected date
        $sql = "SELECT * FROM appointments WHERE appointment_date = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $selectedDate);
        $stmt->execute();
        $result = $stmt->get_result();

        echo "<h2>Appointments for $selectedDate:</h2>";
        if ($result->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>Patient Name</th><th>Age</th><th>Address</th><th>Gender</th><th>Appointment Time</th><th>Email</th><th>Contact Number</th><th>Symptoms</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['patient_name'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['appointment_time'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['contact_number'] . "</td>";
                echo "<td>" . $row['symptoms'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No appointments found for $selectedDate";
        }

        // Close connection
        $stmt->close();
        $conn->close();
    }
    ?>
</div>

</body>
</html>
