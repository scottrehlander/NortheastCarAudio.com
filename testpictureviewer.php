<html>
<head>
<title>File Upload Form</title>
</head>
<body>

<?php
 
 $str = $_FILES['uploadFile']['name'];

 echo "$str";
 
?>



PHP File Upload<br>
 
<form  enctype="multipart/form-data"  action="testpictureviewer.php" method="post"><br>
Type (or select) Filename: <input type="file" name="uploadFile">
<input type="hidden" name="MAX_FILE_SIZE" value="25000" />
<input type="submit" value="Upload File">
</form>
 
</body>
</html>