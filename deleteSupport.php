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
if($_POST['delete'])
{
    $idd=$_POST['delete'];
    $q="DELETE FROM EMPLOYEE WHERE EMPLOYEEID='$idd'";
    if(mysqli_query($conn,$q))
    {
        echo"<script>alert('Record deleted successfully'); window.location.href='displayEmployeeDetails.php';</script>";
    }
}
?>