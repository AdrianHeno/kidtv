 <!DOCTYPE html>
<html lang="en" class=" js no-touch">
<head>
  <title>Kids Tv</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo $base_url?>/theme/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url?>/theme/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,600|Raleway:600,300|Josefin+Slab:400,700,600italic,600,400italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url?>/theme/css/slick-team-slider.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url?>/theme/css/style.css">
  <!-- =======================================================
        Theme Name: Tempo
        Theme URL: https://bootstrapmade.com/tempo-free-onepage-bootstrap-theme/
        Author: BootstrapMade.com
        Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>
<body>
	<!--HEADER START-->
	<div class="main-navigation navbar-fixed-top">
		<nav class="navbar navbar-default">
			<div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="<?php echo $base_url?>">Kids Tv</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
			  <ul class="nav navbar-nav navbar-right">
					<?php
					$active = '';
					if($current_category_id === 0){//Stuff for adding active state to current page menu item
						$active = 'active';
					}
					?>
					<li class="<?php echo $active ?>"><a href="<?php echo $base_url . '/video/watch' ?>">Home</a></li>
					<?php
					foreach($categories as $category){
						$active = '';

						if($category->id == $current_category_id){
							$active = 'active';
						}
					?>
					<li class="<?php echo $active ?>"><a href="<?php echo $base_url . '/video/watch/' . $category->id?>"><Service><?php echo $category->title ?></a></li>
					<?php
					}
					?>
			  </ul>
			</div>
		  </div>
		</nav>
	</div>
	<!--HEADER END-->
	<div class="section-padding">
		
	</div>
	<!--PORTFOLIO START-->
	<div id="portfolio" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="page-title text-center">
					<h1>Videos - <?php echo $current_category ?></h1>
					<hr class="pg-titl-bdr-btm"></hr>
				</div>
				<div class="port-sec">
					<div id="Container">
<?php
		$i = 1;
		if(count($videos) > 1){
			foreach($videos as $video){
				if(strpos($video->url, 'youtube') == true){
					$video_url = explode('v=', $video->url);
	?>
									<div class="filimg category-1 category-3" data-myorder="<?php echo $i ?>">
										<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $video_url[1] ?>?rel=0" frameborder="0" allowfullscreen></iframe>
									</div>
	<?php
				}else{
					$video_id = explode('/', $video->url);
					$video_id = explode('.', $video_id[5]);
	?>
									<video width="740" height="435" poster="http://i.ytimg.com/vi/<?php echo $video_id[0] ?>/hqdefault.jpg" controls class="filimg video">
										<source src="<?php echo $video->url ?>" type="video/mp4">
									Your browser does not support the video tag.
									</video>
	<?php
				}
				$i++;
			}
		}else{
			if(strpos($videos->url, 'youtube') == true){
					$video_url = explode('v=', $videos->url);
		?>
										<div class="filimg category-1 category-3" data-myorder="<?php echo $i ?>">
											<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $video_url[1] ?>?rel=0" frameborder="0" allowfullscreen></iframe>
										</div>
		<?php
					}else{
						$video_id = explode('/', $videos->url);
						$video_id = explode('.', $video_id[5]);
		?>
										<video width="740" height="435" poster="http://i.ytimg.com/vi/<?php echo $video_id[0] ?>/hqdefault.jpg" controls class="filimg video">
											<source src="<?php echo $videos->url ?>" type="video/mp4">
										Your browser does not support the video tag.
										</video>
		<?php
					}
		}
		
		?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--PORTFOLIO END-->

	<!--FOOTER START-->
	<footer class="footer section-padding">
		<div class="container">
			<div class="row">
				<div style="visibility: visible; animation-name: zoomIn;" class="col-sm-12 text-center wow zoomIn">															
				</div><!--- END COL -->
			</div><!--- END ROW -->
		</div><!--- END CONTAINER -->
	</footer>
	<!--FOOTER END-->
  	<script src="<?php echo $base_url?>/theme/js/jquery.min.js"></script>
  	<script src="<?php echo $base_url?>/theme/js/jquery.easing.min.js"></script>
  	<script src="<?php echo $base_url?>/theme/js/bootstrap.min.js"></script>
  	<script src="<?php echo $base_url?>/theme/js/jquery.mixitup.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo $base_url?>/theme/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo $base_url?>/theme/js/custom.js"></script>
    
</body>
</html>
