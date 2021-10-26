	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<title>LMS</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
		<style type="text/css">
			#side_bar
			{
				
				padding: 50px;
				width: 300px;
				height:450px ;
			}
		</style>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
	</head>
	<body class="bg-light">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php">Library Management System(LMS)
					</a>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li class="nav-item">
						<a class="nav-link" href="admin/index.php">Admin Login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php">User Login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="signup.php">Register</a>
					</li>
				</ul>
			</div>
		</nav>
		<br>
		<span><marquee>This is LMS of IIT Indore Library.New Central Library is now open</marquee></span>
		<br>
		<br>
		<div class="row">
			<div class="col-md-4 bg-tertiary" id="side_bar">
				<h5>Library Timings</h5>
				<ul>
					<li>Opening Time is 9:00 AM</li>
					<li>Closing Time is 9:00 PM</li>
					<li>Library will remain shut on Sundays and Institute Holidays</li>
				</ul>
				<h5>Facilities</h5>
				<ul>
					<li>Books</li>
					<li>WiFi Enabled</li>
					<li>Reading Room</li>
					<li>Newspapers and Magazines</li>
				</ul>
		</div>
		<div class="col-md-8" id="main_content">
			<center><h3>User Login Form</h3></center>
			<form action="" method="post">
				
					<div class="form-group">
					<label for="name">Email Id</label>
					<input type="text" name="email" class="form-control" required></div>
					<div class="form-group">
					<label for="name">Password:</label>
					<input type="password" name="password" class="form-control" required></div>
					<button type="submit" name="login" class="btn btn-primary">Login</button>
				</form>
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<img src="http://library.iiti.ac.in/wp-content/uploads/2020/09/LRC_15-4.jpg" class="img-fluid">
					</div>
				</div>
				
				<?php
					if(isset($_POST['login']))
					{
						session_start();
						$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"lms");
		$query="select * from users where email='$_POST[email]'";
		$query_run = mysqli_query($connection,$query);
		while($row=mysqli_fetch_assoc($query_run))
		{
			if($row['password']==$_POST['password'])
			{
				$_SESSION['name']=$row['name'];
				$_SESSION['email']=$row['email'];
				$_SESSION['id']=$row['id'];
				header("Location:user_dashboard.php");
			}
			else
			{
			?>
			<br><br><center><span class="alert-danger">Incorrect Password Entered</span></center>
		    <?php
			}
		}
					}
				?>
		</div>
	</div>
	</body>
	</html>
