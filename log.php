<?php
session_start();
?>

<html>
<head>
<title>LOGIN FORM</title>
</head>
<script>
function Validate(){
	var email=document.getElementById("email").value;
	var pwd=document.getElementById("pwd").value;
	
if(email==""){
	alert("Can't leave E-mail field empty");
	return false;
}	
/* else{
	var filter=/^([a-zA-Z0-9\.\-])+@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]){2,4}+$/;
	if(!filter.test(email)){
		alert("Enter a valid E-mail Id");
		return false;
	}
} */
    if(pwd==""){
		alert("Can't leave password field empty");
	}
}
</script>
</head>

<body>
<h1>LOGIN HERE</h1>
<?php
include("connect.php");
if(isset($_POST['Login'])){
	$email=$_POST['email'];
	$pwd=($_POST['pwd']);
	//$query="select *from register where Email='$email' and Password='$pwd'";
	$result=mysqli_query($con,"select *from reg where Email='$email' and Password='$pwd'");
	echo mysqli_num_rows($result);
	if(mysqli_num_rows($result)==1){
		    $row=mysqli_fetch_assoc($result);
		      
		
	    /* if($row['$status']==1){ */
			$_SESSION['loggedin']=$row['Id'];
			header('Location:http://localhost:8080/login_home.php');
		}
	
		/* else{
			echo "Please activate your account";
		}  */
	
	else {
		echo "Wrong credentials";
	}
}

?>

<form action="" method="POST" onsubmit="return Validate()">
<table>
   <tr>
      <td>E-mail</td>
	  <td><input type="email" name="email" id="email" placeholder="--email--"></td>
	</tr>  
	<tr>
      <td>Password</td>
	  <td><input type="password" name="pwd" id="pwd"></td>
	</tr>  
	<tr>
      <td></td>
	  <td><input type="submit" value="Login" name="Login">
	  <a href="forgot_pwd.php">Forgot Password ?</a>
	  </td>
	</tr>  
</table>
</form> 
</body>
</html>	