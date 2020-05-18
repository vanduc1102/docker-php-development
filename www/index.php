<?php
$conn = mysqli_connect( 'db', 'user', 'test', 'myDb', 3306 );
mysqli_set_charset( $conn, 'utf8' );
$query  = 'SELECT * From Person';
$result = mysqli_query( $conn, $query );
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>PHP INFO</title>
</head>

<body>
	<center>
	<p>
	Connected to MySQL:
	<?php
	while ( $value = $result->fetch_array( MYSQLI_ASSOC ) ) {
		foreach ( $value as $element ) {
			echo ' - ' . $element;
		}
	}
	$result->close();
	mysqli_close( $conn );
	?>
	-
	</p>
	</center>
	<?php
		phpinfo();
	?>
</body>
</html>
