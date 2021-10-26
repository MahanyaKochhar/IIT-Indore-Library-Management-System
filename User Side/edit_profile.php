	<?php
		session_start();
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"lms");
		$name="";
		$email="";
		$mobile="";
		$address="";
		$query="select * from users where email='$_SESSION[email]'";
		$query_run = mysqli_query($connection,$query);
		while($row=mysqli_fetch_assoc($query_run))
		{
			$name=$row['name'];
			$email=$row['email'];
			$mobile=$row['mobile'];
			$address=$row['address'];
		}

	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<title>User Dashboard</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<style type="text/css">
			#side_bar
			{
				background-color: whitesmoke ;
				padding: 50px;
				width: 300px;
				height:450px ;
			}
		</style>
	</head>
	<body class="bg-light">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="user_dashboard.php">Library Management System(LMS)
					</a>
				</div>
				<font style="color:white"><span><strong>Welcome: <?php echo $_SESSION['name'] ?>
				</strong></span></font>
				<font style="color:white"><span><strong>Email: <?php echo $_SESSION['email'] ?>
				</strong></span></font>
				<ul class="nav navbar-nav navbar-right">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown">
							Your Profile
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="view_profile.php">View Profile
							</a>
							<a class="dropdown-item" href="edit_profile.php">Edit Profile
							</a>
							<a class="dropdown-item" href="change_password.php">Change Password
							</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="logout.php">LogOut</a>

					</li>
					
				</ul>
			</div>
		</nav>
		<br>
		<span><marquee>This is LMS of IIT Indore Library.New Central Library is now open</marquee></span>
		<br>
		<br>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
		    <form action="update.php" method="post">
		    	<div class="form-group">
		    		<label>Name:</label>
		    		<input type="text" class="form-control" name="name" value="<?php echo $name ?>" >
		    	</div>
		    	<div class="form-group">
		    		<label>Email:</label>
		    		<input type="text" name="email" class="form-control" value="<?php echo $email ?>" >
		    	</div>
		    	<div class="form-group">
		    		<label>Mobile:</label>
		    		<input type="text" name="mobile" class="form-control" value="<?php echo $mobile ?>" >
		    	</div>
		    		<div class="form-group">
		    		<label>Address:</label>
		    		<textarea row="3" name="address" cols="40" class="form-control" ><?php echo $address ?></textarea>
		    	</div>
		    	<button type="submit" class="btn btn-warning">Update</button>
		    	
		    </form>
		</div>

			<div class="col-md-4"></div>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
	</html>
