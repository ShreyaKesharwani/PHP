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
<h1>Change Password</h1>
<?php
  if(isset($_POST['Update'])){
	  $opwd=$_POST['opwd'];
	  $npwd=$_POST['npwd'];
	  $cpwd=$_POST['cpwd'];

  
  if($opwd==$row['Password']){
	 if($opwd!=$npwd){	
	    if($npwd==$cpwd){
		
		mysqli_query($con,"update reg set Password='$npwd' where Id=$logid");
		 if(mysqli_affected_rows($con)>0){
			 echo "<p class='success'>Password changed successfully</p>";
		 }
		else{ 
		   echo "<p class='error'>Change failed</p>" ;
}	
		}		
else {
	echo "<p class='error'>New and Confirm password don't match" ;
} 
	 } 
  else {
	  echo "Old password and New password can't be the same";
  }
  }
  else {
	  echo "Old Password entered is incorrect";
  }
}
  
?>

<form action="" method="POST">
<table>
    <tr>
	   <td>Enter Old Password</td>
	   <td><input type="password" name="opwd"></td>
	</tr>  
    <tr>
	   <td>Enter New Password</td>
	   <td><input type="password" name="npwd"></td>
	</tr> 
    <tr>
	   <td>Confirm New Password</td>
	   <td><input type="password" name="cpwd"></td>
	</tr> 
    <tr>
	   <td></td>
	   <td><input type="submit" name="Update" value="Update"></td>
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
	   
