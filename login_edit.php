<?php
session_start();
if(isset($_SESSION['loggedin'])){
	include("connect.php");
	$logid=$_SESSION['loggedin'];
	$result=mysqli_query($con,"select * from reg where Id=$logid");
	$row=mysqli_fetch_assoc($result);
?>
<html>
<head>
<title>Edit Profile - <?php echo $row['Name'];?></title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class ="container">
<?php include("menu.php");?>
<div class="content">
<div class='profile-info'>
<h1>Edit Profile</h1>
<?php
 /* if(isset($_REQUEST['$status'])){
	 echo "<p class='success'>Updated Successfully</p>";
 }  */
 if(mysqli_affected_rows($con)==1){
	 echo "Upadated Successfully";
 }

?> 
<?php
if(isset($_POST['Update'])){
	$name=mysqli_real_escape_string($con,$_POST['name']);
	$gender=mysqli_real_escape_string($con,$_POST['gender']);
	mysqli_query($con,"update reg set Name='$name' , Gender='$gender' where Id=$logid");
	
	if(mysqli_affected_rows($con)>0){
		header("location:login_edit.php?status=true");
		
	}
	else{
		echo "Sorry ! Unable to update";
	}
}
?>


<form method="POST" action="">
<table>
    <tr>
	   <td>Name</td>
	   <td><input type="text" name="name" value="<?php echo $row['Name']?>"></td>
	</tr>
	<tr>
	   <td>Gender</td>
	   <td><input type="radio" name="gender" value="Male" id="gender" <?php if($row['Gender']=="Male") echo "checked"?>>Male
	   <td><input type="radio" name="gender" value="Female" id="gender" <?php if($row['Gender']=="Female") echo "checked"?>>Female
	   </td>

	</tr>
	<tr>
	   <td></td>
	   <td><input type="submit" name="Update" value="Update"</td>
	</tr>
</table>
</form>
</div>
<div class='profile-pic'>
<img src="IMAGES/shreya.jpg">
<br><a class="IMAGES" href="">Upload Picture</a>
</div>
</div>
</div>
</body>
</html>
<?php 
}
else{
	header("Location:log.php");
}
?>
	