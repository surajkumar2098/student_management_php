<!DOCTYPE html>
<html>

<head>
    <title>Student Management System</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <h1>Student Management System</h1>

    <!-- Add a new student -->
    <div class="addStudent">
        <h2>Add Student</h2>
        <form action="./add_student.php" method="post" name="studentForm" onsubmit="return validateForm()">
            <div class="field"><label for="name">Name</label> <input type="text" name="name" id="name"></div>
            <div class="field"><label for="email">Email</label> <input type="email" name="email" id="email"></div>
            <div class="field"><label for="subject">Subject</label> <input type="text" name="subject" id="subject"></div>
            <div class="field"><label for="marks">Marks</label> <input type="number" name="marks" id="marks"></div>
            <div class="button"><button type="submit">Add Student</button></div>
        </form>
    </div>

    <!-- Display all Students -->
    <div class="studentList">
        <h2>Student List</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Marks</th>
                <th>Action</th>
            </tr>
            <?php
            include 'student_detail.php';
            $students = getStudents();
            foreach ($students as $student) {
                echo "<tr>";
                echo "<td>" . $student['id'] . "</td>";
                echo "<td>" . $student['name'] . "</td>";
                echo "<td>" . $student['email'] . "</td>";
                echo "<td>" . $student['subject'] . "</td>";
                echo "<td>" . $student['marks'] . "</td>";
                echo "<td id='action'><a href='modify_student.php?id=" . $student['id'] . "'>Edit</a><a href='delete_student.php?id=" . $student['id'] . "'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
    <script>
        function validateForm() {
            var name = document.forms["studentForm"]["name"].value;
            var email = document.forms["studentForm"]["email"].value;
            var subject = document.forms["studentForm"]["subject"].value;
            var marks = document.forms["studentForm"]["marks"].value;

            if (name == "" || email == "" || subject == "" || marks == "") {
                alert("Please fill out all fields.");
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }
    </script>
</body>

</html>