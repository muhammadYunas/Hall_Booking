<?php
$title = 'Donz Hall Booking';
include("include/db_config.php");
include("include/header.php");
?>

<?php
$slno=$_GET["Serial_no"];
$status="Inactive";
$py="Not Complete";
$query="select * from hall where h_id=$slno";
$result=mysqli_query($con,$query);
$rows=mysqli_fetch_array($result);
$hll=$rows['h_name'];
$pr=$rows['price'];
$rn= rand(1000, 10000000);
?>
<section class="mg-top-30 mg-bottom-30">
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">

			<?php
				if(isset($_POST['book']))
				{
					$title=$_POST["name"];
					$mo=$_POST["u_mo"];
					$dt=$_POST["dt"];

					if( $title=="" || $mo=="" || $dt=="")
					{
						echo "<script> alert('All field required');</script>";
						return;
					}

					else
					{
						$query="insert into user_booking (u_name,u_mobile,h_id,b_date,amnt,h_active,ran_id,payment) values ('$title','$mo','$slno','$dt','$pr','$status','$rn','$py')";
						if(mysqli_query($con,$query))
						{
						echo "<script> alert('Successful Keep This Tracking Id ( $rn ) To Track Your Booking');</script>";
						}
						else
						{
							echo "<script> alert('Check if the field conatin special charecter or contact administrator');</script>";
						}
						}
					}
			?>

			<div class="text-center mg-top-30">
			    	<h1 class="text-uppercase">Hall Booking</h1>
			    	<div class="green-line"></div>
			</div>

			<div>
			<font style="font-size: 25px;"><b>Hall Name:</b> <?= "<u>".$hll."</u> <b>Price:</b><u>".$pr;?></u></font>
			</div>
			<br>
			<form  action="" method="post">
				<div class="form-group">
					<input type="text" name="name" placeholder="Individual/Organization Name" class="form-control" required>
				</div>
				<div class="form-group">
					<input type="number" name="u_mo" placeholder="Telephone/Mobile Number" class="form-control" required>
				</div>
				<div class="form-group">
					<input type="date" name="dt" Placeholder="mm/dd/yyyy" class="form-control" required>
				</div>
				<input type="submit" name="book" value="Book" class="btn btn-primary" />
			</form>
			<br>
			<a href="index.php"><input type="submit" class="btn btn-primary" value="Back"/></a>
		</div>
	</div>
</div>
</section>
<hr>

<?php include("include/footer.php"); ?>
