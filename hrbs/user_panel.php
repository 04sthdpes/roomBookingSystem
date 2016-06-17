<?php
require_once('connection/dbFunction.php');
include('include/header.php');
include('include/navbar.php');
?>
<section>
<div class="container">
	<div class="table_detail">
		<table class="table table-bordered">
			<tr>
				<center><h2 style="padding-bottom:15px;">Please select the room</h2></center>
			</tr>
			<tr class="warning">
				<th>floor</th>
				<th>total room</th>
				<th>available room</th>
				<th>rate</th>
				<th>status</th>
			</tr>			
			<?php				
				$function_object=new dbFunction();
				$get_room_detail=$function_object->get_room_detail();
				while ($data=mysql_fetch_array($get_room_detail)) { ?>
			<tr>
				<td><?php echo $data['floor'];?></td>
				<td><?php echo $data['total_room'];?></td>
				<td><?php echo $data['remaining_room'];?></td>
				<td><?php echo $data['rate'];?></td>
				<td><a href="reservation.php?room_id=<?php echo $data['room_id']?>" style="color:#fff;"><button class="btn btn-success">reserve</button></a></td>
			<?php } ?>
		</table>
	</div>
</div>
</section>

<?
include('include/footer.php');
?>