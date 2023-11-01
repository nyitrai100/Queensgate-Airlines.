<?php 
 session_start();
 include("./classes/dbh.php");

if (isset($_GET['search_origin']) && isset($_GET['search_dest']) && isset($_GET['search_num'])&& isset($_GET['search_date'])){
    $searchTermOrigin = $_GET['search_origin'];
    if(isset($_GET['destinationCheckbox'])){
        $searchTermDest = $_GET['search_dest'];
    }
   if(isset($_GET['flightNumberCheckbox'])){
    $searchTermNum = $_GET['search_num'];
   }
   if(isset($_GET['dateCheckbox'])){
    $searchTermDate = $_GET['search_date'];
   }

    $filteredFlights = array_filter($_SESSION['flights'],function ($flight) use ($searchTermOrigin, $searchTermDest, $searchTermNum, $searchTermDate){
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
<body>
<?php echo "<p class='accountEmail'>{$_SESSION['user']}</p>"; ?>
          <!-- navigation bar starts -->
          <nav class="nav-container mb-2">
            <ul class="nav justify-content-end">
                <li class="nav-item">
                <a class="nav-link" href="./index.php">Home</a>
                </li>
                <li class="nav-item">
                <?php if(isset($_SESSION["user"]))
                {echo "<a class='nav-link' href='./browser.php'>Browser</a>"; } ?>
                
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                <?php if(isset($_SESSION["user"]))
                {echo "<a class='nav-link' href='logout.php'>Log out</a>"; }
                       else{echo " <a class='nav-link' href='#' onclick='openLogin()'>Login</a>"; }       ?>           
                </li>
                <!-- <li class="nav-item">
                <a class="nav-link" href="#" onclick="openLogin()">Login</a>
                
                </li> -->
            </ul>
        </nav>
     <!-- navigation bar ends -->

     <!-- hero container starts -->
     <div class="bg-image-browser py-lg-14 py-12 bg-cover padding-hero mb-5 ">
      <!-- title starts -->
      <h6 class=" display-4 fw-bold  flex text-center text-black shadow-title2"> Browser Page </h6>
       <!-- title ends -->
       <div class="container pt-5 mt-5">
     
 
     <!-- row -->
     <div class="row align-items-center">
       <div class="col-lg-3 col-12">
         <div>
           <div class="text-center text-md-start ">
               
             <p class="lead firstParagraph text-white shadow-title"> Browser<br/>
                                                         Top Flights  to Europe <br/>  
                                                             with <br/>
                                                        <span class="text-white shadow-title">OueensGate<br/></span>
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
                    <input type="text" name="search_origin" value="<?php echo isset($_GET['search_origin']) ? $_GET['search_origin'] : ''; ?>" class="form-control input-text" id="displayDepartures" placeholder="Search departures....">
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
    <!-- Add a flight starts -->
    <?php  if(isset($_SESSION["user"]) && $_SESSION["admin"])
                {echo " <button onclick='openFrom()'> Add a flight</button>";} ?>
    <!-- Add a flight ends -->
   <?php
        if (!empty($flights)) {
            // Output the table
            echo "<table style='width: 100%;'>
                    <thead>
                        <tr class='flightsTableTitles'>
                            <th>Flight Date</th>
                            <th>Flight Number</th>
                            <th>Flight Origin</th>
                            <th>Flight Destination</th>
                            <th>Details</th>";
                            if(isset($_SESSION["user"]) && $_SESSION["admin"])
                            {echo " <th> Delete </th>";} 
                        echo"</tr>
                    </thead>
                    <tbody>";
                    foreach ($flights as $flight) {
                        echo "<tr style='background: black; color:white;'>
                                <td class='flightsTableFlight1'>{$flight['flight_date']}</td>
                                <td class='flightsTableFlight2'>{$flight['flight_num']}</td>
                                <td class='flightsTableFlight3'>{$flight['flight_origin']}</td>
                                <td class='flightsTableFlight4'>{$flight['flight_destination']}</td>
                                <td class='flightsTableFlight5'><a href='flightDetails.php?flight_num={$flight["flight_num"]}'> More </a> </td>";
                                if (isset($_SESSION["user"]) && $_SESSION["admin"]) {
                                    echo "<td class='flightsTableFlight6'>
                                            <form action='deleteFlight.php' method='post'>
                                                <input type='hidden' name='flight_num' value='{$flight["flight_num"]}'>
                                                <button type='submit' name='deleteFlight'>Delete</button>
                                            </form>
                                          </td>";
                                }
                                echo"</tr>";
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
        <form action="uploadFlight.php" class="myform" method="post">
            <h1 class="title">Upload a flight</h1></br>
            <div class="control-from">
                <label for="flightNumber">Flight Number</label>
                <input type="text" id="flightNumber" name="flightNumber" value="" required>
            </div>
            <div class="control-from">
                <label for="aircraftMadeBy">Aircraft Made by</label>
                <input type="text" id="aircraftMadeBy" name="aircraftMadeBy" value="" required>
            </div>
            <div class="control-from">
                <label for="aircraftModel">Aircraft Model</label>
                <input type="text" id="aircraftModel" name="aircraftModel" value="" required>
            </div>
            <div class="control-from">
                <label for="flightDate">Flight Date</label>
                <input type="date" id="flightDate" name="flightDate" value="" required>
            </div>
            <div class="control-from">
                <label for="flightOrigin">Flight Origin</label>
                <input type="text" id="flightOrigin" name="flightOrigin" value="" required>
            </div>
            <div class="control-from">
                <label for="flightDestination">Flight Destination</label>
                <input type="text" id="flightDestination" name="flightDestination" value="" required>
            </div>
            <div class="full-width">
                <label for="crewNumbers">Crew Number</label>
                <select id="crewNumbers" name="crewNumbers" onchange="updateCrewMembers()">

                    <option value="0">Unknown</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                    <option value="4">Four</option>
                </select>
                <div class="pt-5" id="crewMembersContainer">
                </div>
            </div>
            <div class="button">
                <button id="register">Submit</button>
            </div>
        </form>
    </div>
</div>

<!-- create dinamically the inputs for crew members -->
<script>
    function updateCrewMembers() {
    var crewNumbers = document.getElementById("crewNumbers").value;
    var crewMembersContainer = document.getElementById("crewMembersContainer");
    crewMembersContainer.innerHTML = ""; 
    for (var i = 0; i < crewNumbers; i++) {
    var crewDiv = document.createElement("div");
    crewDiv.id = "crewdiv" + (i + 1);

    // First Name
    var firstNameLabel = document.createElement("label");
    firstNameLabel.textContent = (i + 1) + " Crew " + "First Name ";
    var firstNameInput = document.createElement("input");
    firstNameInput.type = "text";
    firstNameInput.id = "firstName" + (i + 1);
    firstNameInput.name = "firstName" + (i + 1);
    firstNameInput.required = true;

    // Append first name elements to crewDiv
    crewDiv.appendChild(firstNameLabel);
    crewDiv.appendChild(firstNameInput);

    // Last Name
    var lastNameLabel = document.createElement("label");
    lastNameLabel.textContent = (i + 1) + " Last Name ";
    var lastNameInput = document.createElement("input");
    lastNameInput.type = "text";
    lastNameInput.id = "lastName" + (i + 1);
    lastNameInput.name = "lastName" + (i + 1);
    lastNameInput.required = true;

    // Append last name elements to crewDiv
    crewDiv.appendChild(lastNameLabel);
    crewDiv.appendChild(lastNameInput);

    // Append crewDiv to crewMembersContainer
    crewMembersContainer.appendChild(crewDiv);
}

}


</script>
<!-- create dinamic search inputs -->

<script>
    // Display the input field
    function display() {
        if (document.getElementById('destinationCheckbox').checked == true) {
            document.getElementById('displayDestination').style.display = 'flex';
        }
        if (document.getElementById('flightNumberCheckbox').checked == true) {
            document.getElementById('displayFlight').style.display = 'flex';
        }
        if (document.getElementById('dateCheckbox').checked == true) {
            document.getElementById('displayDate').style.display = 'flex';
        }

    }

    // Disappear the input field
    function disappear() {
        if (document.getElementById('destinationCheckbox').checked == false) {
            document.getElementById('displayDestination').style.display = 'none';
        }
        if (document.getElementById('flightNumberCheckbox').checked == false) {
            document.getElementById('displayFlight').style.display = 'none';
        }
        if (document.getElementById('dateCheckbox').checked == false) {
            document.getElementById('displayDate').style.display = 'none';
        }
    }
    function refreshPage() {
        location.reload(true); // Passing true forces a reload from the server, not the cache
    }
</script>

<!-- form ends -->

    </section>
 <!-- table section ends -->
 </div>

<!-- bootstrap links starts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- bootstrap links ends -->
<script src="./formPopUp.js"></script>
</body>
</html>




