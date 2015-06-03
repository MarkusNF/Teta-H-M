<!DOCTYPE html>
<html>
<head>
	<title>Outfitmaker</title>
	<meta charset="UTF-8" />

	<style>
	#makeMeDraggable { 
		width: 100px; 
		height: 100px; 
		background: red;
		}

	#content {
		width: 100%;
		height: 100%;
		margin: auto;
		border: solid black;
	}
	</style>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
 
	<script type="text/javascript">
 
	$( init );
 
	function init() {
  	$('#makeMeDraggable').draggable( {
    		containment: '#content',
    		cursor: 'move',
    		snap: '#content'
  		});
	}
 
</script>

</head>

<body>
	<h1>Outfitmaker</h1>
	<div id="content" style="height: 400px;">
  		<div id="makeMeDraggable"> </div>
	</div>

</body>
</html>
 