<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.html");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $location = $_POST['location'];
    $interests = $_POST['interests'];

    $stmt = $conn->prepare("UPDATE users SET name = ?, age = ?, location = ?, interests = ? WHERE id = ?");
    $stmt->execute([$name, $age, $location, $interests, $_SESSION['user_id']]);

    echo "Profile updated successfully!";
}
?>