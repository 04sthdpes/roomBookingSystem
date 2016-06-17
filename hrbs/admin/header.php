<?php
	include('../connection/dbFunction.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Home</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/signin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</head>
<body>
    <header>
        <div class="container">
        <img src="../images/header.png" class="img-responsive"  />
        </div>
    </header>
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
	      <a class="navbar-brand" href="#"><img src="../images/logo.png" style="margin-top: -14px;" alt="logo" class="img-responsive"></a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="menu"><a href="comment.php">VIEW COMMENT<span class="sr-only">(current)</span></a></li>
	        <li class="menu"><a href="admin_panel.php">MONITOR RESERVATION</a></li>
	        <li class="menu"><a href="generate_report.php">GENERATE REPORT</a></li>  
	        <li class="menu"><a href="../logout.php">LOGOUT</a></li>     
	      </ul>     
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	  </div>
</nav>
