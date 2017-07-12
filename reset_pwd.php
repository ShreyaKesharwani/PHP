<?php
if(isset($_REQUEST['uid'])){
	$id=$_REQUEST['uid'];
}
else{
	header("loaction:Welcome.php");
}
?>

<html>
<head>
<title>RESET PASSWORD</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div="container">
<?php include("menu.php"); ?>
<div='body-content'>
<?php
include("connect.php");
if(isset($_POST['Update'])){
	$pwd=$_POST['pwd'];
	$cpwd=$_POST['cpwd'];
	if($pwd==$cpwd){
		mysqli_query($con,"update reg set Password='$pwd' where Id='$id'");
		   if(mysqli_affected_rows($con)>0){
			   echo "Password chnaged successfully. Login to continue";
		   }
	}
		   else{
			   echo "Password don't match";
		   }
	}

?>


<form action="" method="POST">
<table> 
    <tr>
	   <td><label>Enter New Password</label></td>
	   <td><input type="password" name="password" id="pwd"></td>
	</tr>
	<tr>
	   <td><label>Confirm entered Password</label></td>
	   <td><input type="password" name="cpassword" id="cpwd"></td>
	</tr> 
	<tr>
	   <td></td>
	   <td><input type="submit" name="Update" value="Update"></td>
	</tr> 
</table>
</form>
</div>
</div>
</body>
</html>	
	
