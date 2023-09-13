<?php require_once './database/connection.php'; ?>

<?php
$sql = "SELECT * FROM `students`";
$result = $conn->query($sql);
$students = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($students);
