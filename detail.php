<?php
$title = 'Donz Hall Booking | Detail';
include("include/db_config.php");	
include("include/header.php");
?>

<?php
$slno = $_GET["Serial_no"];

$query = "select * from hall where h_id=$slno";

$result = mysqli_query($con,$query);
$rows = mysqli_fetch_array($result);
$name = $rows['h_name'];
$dscr = $rows['dscr'];
$img = $rows['img'];
$place = $rows['h_place'];
$pr = $rows['price'];
?>
<section class="mg-top-30 mg-bottom-30">
<div class="container">
	<div class="row">
		<div class="col-md-12">

			<div class="text-center mg-top-30">
		    	<h1 class="text-uppercase ">Hall Detail</h1>
		    	<div class="green-line"></div>
			</div>

			<div class="text-center">
			<font style="font-size: 25px;"><b>Hall Name:</b> <?= "<u>".$name."</u> <b>Price:</b><u>".$pr ."</u><b> Located at: </b><u>". $place ."</u>"; ?></font>
			</div>
			
			<div>
				<img style="width: 100%; height: 400px;" class="img-responsive" src="<?= 'uploads/halls/'.$img; ?>" />
			</div>
			<strong>Description: <?= $dscr; ?></strong>

			<div>
				<a href="index.php" class="btn btn-primary"><span>&larr;</span> Back</a>
			</div>
			
			
			
			</div>
		</div>
	</div>
</section>
<hr>

<?php include("include/footer.php"); ?>
