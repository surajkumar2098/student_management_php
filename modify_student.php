<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $student = mysqli_fetch_assoc($result);
    } else {
        echo "No student found with id $id";
        exit;
    }
} else {
    echo "No id parameter provided in the URL";
    exit;
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Student</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div class="editStudent">
        <h2>Edit Student</h2>
        <form method="post" action="edit_student.php">
            <div class="field"><label for="name">Name</label><input type="text" name="name" id="name" value="<?php echo $student['name']; ?>"></div>
            <div class="field"><label for="email">Email</label><input type="text" name="email" id="email" value="<?php echo $student['email']; ?>"></div>
            <div class="field"><label for="subject">Subject</label><input type="text" name="subject" id="subject" value="<?php echo $student['subject']; ?>"></div>
            <div class="field"><label for="marks">Marks</label><input type="number" name="marks" id="marks" value="<?php echo $student['marks']; ?>"></div>
            <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
            <div class="button"><button type="submit">Update Student</button></div>
        </form>
    </div>
</body>

</html>