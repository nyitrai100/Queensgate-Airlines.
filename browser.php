<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap links starts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- bootstrap links ends -->
    <!-- stylesheets start -->
    <link rel="stylesheet" href="./style.css">
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
                <a class="nav-link" href="./browser.php">Browser</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#" onclick="openLogin()">Login</a>
                </li>
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
    <!-- <div class="container pt-5 mt-5"> 
        <div class="offset-lg-1 col-lg-7 col-12 text-center">
            <div class="position-relative ">
                <img src="https://images.unsplash.com/photo-1610642372651-fe6e7bc209ef?auto=format&fit=crop&q=80&w=2940&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="img-fluid hero-picture">
            </div>
            </div>
        </div> -->
    </div>
 <!-- hero container ends -->

<!-- search starts -->
<div class="container justify-content-center">
    <div class="row">
        <div class="col-md-12">
            <form method="GET" action=""> 
                <div class="input-group mb-3">
                    <input type="text" name="query" class="form-control input-text"  placeholder="Search your flight....">
                    <div class="input-group-append">
                        <button class="btn  btn-sm" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                <circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- search ends -->
   
   <!-- table section starts -->
   <section class="container mt-5" >
    <?php
    
    session_start();
    if (isset($_SESSION['flights'])) {
        $flights = $_SESSION['flights'];

        // Output the table
        echo "<table >
                <thead>
                    <tr style='text-align: center; background: white; color:black;'>
                        <th>Flight ID</th>
                        <th>Flight Number</th>
                        <th>Aircraft Make</th>
                        <th>Aircraft Model</th>
                        <th>Flight Date</th>
                        <th>Flight Origin</th>
                        <th>Flight Destination</th>
                        <th>Crew Members</th>
                        <th style='width:80px;'> Details</th>
                    </tr>
                </thead>
                <tbody>";

        if ($flights) {
            foreach ($flights as $flight) {
                echo "<tr style='background: black; color:white;'>
                        <td style='text-align: center;'>{$flight['flight_id']}</td>
                        <td style='text-align: center;'>{$flight['flight_num']}</td>
                        <td style='text-align: center;'>{$flight['aircraft_make']}</td>
                        <td style='text-align: center;'>{$flight['aircraft_model']}</td>
                        <td style='text-align: center;width:120px;'>{$flight['flight_date']}</td>
                        <td style='width:150px;'>{$flight['flight_origin']}</td>
                        <td style='width:150px;'>{$flight['flight_destination']}</td>
                        <td>{$flight['crew_members']}</td>
                        <td style='text-align: center;'><a href="."> More </a> </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No flights found.</td></tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "No data available.";
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




