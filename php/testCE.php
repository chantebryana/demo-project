<!DOCTYPE html>
<html>
    <head>
		<title>A Headache with Pictures in It!</title>
	</head>
	<body>
		<?php
		
		
		
		echo "<pre><code>" . htmlspecialchars(ob_get_contents()) . "</code></pre>";
		?>
	</body>
</html>