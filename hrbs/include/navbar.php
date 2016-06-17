<nav class="navbar navbar-default">
	<div class="container">
	<div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#"><img src="images/logo.png" style="margin-top: -14px;" alt="logo" class="img-responsive"></a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	      	<?php 
	      	if (!isset($_SESSION['username'])){ ?>
	      		<li class="menu"><a href="index.php">HOME<span class="sr-only">(current)</span></a></li>	       
	       		<li class="menu"><a href="contact.php">CONTACT US</a></li> 
	      	<? }
	      	else { ?>
	        <li class="menu"><a href="list.php">HOME<span class="sr-only">(current)</span></a></li>
	        <li class="menu"><a href="user_panel.php">RESERVATION</a></li>
	        <li class="menu"><a href="contact.php">CONTACT US</a></li>       
	      </ul>   	      
	      <ul class="nav navbar-nav navbar-right">        
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
	          		<?php 
	          			echo $_SESSION['username'];
	          		?>
	          	<span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="logout.php">logout</a></li>
	          </ul>
	        </li>
	      </ul>
	      <?php }?>   
	      
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	  </div>
</nav>