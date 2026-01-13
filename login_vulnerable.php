<?php
include 'db.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Prepare SQL statement to prevent SQL Injection by separating query logic from user input
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");

// Bind user input as parameters (strings) instead of injecting them directly into the query
$stmt->bind_param("ss", $username, $password);

// Execute the prepared statement safely
$stmt->execute();

// Retrieve the result set from the executed statement
$result = $stmt->get_result();

if ($result && mysqli_num_rows($result) > 0) {
    echo "<script>alert('Login success (VULNERABLE)');
    window.location.href = 'dashboard.html';
    </script>";
} else {
    echo "<script>alert('Login failed');</script>";
}
?>
