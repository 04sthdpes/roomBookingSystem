<?php
include('header.php');

$function_object=new dbFunction();

?>
<div class="container">
	<div class="table_detail">
		<table class="table table-bordered">
			<center><h2 style="padding-bottom:15px;">Comment</h2></center>
			<tr class="warning">
				<th>Name</th>
				<th>Email</th>
				<th>comment</th>
			</tr>			
			<?php				
				$get_comment=$function_object->get_comment();
				while ($data=mysql_fetch_array($get_comment)) { 
					?>
			<tr>
				<td><?php echo $data['name'];?></td>
				<td><?php echo $data['email'];?></td>
				<td><?php echo $data['comment'];?></td>
			<?php } ?>
		</table>
	</div>
</div>
