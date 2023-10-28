<?php 
 session_start();
 include("./classes/dbh.php");

if (isset($_GET['search_origin']) && isset($_GET['search_dest']) && isset($_GET['search_num'])&& isset($_GET['search_date'])){
    $searchTermOrigin = $_GET['search_origin'];
    $searchTermDest = $_GET['search_dest'];
    $searchTermNum = $_GET['search_num'];
    $searchTermDate = $_GET['search_date'];
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
    <!-- stylesheets start -->
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <!-- stylesheets ends -->
    <title>Queensgate Airlines</title>
</head>
<body class="bg-dark">

  <!-- navigation bar starts -->
  <nav class="nav-container mb-5">
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
     <div class="bg-img py-lg-14 py-12 bg-cover padding-hero mb-5 vh-100">
      <!-- title starts -->
      <!-- <h1 class=" display-4 fw-bold  mb-5 flex text-center text-white"> Queens<span class="blue-color">Gate</span> Airlines </h1> -->
      <h6 class=" display-4 fw-bold  flex text-center text-white"> Browser Page </h6>
       <!-- title ends -->
    <!-- container -->
    </div>
 <!-- hero container ends -->

<!-- search starts -->
<div class="container justify-content-center">
        <div class="row">
            <div class="col-md-12">
                <form method="GET" action="browser.php">
                    <div class="input-group mb-3">
                        <input type="text" name="search_origin" value="<?php echo isset($_GET['search_origin']) ? $_GET['search_origin'] : ''; ?>" class="form-control input-text" placeholder="Search departures....">
                        <div class="input-group-append">
                            <button class="btn btn-sm" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </button>
                            <div class="input-group-append">
                            <button class="btn btn-sm" type="reset">
                                Reset
                            </button>
                        </div>
                        </div>
                    <div class="input-group mb-3">
                        <input type="text" name="search_dest" value="<?php echo isset($_GET['search_dest']) ? $_GET['search_dest'] : ''; ?>" class="form-control input-text" placeholder="Search your destination....">
                    <div class="input-group mb-3">
                        <input type="text" name="search_num" value="<?php echo isset($_GET['search_num']) ? $_GET['search_num'] : ''; ?>" class="form-control input-text" placeholder="Search Flight Number....">
                    <div class="input-group mb-3">
                        <input type="date" name="search_date" value="<?php echo isset($_GET['search_date']) ? $_GET['search_date'] : ''; ?>" class="form-control input-text" placeholder="00/00/0000">
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- search ends -->
   
   <!-- table section starts -->
   <section class="container mt-5" >
   <?php
        if (!empty($flights)) {
            // Output the table
            echo "<table style='width: 100%;'>
                    <thead>
                        <tr style='text-align: center; background: white; color:black;'>
                            <th>Flight Date</th>
                            <th>Flight Number</th>
                            <th>Flight Origin</th>
                            <th>Flight Destination</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>";
                    foreach ($flights as $flight) {
                        echo "<tr style='background: black; color:white;'>
                                <td style='text-align: center;'>{$flight['flight_date']}</td>
                                <td style='text-align: center;'>{$flight['flight_num']}</td>
                                <td style='text-align: center;'>{$flight['flight_origin']}</td>
                                <td style='text-align: center;'>{$flight['flight_destination']}</td>
                                <td style='text-align: center;'><a href='flightDetails.php?flight_num={$flight["flight_num"]}'> More </a> </td>
                            </tr>";
                    }
        
                    echo "</tbody></table>";
                } else {
                    echo "<p>No matching flights found.</p>";
                }
                ?>

</section>
 <!-- table section ends -->
    

<!-- bootstrap links starts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- bootstrap links ends -->

</body>
</html>




