<?php 
include("../Database/dbh.php");

// Taking all values from the form data(input)
$flightNumber = $_POST['flightNumber'];
$aircraftId = $_POST['aircraftMadeBy'];
$flightDate = $_POST['flightDate'];
$crewList = $_POST['crewList'];

try {
    // Start a transaction
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
    

    // Commit the transaction
    $conn->commit();
    echo "<script> window.location.href = '../browser.php';</script>";
    
    exit;

} catch (PDOException $exception) {
    // Rollback the transaction if an error occurs
    $conn->rollBack();
    echo "Error: " . $exception->getMessage();
}

// Close the database connection
$conn = NULL;



?>

