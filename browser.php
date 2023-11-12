<?php 
 session_start();
 include("./Database/dbh.php");
 include("./phpFunctions/search.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap links starts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- bootstrap links ends -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <!-- stylesheets start -->
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <!-- stylesheets ends -->
    <title>Queensgate Airlines</title>
</head>
<body class="browser-body">
    <?php echo "<p class='accountEmailBrowser'>{$_SESSION['user']}</p>"; ?>
          <!-- navigation bar starts -->
          <nav class="nav-container mb-2">
            <ul class="nav justify-content-end">
                <li class="nav-item">
                <a class="nav-link-browser" href="./index.php">Home</a>
                </li>
                <li class="nav-item">
                <?php if(isset($_SESSION["user"]))
                {echo "<a class='nav-link-browser' href='./browser.php'>Browser</a>"; } ?>
                
                </li>
                <li class="nav-item">
                <?php if(isset($_SESSION["user"]))
                {echo "<a class='nav-link-browser' href='./Authentication/logout.php'>Log out</a>"; }
                       else{echo " <a class='nav-link-browser' href='./Authentication/login_process.php' onclick='openLogin()'>Login</a>"; }       ?>           
                </li>
            </ul>
        </nav>
     <!-- navigation bar ends -->

     <!-- hero container starts -->
     <div class="bg-image-browser py-lg-14 py-12 padding-hero mb-5 ">
      <!-- title starts -->
      <h6 class=" display-4 fw-bold flex text-center text-black shadow-title2 browser-MT"> Browser Page </h6>
       <!-- title ends -->
       <div class="container pt-5 browserHeroMarginTop">
        <!-- row -->
            <div class="row align-items-center">
            <div class="col-lg-3 col-12">
                <div>
                <div class="text-center text-md-start ml-5 mt-5">   
                    <p class="lead firstParagraph text-white shadow-title">
                        Browser<br/>
                        Top Flights  to Europe <br/>  
                            with <br/>
                        <span class="text-white shadow-title">QueensGate<br/></span>
                </div>
                </div>
            </div>

            <div class="offset-lg-3 col-lg-6 col-12 text-center">
                <div class="position-relative ">
                <img src="https://images.pexels.com/photos/12717154/pexels-photo-12717154.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" class="img-fluid hero-picture">
                </div>
                </div>
            </div>
        </div>
        </div>
        <!-- hero container ends -->
        <div class="table-section">
        <!-- search starts -->
            <div class="container justify-content-center"> 
            <div class="row">
                <div class="col-md-12">
                    <form method="GET" action="browser.php">
                        <div class="search-container">
                        <div class="input-group mb-3">
                            <input type="text" name="search_origin" value="<?php echo isset($_GET['search_origin']) ? $_GET['search_origin'] : ''; ?>" class="form-control input-text" id="displayDepartures" placeholder="Search flight origin....">
                            <div class="input-group-append">
                                <button class="btn btn-sm iconBorder" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search ">
                                        <circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg>
                                </button>
                                <div class="input-group-append">
                                    <button class="btn btn-sm iconBorder" type="reset">
                                        Reset
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="input-group ">
                            <div class="filter">
                                <p>Filter:</p>    
                            </div>
                            <div class="checkboxes">
                                <label class="destinationCheckbox">Destination
                                    <input type="checkbox" name="destinationCheckbox" id="destinationCheckbox" onclick="display(), disappear()">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="flightNumberCheckbox">Flight Number
                                    <input type="checkbox" name="flightNumberCheckbox" id="flightNumberCheckbox" onclick="display(), disappear()">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="dateCheckbox">Date
                                    <input type="checkbox" name="dateCheckbox" id="dateCheckbox" onclick="display(), disappear()">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="search_dest" value="<?php echo isset($_GET['search_dest']) ? $_GET['search_dest'] : ''; ?>" class="form-control input-text" id="displayDestination" placeholder="Search your destination....">
                            <input type="text" name="search_num" value="<?php echo isset($_GET['search_num']) ? $_GET['search_num'] : ''; ?>" class="form-control input-text" id="displayFlight" placeholder="Search Flight Number....">
                            <input type="date" name="search_date" value="<?php echo isset($_GET['search_date']) ? $_GET['search_date'] : ''; ?>" class="form-control input-text" id="displayDate" placeholder="00/00/0000">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- search ends -->
   

   <!-- table section starts -->
   <section class="container mt-5" >
     <?php  if(isset($_SESSION["user"]) && $_SESSION["admin"])
                {echo " <button onclick='openFrom()'> Add a flight</button>";} ?>
     <?php
        if (!empty($flights)) {
            // Output the table
            echo "<table class='flightTableSize'>
                    <thead>
                        <tr class='flightsTableTitles'>
                            <th>Flight Date</th>
                            <th>Flight Number</th>
                            <th>Flight Origin</th>
                            <th>Flight Destination</th>
                            <th>Details</th>
                           </tr>
                    </thead>
                    <tbody>";
                    foreach ($flights as $flight) {
                        echo "<tr>
                                <td class='flightsTableFlight1'>{$flight['flight_date']}</td>
                                <td class='flightsTableFlight2'>{$flight['flight_num']}</td>
                                <td class='flightsTableFlight3'>{$flight['flight_origin']}</td>
                                <td class='flightsTableFlight4'>{$flight['flight_destination']}</td>
                                <td class='flightsTableFlight5'><a href='flightDetails.php?flight_num={$flight["flight_num"]}'> More </a> </td>
                                </tr>";
                    }
        
                    echo "</tbody></table>";
                } else {
                    echo "<p>No matching flights found.</p>";
                }
         ?>

<!-- form starts -->   
<div class="wrapper" id="upload-display">
    <div class="d-flex align-items-start">
        <span class="close-btn text-white p-1 cursor-pointer" onclick="closeForm()">&times;</span>
    </div>
    <div class="form">
        <form action="./phpFunctions/uploadFlight.php" class="myform" method="post">
            <h1 class="title">Upload a flight</h1></br>
            <div class="control-from">
                <!-- <label for="flightNumber">Flight Number</label>
                <input type="text" id="flightNumber" name="flightNumber" value="" required> -->

                <label for="flightNumber">Flight Number</label>
                <select id="flightNumber" name="flightNumber"  required>
                <option value=''>Select </option>
                <?php
                    if (!empty($flights)) {
                        $uniqueFlightNumbers = array();

                        foreach ($flights as $flight) {
                            $flightNumber = trim($flight['flight_num']);

                            if (!in_array($flightNumber, $uniqueFlightNumbers)) {
                                echo "<option value='1'>{$flightNumber}</option>";
                                $uniqueFlightNumbers[] = $flightNumber;
                            }
                        }
                    }
                    ?>
                </select>

            </div>
            <div class="control-from">
                <!-- <label for="aircraftMadeBy">Aircraft Made by</label>
                <input type="text" id="aircraftMadeBy" name="aircraftMadeBy" value="" required> -->

                <label for="aircraftMadeBy">Aircraft Made by</label>
                <select id="aircraftMadeBy" name="aircraftMadeBy"  required>
                <option value=''>Select </option>
                <?php
                    if (!empty($flights)) {
                        $uniqueAircraftMakes = array();

                        foreach ($flights as $flight) {
                            $aircraftMake = trim($flight['aircraft_make']);

                            if (!in_array($aircraftMake, $uniqueAircraftMakes)) {
                                echo "<option value='1'>{$aircraftMake}</option>";
                                $uniqueAircraftMakes[] = $aircraftMake;
                            }
                        }
                    }
                    ?>
                </select>


            </div>
            <div class="control-from">
                <!-- <label for="aircraftModel">Aircraft Model</label>
                <input type="text" id="aircraftModel" name="aircraftModel" value="" required> -->

                <label for="aircraftModel">Aircraft Model</label>
                <select id="aircraftModel" name="aircraftModel"  required>
                <option value=''>Select </option>
                <?php
                        if (!empty($flights)) {
                            $uniqueAircraftModels = array();

                            foreach ($flights as $flight) {
                                $aircraftModel = trim($flight['aircraft_model']);

                                if (!in_array($aircraftModel, $uniqueAircraftModels)) {
                                    echo "<option value='1'>{$aircraftModel}</option>";
                                    $uniqueAircraftModels[] = $aircraftModel;
                                }
                            }
                        }
                 ?>
                        </select>
                
            </div>
            <div class="control-from" id="flightDateForm">
                <label for="flightDate">Flight Date</label>
                <input type="date" id="flightDate" name="flightDate" value="" required>
            </div>
            <div class="control-from">
                <!-- <label for="flightOrigin">Flight Origin</label>
                <input type="text" id="flightOrigin" name="flightOrigin" value="" required> -->

                <label for="flightOrigin">Flight origin</label>
                <select id="flightOrigin" name="flightOrigin"  required>
                <option value=''>Select </option>
                <?php
                        if (!empty($flight_number_tables)) {
                            $uniqueOrigins = array();

                            foreach ($flight_number_tables as $flight_number_table) {
                                $origin = trim($flight_number_table['origin']);

                                if (!in_array($origin, $uniqueOrigins)) {
                                    echo "<option value='1'>{$origin}</option>";
                                    $uniqueOrigins[] = $origin;
                                }
                            }
                        }
                        ?>
                </select>

            </div>
            <div class="control-from">
                <!-- <label for="flightDestination">Flight Destination</label>
                <input type="text" id="flightDestination" name="flightDestination" value="" required> -->
                <label for="flightDestination">Flight Destination</label>
                <select id="flightDestination" name="flightDestination"  required>
                <option value=''>Select </option>
                <?php
                if (!empty($flight_number_tables)) {
                    $uniqueDestinations = array();
                
                    foreach ($flight_number_tables as $flight_number_table) {
                        $destination = trim($flight_number_table['destination']);
                
                        if (!in_array($destination, $uniqueDestinations)) {
                            echo "<option value='1'> {$destination}</option>";
                            $uniqueDestinations[] = $destination;
                        }
                    }
                }
                ?>
                </select>
            </div>
            <div class="full-width">
                <label for="crewNumbers">Crew Number</label>
                <select id="crewNumbers" name="crewNumbers" onchange="updateCrewMembers()"  required>
                <option value=''>Select </option>
                <?php
                    if (!empty($flights)) {  foreach ($flights as $flight) {
                    
                        echo "<option value='1'> {$flight['crew_members']}</option>";
                    }} ?>
                </select>

            </div>
            <div class="button">
                <button id="register">Submit</button>
            </div>
        </form>
    </div>
</div>
<!-- form ends -->

    </section>
 <!-- table section ends -->
 </div>

<!-- bootstrap links starts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- bootstrap links ends -->
<script src="./jsFunctions/formPopUp.js"></script>
<script src="./jsFunctions/search.js"> </script>
<script src="./jsFunctions/uploadForm.js"> </script>
</body>
</html>




