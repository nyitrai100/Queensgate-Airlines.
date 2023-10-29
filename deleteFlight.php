<?php
session_start();
include("./classes/dbh.php");

if (isset($_POST['deleteFlight'])) {
    $flightNumber = $_POST['flight_num'];

    try {
        // Retrieve flight_id from flights table
        $stmt = $conn->prepare("SELECT id FROM flights WHERE flight_num = :flight_num");
        $stmt->bindParam(':flight_num', $flightNumber);
        $stmt->execute();
        $flightId = $stmt->fetchColumn();

        // Delete related records in crew_flight
        $sqlDeleteCrewFlight = "DELETE FROM crew_flight WHERE flight_id = :flight_id";
        $stmt = $conn->prepare($sqlDeleteCrewFlight);
        $stmt->bindParam(':flight_id', $flightId);
        $stmt->execute();

        // Delete related records in crew not working
        $sqlDeleteCrew = "DELETE FROM crew WHERE id IN (SELECT crew_id FROM crew_flight WHERE flight_id = :flight_id)";
        $stmt = $conn->prepare($sqlDeleteCrew);
        $stmt->bindParam(':flight_id', $flightId);
        $stmt->execute();

        // Delete from flights table
        $sqlDeleteFlights = "DELETE FROM flights WHERE flight_num = :flight_num";
        $stmt = $conn->prepare($sqlDeleteFlights);
        $stmt->bindParam(':flight_num', $flightNumber);
        $stmt->execute();

        // Delete from aircraft table not wokring
        $sqlDeleteAircraft = "DELETE FROM aircraft WHERE id IN (SELECT aircraft_id FROM flights WHERE id = :flight_id)";
        $stmt = $conn->prepare($sqlDeleteAircraft);
        $stmt->bindParam(':flight_id', $flightId);
        $stmt->execute();

        // Delete from flight_numbers table
        $sqlDeleteFlightNumbers = "DELETE FROM flight_numbers WHERE flight_num = :flight_num";
        $stmt = $conn->prepare($sqlDeleteFlightNumbers);
        $stmt->bindParam(':flight_num', $flightNumber);
        $stmt->execute();

        echo "<script>alert('Flight deleted successfully.'); window.location.href = './browser.php';</script>";
        exit;
    } catch (PDOException $exception) {
        echo "Error: " . $exception->getMessage();
    }
}

// Close the database connection
$conn = NULL;
?>
