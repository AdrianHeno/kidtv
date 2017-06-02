 <!DOCTYPE html>
<html lang="en" class=" js no-touch">
<head>
  <title>Tempo | HTML5 Responsive Bootstrap Template</title>
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
	<!--BANNER START-->
	<div id="banner" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="jumbotron">
				  <h1 class="small">Welcome To <span class="bold">Tempo</span></h1>
				  <p class="big">Multipurpose HTML5 Bootstrap template.</p>
				  <a href="#" class="btn btn-banner">Learn More<i class="fa fa-send"></i></a>
				</div>
			</div>
		</div>
	</div>
	<!--BANNER END-->

	<!--PORTFOLIO START-->
	<div id="portfolio" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="page-title text-center">
					<h1>Our Privious Works</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor <br>incididunt ut labore et dolore magna aliqua. </p>
					<hr class="pg-titl-bdr-btm"></hr>
				</div>
				<div class="port-sec">
					<div id="Container">
<?php
		$i = 1;
		foreach($videos as $video){
			$video_url = explode('v=', $video->url);
?>
								<div class="filimg category-1 category-3" data-myorder="<?php echo $i ?>">
									<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $video_url[1] ?>?rel=0" frameborder="0" allowfullscreen></iframe>
								</div>
<?php
			$i++;
		}
		?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--PORTFOLIO END-->

   
	<!--CTA2 START-->
	<div class="cta2">
		<div class="container">
			<div class="row white text-center">
				<h3 class="wd75 fnt-24">“Every Thing is designed. Few Things are Designed well.” - Brian Reed</h3>
				<p class="cta-sub-title"></p>
				<a href="#" class="btn btn-default">Request A Quote</a>
			</div>
		</div>
	</div>
	<!--CTA2 END-->

	<!--FOOTER START-->
	<footer class="footer section-padding">
		<div class="container">
			<div class="row">
				<div style="visibility: visible; animation-name: zoomIn;" class="col-sm-12 text-center wow zoomIn">
					<h3>Follow us on</h3>
					<div class="footer_social">
						<ul>
							<li><a class="f_facebook" href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a class="f_twitter" href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a class="f_google" href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a class="f_linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
						</ul>
					</div>																
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
