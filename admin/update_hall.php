<?php
session_start();
include("include/db_config.php");
if(!(isset($_SESSION['log_user'])))
	{
		header("Location: index.php?user=not_Authorize");
	}
	else
	{	
?>
<?php include('include/header.php'); ?>

<?php
include('include/nav.php');
?>

<?php
	$slno=$_GET["Serial_no"];
	$query="select * from hall where h_id=$slno";
	$result=mysqli_query($con,$query);
	$rows=mysqli_fetch_array($result);
	$ti=$rows['h_name'];
	$cn=$rows['h_place'];
	$pr=$rows['price'];
?>

<?php
if(isset($_POST['btn_update'])) {
	$title=$_POST["ti"];
	$content=$_POST["content"];
	$pr=$_POST["price"];
	
	if(empty($title) || empty($content) || empty($pr))
	{
		echo "<script> alert('All field required');</script>";
		return;
	}
	
	else
	{
		$query="update hall set h_name='$title', h_place='$content', price='$pr' where h_id=$slno";
		if(mysqli_query($con,$query))
		{
		echo "<script> alert('Successful');</script>";
		}
		else
		{
			echo "<script> alert('Check if the field conatin special charecter or contact administrator');</script>";
		}
		}
	}
?>
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">

			<div class="text-center mg-top-30">
		        <h1 class="text-uppercase">Update Hall</h1>
		        <div class="green-line"></div>
			</div>

			<label>ID Number: <?php echo $slno;?></label>
			<form action="" method="post" class="form">
			<div class="form-group">
				<input type="text" name="ti" class="srctxt form-control" value="<?php echo $ti;?> "required>
			</div>
			<div class="form-group">
				<input type="text" name="content" class="srctxt form-control" value="<?php echo $cn;?>"required>
			</div>
			<div class="form-group">
				<input type="text" name="price" class="srctxt form-control" value="<?php echo $pr;?>"required>
			</div>
			<input class="btn btn-success" type="submit" name="btn_update" value="Update" id="btn"/>
			</form>
			<br>
			<a href="update.php" class="btn btn-default"><span>&larr;</span> Back</a>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>

<?php
}
?>

</body>
</html>
