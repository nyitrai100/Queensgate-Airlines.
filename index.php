<?php 
  session_start();
  if(!isset($_SESSION["user"]))
{
	//user tried to access the page without logging in
        //redirect them to the login page
	// header( "Location: ./index.php" );
};
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
    <link rel="stylesheet" href="./style.css">
    <!-- stylesheets ends -->
    <title>Queensgate Airlines</title>
</head>
<body>
<?php echo "<p>You are logged in as : {$_SESSION['user']}</p>"; ?>
<li><a href="logout.php"><button>Log out</button></a></li>
          <!-- navigation bar starts -->
          <nav class="nav-container mb-5">
            <ul class="nav justify-content-end">
                <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
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



    <div class="bg-img py-lg-14 py-12 bg-cover padding-hero">
      <!-- title starts -->
      <h1 class=" display-4 fw-bold  mb-5 flex text-center text-white"> Queens<span class="blue-color">Gate</span> Airlines </h1>
       <!-- title ends -->
    <!-- container -->
    <div class="container pt-5 mt-5">
     
 
      <!-- row -->
      <div class="row align-items-center">
        <div class="col-lg-4 col-12">
          <div>
            <div class="text-center text-md-start ">
                
              <p class="lead text-white firstParagraph "> Explore<br/> Top Flights  to Europe <br/> <span class="text-black">with</span> <br/>Our Platform<br/></p>
            </div>
            <!-- searching was here -->
          
        
          </div>
        </div>
        <div class="offset-lg-1 col-lg-7 col-12 text-center">
            <div class="position-relative ">
                <img src="https://images.unsplash.com/photo-1610642372651-fe6e7bc209ef?auto=format&fit=crop&q=80&w=2940&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="img-fluid hero-picture">
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
          <form action="login_process.php" method="post" class="box">
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
      <section style="padding: 20px; text-align: center;">
        <h2 class="pb-5">Welcome to Queensgate Airlines</h2>
        <p>Discover Your Next Flight Experience with Queensgate Airlines</p>
    
        <p>Our platform makes it easy to find and book the best flights to your desired destinations.</p>
    
        <p>Explore local flights and gather the information you need effortlessly by logging in and browsing our flight listings.</p>
    
        <p>Take an active role by adding new flights to our system, contributing to a more comprehensive and up-to-date list.</p>
    
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
<script src="./loginPopUp.js"></script>
<!-- loginPopUp javascript ends -->
</body>
</html>