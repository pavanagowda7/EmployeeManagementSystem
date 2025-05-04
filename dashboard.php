<?php
session_start();

// 1. Database connection using mysqli_connect()
$host = "localhost";
$user = "root";         // your DB username
$password = "";         // your DB password
$database = "employee_db"; // your DB name

$conn = mysqli_connect($host, $user, $password, $database);

// 2. Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 3. Get form inputs
$username = $_POST['username'];
$password = $_POST['password'];

// 4. Prepare statement to prevent SQL injection
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);

// 5. Get result
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) === 1) {
    $user = mysqli_fetch_assoc($result);

    // 6. Verify password
    if ($password==$user['password']) {
        $_SESSION['username'] = $user['username'];
        echo "Login successful! Welcome, " . htmlspecialchars($user['username']) . ".";
        // Redirect to dashboard
        // header("Location: dashboard.php");
        // exit();
    } else {
        echo "Invalid password.";
    }
} else {
    echo "User not found.";
}

// 7. Close connection
mysqli_close($conn);
?>
