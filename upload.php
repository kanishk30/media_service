<?php
ini_set('display_errors',0);
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Create new post</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>

  <?php 
  if(isset($_FILES['image'])){
	      $errors= array();

	      if (isset($_POST['post_title']) && isset($_POST['post_content'])) {
	      	
	      	$title = 	trim($_POST['post_title']);
	      	$content = 	$_POST['post_content'];

	      	if ($title == "" || $title == " " || $content == "" || $content == " ") {
	      		$errors[] = 'Title and Content are necessary';		
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

	         echo '<script>window.location="http://localhost/kanishk/index.php"</script>';
	        
	      }

	}

	

	   


  ?>


    	<nav class="navbar navbar-default ">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">Media service Blog</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li><a href="index.php">Posts</a></li>
		        <li class="active"><a href="upload.php">Create New Post</a></li>
       	      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>

	<div class="container-fluid">
	<div class="row">

	<div class="col-md-6 col-md-offset-3">
	<?php 

		if (isset($errors) && !empty($errors)) {
			
		

	?>
		<div class="alert alert-danger" id="error">
			<?php foreach($errors as $child) {
   					echo $child . "\n";
					} 
			?>
		</div>

	<?php } ?>
	</div>

		<div class="col-md-12 text-center">

			
			<h1>
				Create new post!!
			</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
			<form role="form" enctype="multipart/form-data" method="post" action="upload.php">
				<div class="form-group">
					 
					<label>
						Title
					</label>
					<input class="form-control" id="post_title" type="text" required name="post_title" required>
				</div>
				<div class="form-group">
					 
					<label>
						Blog Content
					</label>
					<textarea style="overflow:hidden"; class="form-control" rows="10" id="post_content" name="post_content" required></textarea>
				</div>
				<div class="form-group">
					 
					<label>
						File input
					</label>
					<input type="file" name="image" required accept=".png, .jpeg, .jpg, .gif">
					
				</div>

				<button name="submit" type="submit" class="btn btn-success btn-md	">
					Post
				</button>
			</form>
		</div>
		<div class="col-md-3">
		</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>

   
  </body>
</html>