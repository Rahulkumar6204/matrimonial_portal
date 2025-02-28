<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $marital_status = $_POST['marital_status'];
    $location = $_POST['location'];
    $caste = $_POST['caste'];
    $religion = $_POST['religion'];
    $interests = $_POST['interests'];

    // Handle file upload
    $profile_picture = 'assets/default.png';
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === 0) {
        $target_dir = "assets/";
        $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
        move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file);
        $profile_picture = $target_file;
    }

    // Insert user into database
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, gender, age, marital_status, location, caste, religion, profile_picture, interests) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $email, $password, $gender, $age, $marital_status, $location, $caste, $religion, $profile_picture, $interests]);

    header("Location: ../login.html");
    exit();
}
?>