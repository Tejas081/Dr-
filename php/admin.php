<!-- admin.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        $servername = "localhost";
        $username = "id21737268_appoitments";
        $password = "Atharva56$";
        $dbname = "id21737268_appoitments";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve appointments from the database
        $sql = "SELECT * FROM appointments";
        $result = $conn->query($sql);

        echo "<h2>Appointments</h2>";

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>Patient Name</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                    </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["patient_name"] . "</td>
                        <td>" . $row["appointment_date"] . "</td>
                        <td>" . $row["appointment_time"] . "</td>
                    </tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No appointments booked.</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
