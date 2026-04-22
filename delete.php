<?php
require 'db.php';

// Check if ID exists in URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare DELETE query
    $stmt = $pdo->prepare("DELETE FROM students WHERE id = ?");

    if ($stmt->execute([$id])) {
        // Redirect after delete
        header("Location: index.php");
        exit();
    } else {
        echo "Failed to delete record.";
    }
} else {
    echo "No ID provided.";
}
?>