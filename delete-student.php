<?php require_once './database/connection.php'; ?>

<?php
$_POST = json_decode(file_get_contents('php://input'), true);

if (isset($_POST['submit'])) {
    $id = htmlspecialchars($_POST['id']);

    $sql = "DELETE FROM `students` WHERE `id` = $id";
    $result = $conn->query($sql);
    if ($result) {
        echo json_encode(['success' => 'Magic has been spelled!']);
    } else {
        echo json_encode(['failure' => 'Magic has become shopper!']);
    }
}
