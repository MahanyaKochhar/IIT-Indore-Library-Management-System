<?php
require('functions.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Dashboard</title>
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
<a class="navbar-brand" href="admin_dashboard.php">Library Management System(LMS)
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
<a class="nav-link" href="../logout.php">LogOut</a>

</li>

</ul>
</div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#e3f2fd">
<div class="container-fluid">
<ul class="nav navbar-nav navbar-center">
<li class="nav-item">
<a href="admin_dashboard.php" class="nav-link">Dashboard</a>
</li>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" data-toggle="dropdown">Book</a>
<div class="dropdown-menu">
<a href="add_book.php" class="dropdown-item">Add new book</a>
<a href="manage_book.php" class="dropdown-item">Manage book</a>
</div>
</li>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" data-toggle="dropdown">Category</a>
<div class="dropdown-menu">
<a href="add_category.php" class="dropdown-item">Add new category</a>
<a href="manage_category.php" class="dropdown-item">Manage Category</a>
</div>
</li>

<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" data-toggle="dropdown">Author</a>
<div class="dropdown-menu">
<a href="add_author.php" class="dropdown-item">Add new author</a>
<a href="manage_author.php" class="dropdown-item">Manage author</a>
</div>

</li>
<li class="nav-item">
<a href="issue_book.php" class="nav-link">Issue Book</a>
</li>
<li class="nav-item">
<a href="manage_issue_book.php" class="nav-link">Manage Issue Book</a>
</li>
</ul>
</div>
</nav>



<br>
<span><marquee>This is LMS of IIT Indore Library.New Central Library is now open</marquee></span>
<br>
<br>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<table class="table table-bordered table-hover">
<thead>
<tr>
<td>Category Id</td>
<td>Name</td>
<td>Action</td>
</tr>
</thead>
<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"lms");
$query="select * from category";
$query_run = mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($query_run))
{
?>
<tr>
<td><?php echo $row['cat_id'] ;?> </td>

<td><?php echo $row['cat_name'] ;?> </td>
<td>
<button class="btn" name=""><a href="edit_category.php?cid=<?php echo $row['cat_id'];?>">Edit</a></button>
<button class="btn" name="" ><a href="delete_category.php?cid=<?php echo $row['cat_id'];?>">Delete</a>
</button>
</td>
</tr>
<?php
}
?>
</table>
</div>
<div class="col-md-2"></div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
