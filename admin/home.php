<?php
session_start();
include("include/db_config.php");
if(!(isset($_SESSION['log_user']))) {
		header("location:check.php");
	} else {	
		$user_name=$_SESSION['log_user'];
	
?>
<?php include('include/header.php'); ?>

<?php
	if(isset($_POST["btnreg"])) {
		// function validate_input($data) 
		// 	{
	 //  			$data = trim($data);
	 //  			$data = stripslashes($data);
	 //   			$data = htmlspecialchars($data);
	 //   			return $data;
		// 	}

			$title 	 = mysqli_real_escape_string($con, $_POST["title"]);
			$content = mysqli_real_escape_string($con, $_POST["content"]);
			$dscr = mysqli_real_escape_string($con, $_POST["description"]);
			$img = $_FILES["img"];
			$price 	 = mysqli_real_escape_string($con, $_POST["price"]);

			$fileName      = $_FILES['img']['name'];
	        $fileTmpName   = $_FILES['img']['tmp_name'];

	        $fileExt       = explode('.', $fileName);
	        $fileActualExt = strtolower(end($fileExt));
	        // echo print_r($img);

	        $allowed       = array('jpg','jpeg','png');

			if(empty($title) || empty($content) || empty($price) || empty($dscr) || empty($img))
			{
				echo "<script> alert('All field required');</script>";
			} else {

			if (in_array($fileActualExt, $allowed)) {
				$fileNewName = uniqid().".".$fileName;
                $fileDestination = 'uploads/halls/'.$fileNewName;

                $sql = "INSERT INTO hall (h_name,dscr,img,h_place,price) VALUES ('$title','$dscr','$fileNewName','$content','$price')";

				if (mysqli_query($con, $sql)) {
						echo "<script> alert('Successful');</script>";
						move_uploaded_file($fileTmpName, $fileDestination);
					} else {
						//echo "<script> alert('Check if the field contain special charecter, or contact an administrator');</script>";
						echo mysqli_error($con);
					}

				}
			}	
	}
?>

<?php
include('include/nav.php');
?>

<!-- <div class="tab">
  <button class="tablinks btn btn-primary" onclick="openCity(event, 'add')" id="defaultOpen">New Hall</button>
  <button class="tablinks btn btn-primary" onclick="openCity(event, 'active')">Active/Deactive</button>
  <button class="tablinks btn btn-primary" onclick="openCity(event, 'view')">View New Booking</button>
  <button class="tablinks btn btn-primary" onclick="openCity(event, 'edit')">Update</button>
  <a href="logout.php"><button class="tablinks btn btn-danger" onclick="openCity(event, 'edit')">Logout</button></a>
</div> -->

<div class="container">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">

	<div class="text-center mg-top-30">
        <h1 class="text-uppercase">Add Hall</h1>
        <div class="green-line"></div>
	</div>

	<form action="home.php" method="post" class="form">
		<div class="form-group">
			<input type="text" name="title" class="form-control" placeholder="Enter Hall Name" required>
		</div>

		<div class="form-group">
		<textarea cols="" rows="5" class="form-control" name="content" placeholder="Enter Address" required></textarea>
		</div>

		<div class="form-group">
		<textarea cols="" rows="3" class="form-control" name="description" placeholder="Enter description" required></textarea>
		</div>

		<div class="form-group">
			<label>Select Hall Image :</label>
			<input type="file" class="form-control" name="img" required accept="*/image">
		</div>

		<div class="form-group">
			<input type="text" class="form-control" name="price" placeholder="Enter Price" required>
		</div>

		<input type="submit" value="Add" class="btn btn-primary" name="btnreg">	
	</form>
</div>
<div class="col-md-2"></div>
</div>
</div>

<!-- <div id="active" class="tabcontent">
	<p class="double">
		<?php
		// include("search.php");
		?>
	</p>
</div>
			
<div id="view" class="tabcontent">
<p class="">
	<?php
	// include("newbk.php");
	?>
</p>
</div>
			
<div id="edit" class="tabcontent">
<p class="double">
	<?php
	// include("update.php");
	?>
</p>
</div> -->

<!-- <script>
	function openCity(evt, cityName) {
	    var i, tabcontent, tablinks;
	    tabcontent = document.getElementsByClassName("tabcontent");
	    for (i = 0; i < tabcontent.length; i++) {
	        tabcontent[i].style.display = "none";
	    }
	    tablinks = document.getElementsByClassName("tablinks");
	    for (i = 0; i < tablinks.length; i++) {
	        tablinks[i].className = tablinks[i].className.replace(" active", "");
	    }
	    document.getElementById(cityName).style.display = "block";
	    evt.currentTarget.className += " active";
	}
		document.getElementById("defaultOpen").click();
</script> -->

<?php
}
?>

</body>
</html>