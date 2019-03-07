<?php
$title = 'Hall Online Bookiing | Tracking';
include("include/db_config.php");
?>
<header>
  <?php include("include/header.php");?>
</header>

<section class="mg-top-30 mg-bottom-30">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="text-center mg-top-30">
			    	<h1 class="text-uppercase">Tracking Area</h1>
			    	<div class="green-line"></div>
			    </div>

			    <!-- <form action="" method="post">
					<div class="form-group">
						<input type="text" class="form-control" name="src" placeholder="Enter Your Tracking Id Or Telephone/Mobile Number">
					</div>
					<input type="submit" value="Search" class="btn btn-primary" name="btnsrc">
				</form> -->

				<div class="table-responsive pd-top-20">
					<table class="table table-hover">
						<tr>
							<th>Hall Name</th>
							<th>Status</th>
						</tr>

						<?php
if(isset($_POST["btnsrc"]))
{

			$src=$_POST["src"];
			if($src=="")
			{
				echo "<script> alert('Enter Your Tracking ID');</script>";
				return;
			}
			else
			{
					$query1="select * from user_booking where ran_id='$src' or u_mobile='$src'";
					$result1=mysqli_query($con,$query1);
					if (mysqli_num_rows($result1) > 0) 
					 { 
					$rows=mysqli_fetch_array($result1);
				
					?>
					<tr>
					<td><?php echo $rows['u_name']?></td>
					<td><?php echo $rows['h_active']?></td>
					</tr>
					<?php
					}
							
					else
					{
					 echo "<script> alert('Hall Not Listed, Contact Us to Enter the Hall you Know');</script>";
					}
				}			
}
					?>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
<hr>
<?php include("include/footer.php");?>