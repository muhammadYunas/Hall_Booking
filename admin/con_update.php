<?php
include("include/db_config.php");
$slno=$_GET["Serial_no"];
$status="Active <a href=confirm.php>Confirm Your Booking</a>";
$query="update user_booking set h_active='$status' where u_id=$slno";
if(mysqli_query($con,$query))
{
header("location:home.php");
}
else
{
echo mysqli_error($con);
}
	?>