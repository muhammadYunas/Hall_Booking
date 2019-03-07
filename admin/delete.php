<?php
session_start();
include("include/db_config.php");
if(!(isset($_SESSION['log_user'])))
	{
		header("Location: index.php?user=not_Authorize");
	}
	else
	{	

		$slno=$_GET["Serial_no"];

		$query="DELETE FROM hall WHERE h_id = $slno";
		if(mysqli_query($con,$query))
		{
		header("Location: update.php?hall_deleted");
		}
		else
		{
			echo "<script> alert('Check if the field conatin special charecter or contact administrator');</script>";
		}

}

?>