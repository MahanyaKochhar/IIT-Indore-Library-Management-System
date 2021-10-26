<?php
session_start();
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"lms");
$book_name = "";
$author="";
$book_no = "";
$query = "select issues.book_name,issues.book_author,issues.book_no from issues where student_id=$_SESSION[id]";
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
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
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
	<div class="navbar-header">
		<a class="navbar-brand" href="user_dashboard.php">Library Management System(LMS)</a>
	</div>
	<font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name'];?></strong></span></font>
	<font style="color: white"><span><strong>Email: <?php echo $_SESSION['email'];?></strong></span></font>
	<ul class="nav navbar-nav navbar-right">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="view_profile.php">View Profile</a>
				<a class="dropdown-item" href="edit_profile.php"> Edit Profile</a>
				<a class="dropdown-item" href="change_password.php">Change Password</a>
			</div>
		</li>
		<li class="nav-item"><a class="nav-link" href="../logout.php">Logout</a></li>
	</ul>
</div>
</nav>

<span><marquee>This is library Management System. Library opens at 8:00 AM and close at 8:00 PM</marquee></span><br><br>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<form>
	<table class="table-bordered" width="900px" style="text-align: center">
		<tr>
			<th>Name:</th>
			<th>Author:</th>
			<th>Book No:</th>
			
		</tr>
		<?php
			$query_run = mysqli_query($connection,$query);
			while($row = mysqli_fetch_assoc($query_run)){
				$book_name = $row['book_name'];
				$author = $row['book_author'];
				$book_no = $row['book_no'];
		?>
				<tr>
					<td><?php echo $book_name;?></td>
					<td><?php echo $author;?></td>
					<td><?php echo $book_no;?></td>
				</tr>
				<?php
			}
		?>
	</table>
</form>
</div>
<div class="col-md-2"></div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>