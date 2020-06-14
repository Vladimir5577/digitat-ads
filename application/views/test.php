<?php
	echo "<pre>";
	print_r($bla);
	echo "</pre>";
	exit;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>
	<h1>Test</h1>

	<?php
		
		foreach ($bla as $key => $value) {

			echo $value->id . " _/ " . 
					$value->email . " _/ " . 
					$value->name  . " _/ " .
					$value->title . " _/ " .
					$value->description . " _/ " .
					$value->comment .

					" <br> "  ;
		}
		
		

	
	?>

</body>
</html>