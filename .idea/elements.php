
<html>
	<head>
		<title>PHOTOPRESS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="index.html">Photopress</a></h1>
						<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
											<li><a href="index.html">Home</a></li>
											<li><a href="elements.php">Compress Here</a></li>
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Main -->
					<article id="main">
						<header>
							<br/>
							<h2>Compress</h2>
							<p>Choose your image to compress, save and preview the image</p>
							<br/><br/><br/><br/>
						</header>
						<section class="wrapper style5">
							<div class="inner">
								<section>
                                    <input type="file" name="FileUpload1" id="textbox1" class="brwsbutn">
									<input type="submit" name="button" id="button1" onclick="myfunction()" value="GO" />
									<br/>
									<input type="text" name="textbox3" id="textbox3" readonly="true"/>

								</section>

							</div>
						</section>
					</article>
			</div>

		<!-- Scripts -->
			<script type="text/javascript">
			function myfunction() { 
			var answer =document.getElementById('textbox1').value;
			var textbox3 = document.getElementById('textbox3');
			textbox3.value=answer;
 			} 
			</script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

 <?php
    function compress_image($source_url, $destination_url, $quality) {
	$info = getimagesize($source_url);
 
	if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
	elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
	elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
 
	//save it
	imagejpeg($image, $destination_url, $quality);
 
	//return destination file url
	return $destination_url;
}
 
$source_photo = '$FileUpload1';
$dest_photo = 'C:\Users\Home\IdeaProjects\untitled[photopress]\compressed\big.jpg';

$d = compress_image($source_photo, $dest_photo, 15);

echo "<img src= $dest_photo>";
?>
/* echo '
<div style="float:left;margin-right:10px">
	<img src="'.$source_photo.'" alt="" />
	<br />'.filesize($source_photo).' Bytes
</div>

<div style="float:left;">
	<img src="'.$dest_photo.'" alt="" />
	<br />'.filesize($dest_photo).' Bytes
</div>
';
*/
</body>
</html>
