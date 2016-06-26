<?php
require_once('connection/dbFunction.php');
include('include/header.php');
include('include/navbar.php');
echo "<div class='container'>";
	echo "<div class='result'>";
	$function_object=new dbFunction();?>
		<table class="table table-bordered" style="margin-top: 25px;">
			<tr>
				<h2>Reservation Schedule</h2>
			</tr>	
			<tr class="warning">
				<th>Floor</th>
				<th>Booked Date</th>
				<th>Action</th>
			</tr>
			<?php
			$get_room_inventory_num=$function_object->get_room_inventory_num();
			if($get_room_inventory_num != 0){
				$get_room_inventory=$function_object->get_room_inventory();				
					while($data=mysql_fetch_array($get_room_inventory)){ 					
				?>
				<tr>
					<td>
						<?php
							$get_list=$function_object->get_list(); 
							echo $get_list['floor'];
						?>
					</td>
					<td><?php echo $data['booked_date']?></td>
					<td>
						<a href="cancel.php?id=<?php echo $data['user_id'] ;?>"><button class="btn btn-danger">cancel</button></a>
					</td>
					<?php
					}
				}
				else{
					echo'<div class="alert alert-info">Please booked your room</div>';
				}
			?>
			</tr>	
		</table>
	</div>
</div>
<?
include('include/footer.php');
?>