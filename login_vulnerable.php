<?php
include 'db.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$sql = "SELECT username, password FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);


if ($result && mysqli_num_rows($result) > 0) {
    echo "<script>alert('Login success (VULNERABLE)');
    window.location.href = 'dashboard.html';
    </script>";
} else {
    echo "<script>alert('Login failed');</script>";
}
?>
