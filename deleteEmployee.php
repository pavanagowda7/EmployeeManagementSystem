<?php

// 1. Database connection using mysqli_connect()
//include("header.php");
$host = "localhost";
$user = "root";         // your DB username
$password = "";         // your DB password
$database = "employee"; // your DB name

$conn = mysqli_connect($host, $user, $password, $database);

// 2. Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Query to fetch records
$query = "SELECT EmployeeID, Name, Email, Phone, Gender, DOB, DOJ, Address, Designation, Salary FROM employee";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Records</title>
    <style>
        body {
            background-color: #87CEEB; /* Sky blue */
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px #888;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }
        th {
            background-color: #4682B4;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
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
    <a href="dashboardd.php">← Back</a>
    </div>
    <div class="navbar-right">
      <a href="dashboardd.php">Dashboard</a>
      <form method="POST" action="login.html" style="display:inline;">
        <button type="submit">Logout</button>
      </form>
    </div>
  </nav>

    <h2>Employee Records</h2>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>DOB</th>
                <th>DOJ</th>
                <th>Address</th>
                <th>Designation</th>
                <th>Salary</th>
                <th>Action</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= htmlspecialchars($row['EmployeeID']) ?></td>
                    <td><?= htmlspecialchars($row['Name']) ?></td>
                    <td><?= htmlspecialchars($row['Email']) ?></td>
                    <td><?= htmlspecialchars($row['Phone']) ?></td>
                    <td><?= htmlspecialchars($row['Gender']) ?></td>
                    <td><?= htmlspecialchars($row['DOB']) ?></td>
                    <td><?= htmlspecialchars($row['DOJ']) ?></td>
                    <td><?= htmlspecialchars($row['Address']) ?></td>
                    <td><?= htmlspecialchars($row['Designation']) ?></td>
                    <td><?= htmlspecialchars($row['Salary']) ?></td>
                    <td><form action="deleteSupport.php" method="post">
    <button  type ="submit" name="delete" style ="color:orange;" value="<?= $row['EmployeeID']?>">Delete</button>
</form></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p style="text-align:center;">No records found.</p>
    <?php endif; ?>

    <?php mysqli_close($conn); ?>
</body>
</html>
