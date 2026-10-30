<?php
include 'connect.php';
$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Student Registration</h2>

    <form action="save.php" method="POST">
        <input type="text" name="name"
        placeholder="Student Name" required>

        <input type="email" name="email"
        placeholder="Email Address" required>

        <input type="text" name="course"
        placeholder="Course Name" required>

        <button type="submit">Register</button>
    </form>

    <h2>Registered Students</h2>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
        </tr>

        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['course']) ?></td>
        </tr>
        <?php } ?>
    </table>
</div>

<script>
document.querySelector("form").addEventListener("submit", function(e) {
    let name = document.querySelector(
        'input[name="name"]'
    ).value.trim();

    if (name === "") {
        e.preventDefault();
        alert("Please enter student name");
    }
});
</script>

</body>
</html>