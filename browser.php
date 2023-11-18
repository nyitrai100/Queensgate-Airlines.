<?php 
 include("./Database/dbh.php");
 include("./phpFunctions/search.php");
 include("header.php");
?>

 

     <!-- hero container starts -->
     <div class="bg-image-browser py-lg-14 py-12 padding-hero mb-5 ">
      <h6 class=" display-4 fw-bold flex text-center text-black shadow-title2 browser-MT"> Browser Page </h6>
       <div class="container pt-5 browserHeroMarginTop">
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

    <!-- table section starts -->
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
   
   <section class="container mt-5" >
     <?php  if(isset($_SESSION["user"]) && $_SESSION["admin"])
                {echo " <button onclick='openFrom()'> Add a flight</button>";} ?>
     <?php
        if (!empty($flights)) {
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
                <label for="flightNumber">Flight Number</label>
                <select id="flightNumber" name="flightNumber"  required>
                <option value=''>Select </option>
                <?php
                    if (!empty($flight_number_tables)) {
                        foreach ($flight_number_tables as $flight_number_table) {
                                echo "<option value='{$flight_number_table['flight_num']} '>{$flight_number_table['flight_num']}  FROM {$flight_number_table['origin']} TO {$flight_number_table['destination']}</option>";
                        }
                    }
                    ?>
                </select>

            </div>
            <div class="control-from">

                <label for="aircraftMadeBy">Aircraft Made by</label>
                <select id="aircraftMadeBy" name="aircraftMadeBy"  required>
                <option value=''>Select </option>
                <?php
                    if (!empty($flight_aircraft_tables)) {

                        foreach ($flight_aircraft_tables as $flight_aircraft_table) {
                                echo "<option value='{$flight_aircraft_table['id']}'>{$flight_aircraft_table['make']} {$flight_aircraft_table['model']}</option>";
                        }
                    }
                    ?>
                </select>
                    </div>
                    <div class="control-from" id="flightDateForm">
                        <label for="flightDate">Flight Date</label>
                        <input type="date" id="flightDate" name="flightDate" required>
                    </div>
                <div>
            </div>

                <div class="crew-div">
                <label for="crewList">Crew members</label>
                <?php
                        if (!empty($_SESSION['crew'])) {
                            echo "<div class='d-flex flex-wrap'>";
                            foreach ($_SESSION['crew'] as $crew) {
                                    echo "<div class='d-flex'>";
                                    echo "<label for='crewList[]' class='text-light'>$crew[first_name] $crew[last_name] </label>";
                                    echo "<input type='checkbox' class='crewMember' name='crewList[]' value=".$crew['id']." id='$crew[first_name]' />";
                                    echo "</div>";
                            }
                            echo "</div>";
                        }
                        ?>
    
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

<?php
include("footer.php");
?>



