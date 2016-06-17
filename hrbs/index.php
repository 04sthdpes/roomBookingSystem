<?php
include('include/header.php');	
	include('include/navbar.php');
mysql_connect("localhost","root","");
if (!mysql_select_db("hms"))
{
    header("location:setup.php");
    }    
	
	$function_object=new dbFunction();
?>
	
<section>
	<div class="container">
		<div class="row" style="background:#fff;">
			<div class="col-md-8">
				<img src="images/building.jpg" class="img-responsive" style="padding: 35px 20px;border-bottom-right-radius: 114px;">
				<h2>Overview</h2>
                    <p style="font-size: 17px;text-align: justify;text-indent: 55px;padding: 10px 0px 20px 20px;">
                    Softwarica Hostel is named after the popular college Softwarica College of IT and E-commerce.
                    A college in where many people came to visit here.
                    The Softwarica Hostel is fantastic combination of international standards with Nepali hospitality, 
                    situated in the new center of the capital, Kathmandu just 4 kilometers away from the Tribhuwan intl Airport.
                    The Softwarica Hostel is ever ready to cater to the needs of its diverse categories of students,
                    dismissing all notions that business and pleasure cannot be mixed. 
                    At Softwarica Hostel, it's all about attention to details that we look into and our valued student 
                    feel just right.</p>
			</div>
			<div class="col-md-4">
				<h3 class="form-signin-heading">Login Here</h3>
				<?
					if (isset($_POST['login'])) {
						$username=$_POST['username']; 
						$password=$_POST['password'];

						$login_verify=$function_object->login_verify($username,$password);
						if ($login_verify=='0') {
							header('location:admin/admin_panel.php');
						}
						else{
							$count=$function_object->count($username,$password);
							if ($count=='1'){
								$_SESSION['username']=$username;
								$reserve_room_by_user=$function_object->reserve_room_by_user();
								if($reserve_room_by_user>=1){ 
									header('location:list.php');
								}
								else{
									header('location:user_panel.php');}
							}
							else{
								echo "Invalid username or password";
							}
						}			
					}
				?>
				<form method="post" action="index.php" class="form-signin"> 					
					<input type="hidden" name="login" value="true" class="form-control"/>	
					<p>
						<label for="inputUsername" class="sr-only">Username</label>			
						<input type="text" name="username" placeholder="username" class="form-control">
					</p>
					<p>
						<label for="inputPassword" class="sr-only">Password</label>
						<input type="password" name="password" placeholder="password" class="form-control">
					</p>                  
					<p><button class="btn btn-lg btn-primary btn-block" type="submit" >sign in</button></p>
					<p><a href="register.php">Create account</a></p>
				</form>
			</div>
		</div>
	</div>
</section>
<?
include('include/footer.php');
?>