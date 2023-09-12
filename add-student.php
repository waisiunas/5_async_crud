<?php require_once './database/connection.php'; ?>

<?php
$_POST = json_decode(file_get_contents('php://input'), true);

if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    if (empty($name)) {
        echo json_encode(['errorName' => 'Enter the name from PHP!']);
    } elseif (empty($email)) {
        echo json_encode(['errorEmail' => 'Enter the email from PHP!']);
    } else {
        $sql = "SELECT * FROM `students` WHERE `email` = '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows === 0) {
            $sql = "INSERT INTO `students`(`name`, `email`) VALUES ('$name', '$email')";
            $result = $conn->query($sql);
            if($result) {
                echo json_encode(['success' => 'Magic has been spelled!']);
            } else {
                echo json_encode(['failure' => 'Magic has become shopper!']);
            }
        } else {
            echo json_encode(['errorEmail' => 'Email already exists!']);
        }
    }
}
