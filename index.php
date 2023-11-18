<?php 
  include("./Database/dbh.php");
  include("header.php");
?>


    <div class="bg-img py-lg-14 py-12 bg-cover padding-hero ">
      <!-- title starts -->
      <h1 class=" display-4 fw-bold  mb-5 flex text-center text-white shadow-title index-MT"> QueensGate Airlines </h1>
       <!-- title ends -->
    <!-- container -->
    <div class="container pt-5 mt-5">
      <!-- row -->
      <div class="row align-items-center">
        <div class="col-lg-4 col-12">
          <div>
            <div class="text-center text-md-start ">
                
              <p class="lead text-black firstParagraph "> Explore<br/> Top Flights  to Europe <br/> <span class="text-black">with</span> <br/>Our Platform<br/></p>
            </div>
          </div>
        </div>
        <div class="offset-lg-2 col-lg-6 col-12 text-center">
            <div class="position-relative ">
                <img src="https://images.pexels.com/photos/1004584/pexels-photo-1004584.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" class="img-fluid hero-picture">
            </div>
            </div>
      </div>
    </div>
  </div>
       <!-- login starts -->
  <div class="container login" id="login-div">
    <div class="row">
      <div class="col-md-6"> 
        <div class="card"> 
          <form action="./Authentication/login_process.php" method="post" class="box">
            <div class="d-flex justify-content-between align-items-center">
              <span class="close-btn text-white p-2 cursor-pointer" onclick="closeLogin()">&times;</span>
            </div>
            <h1>Login</h1>
            <p class="text-muted"> Please enter your login and password!</p>                    
            <input type="text" name="email" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
             <input type="submit" name="submit" value="Login">
          </form> 
        </div> 
      </div>
    </div>
  </div>
<!-- login ends -->
<!-- main content starts -->
<div class="container-fluid bg-light text-black pb-5">
    <div class="container-fluid main-content">
      <section class="about-section">
        <h2 class="pb-5">Welcome to Queensgate Airlines</h2>
        <p>Discover Your Next Flight Experience with Queensgate Airlines</p>
        <p>Our platform makes it easy to find the best flights to your desired destinations.</p>
        <p>Explore local flights and gather the information you need effortlessly by logging in and browsing our flight listings.</p>
        <p>Actively contribute by adding new flights to our platform, enhancing our list with comprehensive and up-to-date information.</p>   
        <p>Questions? Feel free to reach out to us anytime.</p>
        <p>Thank you for choosing Queensgate Airlines for your flight booking needs!</p>
    </section>
      </div>
</div>
<!-- main content ends -->
<!-- bootstrap links starts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- bootstrap links ends -->
<!-- loginPopUp javascript starts -->
<script src="./jsFunctions/loginPopUp.js"></script>
<!-- loginPopUp javascript ends -->
</body>
</html>