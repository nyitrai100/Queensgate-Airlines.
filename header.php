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
                <?php if(isset($_SESSION["user"]))
                {echo "<a class='nav-link' href='./Authentication/logout.php'>Log out</a>"; }
                       else{echo " <a class='nav-link' href='#' onclick='openLogin()'>Login</a>"; }       ?>           
                </li>
            </ul>
        </nav>
     <!-- navigation bar ends --->