<?php 
include("../Database/dbh.php");
$flightNumber = $_POST['flightNumber'];
$aircraftId = $_POST['aircraftMadeBy'];
$flightDate = $_POST['flightDate'];
$crewList = $_POST['crewList'];

try {
    $conn->beginTransaction();

    // Insert into flights table
    $sqlFlights = "INSERT INTO flights (flight_num, aircraft_id, date) 
                         VALUES ('$flightNumber', '$aircraftId', '$flightDate')";
    $conn->exec($sqlFlights);
    $sqlFlights = $conn->lastInsertId();
    
    foreach ($crewList as $crew) {
        $addCrew = "INSERT INTO crew_flight (crew_id,flight_id) VALUES ($crew,$sqlFlights)";
        $conn->exec($addCrew);
    }
    
    $conn->commit();
    echo "<script> window.location.href = '../browser.php';</script>";
    
    exit;

} catch (PDOException $exception) {
    $conn->rollBack();
    echo "Error: " . $exception->getMessage();
}

$conn = NULL;

?>

