<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // If email exists
        echo "
        <!DOCTYPE html>
        <html>
        <head>
          <meta charset='UTF-8'>
          <title>Password Reset - Handloom Weavers</title>
          <link rel='stylesheet' href='../assets/css/style.css'>
        </head>
        <body>
          <div class='form-container'>
            <h2>Password Reset</h2>
            <p>A password reset link has been sent to your registered email address.</p>
            <a href='../login.html' class='btn-link'>Back to Login</a>
          </div>
        </body>
        </html>";
    } else {
        // If email not found
        echo "
        <!DOCTYPE html>
        <html>
        <head>
          <meta charset='UTF-8'>
          <title>Email Not Found - Handloom Weavers</title>
          <link rel='stylesheet' href='../assets/css/style.css'>
        </head>
        <body>
          <div class='form-container'>
            <h2>Email Not Found</h2>
            <p>The entered email is not registered. Please try again or create a new account.</p>
            <a href='../forgot_password.html' class='btn-link'>Try Again</a>
          </div>
        </body>
        </html>";
    }
}
?>
