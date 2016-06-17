<?php
	include('include/header.php');
	include('include/navbar.php');
	require_once('connection/dbFunction.php');
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
				<h2 class="form-signin-heading">Create a account</h2>
				<?
					if (isset($_POST['register'])) {
						$name=$_POST['name'];
						$address=$_POST['address'];
						$phone=$_POST['phone'];
						$email=$_POST['email'];
						$username=$_POST['username'];
						$password=$_POST['password'];

						$check_user=$function_object->check_user($username);
						if($check_user>0){
							echo '<div class="container">';
								echo '<div class="msg">';
								echo "Sorry username already exist";
								echo '</div>';
							echo '</div>';
						}
						else{
							$add_user=$function_object->add_user($name,$address,$phone,$email,$username,$password);
							echo '<div class="container">';
								echo '<div class="msg">';
							 	echo "Registration Successfully!!!";
								echo '</div>';
							echo '</div>';
						}
					}
				?>
				<form method="post" action="register.php" class="form-signin">
					<input type="hidden" name="register" value="true"/>
					<p>
						<label for="inputName" class="sr-only">Name</label>
						<input type="text" name="name" placeholder="name" required class="form-control">
					</p>
					<p>
						<label for="inputAddress" class="sr-only">Address</label>
						<input type="text" name="address" placeholder="address" required class="form-control">
					</p>
					<p>
						<label for="inputPhone" class="sr-only">Phone no</label>
						<input type="number" name="phone" placeholder="phone" required class="form-control">
					</p>
					<p>
						<label for="inputEmail" class="sr-only">Email</label>
						<input type="email" name="email" placeholder="email" required class="form-control">
					</p>
					<p>
						<label for="inputUsername" class="sr-only">Username</label>
						<input type="text" name="username" placeholder="username" required class="form-control">
					</p>
					<p>
						<label for="inputPassword" class="sr-only">Password</label>
						<input type="password" name="password" placeholder="password" required class="form-control">
					</p>                  
					<p><button class="btn btn-lg btn-primary btn-block" type="submit">sign up</button></p>
					<p><a href="index.php">Already user | sign in</a></p>
				</form>
			</div>
		</div>
	</div>
</section>
<?
include('include/footer.php');
?>