<?php require_once './database/connection.php'; ?>

<?php
$_POST = json_decode(file_get_contents('php://input'), true);

if (isset($_POST['submit'])) {
    $id = htmlspecialchars($_POST['id']);

    $sql = "SELECT * FROM `students` WHERE `id` = $id";
    $result = $conn->query($sql);
    $student = $result->fetch_assoc();
    echo json_encode($student);
}
