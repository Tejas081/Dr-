<?php
$conn = new mysqli("localhost", "id21950216_root", "Tejas96k$", "id21950216_docter");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate and sanitize the ID parameter
$id_to_delete = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id_to_delete <= 0) {
    die("Invalid ID parameter");
}

// Use a prepared statement to prevent SQL injection
$sql = "DELETE FROM appointments WHERE id = ?";

$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("i", $id_to_delete);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: data.php");
        exit();
    } else {
        echo "No records deleted. Record with ID $id_to_delete not found.";
    }

    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}

$conn->close();
?>