
<?php 

$searchTermDest = "";
$searchTermNum = "";
$searchTermDate = "";

if (isset($_GET['search_origin']) && isset($_GET['search_dest']) && isset($_GET['search_num']) && isset($_GET['search_date'])) {
    $searchTermOrigin = $_GET['search_origin'];
    
    if (isset($_GET['destinationCheckbox'])) {
        $searchTermDest = $_GET['search_dest'];
    }
    
    if (isset($_GET['flightNumberCheckbox'])) {
        $searchTermNum = $_GET['search_num'];
    }
    
    if (isset($_GET['dateCheckbox'])) {
        $searchTermDate = $_GET['search_date'];
    }

    $filteredFlights = array_filter($_SESSION['flights'], function ($flight) use ($searchTermOrigin, $searchTermDest, $searchTermNum, $searchTermDate) {
        return 
            stripos($flight['flight_origin'], $searchTermOrigin) !== false &&
            stripos($flight['flight_destination'], $searchTermDest) !== false &&
            stripos($flight['flight_num'], $searchTermNum) !== false &&
            stripos($flight['flight_date'], $searchTermDate) !== false;
    });

    $flights = $filteredFlights;
} else {
    $flights = $_SESSION['flights'];
}
?>
