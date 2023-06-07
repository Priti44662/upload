<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>File Upload</title>
</head>
<center>
<form method="post" enctype="multipart/form-data">
 Enter the title: <input type="text" name="title">
 <br><br>
 select file to upload:
 <input type="file" name="filetoupload">
 <input type="submit" value="upload" name="submit" />
</form>
</center>

<body>
</body>
</html>

<?php
if (isset($_POST['submit'])){
$target_dir="upload/up1/";
$target_file=$target_dir.basename($_FILES["filetoupload"]["name"]);
$uploadok=1;
$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(file_exists($target_file)){
echo "sorry, file already exists.";
$uploadok=0;
}
if($_FILES["filetoupload"]["size"]>5000000){
echo "sorry, your file is too large.";
$uploadok=0;
}
if($uploadok==0){
echo"Sorry,your file was not uploaded";
}else{
if(move_uploaded_file($_FILES["filetoupload"]["tmp_name"],$target_file)){
echo "the file".basename($_FILES["filetoupload"]["name"])."has been uploaded.";
}
else{
echo"sorry, there was an error uploading your file.";
}
}
}
?>