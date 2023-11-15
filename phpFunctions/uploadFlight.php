<?php 
session_start();
include("../Database/dbh.php");

// Taking all values from the form data(input)
$flightNumber = $_REQUEST['flightNumber'];
$aircraftId = $_REQUEST['aircraftMadeBy'];
$flightDate = $_REQUEST['flightDate'];


try {
    // Start a transaction
    $conn->beginTransaction();

    // Insert into flights table
    $sqlFlights = "INSERT INTO flights (flight_num, aircraft_id, date) 
                         VALUES ('$flightNumber', '$aircraftId', '$flightDate')";
    $conn->exec($sqlFlights);
    $sqlFlights = $conn->lastInsertId();
    
    for ($i = 0; $i <=4 ; $i++){
        $addCrew = "INSERT INTO crew_flight (crew_id,flight_id) VALUES ($i,$sqlFlights)";
        $conn->exec($addCrew);
    }
    

    // Commit the transaction
    $conn->commit();
    echo "<script>alert($sqlFlights) </script>";
    echo "<script>alert('Data inserted successfully.'); window.location.href = '../browser.php';</script>";
    
    exit;

} catch (PDOException $exception) {
    // Rollback the transaction if an error occurs
    $conn->rollBack();
    echo "Error: " . $exception->getMessage();
}

// Close the database connection
$conn = NULL;



?>

