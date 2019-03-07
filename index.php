<?php $title = 'Home'; ?>
<header>
  <?php include("include/header.php"); ?>
</header>

<section>
	<?php include("include/slide.php"); ?>
</section>


<!-- <div class="container mg-top-20">
<form action="search.php" method="post">
<input class="btn btn-primary" type="submit" value="Search Hall" class="btn">
</form>
</div> -->

<section class="pd-top-30 pd-bottom-30">
  	<div class="container">
  		<div class="row">
  			<div class="col-md-12">
  			  	<div class="table-responsive">
  				<div class="text-center">
			    	<h1 class="text-uppercase">Hall Section</h1>
			    	<div class="green-line"></div>
			    </div>
  				<table  class="table table-hover">
  				<?php
				$start = 1;
				$limit = 5;
				$query_page = mysqli_query($con,"SELECT * FROM hall ORDER BY h_id DESC");
				$total = mysqli_num_rows($query_page);
			   if(isset($_GET['h_id']))
			   {

			        $start=($_GET['h_id']-1)*$limit;
			   }
			    else
			    {
					$start=0;

				}
					
				 $page=ceil($total/$limit);
				$query="SELECT * FROM hall ORDER BY h_id DESC LIMIT $start,$limit";
				 $result=mysqli_query($con,$query);
				if (mysqli_num_rows($result) > 0) 
				 { 
				while($rows=mysqli_fetch_array($result))
					{
				?>
				<tr>
				<th><?php echo $rows['h_name'];?></th>
				<th>Price</th>
				<th>Action</th>
				</tr>
				<tr>
				<td><?php echo $rows['h_place'];?></td>
				<td><?php echo $rows['price'];?></td>
				<td><a href="booking.php?Serial_no=<?php echo $rows['h_id'];?>"><input type="submit" class="btn btn-success" value="BOOK"></a></td>
						
				</tr>
					<?php
					}
					?>

				<?php
					 }
				?>
  				</table>
  				<?php
				 for($i=1;$i<= $page;$i++)
				 {
				 ?>
				 <hr>
				    <a href="?id=<?php echo $i;?>"><input class="btn btn-primary" type="submit" value="<?php echo $i;?>"></a>
				  <?php
				 }
				  ?>
  			</div>
  		</div>
  		</div>
  	</div>

</section>
<hr>

<?php include("include/footer.php");?>