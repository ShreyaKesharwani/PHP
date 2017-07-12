<html>
<head><title>FILES[][]</title></head>
<body>
<h1>FILE UPLOADING</h1>
<form method="POST" action="" enctype="multipart/form-data">
<fieldset>
<legend><b>Upload Image here</b></legend><br><br>
<input type="File" name="image"  value="save">
<input type="submit" name="submit" value="Save">
</form>

<?php
if (isset($_POST['submit'])){
	$fname=$_FILES['image']['name'];
	$fsize=$_FILES['image']['size'];
	$ftype=$_FILES['image']['type'];
	$tmp=$_FILES['image']['tmp_name'];

$status=move_uploaded_file($tmp,"Uploads/$fname");
if($status){
	echo "<br><br>File Successfully Uploaded";
}	
else {
	echo "Sorry ! Upload failed";
}
	
 echo "<br><b>File Info </b><br>";
 echo "Filename : ".$fname."<br>";
 echo "File Size : ".$fsize."<br>";
 echo "File Type : ".$ftype."<br>";
 echo "Tmp name : ".$tmp."<br>";
 }
 
?>

