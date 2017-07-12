
<html>
	<head>
		<title>Forgot Password</title>
		<link href="css/style.css" rel="stylesheet">
		<script>
		
			function validate()
			{
				var email=document.getElementById("email").value;
				
				if(email=="")
				{
					alert("Enter Email");
					return false;
				}
				else
				{
		var filter=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
					if(!filter.test(email))
					{
						alert("Enter Valid Email");
						return false;
					}
				}
				
			}
		</script>
	</head>
	<body>
	<div class="container">
		<?php include("menu.php")?>
		
		
		
		<div class='body-content'>
		<h1>Forgot Password</h1>
		
		<?php 
			include("connect.php");
			if(isset($_POST['submit']))
			{
				$email=$_POST['email'];
				$res=mysqli_query($con,"select Name,Email,Id from reg where Email='$email'");
				if(mysqli_num_rows($res)==1)
				{
					$row=mysqli_fetch_assoc($res);
					$uid=base64_encode($row['Id']);
					$subject="Recovery Password";
					$message="Hi ".$row['Name'].",<br><br>Your
					reset password request recieved successfully.Please
					click the below link to reset password<br><br>
					<a href='http://localhost:8080/9am/reset_pwd.php?uid=$uid'>Reset Password</a><br><br>Thanks
					Our Team";
					$header="Content-type:text/html";
					echo $message;
					//mail($email,$subject,$message,$header);
				}
				else
				{
					echo "<p>Sorry Email Does not Exists</p>";
				}
			}
		?>
		
		<table>
			<form method="POST" action="" 
			onsubmit="return validate()">
				<tr>
					<td><label>Email</label></td>
					<td>
						<input type="text" name="email" 
						id="email">
					</td>
				</tr>
				
				<tr>
					<td></td>
					<td>
						<input type="submit" name="submit"
						value="Submit">
						
						</td>
				</tr>
			</form>
		</table>
		</div>
	</div>
	</body>
</html>