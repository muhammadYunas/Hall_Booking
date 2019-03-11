<?php
$title = 'Donz Hall Booking | Detail';
include("include/db_config.php");	
include("include/header.php");
?>

<?php
$slno=$_GET["Serial_no"];
// $status="Inactive";
// $py="Not Complete";
$query="select * from hall where h_id=$slno";
$result=mysqli_query($con,$query);
$rows=mysqli_fetch_array($result);
$hll=$rows['h_name'];
$pr=$rows['price'];
// $rn= rand(1000, 10000000);
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
			<font style="font-size: 25px;"><b>Hall Name:</b> <?= "<u>".$hll."</u> <b>Price:</b><u>".$pr;?></u></font>
			</div>
			<a href="index.php" class="btn btn-primary"><span>&larr;</span> Back</a>
			
			
			
			</div>
		</div>
	</div>
</section>
<hr>

<?php include("include/footer.php"); ?>
