
<?php

// try{
//     $conn = new PDO('mysql:host=localhost;port=3307;dbname=queensgate-airlines', 'root', '');
// 	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
//     echo "success";
// }
// catch (PDOException $exception)
// {
// 	echo "Oh no, there was a problem" . $exception->getMessage();
// }

// // connect together all table;
// $flightTable = "SELECT * FROM flights 
//                 INNER JOIN flight_numbers ON flights.flight_num = flight_numbers.flight_num 
//                 INNER JOIN aircraft ON aircraft.id = flights.aircraft_id
//                 INNER JOIN crew_flight ON crew_flight.flight_id = flights.id
//                 INNER JOIN crew ON crew.id = crew_flight.crew_id";

// $flightsDetails = $conn->query($flightTable);
// $flights = $flightsDetails->fetchAll();
// $conn = NULL;
// echo "<table border='1'>";
// echo "<tr>
//         <th>ID</th>
//         <th>Flight Number</th>
//         <th>Origin</th>
//         <th> Destination</th>
//         <th>Date</th>
//         <th>Aircraft Make</th>
//         <th>Aircraft Model</th>
//         <th>Crew Member First Name</th>
//         <th>Crew Member Last Name</th>
//       </tr>";

// if ($flights) {
//     foreach ($flights as $flight) {
//         echo "<tr>";
//         echo "<td>{$flight['id']}</td>";
//         echo "<td>{$flight['flight_num']}</td>";
//         echo "<td>{$flight['origin']}</td>";
//         echo "<td>{$flight['destination']}</td>";
//         echo "<td>{$flight['date']}</td>";
//         echo "<td>{$flight['make']}</td>";
//         echo "<td>{$flight['model']}</td>";
//         echo "<td>{$flight['first_name']}</td>";
//         echo "<td>{$flight['last_name']}</td>";
//         echo "</tr>";
//     }
// } else {
//     echo "<tr><td colspan='8'>No flights found.</td></tr>";
// }

// echo "</table>";


session_start();

try {
    $conn = new PDO('mysql:host=localhost;port=3307;dbname=queensgate-airlines', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Your query code
    $flightTable = "SELECT * FROM flights 
                    INNER JOIN flight_numbers ON flights.flight_num = flight_numbers.flight_num 
                    INNER JOIN aircraft ON aircraft.id = flights.aircraft_id
                    INNER JOIN crew_flight ON crew_flight.flight_id = flights.id
                    INNER JOIN crew ON crew.id = crew_flight.crew_id";

    $flightsDetails = $conn->query($flightTable);
    $flights = $flightsDetails->fetchAll();

    // Storing $flights in a session variable
    $_SESSION['flights'] = $flights;

    $conn = NULL; // Close the database connection
    echo "success";
} catch (PDOException $exception) {
    echo "Oh no, there was a problem" . $exception->getMessage();
}
?>



