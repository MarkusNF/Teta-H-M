<!DOCTYPE html>
<html>
<head>
	<title>Outfitmaker</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	<div id="wrapper">
		<div id="header">
			<div id="bar">
				<ul>
					<li>Kassa</li>
					<li>Shoppingbag</li>
					<li>Sverige | SEK</li>
					<li>Mitt H&M</li>
					<li>Logga in</li>
				</ul>
			</div>

			<div id="menu">
				<a href="http://www.hm.com/se/"><img src="img/HM_logo.png" alt="HM logga"></a>
				<ul>
					<li>Överdelar</li>
					<li>Underdelar</li>
					<li>Klänningar</li>
					<li>Skor</li>
					<li>Accesories</li>
				</ul>
			</div>
		</div><!-- #header -->
		<h1>Outfitmaker</h1>

		<div id="clothes">
			<div id="drag1" class="pic"></div> 
			<div id="drag2" class="pic"></div> 
			<div id="drag3" class="pic"></div> 
			<div id="drag4" class="pic"></div> 
			<div id="drag5" class="pic"></div> 
		</div> <!-- end of options -->

		<div id="bed"></div>
		<div id="bin"></div>

		<div class="clearfix"></div>
		
		<select name="categories" id="background">
			<option value="backgroundDefault">Choose background</option>
			<option value="summer">Summer</option>
			<option value="beach">Beach</option>
		</select>

		<div id="sidebar">
			<div class="tips"></div>
			<div class="bloggers"></div>
		</div>

	</div><!-- #wrapper -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
 