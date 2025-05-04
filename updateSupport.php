<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get user ID from GET parameter
if(isset($_POST['Edit'])){
    $id=$_POST['Edit'];

// Build and execute the query
$sql = "SELECT * FROM employee WHERE employeeid = '$id'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "No employee found.";
    exit;
}
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Employee</title>
    <style>
    body {
      background-color: skyblue;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }

    .form-container {
      background-color: white;
      padding: 25px;
      border-radius: 10px;
      max-width: 600px;
      margin: 0 auto;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .form-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    input, select, textarea {
      width: 100%;
      padding: 8px;
      border-radius: 4px;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    button {
      width: 100%;
      padding: 10px;
      background-color: #007BFF;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    button:hover {
      background-color: #0056b3;
    }

    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #2c3e50;
      padding: 10px 20px;
      color: white;
    }

    .navbar-left,
    .navbar-right {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .navbar a,
    .navbar button {
      color: white;
      background: none;
      border: none;
      cursor: pointer;
      font-size: 16px;
      text-decoration: none;
      padding: 8px 12px;
      border-radius: 4px;
      transition: background-color 0.2s ease;
    }

    .navbar a:hover,
    .navbar button:hover {
      background-color: rgba(255, 255, 255, 0.2);
    }
  </style>
</head>
<body>
<nav class="navbar">
    <div class="navbar-left">
       <a href="updateEmployeeDetails.php">← Back</button>
    </div>
    <div class="navbar-right">
      <a href="dashboardd.php">Dashboard</a>
      <form method="POST" action="login.html" style="display:inline;">
        <button type="submit">Logout</button>
      </form>
    </div>
  </nav>
  <br><br>
<form method="post" action="update.php">
    <div class="form-container">
    <h2>Update Employee Details</h2>
    <form action="addemployee.php" method="post">
      <div class="form-group">
        <label for="fullname">Full Name</label>
        <input type="text" id="fullname" name="fullname" value="<?= htmlspecialchars($row['Name']) ?>" required>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($row['Email']) ?>" required>
      </div>

      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="tel" id="phone" name="phone" value="<?= htmlspecialchars($row['Phone']) ?>" required>
      </div>

      <div class="form-group">
        <label for="gender">Gender</label>
        <select id="gender" name="gender" required>
        <option value="Male" <?= $row['Gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
        <option value="Female" <?= $row['Gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
        <option value="Other" <?= $row['Gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
        </select>
      </div>

      <div class="form-group">
        <label for="dob">Date of Birth (DOB)</label>
        <input type="date" id="dob" name="dob" value="<?= htmlspecialchars($row['DOB']) ?>" required>
      </div>

      <div class="form-group">
        <label for="doj">Date of Joining (DOJ)</label>
        <input type="date" id="doj" name="doj" value="<?= htmlspecialchars($row['DOJ']) ?>" required>
      </div>

      <div class="form-group">
        <label for="address">Address</label>
        <input type="text"  id="address" name="address" rows="3" value="<?= htmlspecialchars($row['Address']) ?>" required/>
      </div>

      <div class="form-group">
        <label for="designation">Designation</label>
        <input type="text" id="designation" name="designation" value="<?= htmlspecialchars($row['Designation']) ?>" required>
      </div>

      <div class="form-group">
        <label for="salary">Salary</label>
        <input type="number" id="salary" name="salary" value="<?= htmlspecialchars($row['Salary']) ?>" required>
      </div>    

      <button type="submit" name="update" value="<?= htmlspecialchars($row['EmployeeID']) ?>">Update</button>
    </form>
  </div>
</form>
</body>
</html>
