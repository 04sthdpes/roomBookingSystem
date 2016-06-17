<?php
include('header.php');
$function_object=new dbFunction();
?>
<section>
	<div class="container">
		<div class="report">
			<div align="center"><h2>Softwarica Hostel</h2>
				  P.O. Box 985<br />
				  Sanga, Kavre, Nepal<br />
				  Telephone: 977-1-6630340<br />
				  Fax: 977-1-1663572<br />
				Email: resv@nasikahotel.com</div>
			<hr/>

			<?php
				$generate_report=$function_object->generate_report();
				while ($data=mysql_fetch_array($generate_report)) { 
					$user_id=$data['user_id'];
					$room_id=$data['room_id'];
					$get_users=$function_object->get_users($user_id);
					$get_rooms=$function_object->get_rooms($room_id);
					echo "<h4>Name : ".$get_users['name']."</h4>";
					echo "<h4>Address : ".$get_users['address']."</h4>";
					echo "<h4>Email : ".$get_users['email']."</h4>";
					echo "<h4>Contact No. : ".$get_users['phone']."</h4>";
					echo "<h4>Booked Date : ".$data['booked_date']."</h4>";
					echo "<h4>Floor : ".$get_rooms['floor']."</h4>";
					echo "<h4>No. of rooms : ".$data['qty_reserve']."</h4>";
				}			
			?>
			<button class="btn btn-primary" style="margin:20px auto 20px 80px;">print</button>
		</div>
	</div>
</section>