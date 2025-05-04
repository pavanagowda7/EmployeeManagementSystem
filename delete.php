<html>
    <head>
</head>
<body>
    <form action= "delete.php" method= "post">
        <input type= "text" name= "id" >Enter id</input>
        <input type= "submit" name= "submit">
</form>
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
    $id= $_POST['id'];
    $query="SELECT * FROM employee where EmployeeID='$id'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    {

$sql="DELETE FROM employee where Employeeid='$id'";
if(mysqli_query($conn,$sql))
{
    echo"<script>alert('deleted successfully');</script>";
}
    }
    else{
        echo"<script>alert('Record not found');</script>";
    }
}
?>