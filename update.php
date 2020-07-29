<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<link rel="stylesheet" href="style.css">

</head>
<body>

<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Update Account</h4>

	<form action="" method="POST">

    <?php

include 'dbcon.php';

$id = $_GET['id'];

$selectquery = "select * from registration where id = $id ";

$query = mysqli_query($con,$selectquery);

$result = mysqli_fetch_assoc($query);

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $pass = password_hash($password, PASSWORD_BCRYPT);

    $id = $_GET['id'];

    $updatequery = "update registration set username='$username', email='$email', mobile='$mobile', password='$pass' where id=$id ";

    $iquery = mysqli_query($con, $updatequery);

    if($iquery){
        header('location:home.php');
    }
       else{
       die('unable to insert data!!');
    }

}


?>

	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input id="user1" name="username" class="form-control" placeholder="Full name" type="text"value="<?php echo $result['username'];  ?>" required>
    </div> 
    <!-- email id -->

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input id="email1" name="email" class="form-control" placeholder="Email address" type="email" value="<?php echo $result['email'];  ?>" required>
    </div> 
    <!-- mobile no-->

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
    	<input id="mobile1" name="mobile" class="form-control" placeholder="Phone number" type="text" value="<?php echo $result['mobile'];  ?>" required>
    </div> 
    <!-- password// -->

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input id="pass1" name="password" class="form-control" placeholder="Create password" type="password" value="<?php echo $result['password'];  ?>" required>
    </div> 

    <!-- create account// -->    

    <div class="form-group">
    
        <button type="submit" class="btn btn-primary btn-block" name="submit"> Update  </button>
        <input class="btn btn-dark btn-block" type="reset" value="Reset">
    </div> 
    <!-- login area// --> 

    <!-- <p class="text-center">Have an account? <a href="login.php">Log In</a> </p>                                                                  -->
</form>
</article>
</div>

</div> 

</body>