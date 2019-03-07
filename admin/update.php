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

<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 col-sm-12 mg-top-50">
			<div class="table-responsive">
 <table class="table table-hover" border="1" width="900" id="customers">
		<tr>
			<th>Hall Name</th>
			<th>Place</th>
			<th>Price</th>
			<th colspan="2">Action</th>
		</tr>

			<?php
		
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
	$page=ceil($total/$limit);
	 $query1="select * from hall order by h_id desc limit $start,$limit";
	 $result1=mysqli_query($con,$query1);
	if (mysqli_num_rows($result1) > 0) 
	 { 
	while($rows=mysqli_fetch_array($result1))
		{
?>
			<tr>
			<td><?php echo $rows['h_name']?></td>
			<td><?php echo $rows['h_place']?></td>
			<td><?php echo $rows['price']?></td>
			<td> <a href="update_hall.php?Serial_no=<?php echo $rows['h_id'];?>"><input class="btn btn-success" type="submit" value="Update"></a></td>
			<td> <a href="delete.php?Serial_no=<?php echo $rows['h_id'];?>"><input class="btn btn-danger" type="submit" value="Delete"></a></td>
			</tr>
<?php
		}
	 }
?>
  </table>
</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>

</body>
</html>
<?php
			}
	?>