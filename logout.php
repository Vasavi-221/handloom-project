<?php
session_start();
session_unset(); // Remove all session variables
session_destroy(); // Destroy the session completely
header("Location: index.html"); // Redirect to homepage
exit();
?>
