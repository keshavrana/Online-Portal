<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<link rel="stylesheet" href="style.css">
<script>
function validate(){
    var name = document.getElementById("name");
    var password = document.getElementById("password");

    if(name.value.trim()=="")
    {
        alert("Please Enter Your Username");
        // name.style.border = "solid 3px red";
        // document.getElementById("user1").style.visibility="visible";
        name.focus();
        return false;
    }
    else if(password.value.trim()=="")
    {
        alert("Please Enter Your Password");
        // password.style.border = "solid 3px red";
        // document.getElementById("user2").style.visibility="visible";
        return false;
    }
    else if(password.value.trim().length<5)
    {
        alert("Password Too Short");
        return false;
    }else{
        return true;
    }
}
</script>
</head>
<body>
<?php

include 'dbcon.php';

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email_search = "select * from registration where email='$email' ";
    $query = mysqli_query($con,$email_search);

    $email_count =mysqli_num_rows($query);

    if($email_count){
        $email_pass = mysqli_fetch_assoc($query);

        $db_pass = $email_pass['password'];

        $_SESSION['username'] = $email_pass['username'];

        $pass_decode = password_verify($password,$db_pass);

        if($pass_decode){
            ?>
            <script>
                location.replace("home.php");
            </script>

            <?php
        }
        else
            echo "Password Wrong";
    }
        else{
            echo "Invalid Email";
        }
}

?>
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Login Here!</h4>
	<form action="" onsubmit="return validate();" method="POST">    
    <!-- email id -->

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input id="name" name="email" class="form-control" placeholder="Email Id" type="text" >
        <!-- <label id="user1" style="color:red; visibility:hidden;">Please Enter Username</label> -->
    </div> 

    <!-- password// -->

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input id="password" name="password" class="form-control" placeholder="Password" type="password">
        <!-- <label id="user2" style="color:red; visibility:hidden;">Please Enter Password</label> -->
    </div> 

    <div class="form-check mb-2 mr-sm-2">
    <input class="form-check-input" type="checkbox" id="inlineFormCheck">
    <label class="form-check-label" for="inlineFormCheck">
      Remember me
    </label>
  </div>

    <!-- Login here// -->    

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="submit"> Login Now </button>
    </div> 
    <!-- Signup here// --> 

    <p class="text-center">Not Have an account? <a href="index.php">SignUp Here</a> </p>                                                                 
</form>
</article>
</div>

</div> 

</body>