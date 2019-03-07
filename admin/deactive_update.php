<?php
include("include/db_config.php");
$slno=$_GET["Serial_no"];
$status="Inactive";
$query="update job set jb_active='$status' where jb_id=$slno";
if(mysqli_query($con,$query))
{
header("location:home.php");
}
?>