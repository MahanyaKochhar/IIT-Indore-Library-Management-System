<?php
$book_name="";
$book_no="";
$book_price="";
$author="";
$cat_name="";
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"lms");
$query="select * from issues where book_no=$_GET[bn]";
$query_run = mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($query_run))
{
$book_name=$row['book_name'];
$book_no=$row['book_no'];
$book_price=$row['book_price'];
$author=$row['book_author'];
$cat_name=$row['cat_name'];
}
$query="insert into books values(null,'$book_name','$author','$cat_name',$book_no,$book_price)";
$query_run = mysqli_query($connection,$query);
$query="delete from issues where book_no=$_GET[bn]";
$query_run = mysqli_query($connection,$query);


?>
<script type="text/javascript">
alert("Book Returned");
window.location.href="admin_dashboard.php"
</script>