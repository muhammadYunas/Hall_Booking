<?php
include("include/db_config.php");
$bank=$_POST["bank"];
if($bank=="")
{
	header("location:schpayment.php");
}
else
{
echo "<h1>All Your Requirement Goes Here</h1>";
echo "You have Choose: ".$bank."<br>";
$dt=date("m/d/Y");
echo "Date: ".$dt;
echo "<a href='track.php'>Go Back</a>";
}
?>