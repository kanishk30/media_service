<?php
	   if(isset($_FILES['image'])){
	      $errors= array();

	      if (isset($_POST['post_title']) && isset($_POST['post_content'])) {
	      	
	      	$title = 	trim($_POST['post_title']);
	      	$content = 	trim($_POST['post_content']);

	      	if ($title == "" || $title == " " || $content == "" || $content == " ") {
	      		
	      	}

	      }

	      $file_name = md5($_FILES['image']['name'].time());
	      $file_size =$_FILES['image']['size'];
	      $file_tmp =$_FILES['image']['tmp_name'];
	      $file_type=$_FILES['image']['type'];

	      $a = explode('.',$_FILES['image']['name']);
	      $file_ext=strtolower(end($a));
	      
	      $expensions= array("jpeg","jpg","png", "gif");
	      
	      if(in_array($file_ext,$expensions)=== false){
	         $errors[]="This file extension is not allowed";
	      }
	      
	      
	      if(empty($errors)==true){
	         move_uploaded_file($file_tmp,"images/original/".$file_name.".".$file_ext);

	         $filename = "images/original/".$file_name.".".$file_ext;

	         list($width, $height) = getimagesize($filename);

	         // Load
	         $small = imagecreatetruecolor(128, 128);
	         $medium = imagecreatetruecolor(640, 480);
	         $large = imagecreatetruecolor(1280, 720);
	         

	         if ($file_ext == 'jpg' || $file_ext == 'jpeg') 
	         {
	         	$source = imagecreatefromjpeg($filename);
	         }
	         elseif ($file_ext == 'png') 
	         {
	         	$source = imagecreatefrompng($filename);;
	         }
	         else {
	         	$source = imagecreatefromgif($filename);
	         }

	         // Resize
	         imagecopyresized($small, $source, 0, 0, 0, 0, 128, 128, $width, $height);
	         imagecopyresized($large, $source, 0, 0, 0, 0, 1280, 720, $width, $height);
	         imagecopyresized($medium, $source, 0, 0, 0, 0, 640, 480, $width, $height);

	         // Output based on file extension
	         if ($file_ext == 'jpg' || $file_ext == 'jpeg') 
	         {
	         	imagejpeg($small,"images/small/".$file_name.".".$file_ext);
	         	imagejpeg($large,"images/large/".$file_name.".".$file_ext);
	         	imagejpeg($medium,"images/medium/".$file_name.".".$file_ext);
	         }
	         elseif ($file_ext == 'png') 
	         {
	         	imagepng($small,"images/small/".$file_name.".".$file_ext);
	         	imagepng($large,"images/large/".$file_name.".".$file_ext);
	         	imagepng($medium,"images/medium/".$file_name.".".$file_ext);
	         }
	         else 
	         {
	         	imagegif($small,"images/small/".$file_name.".".$file_ext);
	         	imagegif($large,"images/large/".$file_name.".".$file_ext);
	         	imagegif($medium,"images/medium/".$file_name.".".$file_ext);
	         }
	         

	         $image_name = $file_name.".".$file_ext;
	         $link = new mysqli("localhost", "root", "", "kanishk");
	         $sql = "INSERT INTO blog (title, content, image)
	         VALUES ('".$title."','".$content."','".$image_name."')";
	         $link->query($sql);
	         $link->close();


	         // echo "Success";
	      }else{

	         print_r($errors);
	      
	      }
	   }

	

?>
<script type="text/javascript">
	// window.location.href = "index.php";
</script>

