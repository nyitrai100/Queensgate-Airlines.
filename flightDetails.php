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
session_start();
$flightNum = $_GET['flight_num'] ?? null;
if (isset($_SESSION['flights'])) {
    $flight = null;
    foreach ($_SESSION['flights'] as $storedFlight) {
        if ($storedFlight['flight_num'] == $flightNum) {
            $flight = $storedFlight;
            break;
        }
    }
    if ($flight) {
        echo "
			<section style='display:flex; width: 100vw; flex-direction: column; align-items:center; justify-content:center; height:100vh; '>
			<table style='width: 70vw; border: 1px solid black;'>
                <thead>
                    <tr style='text-align: center; background: white; color:black;'>
                        <th>Flight ID</th>
                        <th>Flight Number</th>
                        <th>Flight Origin</th>
                        <th>Flight Destination</th>
                        <th>Aircraft Make</th>
                        <th>Aircraft Model</th>
                        <th>Flight Date</th>
                        <th>Crew Members</th>
                    </tr>
                </thead>
                <tbody>
				<tr  style='background: black; color:white;'>
				<td style='text-align: center;'>{$flight['flight_id']}</td>
				<td style='text-align: center;'>{$flight['flight_num']}</td>
				<td style='text-align: center;'>{$flight['flight_origin']}</td>
				<td style='text-align: center;'>{$flight['flight_destination']}</td>
				<td style='text-align: center;'>{$flight['aircraft_make']}</td>
				<td style='text-align: center;'>{$flight['aircraft_model']}</td>
				<td style='text-align: center;'>{$flight['flight_date']}</td>
				<td style='text-align: center;'>{$flight['crew_members']}</td>
				</tr>
            </section>";
    } else {
        echo "<p>Can't find any records.</p>";
    }
} else {
    echo "<p>Session data not found. Please go back and try again.</p>";
}
?>

</section>
</body>
</html>



