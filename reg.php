<html>
<head>
<title>Register Here</title>
<script>
function Validate(){
	var name=document.getElementById("name").value;
	var email=document.getElementById("email").value;
	var pwd=document.getElementById("pwd").value;
	var cpwd=document.getElementById("cpwd").value;
	var gender=document.getElementById("gender").value;
	
if(name==""){
	alert("Name is a mandatory field");
	return false;
}
if(email==""){
	alert("email is a mandatory field");
	return false;
}
/* else
{
var filter=/^([a-zA-Z0-9\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]){2,4}+$/;

if(!filter.test(email)){
       alert("Enter valid email");
       return false;
}
} */
if(pwd==""){
	alert("Pasword is a mandatory field");
	return false;
}
if(cpwd==""){
	alert("Confirm your Password");
	return false;
}
if(cpwd!=pwd){
	alert("Passwords don't match");
	return false;
}
if(gender==""){
	alert("Gender is a mandatory field");
	return false;
}

}
</script>
</head>
<body>
<h1>REGISTER HERE</h1>
<?php
include("connect.php");
if(isset($_POST['Register'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$pwd=$_POST['pwd'];
	$gender=$_POST['gender'];
	
	$query="insert into reg(Name,Email,Password,Gender) values('$name','$email','$pwd','$gender')";
	$result=mysqli_query($con,$query);
	
	if(mysqli_affected_rows($con)==1){
		echo $result;
		echo "Account created successfully";
	}
	else{
		echo mysqli_error($con);
		echo "Sorry ! Unable to create account";
	}
}
?>

<form action="" method="POST" onsubmit="return Validate()">
<table>
    <tr>
        <td>Username</td>
		<td><input type="text" name="name" id="name"></td>
	</tr>
	<tr>
        <td>E-mail</td>
		<td><input type="email" name="email" id="email"></td>
	</tr>
	<tr>
        <td>Password</td>
		<td><input type="password" name="pwd" id="pwd"></td>
	</tr>
	<tr>
        <td>Confirm Password</td>
		<td><input type="password" name="cpwd" id="cpwd"></td>
	</tr>
	<tr>
        <td>Gender</td>
		<td><input type="radio" name="gender" id="gender" value="Male">Male</td>
		<td><input type="radio" name="gender" id="gender" value="Female">Female</td>
	</tr>
	<tr>
        <td></td>
		<td><input type="submit" name="Register" value="Register"></td>
	</tr>
</table>
</form>	
</body>
</html>  
	