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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Document</title>

    <style>
    table{
        width:100%;
    }
    th{
        border: 3px solid ;
        background-color:black;
        color:yellow;
        text-align:center;
    }

    td{
        text-align:center;
        border:2px solid;
        background-color: skyblue;
        margin: 5px;
        padding: 20px;
    }
    fa-edit{
        color=red;
    }
    </style>
</head>
<body>

<div class="main-div">
<h1>Welcome Mr. <?php echo  $_SESSION['username']; ?></h1>
<div class="center-div">
<div class="table-redponsive">
<table>
<thead>
<th>Id</th>
<th>Name</th>
<th>Email</th>
<th>Mobile</th>
<th colspan="2">Operation</th>
</thead>
<tbody>
<?php

include 'dbcon.php';

$selectquery = "select * from registration ";

$query = mysqli_query($con,$selectquery);

while($result = mysqli_fetch_assoc($query)){

?>
<tr>
<td><?php echo $result['id'];  ?></td>
<td><?php echo $result['username'];  ?></td>
<td><?php echo $result['email'];  ?></td>
<td><?php echo $result['mobile'];  ?></td>
<td><a href="update.php?id=<?php echo $result['id'];  ?>"><i class="fa fa-edit fa-2x" style="color:green" aria-hidden="true"></i></a></td>
<td> <a href ='delet.php?ids=<?php echo $result['id'];  ?>' onclick="return confirm('Are you sure you want to delete??');"><i class="fa fa-trash fa-2x" style="color:red" aria-hidden="true"></i></td>

</tr>
<?php

}

?>
</tbody>
</table>
</div>
</div>
</div>
<br>

<a href="logout.php" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-log-out text-center"></span> Log out
        </a>
</body>
</html>
