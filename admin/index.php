<?php
include("include/db_config.php");
?>
<?php include('include/header.php'); ?>


	<?php
if(isset($_POST["btnlogin"]))
{
function validate_input($data) 
		{
  			$data = trim($data);
  			$data = stripslashes($data);
   			$data = htmlspecialchars($data);
   			return $data;
		}
			$uname = validate_input($_POST["user"]);
			$pwd = validate_input($_POST["pwd"]);
		if(empty($uname) || empty($pwd))
		{
			echo "<script> alert('Please Fill The required Field!');</script>";
		}
		else
		{
		$sql = "SELECT * FROM admin_login where ad_username='$uname' and ad_password='$pwd'";
			$result = mysqli_query($con, $sql);
			if (mysqli_num_rows($result) > 0) 
			{
				session_start();
				$_SESSION['log_user']=$uname;
				setcookie('user_n',$uname,time() + 86400*30,'/');
				setcookie('user_p',$pwd,time() + 86400*30,'/');
				header("Location: home.php?user=Logged_in");
			} 
			else
			{  				
				echo "<script> alert('Invalid Username or Password!');</script>";
				
			}		
}
}
?>

<div class="section mg-top-100">
<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">

			<div class="text-center mg-top-30">
	            <h1 class="text-uppercase">Login</h1>
	            <div class="green-line"></div>
        	</div>

			<form action="index.php" method="POST">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Username" name="user">
				</div>
				<div class="form-group">
					<input type="Password" class="form-control" placeholder="Password" name="pwd">
				</div>
				<input type="submit" value="Login" class="btn btn-primary" name="btnlogin">
			</form>

		</div>
		<div class="col-md-2"></div>
	</div>
</div>
</div>

</body>
</html>