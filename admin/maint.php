<!DOCTYPE html>
<html>
<head>
	<title>Maintenance...</title>
</head>
<body>
	<?php 
	if (isset($_GET['cd']) AND $_GET['cd'] == 1) {
file_put_contents('../maintenance.txt', 'Maintenance en cours ...');
header ('Location: index.php');
	}elseif (isset($_GET['cd']) AND $_GET['cd'] == 0) {
		if(!file_exists("maintenance.txt"));
		unlink("../maintenance.txt");
		header ('Location: index.php');
	}
	?>
</body>
</html>