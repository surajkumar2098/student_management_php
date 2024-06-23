<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $marks = mysqli_real_escape_string($conn, $_POST['marks']);
    $sql = "INSERT INTO students (name, email, subject, marks) VALUES ('$name',     '$email', '$subject', '$marks')";
    if (mysqli_query($conn, $sql)) {
        header("location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);
