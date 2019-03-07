<?php
$title = 'Hall Online Bookiing | Search';
include("include/db_config.php");
?>

<header>
  <?php include("include/header.php");?>
</header>

<section class="mg-bottom-20 mg-top-30">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<!-- <div class="text-center mg-top-30">
			    	<h1 class="text-uppercase">Search Hall</h1>
			    	<div class="green-line"></div>
			    </div>

				<form class="form text-center" action="" method="post">
					<div class="form-group">
						<input type="text" class="form-control" name="src" placeholder="Search Job...">
					</div>
					<input type="submit" value="Search" class="btn btn-primary" name="btnsrc">
				</form> -->

				<div class="text-center mg-top-30">
			    	<h1 class="text-uppercase">Search Result</h1>
			    	<div class="green-line"></div>
			    </div>

			    <div class="table-responsive">
			    	<table class="table table-hover">
			    		<tr>
			    			<th>Hall Name</th>
			    			<th>Place</th>
			    		</tr>
			    	<?php
					if(isset($_POST["btnsrc"]))
					{

					$src=$_POST["src"];
					if($src=="")
					{
						echo "<script> alert('Enter Some name');</script>";
						return;
					}
					else
					{
						$start=1;
						$limit=8;
						$query_page=mysqli_query($con,"select * from hall order by h_id desc ");
						$total=mysqli_num_rows($query_page);
					   if(isset($_GET['h_id']))
					   {

							$start=($_GET['h_id']-1)*$limit;
					   }
						else
						{
							$start=0;

						}
						if(isset($_POST['btnsrc']))
						{
						$page=ceil($total/$limit);
						 $query1="SELECT * FROM hall WHERE h_name LIKE '$src%' ORDER BY h_id DESC LIMIT $start,$limit";
						 $result1=mysqli_query($con,$query1);
						if (mysqli_num_rows($result1) > 0)
						 {
						while($rows=mysqli_fetch_array($result1))
							{
						?>
						<tr>
							<td><?php echo $rows['h_name']?></td>
							<td><?php echo $rows['h_place']?></td>
						</tr>
						<tr>
							<td colspan="2"><a href="booking.php?Serial_no=<?php echo $rows['h_id'];?>"><input type="submit" class="b_btn" value="BOOK"></a></td>
						</tr>
					<?php
										}
									 }

								 else
								 {
									 echo "<script> alert('Hall Not Listed, Contact Us to Enter the Hall you Know');</script>";
								 }
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
