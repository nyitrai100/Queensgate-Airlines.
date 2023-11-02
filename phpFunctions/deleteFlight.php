<?php

session_start();
include("../Database/dbh.php");

if (isset($_POST['deleteFlight'])) {
    $flightNumber = $_POST['flight_num'];
    // $aircraftMake = $_POST['aircraft_id'];

    try {
        // Retrieve flight_id from flights table
        $stmt = $conn->prepare("SELECT id FROM flights WHERE flight_num = :flight_num");
        $stmt->bindParam(':flight_num', $flightNumber);
        $stmt->execute();
        $flightId = $stmt->fetchColumn();

        // Delete related records in crew_flight
        $sqlDeleteCrewFlight = "DELETE FROM crew_flight WHERE flight_id = :flight_id";
        $stmtDeleteCrewFlight = $conn->prepare($sqlDeleteCrewFlight);
        $stmtDeleteCrewFlight->bindParam(':flight_id', $flightId);
        $stmtDeleteCrewFlight->execute();
        

        // Delete related records in crew not working
        $sqlDeleteCrew = "DELETE FROM crew WHERE id IN (SELECT crew_id FROM crew_flight WHERE flight_id = :flight_id)";
        $stmtDeleteCrew = $conn->prepare($sqlDeleteCrew);
        $stmtDeleteCrew->bindParam(':flight_id', $flightId);
        $stmtDeleteCrew->execute();
       
        // if ($stmtDeleteCrew->execute()) {
        //     echo "Deletion successful.";
        // } else {
        //     echo "Error deleting crew: " . $stmtDeleteCrew->errorInfo()[2];
        // }

        // Delete from flights table
        $sqlDeleteFlights = "DELETE FROM flights WHERE id = :flight_id";
        $stmtDeleteFlights = $conn->prepare($sqlDeleteFlights);
        $stmtDeleteFlights->bindParam(':flight_id', $flightId);
        $stmtDeleteFlights->execute();

        // Retrieve aircraft_id associated with the flight
        $sqlAircraftId = "SELECT aircraft_id FROM flights WHERE aircraft_id = :flight_id";
        $stmtAircraftId = $conn->prepare($sqlAircraftId);
        $stmtAircraftId->bindParam(':flight_id', $flightId);
        $stmtAircraftId->execute();
        $aircraftId = $stmtAircraftId->fetchColumn();

        // Delete from aircraft table not working
        $sqlDeleteAircraft = "DELETE FROM aircraft WHERE id = :aircraft_id";
        $stmtDeleteAircraft = $conn->prepare($sqlDeleteAircraft);
        $stmtDeleteAircraft->bindParam(':aircraft_id', $flightId);
        $stmtDeleteAircraft->execute();

        // Delete from flight_numbers table
        $sqlDeleteFlightNumbers = "DELETE FROM flight_numbers WHERE flight_num = :flight_num";
        $stmtDeleteFlightNumbers = $conn->prepare($sqlDeleteFlightNumbers);
        $stmtDeleteFlightNumbers->bindParam(':flight_num', $flightNumber);
        $stmtDeleteFlightNumbers->execute();

        echo "<script>alert('Flight deleted successfully.'); window.location.href = '../browser.php';</script>";
        exit;
    } catch (PDOException $exception) {
        echo "Error: " . $exception->getMessage();
    }
}

// Close the database connection
$conn = NULL;

?>
