	<?php
	session_start();
	function get_user_issue_count()
	{
		$user_issue_count=0;
	$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"lms");
		$query="select count(*) as user_issue_count from issues where student_id=$_SESSION[id]";
		$query_run = mysqli_query($connection,$query);
		while($row=mysqli_fetch_assoc($query_run))
		{
			$user_issue_count=$row['user_issue_count'];
		}
		return $user_issue_count;
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
		<div class="col-md-3">
			<div class="col-md-3">
				<div class="card " style="width:300px">
					<div class="card-header">
					Issued Books</div>
					<div class="card-body">
						<p class="card-text">No of issued books : <?php echo get_user_issue_count(); ?> </p>
						<a href="view_user_issued_book.php" class="btn btn-warning" target="_blank">View Issued Books</a>
					</div>
	</div>
</div>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
	</html>
