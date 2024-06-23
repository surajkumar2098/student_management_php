<?php
include 'config.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "DELETE FROM students WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        header("location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    header("location: index.php");
    exit();
}

mysqli_close($conn);
