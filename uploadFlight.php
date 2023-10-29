<?php 
//   session_start();
//   include("./classes/dbh.php");
 
 // Taking all 5 values from the form data(input)
//  $flightNumber =  $_REQUEST['flightNumber'];
//  $aircraftMadeBy = $_REQUEST['aircraftMadeBy'];
//  $aircraftModel =  $_REQUEST['aircraftModel'];
//  $flightDate = $_REQUEST['flightDate'];
//  $flightOrigin = $_REQUEST['flightOrigin'];
//  $flightDestination = $_REQUEST['flightDestination'];
//  $crewNumbers= $_REQUEST['crewNumbers'];
  
// //  // Performing insert query execution
// //  // here our table name is college
//  $sql = "INSERT INTO flight_numbers  VALUES ('$flightNumber', 
//      '$flightOrigin','$flightDestination')";
  
//  if(mysqli_query($conn, $sql)){
//      echo "<h3>data stored in a database successfully."
//          . " Please browse your localhost php my admin"
//          . " to view the updated data</h3>"; 

//      echo nl2br("\n$first_name\n $last_name\n "
//          . "$gender\n $address\n $email");
//  } else{
//      echo "ERROR: Hush! Sorry $sql. "
//          . mysqli_error($conn);
//  }
  
//  // Close connection
//  mysqli_close($conn);


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

try {
    // Start a transaction
    $conn->beginTransaction();

    // Insert into flight_numbers table
    $sqlFlightNumbers = "INSERT INTO flight_numbers (flight_num, origin, destination) 
                         VALUES ('$flightNumber', '$flightOrigin', '$flightDestination')";
    $conn->exec($sqlFlightNumbers);

    // Insert into flights table without capturing the last insert ID
    $sqlFlights = "INSERT INTO flights (flight_num, date) 
                   VALUES ('$flightNumber', '$flightDate')";
    $conn->exec($sqlFlights);

    // Retrieve the last insert ID for flights
    $lastFlightsId = $conn->lastInsertId();

    // Insert into aircraft table
    $sqlAircraft = "INSERT INTO aircraft (make, model) 
                    VALUES ('$aircraftMadeBy', '$aircraftModel')";
    $conn->exec($sqlAircraft);

    // Retrieve the last insert ID for aircraft
    $lastAircraftId = $conn->lastInsertId();

    // Commit the transaction
    $conn->commit();

    echo "Data inserted successfully.";

} catch (PDOException $exception) {
    // Rollback the transaction if an error occurs
    $conn->rollBack();
    echo "Error: " . $exception->getMessage();
}

// Close the database connection
$conn = NULL;
?>
