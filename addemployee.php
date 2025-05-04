<?php 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Employee Details Form</title>
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
    <a href="dashboardd.php">← Back</a>
    </div>
    <div class="navbar-right">
      <a href="dashboardd.php">Dashboard</a>
      <form method="POST" action="login.html" style="display:inline;">
        <button type="submit">Logout</button>
      </form>
    </div>
  </nav>

  <div class="form-container">
    <h2>Employee Details</h2>
    <form action="addemployee.php" method="post">
      <div class="form-group">
        <label for="fullname">Full Name</label>
        <input type="text" id="fullname" name="fullname" required>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="tel" id="phone" name="phone" required>
      </div>

      <div class="form-group">
        <label for="gender">Gender</label>
        <select id="gender" name="gender" required>
          <option value="">Select</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Others">Others</option>
        </select>
      </div>

      <div class="form-group">
        <label for="dob">Date of Birth (DOB)</label>
        <input type="date" id="dob" name="dob" required>
      </div>

      <div class="form-group">
        <label for="doj">Date of Joining (DOJ)</label>
        <input type="date" id="doj" name="doj" required>
      </div>

      <div class="form-group">
        <label for="address">Address</label>
        <textarea id="address" name="address" rows="3" required></textarea>
      </div>

      <div class="form-group">
        <label for="designation">Designation</label>
        <input type="text" id="designation" name="designation" required>
      </div>

      <div class="form-group">
        <label for="salary">Salary</label>
        <input type="number" id="salary" name="salary" required>
      </div>

      <input type="submit" name="submit" value="submit">
    </form>
  </div>

</body>
</html>
<?php 

$host = "localhost";
$user = "root";         // your DB username
$password = "";         // your DB password
$database = "employee"; // your DB name

$conn = mysqli_connect($host, $user, $password, $database);

// 2. Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['submit'])){
$name=$_POST['fullname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$doj=$_POST['doj'];
$address=$_POST['address'];
$designation=$_POST['designation'];
$salary=$_POST['salary'];

$sql="INSERT INTO EMPLOYEE(Name,Email,Phone,Gender,DOB,DOJ,Address,Designation,Salary)VALUES('$name','$email','$phone','$gender','$dob','$doj','$address','$designation','$salary')";
if(mysqli_query($conn, $sql))
{
    echo"<script>alert('Employee created successfully');</script>";
}
else{
    echo"<script>alert('un successfull');</script>";
}
}   


?>