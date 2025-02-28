<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $age = $_POST['age'];
    $location = $_POST['location'];
    $marital_status = $_POST['marital_status'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE age = ? AND location = ? AND marital_status = ?");
    $stmt->execute([$age, $location, $marital_status]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($results);
}
?>