<?php

session_start();

if(!isset($_SESSION['username'])){
    echo "You Are Logout";
    header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td{
            width:500px;
            height:60px;
            background-color:skyblue;
            border: 1px solid black;
        }
    </style>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body><br>
<h1>This Page is design By <?php echo  $_SESSION['username']; ?></h1>

<br>
    <?php
$conn = mysqli_connect("localhost","root","","signup");
if ($conn-> connect_error){
    die("Connection failed:" . $conn-> connect_error);
}
$sql = "SELECT id, username, email, mobile from registration";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Mobile</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["username"]. "</td><td> " . $row["email"]. "</td><td> " . $row["mobile"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();

    ?>
    <br><br>

    <a href="logout.php" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-log-out text-center"></span> Log out
        </a>
        
</body>
</html>