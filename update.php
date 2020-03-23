<?php 
include "dbcon.php"; ?>
<?php 
if (isset($_GET['upd'])) {

  $id = $_GET['upd'];
  $query = " SELECT * FROM users WHERE id=$id";
  $fire = mysqli_query($con,$query) or die("can not fach the data.".mysqli_error($con));
 $user = mysqli_fetch_assoc($fire);
 
                                                                                       
} 
 ?>
                                                                                                                                                                                                          

<!--UPDATE DATA-->
<?php
if (isset($_POST['btnupdate'])) {
   $fullname= $_POST['fullname'];
   $email = $_POST['email'];
   $username = $_POST['username'];
   $password = $_POST['password'];

  $query= "UPDATE users SET fullname ='$fullname' ,email ='$email',username = '$username',password ='$password' WHERE id=$id";
  $fire = mysqli_query($con,$query) or die("con not update the data.".mysqli_error($con));
  if ($fire) header("location:index.php") ;
 }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>updatecrud</title>

 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
  	
  </script>
</head>
<body>
<div class="container">
	<div class="row">
  
		<!-- singup form-->
  <div class="col-lg-5 col-lg-offset-6">
  <h2>Update</h2>
  <form name="singup" action="<?php $_SERVER['PHP_SELF']  ?>" method="POST">

  	  <div class="form-group">
      <label for="fullname">Full Name:</label>
      <input value="<?php echo $user['fullname']?>" type="text" class="form-control" id="fullname" placeholder="Enter fullname" name="fullname">

    <div class="form-group">
      <label for="email">Email:</label>
      <input value="<?php echo $user['email']?>" type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>

    <div class="form-group">
      <label for="pwd">Username:</label>
      <input value="<?php echo $user['username']?>" type="text" class="form-control" id="username" placeholder="Enter new username" name="username">
    </div>

    <div class="form-group">
      <label for="password">Password:</label>
      <input  type="password" class="form-control" id="password" placeholder="Enter a new password" name="password">
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button name="btnupdate" type="submit" class="btn btn-primary">update</button>
  </form>
</div>
</form>
</div>
</div>



</body>
</html>