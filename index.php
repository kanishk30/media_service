<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Create new post</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

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
		        <li class="active"><a href="index.php">Posts</a></li>
		        <li><a href="upload.php">Create New Post</a></li>
       	      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>

    <div class="container-fluid">
    	
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center text-danger">
					Media Service Blog | Feed
				</h1>
			</div>
		</div>

		<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<?php
					$link = new mysqli("localhost", "root", "", "kanishk");
					$sql = "SELECT *  FROM blog ORDER BY id desc"; // fetching blogs from db from new to old
					$q = $link->query($sql); 
					while ($row = $q->fetch_row()) 
					{
				        echo '<div class="row well">';
						echo '<div class="col-md-3">';
						echo '	<img src="images/small/'.$row[3].'">';
						echo '</div>';
						echo '<div class="col-md-8">';
						echo '<a href ="blog.php?id='.$row[0].'"><h3>'.$row[1].'</h3></a>';
						echo '</div>';
						echo '</div>';	
				    }
					?>
				</div>
		</div>
	</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <script type="text/javascript">
    	function blogpage(var blogid)
    	{
    		alert(blogid);
    	}
    </script>
  </body>
</html>