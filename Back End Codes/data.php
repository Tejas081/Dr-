<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
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
            margin-top: 20px;
            margin: 0 auto; /* Center the table horizontally */
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
        
        #container{
            margin-bottom: 20px; /* Add margin to separate it from the table */
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            padding: 20px; /* Add padding for some spacing around the content */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Drop shadow for a subtle effect */
        }
    </style>
</head>
<body>
    <div id='container'>
        <h1>Appointments</h1>
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

        // SQL query to retrieve appointments data
        $sql = "SELECT * FROM appointments";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>Patient Name</th>";
            echo "<th>Age</th>";
            echo "<th>Address</th>";
            echo "<th>Gender</th>";
            echo "<th>Appointment Date</th>";
            echo "<th>Appointment Time</th>";
            echo "<th>Email</th>";
            echo "<th>Contact Number</th>";
            echo "<th>Symptoms</th>";
            echo "<th>Action</th>"; // New column for delete button
            echo "</tr>";

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["patient_name"] . "</td>";
                echo "<td>" . $row["age"] . "</td>";
                echo "<td>" . $row["address"] . "</td>";
                echo "<td>" . $row["gender"] . "</td>";
                echo "<td>" . $row["appointment_date"] . "</td>";
                echo "<td>" . $row["appointment_time"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["contact_number"] . "</td>";
                echo "<td>" . $row["symptoms"] . "</td>";
                echo '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No Appointments</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
