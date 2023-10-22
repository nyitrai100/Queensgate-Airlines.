
<?php



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

