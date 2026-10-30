<?php
include 'connect.php';

$name = $_POST['name'];
$email = $_POST['email'];
$course = $_POST['course'];

$stmt = $conn->prepare(
    "INSERT INTO students (name, email, course)
     VALUES (?, ?, ?)"
);

$stmt->bind_param("sss", $name, $email, $course);
$stmt->execute();

header("Location: index.php");
exit;
?>