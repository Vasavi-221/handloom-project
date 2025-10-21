<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            echo "<script>alert('Login Successful!'); window.location.href='../home.html';</script>";
        } else {
            echo "<script>alert('Invalid Password'); window.location.href='../login.html';</script>";
        }
    } else {
        echo "<script>alert('User not found'); window.location.href='../login.html';</script>";
    }
}
$conn->close();
?>
