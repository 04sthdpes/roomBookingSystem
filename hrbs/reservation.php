<?php
require_once('connection/dbFunction.php');
	include('include/header.php');
	include('include/navbar.php');	
	?>	
	<div class="row" style="background:#fff;padding: 40px;">
		<div class="container">	
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<?
				$function_object=new dbFunction();
				$check_room=$function_object->check_room();
				if($check_room>0){
					$reserve_room_by_user=$function_object->reserve_room_by_user();
					if($reserve_room_by_user>=1){
						echo "<img src='images/room.jpg' class='img-responsive'style='height: 400px;width: 950px;'>";
						echo "<h2>you have already booked your room </h2><br/>";
						echo "<a href='list.php'>Check your reservation</a>";
					}
					else{
						$room_reservation=$function_object->room_reservation();
						$remaining_room=$function_object->remaining_room();
						echo "<h2>Thank you for reservation</h2>";
					?>	
					<table class="table table-bordered" style="margin-top: 25px;">
						<tr class="warning">
							<th>Floor</th>
							<th>Booked Date</th>
							<th>Action</th>
						</tr>
						<?php
							$get_room_inventory=$function_object->get_room_inventory();
							while($data=mysql_fetch_array($get_room_inventory)){ 					
						?>
						<tr>
							<td>
								<?php
									$get_floor=$function_object->get_floor(); 
									echo $get_floor['floor'];
								?>
							</td>
							<td><?php echo $data['booked_date']?></td>
							<td>
								<a href="cancel.php?id=<?php echo $data['user_id'] ;?>"><button class="btn btn-danger">cancel</button></a>
							</td>
						<?php
						}
					}
						?>
						</tr>	
					</table>
				<?php
				}
				else{
					echo "<img src='images/room.jpg'>";
					echo "<h2>Sorry there is no more room </h2>";
					echo "<a href='user_panel.php'>please select other floor</a>";
				}
				?>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
<?
include('include/footer.php');
?>