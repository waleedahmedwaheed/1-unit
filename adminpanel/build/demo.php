<?php require_once('../../Connections/dbconfig.php'); ?>
<html>
<head>
	<title>Demo 1 : Convert All Textareas</title>
</head>
<body>


<div id="sample">
<script type="text/javascript" src="js/nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>


<h4>Third Textarea</h4>
<textarea name="area3" style="width: 300px; height: 100px;">
	HTML <b>content</b> <i>default</i> in textarea
</textarea>
</div>

</body>
</html>