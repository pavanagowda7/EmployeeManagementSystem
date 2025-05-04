<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard - Employee Management System</title>
  <style>
    body {
      background-color: #87ceeb; /* Sky blue */
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    h1 {
      color: white;
      margin-bottom: 40px;
      text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.2);
    }

    .button-container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
    }

    .button-container button {
      padding: 15px 25px;
      font-size: 16px;
      background-color: white;
      color: #007acc;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-weight: bold;
      transition: background-color 0.3s, transform 0.2s;
      box-shadow: 2px 2px 6px rgba(0,0,0,0.2);
      min-width: 180px;
    }

    .button-container button:hover {
      background-color: #e0f0ff;
      transform: translateY(-2px);
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

  <h1>Employee Management Dashboard</h1>

  <div class="button-container">
    <button onclick="location.href='addemployee.php'">Add Employee</button>
    <button onclick="location.href='displayEmployeeDetails.php'">Display Employee</button>
    <button onclick="location.href='updateEmployeeDetails.php'">Update Employee</button>
    <button onclick="location.href='deleteEmployee.php'">Delete Employee</button>
  
    
  </div>

</body>
</html>
<?php
if(isset($_POST['submit']))
{
    
    header("Location: login.html"); 
}
?>
