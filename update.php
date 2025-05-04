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
if(isset($_POST['update'])){
    $id=$_POST['update'];
$name=$_POST['fullname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$doj=$_POST['doj'];
$address=$_POST['address'];
$designation=$_POST['designation'];
$salary=$_POST['salary'];
$sql="UPDATE EMPLOYEE SET Name='$name',Email='$email',Phone='$phone',Gender='$gender',DOB='$dob',DOJ='$doj',Address='$address',Designation='$designation',Salary='$salary' where EmployeeId='$id'";
if(mysqli_query($conn, $sql))
{
    echo"<script>alert('Update successfull'); window.location.href='updateEmployeeDetails.php';</script>";
}
else{
    echo"<script>alert('un successfull'); window.location.href='updateEmployeeDetails.php';</script>";
}
}   

?>