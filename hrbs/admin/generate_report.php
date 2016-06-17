<?php
include('header.php');

$function_object=new dbFunction();

?>
<div class="container">
	<div class="table_detail">
		<table class="table table-bordered">
			<center><h2 style="padding-bottom:15px;">Reservation List</h2></center>
			<tr class="warning">
				<th>Booked By</th>
				<th>Address</th>
				<th>Contact</th>
				<th>Email</th>
				<th>Booked Date</th>
				<th>floor</th>
				<th>quantity</th>
				<th>Action</th>
			</tr>			
			<?php				
				$get_detail=$function_object->get_detail();
				while ($data=mysql_fetch_array($get_detail)) { 
						$user_id=$data['user_id'];
						$room_id=$data['room_id'];
					$get_users=$function_object->get_users($user_id);
					$get_rooms=$function_object->get_rooms($room_id);
					?>
			<tr>
				<td><?php echo $get_users['name'];?></td>
				<td><?php echo $get_users['address'];?></td>
				<td><?php echo $get_users['phone'];?></td>
				<td><?php echo $get_users['email'];?></td>
				<td><?php echo $data['booked_date'];?></td>
				<td><?php echo $get_rooms['floor'];?></td>
				<td><?php echo $data['qty_reserve'];?></td>
				<td><a href="report.php?id=<?php echo $data['user_id'] ;?>"><button class="btn btn-success">preview</button></a></td>
			<?php } ?>
		</table>
	</div>
</div>
