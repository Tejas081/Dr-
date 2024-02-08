<!-- book.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        // Assuming you have a MySQL database
        $servername = "localhost";
        $username = "id21737268_appoitments";
        $password = "Atharva56$";
        $dbname = "id21737268_appoitments";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $patient_name = $_POST["patient_name"];
            $appointment_date = $_POST["appointment_date"];
            $appointment_time = $_POST["appointment_time"];

            // Insert data into the database
            $sql_insert = "INSERT INTO appointments (patient_name, appointment_date, appointment_time) 
                           VALUES ('$patient_name', '$appointment_date', '$appointment_time')";

            try {
                // Start a transaction
                $conn->begin_transaction();

                // Attempt to insert the appointment
                if ($conn->query($sql_insert) === TRUE) {
                    // Get the last inserted ID
                    $last_inserted_id = $conn->insert_id;

                    // Commit the transaction if the insertion is successful
                    $conn->commit();

                    echo "<div class='message success appointment-booked'>Appointment booked successfully! Appointment ID: $last_inserted_id</div>";
                } else {
                    // Rollback the transaction if the insertion fails
                    $conn->rollback();

                    echo "<div class='message error'>Error: " . $sql_insert . "<br>" . $conn->error . "</div>";
                }
            } catch (mysqli_sql_exception $e) {
                // Rollback the transaction if there's an exception
                $conn->rollback();

                // Check if the error is due to a duplicate entry
                if ($e->getCode() == 1062) {
                    echo "<div class='message error'>This time slot is already booked. Please choose a different time.</div>";
                } else {
                    echo "<div class='message error'>Error: " . $sql_insert . "<br>" . $e->getMessage() . "</div>";
                }
            }
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
