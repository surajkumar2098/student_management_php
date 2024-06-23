<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $marks = $_POST['marks'];
    $sql = "UPDATE students SET name = '$name', email = '$email', subject = '$subject', marks = $marks WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error updating student: " . mysqli_error($conn);
    }
} else {
    echo "No form data received";
}

mysqli_close($conn);
