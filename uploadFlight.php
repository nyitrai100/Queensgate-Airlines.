<?php 
session_start();
include("./classes/dbh.php");

// Taking all values from the form data(input)
$flightNumber = $_REQUEST['flightNumber'];
$aircraftMadeBy = $_REQUEST['aircraftMadeBy'];
$aircraftModel = $_REQUEST['aircraftModel'];
$flightDate = $_REQUEST['flightDate'];
$flightOrigin = $_REQUEST['flightOrigin'];
$flightDestination = $_REQUEST['flightDestination'];

$crewNumbers = $_REQUEST['crewNumbers'];
$crewMembers = array(); // Create an array to store crew members' names

for ($i = 0; $i < $crewNumbers; $i++) {
    $crewMembers[] = array(
        'firstName' => $_REQUEST['firstName' . ($i + 1)],
        'lastName' => $_REQUEST['lastName' . ($i + 1)]
    );
}

try {
    // Start a transaction
    $conn->beginTransaction();

    // Insert into flight_numbers table
    $sqlFlightNumbers = "INSERT INTO flight_numbers (flight_num, origin, destination) 
                         VALUES ('$flightNumber', '$flightOrigin', '$flightDestination')";
    $conn->exec($sqlFlightNumbers);

    // Insert into aircraft table
    $sqlAircraft = "INSERT INTO aircraft (make, model) 
                    VALUES ('$aircraftMadeBy', '$aircraftModel')";
    $conn->exec($sqlAircraft);

    // Retrieve the last insert ID for aircraft
    $lastAircraftId = $conn->lastInsertId();

    // Insert into flights table with capturing the last insert ID for aircraft
    $sqlFlights = "INSERT INTO flights (flight_num, aircraft_id, date) 
                   VALUES ('$flightNumber', '$lastAircraftId', '$flightDate')";
    $conn->exec($sqlFlights);

    // Retrieve the last insert ID for flights
    $lastFlightsId = $conn->lastInsertId();

    // Insert into crew table for each crew member
    foreach ($crewMembers as $crewMember) {
        $sqlCrew = "INSERT INTO crew (first_name, last_name) 
                    VALUES ('{$crewMember['firstName']}', '{$crewMember['lastName']}')";
        $conn->exec($sqlCrew);

        // Retrieve the last insert ID for crew
        $lastCrewId = $conn->lastInsertId();

        // Insert into crew_flight table
        $sqlCrewFlight = "INSERT INTO crew_flight (crew_id, flight_id) 
                          VALUES ('$lastCrewId', '$lastFlightsId')";
        $conn->exec($sqlCrewFlight);
    }



    // Commit the transaction
    $conn->commit();
    echo "<script>alert('Data inserted successfully.'); window.location.href = './browser.php';</script>";
    exit;

} catch (PDOException $exception) {
    // Rollback the transaction if an error occurs
    $conn->rollBack();
    echo "Error: " . $exception->getMessage();
}

// Close the database connection
$conn = NULL;

?>
