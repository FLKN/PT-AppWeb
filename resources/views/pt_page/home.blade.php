<!DOCTYPE html>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>fullPage.js One Page Scroll Sites</title>
	<meta name="author" content="Alvaro Trigo Lopez" />
	<meta name="description" content="fullPage plugin by Alvaro Trigo. Create fullscreen pages fast and simple. One page scroll like iPhone website." />
	<meta name="keywords"  content="fullpage,jquery,alvaro,trigo,plugin,fullscren,screen,full,iphone5,apple" />
	<meta name="Resource-type" content="Document" />


	<link rel="stylesheet" type="text/css" href="/plugins/fullPage/jquery.fullPage.css" />
	
	<script src="/plugins/jQuery/jQuery-2.2.0.min.js"></script>
	<script src="/plugins/jQueryUI/jQquery-ui.min.js"></script>

	<script type="text/javascript" src="/plugins/fullPage/jquery.fullPage.min.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function() {
			$('#fullpage').fullpage({
				sectionsColor: ['#1bbc9b', '#4BBFC3', '#7BAABE', 'whitesmoke', '#ccddff'],
				anchors: ['firstPage', 'secondPage', '3rdPage', '4thpage', 'lastPage'],
				menu: '#menu',
				scrollingSpeed: 1000
			});

		});
	</script>

</head>
<body>



<div id="fullpage">
	<div class="section " id="section0">
		<h1>fullPage.js</h1>
		<p>Create Beautiful Fullscreen Scrolling Websites</p>
		<img src="imgs/fullPage.png" alt="fullPage" />
	</div>
	<div class="section" id="section1">
	    
	    	<div class="intro">
				<h1>Create Sliders</h1>
				<p>Not only vertical scrolling but also horizontal scrolling. With fullPage.js you will be able to add horizontal sliders in the most simple way ever.</p>
				<img src="imgs/slider.png" alt="slider" />
			</div>

	</div>
	<div class="section" id="section2">
		<div class="intro">
			<h1>Example</h1>
			<p>HTML markup example to define 4 sections.</p>
			<img src="imgs/example2.png" alt="example" />
		</div>
	</div>
	<div class="section" id="section3">
		<div class="intro">
			<h1>Working On Tablets</h1>
			<p>
				Designed to fit to different screen sizes as well as tablet and mobile devices.
				<br /><br /><br /><br /><br /><br />
			</p>
		</div>
		<img src="imgs/tablets.png" alt="tablets" />
	</div>
</div>

</body>
</html>
