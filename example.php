<?php
require_once "PiramideUploader.php";

if(isset($_FILES["image"])){
	$piramideUploader = new PiramideUploader();
	
	$upload = $piramideUploader->upload("my-upload-name", "image", "uploads", array("image/jpeg","image/png","image/gif"));
}

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Example Piramide Uploader</title>
</head>

<body>
	<h2>Simple Piramide Uploader Form</h2>
	<?php 
		if(isset($upload) && $upload["uploaded"]){
			echo "<p>Upload file data in php array:</p>";
			var_dump($piramideUploader->getInfoFile());
			
		}elseif(isset($upload) && $upload["uploaded"] == false){
			echo "<p>The file could not be uploaded</p>";
			echo "<p>Error: ".$upload["error"]."</p>";
		}
	?>
	<form action="" enctype="multipart/form-data" method="POST">
		<input type="file" name="image" id="image"/>
		<input type="submit" name="submit" value="Upload" />
	</form>

</body>
</html>