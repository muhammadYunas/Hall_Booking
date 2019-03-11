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
	$slno = $_GET["Serial_no"];
	$query = "SELECT * FROM hall WHERE h_id = $slno";
	$result = mysqli_query($con,$query);
	$rows = mysqli_fetch_assoc($result);
	// echo "<pre>";
	// print_r($rows);
	// echo "</pre>";
	$name = $rows['h_name'];
	$dscr = $rows['dscr'];
	$img = $rows['img'];
	$add = $rows['h_place'];
	$price = $rows['price'];
	
?>

<?php
if(isset($_POST['btn_update'])) {
	$name = mysqli_real_escape_string($con, $_POST["name"]);
	$add = mysqli_real_escape_string($con, $_POST["add"]);
	$price = mysqli_real_escape_string($con, $_POST["price"]);
	$dscr = mysqli_real_escape_string($con, $_POST["dscr"]);
	
	$fileName      = $_FILES["img"]["name"];
  	$fileTmpName   = $_FILES["img"]["tmp_name"];

  	$fileExt       = explode('.', $fileName);
  	$fileActualExt = strtolower(end($fileExt));
  	// echo print_r($img);

  	$allowed       = array('jpg','jpeg','png');
	
	if(empty($name) || empty($add) || empty($price) || empty($dscr))
	{
		echo "<script> alert('All field required');</script>";
		return;
	}
	
	else
	{

	if (in_array($fileActualExt, $allowed)) {
		$fileNewName = uniqid().".".$fileName;
        $fileDestination = '../uploads/halls/'.$fileNewName;
        $update_dir = '../uploads/halls/';
        unlink($update_dir.$rows['img']);
        
        $query="UPDATE hall SET h_name = '$name', dscr = '$dscr', img = '$fileNewName', h_place = '$add', price = '$price' WHERE h_id = $slno";
		if(mysqli_query($con,$query)) {
			echo "<script> alert('Successful');</script>";
			move_uploaded_file($fileTmpName, $fileDestination);
		} else {
			echo "<script> alert('Check if the field conatin special charecter or contact administrator');</script>";
		}

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
			<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
			<div class="form-group">
			<label>Hall Name</label>
			<input placeholder="hall name" type="text" name="name" class="srctxt form-control" value="<?php echo $name;?>" required>
			</div>
			<div class="form-group">
			<label>Hall description</label>
			<textarea cols="" rows="3" class="form-control" name="dscr" placeholder="Enter description" required><?php echo $dscr; ?></textarea>
			</div>
			<div class="form-group">
			<label>Update Hall Image :</label>
			<img style="width: 100px; height: 100px;" src="../uploads/halls/<?php echo $img; ?>">
			<input type="file" class="form-control" name="img" required accept="*/image">
			</div>
			<div class="form-group">
			<label>Hall address</label>
			<input placeholder="hall address" type="text" name="add" class="srctxt form-control" value="<?php echo $add;?>"required>
			</div>
			<div class="form-group">
			<label>Hall price</label>
			<input placeholder="hall price" type="text" name="price" class="srctxt form-control" value="<?php echo $price;?>"required>
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
