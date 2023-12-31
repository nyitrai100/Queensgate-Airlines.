<?php 
  include("./Database/dbh.php");
  include("header.php");
?>

  <!-- hero starts -->
    <div class="bg-img py-lg-14 py-12 bg-cover padding-hero ">
      <h1 class=" display-4 fw-bold  mb-5 flex text-center text-white shadow-title index-MT"> QueensGate Airlines </h1>
    <div class="container pt-5 mt-5">
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
  <!-- hero ends -->
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
            <?php
              if(isset($_GET['error'])){
                if($_GET['error'] == 'emptyfield'){
                  echo "<p class='text-danger'>Please fill all the fields</p>";

                }
              }
            ?>
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
        <p>Discover your next flight with Us</p>
        <p> You can find your the best flight on our platform!</p>
        <p>Log in and browsing our flights without any limitation</p>
        <p>Actively uploading new flights, keep it updated our database</p>
        <p>Any question? Feel free to message us!</p>
        <p>Thank you for choosing Queensgate Airlines</p>
    </section>
      </div>
</div>
<!-- main content ends -->

<?php 
include("footer.php");
?>
<script>
  var urlParams = new URLSearchParams(window.location.search);
  if(urlParams.get('error') != null){
    openLogin();
  }
</script>
