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
		<table border="1" width="900" id="customers" class="table table-hover">
		<tr>
			<th>Name</th>
			<th>Mobile</th>
			<th>Hall Name</th>
			<th>Date</th>
			<th>ID</th>
			<th>Status</th>
			<th colspan="2">Action</th>
		</tr>

			<?php
		
		$start=1;
		$limit=8;
		$query_page=mysqli_query($con,"select * from user_booking order by u_id desc ");
		$total=mysqli_num_rows($query_page);
       if(isset($_GET['u_id']))
       {

            $start=($_GET['u_id']-1)*$limit;
       }
        else
        {
			$start=0;

		}
	$page=ceil($total/$limit);
	 $query1="select * from user_booking join hall on user_booking.h_id=hall.h_id where h_active='Inactive' order by u_id desc limit $start,$limit";
	 $result1=mysqli_query($con,$query1);
	if (mysqli_num_rows($result1) > 0) 
	 { 
	while($rows=mysqli_fetch_array($result1))
		{
?>
			<tr>
			<td><?php echo $rows['u_name']?></td>
			<td><?php echo $rows['u_mobile']?></td>
			<td><?php echo $rows['h_name']?></td>
			<td><?php echo $rows['b_date']?></td>
			<td><?php echo $rows['ran_id']?></td> 
			<td><?php echo $rows['h_active']?></td> 
			<td> <a href="con_update.php?Serial_no=<?php echo $rows['u_id'];?>"><input type="submit" value="Active"></a></td>
			
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