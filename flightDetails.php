<?php
session_start();
try{
    $conn = new PDO('mysql:host=localhost;port=3307;dbname=queensgate-airlines', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $exception)
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}
//the id from the query string e.g. details.php?id=4
// $flightId=$_GET['flight_numbers.flight_num'];
$flightNum = $_GET['flight_num'] ?? null;

//prepared statement uses the id to select a single country
$stmt = $conn->prepare("SELECT * FROM flight_numbers WHERE flight_num = :flight_num");
$stmt->bindValue(':flight_num', $flightNum);
$stmt->execute();
$flight=$stmt->fetch();
$conn=NULL;
?>


<!DOCTYPE HTML>
<html>
<head>
<title>Display the details for a country</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<p><a href="browser.php"><<< Back to Browser</a></p>
<section class="container bg-light">
<?php


if($flight){
	echo "<section style='display:flex; width: 99vw; flex-direction: column; align-items:center; border: 1px solid black;'>
	 <p> Flight Number: {$flight['flight_num']}</p>
	<p> Flight Origin: {$flight['origin']}</p>
	<p> Flight Destination: {$flight['destination']}</p>
	</section>";
}
else
{
	echo "<p>Can't find any records.</p>";
}

?>
</section>
</body>
</html>