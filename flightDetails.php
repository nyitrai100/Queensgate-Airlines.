<?php 
 include("./Database/dbh.php");
 include("header.php");

?>


<?php
$flightNum = $_GET['flight_id'] ?? null;
if (isset($_SESSION['flights'])) {
    $flightRow = null;
    foreach ($_SESSION['flights'] as $storedFlight) {
        if ($storedFlight['flight_id'] == $flightNum) {
            $flightRow = $storedFlight;
            break;
        }
    }
    if ($flightRow) {
        echo "
			<div class='section_our_solution'>
            <div class='row'>
                <div class='col-lg-12 col-md-12 col-sm-12'>
                <div class='our_solution_category'>
                    <div class='solution_cards_box'>
                    <div class='solution_card'>
                        <div class='hover_color_bubble'></div>
                        <div class='so_top_icon'>
                              <svg xmlns='http://www.w3.org/2000/svg' width='40' height='50' fill='currentColor' class='bi bi-journal' viewBox='0 0 16 16'>
                                <path d='M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z'/>
                                <path d='M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z'/>
                            </svg>
                        </div>
                        <div class='solu_title'>
                        <h3>Flight Details</h3>
                        </div>
                        <div class='solu_description'>
                        <p>
                        ID: {$flightRow['flight_id']}<br/>
                        Date: {$flightRow['flight_date']} <br/>
                        Flight Number: {$flightRow['flight_num']}
                        </p>
                        </div>
                    </div>
                    <div class='solution_card'>
                        <div class='hover_color_bubble'></div>
                        <div class='so_top_icon'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='40' height='50' fill='currentColor' class='bi bi-people-fill' viewBox='0 0 16 16'>
                        <path d='M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z'/>
                        </svg>
                        </div>
                        <div class='solu_title'>
                        <h3>Crew Members</h3>
                        </div>
                        <div class='solu_description'>
                        <p>
                        {$flightRow['crew_members']}
                        </p>
                        </div>
                    </div>
                    </div>
                    <!--  -->
                    <div class='solution_cards_box sol_card_top_3'>
                    <div class='solution_card'>
                        <div class='hover_color_bubble'></div>
                        <div class='so_top_icon'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='40' height='50' fill='currentColor' class='bi bi-stoplights' viewBox='0 0 16 16'>
                         <path d='M8 5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm0 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm1.5 2.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z'/>
                            <path d='M4 2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2h2c-.167.5-.8 1.6-2 2v2h2c-.167.5-.8 1.6-2 2v2h2c-.167.5-.8 1.6-2 2v1a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-1c-1.2-.4-1.833-1.5-2-2h2V8c-1.2-.4-1.833-1.5-2-2h2V4c-1.2-.4-1.833-1.5-2-2h2zm2-1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6z'/>
                        </svg>
                        </div>
                        <div class='solu_title'>
                        <h3>Flight Route</h3>
                        </div>
                        <div class='solu_description'>
                        <p>
                        From: {$flightRow['flight_origin']} <br/> 
                        To: {$flightRow['flight_destination']}
                        </p>
                        </div>
                    </div>
                    <div class='solution_card'>
                        <div class='hover_color_bubble'></div>
                        <div class='so_top_icon'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='40' height='50' fill='currentColor' class='bi bi-airplane' viewBox='0 0 16 16'>
                        <path d='M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849Zm.894.448C7.111 2.02 7 2.569 7 3v4a.5.5 0 0 1-.276.447l-5.448 2.724a.5.5 0 0 0-.276.447v.792l5.418-.903a.5.5 0 0 1 .575.41l.5 3a.5.5 0 0 1-.14.437L6.708 15h2.586l-.647-.646a.5.5 0 0 1-.14-.436l.5-3a.5.5 0 0 1 .576-.411L15 11.41v-.792a.5.5 0 0 0-.276-.447L9.276 7.447A.5.5 0 0 1 9 7V3c0-.432-.11-.979-.322-1.401C8.458 1.159 8.213 1 8 1c-.213 0-.458.158-.678.599Z'/>
                      </svg>
                        
                      
                        </div>
                        <div class='solu_title'>
                        <h3>Aircraft Details</h3>
                        </div>
                        <div class='solu_description'>
                        <p>
                            Aircraft make: {$flightRow['aircraft_make']} <br/>
                            Aricraft model: {$flightRow['aircraft_model']}
                        </p>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>";
        } else {
            echo "<p>Can't find any records.</p>";
        }
    } else {
        echo "<p>Session data not found. Please go back and try again.</p>";
    }
    ?>

</body>
</html>
<!-- hkj -->


