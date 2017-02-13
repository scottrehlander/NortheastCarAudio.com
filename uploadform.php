<html>
<head>
<title>File Upload Form</title>
</head>
<body>

<?php
 
 $str = $_FILES['uploadFile']['name'];
if ( move_uploaded_file($_FILES['uploadFile']['tmp_name'], "files/" . $str))
      { 
 echo "The file has been successfully uploaded";
      }
else
      {
 echo "Sorry, there was a problem uploading your file.";
       }
 
?>



PHP File Upload<br>
 
<form  enctype="multipart/form-data"  action="uploadform.php" method="post"><br>
Type (or select) Filename: <input type="file" name="uploadFile">
<input type="hidden" name="MAX_FILE_SIZE" value="25000" />
<input type="submit" value="Upload File">
</form>
 
</body>
</html>