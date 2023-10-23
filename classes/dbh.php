
<?php
session_start();

try {
    $conn = new PDO('mysql:host=localhost;port=3307;dbname=queensgate-airlines', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //connect the tables together and make groups.
    $flightTable = "SELECT flights.id AS flight_id,
                            flights.flight_num,
                            aircraft.make AS aircraft_make,
                            aircraft.model AS aircraft_model,
                            flights.date AS flight_date,
                            flight_numbers.origin AS flight_origin,
                            flight_numbers.destination AS flight_destination, 
                            GROUP_CONCAT(' ', crew.first_name, ' ', crew.last_name, ' ') AS crew_members
                             FROM
                            flights
                          INNER JOIN flight_numbers ON flights.flight_num = flight_numbers.flight_num
                          INNER JOIN aircraft ON aircraft.id = flights.aircraft_id
                             INNER JOIN crew_flight ON crew_flight.flight_id = flights.id
                             INNER JOIN crew ON crew.id = crew_flight.crew_id
                             GROUP BY
                            flights.id, flights.flight_num, aircraft.make, aircraft.model, flights.date,
                            flight_numbers.origin, flight_numbers.destination";

    $flightsDetails = $conn->query($flightTable);
    $flights = $flightsDetails->fetchAll();

    // Storing $flights in a session variable
    $_SESSION['flights'] = $flights;

    $conn = NULL; // Close the database connection
    echo "success"; 
    } 
    catch (PDOException $exception) {
    echo "Oh no, there was a problem" . $exception->getMessage();
    }
?>

