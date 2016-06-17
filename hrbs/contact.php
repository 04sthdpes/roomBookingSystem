<?php
include('include/header.php');
include('include/navbar.php');
?>
	<div class="container">
<div class="row" style="padding: 35px;background:#fff;">

		<div class="col-md-4">
			<h3>SOFTWARICA HOSTEL</h3>
            <p>P.O. Box 985</p>
            <p>Sanga, Kavre, Nepal</p>
            <p>Telephone: 977-1-6630340</p>
            <p>Fax: 977-1-1663572</p>
            <p>Email: resv@softwaricahostel.com</p>
		</div>
		<div class="col-md-8">
			<h2>LEAVE A REPLY</h2>
        <?php 
        	$function_object=new dbFunction();
            if (isset($_POST['submit_comment'])){                                
                $name=$_POST['name']; 
                $email=$_POST['email'];
                $comment=$_POST['comment'] ;

                $add_comment=$function_object->add_comment($name,$email,$comment);

                if ($add_comment) {
                    echo("THANK YOU ! for your comment");
                }
                else{
                    echo("There is a problem");
                }

            }
        ?>
	        <!-- FORM-START -->
	        <form class="form-horizontal" action="" method="post" style="">
	        	<input type="hidden" name="submit_comment" value="true">
				  <div class="form-group">
				    <label for="name" class="col-sm-2 control-label">Name</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="name" name="name" placeholder="fullname" required/>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="email" class="col-sm-2 control-label">Email</label>
				    <div class="col-sm-10">
				      <input type="email" class="form-control" name="email" id="email" placeholder="email" required/>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="comment" class="col-sm-2 control-label">Comment</label>
				    <div class="col-sm-10">
				      <textarea class="form-control" name="comment" id="comment" placeholder="comment" required/></textarea>
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-default">POST COMMENT</button>				      
				    </div>
				  </div>
			</form>
		</div>		
	</div>
</div> 
<?
include('include/footer.php');
?>