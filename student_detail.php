<?php
include 'config.php';

function getStudents()
{
    global $conn;
    $students = array();
    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $students[] = $row;
        }
    }

    mysqli_close($conn);
    return $students;
}
