
<!-- database connect -->
<?php

$id = $_GET['id'];

$link = new mysqli("localhost", "root", "", "kanishk");
$sql = "SELECT *  FROM blog WHERE id = ".$id;
$q = $link->query($sql);
$row = $q->fetch_row();
$title = $row[1];
$content = $row[2];
$image = $row[3];

?>
<!-- * -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blog</title>

    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>

  <nav class="navbar navbar-default">
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
		        <li><a href="upload.php">Create New Post</a></li>
       	      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>

    <div class="container-fluid">
    	
	<div class="row">
		<div class="col-md-12">
			<!-- <div class="jumbotron"> -->
				<h1 class="text-success text-center" style="color:black; font-size:250%; font-family: verdana;">
				 <?php echo $title; ?>
				</h1>
			<!-- </div> -->
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<img class="center-block img-responsive" alt=" Image Preview" id="header_image">
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<p  style=" color: black;
    					font-family: Georgia;
   					 	font-size: 150%;">
				<?php echo $content; ?>
			</p>

		</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <script type="text/javascript">
    	$( document ).ready(function() {
		    var width = $(window).width()
	    	// for mobile devices 
	    	if (width <= 560) 
	    	{
	    		var img = "images/small/<?php echo $image?>";  //save to small sized
	    	}
	    	// for tablet devices 
	    	else if (width <= 768)
	    	{
	    		var img = "images/medium/<?php echo $image?>"; //save to medium sized
	    	}
	    	// for laptop/desktop devices 
	    	else
	    	{	
	    		var img = "images/large/<?php echo $image?>"; //save to large sized
	    	}

	    	$("#header_image").attr("src", img);
		});
    </script>
  </body>
</html>