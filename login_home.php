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
<title>HOME PAGE - <?php echo $row['Name'] ?></title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
<?php include("menu.php"); ?> 
<div class="content">
<div class='profile-info'>
<h1>Welcome <?php echo $row['Name']?> </h1>
<table border="5|1" cellspacing="5" cellpadding="5" style="width:70%">
<tr>
       <td>Username</td>
       <td><?php echo $row['Name'] ?></td>
</tr>

<tr>
       <td>E-mail</td>
       <td><?php echo $row['Email'] ?></td>
</tr>

    <tr>
       <td>Password</td>
       <td><?php echo $row['Password'] ?></td>
</tr>

<tr>
       <td>Gender</td>
       <td><?php echo $row['Gender'] ?></td>
</tr>
 </table>
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
