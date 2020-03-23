<?php 
include "dbcon.php";  
 ?>
 <?php 
  
  if ((isset($_POST['submit']))){ 

  	 $fullname = $_POST['fullname'];
  	 $email =    $_POST['email'];
  	 $username = $_POST['username'];
   	 $password = md5($_POST['password']);
    
  

    
  //  echo $fullname." ".$email." ".$username." ".$password ;   // 
  $query = "INSERT INTO users(fullname,email,username,password) VALUES( '$fullname','$email','$username','$password')";
 $fire = mysqli_query($con,$query) or die("can not insart data into database.".mysqli_error($con));
 if ($fire) echo "data submited to database";

   }
  ?>


<!--- Delete   query-->
<?php
if (isset($_GET['del'])) {
//echo "it is set";
$id = $_GET['del'];
$query = "DELETE FROM users WHERE id = $id";
$fire = mysqli_query($con,$query) or die("can not delete from database.".mysqli_error($con));
//if($fire) echo "data deleted from database";
}

?>

                                                                                                                                                                                                      
<!DOCTYPE html>
<html>
<head>
	<title>crud oprations</title>

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
    
      <!-- Show tha data here-->
		<div class="col-lg-8">
			<h3>User ka data</h3>
			<hr>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Username</th>
            <th>Fullname</th>
            <th>Email</th>
          </tr>
        </thead>
       
  <?php
    $query = "SELECT * FROM users";

  $fire = mysqli_query($con,$query) or die("can not fach data from database".mysqli_error($con));

    //if($fire) echo "we go data from  the database";
      //echo  mysqli_num_rows($fire);
   if(mysqli_num_rows($fire)>0) {
       // $users = mysqli_fetch_assoc($fire);
        //echo $users['fullname'];
     while ($user = mysqli_fetch_assoc($fire)) {  ?>     

         <!-- Dellete  --->
      <tr>
        <td><?php echo $user['username'] ?></td>
        <td><?php echo $user['fullname'] ?></td>
        <td><?php echo $user['email']    ?></td>
          <td>
         <a href=" <?php $_SERVER['PHP_SELF']   ?>?del=<?php echo $user['id'] ?>";
               class="btn btn-sm btn-danger">Delete</a>
          </td>
          <td>
            <a class="btn btn-sm btn-warning"
             href="update.php?upd=<?php echo $user['id'] ?>">Update</a> <!-- DYNAMIC VALU -->

          </td>
      </tr>
    <?php
        }

         }

   ?>


			</table>
		</div>

		<!-- singup form-->
  <div class="col-lg-4">
  <h2>Sing up</h2>
  <form name="singup" action="<?php $_SERVER['PHP_SELF']  ?>" method="POST">

  	  <div class="form-group">
      <label for="fullname">Full Name:</label>
      <input type="text" class="form-control" id="fullname" placeholder="Enter fullname" name="fullname">

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>

    <div class="form-group">
      <label for="pwd">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
    </div>

    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button name="submit" type="submit" class="btn btn-primary">Sing up</button>
  </form>
</div>


</body>
</html>