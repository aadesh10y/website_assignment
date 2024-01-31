<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Hub</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>

        <div id="menu-bar" class="fas fa-bars"></div>
        <a href="#" class="logo"><span>F</span>ootball Hub</a>

        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="#news">News</a>
            <a href="#matches">Matches</a>
            <a href="#contact">Contact</a>
            <a href="logout-user.php" >Logout</a>
        </nav>



        <div class="icons">
            <button aria-label="Search" id="search-btn" class="search-icon"><i class="fas fa-search"></i></button>

            <button aria-label="Login" id="login-btn"><i class="fas fa-user"></i></button>
        </div>

        <form class="search-bar-container">
            <input type="search" id="search-bar" placeholder="Search here..." class="cancel-symbol">
            <button type="submit" aria-label="Search"><i class="fas fa-search"></i></button>
        </form>

       
    </header>

    <div class="send-message-container">
        <p class="send-message" style="display: none">Message sent!</p>
    </div>
   
    

    <div class="login-form-container">

        <!-- Added codes -->
       <div class="messages">
            <p class="login-message" style="display : none">Logged In Successfully</p>
            <p class="register-message" style="display : none">Registered Successfully</p>
        </div>
        <!-- upto here -->

        <i class="fas fa-times" id="form-close"></i>

       
        <form id="login-form" action="">
          

            <h3>login</h3>
            <input type="email" class="box" placeholder="Email">
            <input type="password" class="box" placeholder="Password">
            <input type="submit" value="login now" class="btn login-button">
            <input type="checkbox" id="remember">
            <label for="remember">remember me</label>
            <p>forget password? <a href="#">click here</a></p>
            <p>don't have an account? <a class="register-now-link" href="#">register now</a></p>

        </form>

        <form id="register-form" style="display: none">
            <h3>Register</h3>
            <input type="text" class="box" placeholder="Full Name">
            <input type="email" class="box" placeholder="Email">
            <input type="password" class="box" placeholder="Password">
            <input type="password" class="box" placeholder="Confirm Password">
            <input type="submit" value="Register now" class="btn register-now-button">
            <p>Already have an account? <a href="#" onclick="showLoginForm()">Login</a></p>
        </form>
    </div>

    

    <!-- home section start -->

    <section class="home" id="home" >
        <div class="content">
            <h3>The home of football</h3>
            <p>Football that you never experinced before</p>
        </div>

        <div class="controls">
            <span class="vid-btn active" data-src="videos/footballclip.mp4"></span>
            <span class="vid-btn" data-src="videos/footballclip1.mp4"></span>
            <span class="vid-btn" data-src="videos/footballclip2.mp4"></span>
            <span class="vid-btn" data-src="videos/footballclip3.mp4"></span>
            <span class="vid-btn" data-src="videos/footballclip4.mp4"></span>
        </div>

        <div class="video-container">
            <video src="videos/footballclip.mp4" id="video-slider" loop autoplay muted></video>
        </div>

    </section>
     
    <!-- home section end -->

    <!-- news section start-->

    <section class="news" id="news">
        <h1 class="heading">
            <span>l</span>
            <span>a</span>
            <span>t</span>
            <span>e</span>
            <span>s</span>
            <span>t</span>
            <span class="space"></span>
            <span>n</span>
            <span>e</span>
            <span>w</span>
            <span>s</span>
        </h1>
    
        <div class="news-controls container flex">
            <div class="nav-links flex">
                <div class="hover-link nav-item" id="pl" onclick="onNavItemClick('PL')">PL</div>
                <div class="hover-link nav-item" id="laliga" onclick="onNavItemClick('LALIGA')">LALIGA</div>
                <div class="hover-link nav-item" id="ucl" onclick="onNavItemClick('UCL')">UCL</div>
            </div>
            <div class="search-bar flex">
                <input id="search-text" type="text" class="news-input">
                <button id="search-button" class="search-button">Search</button>
            </div>
        </div>
    </section>
    

    <main>
        <div class="cards-container container flex" id="cards-container">
            
        </div>
    </main>

    <template id="template-news-card">
        <div class="card">
            <div class="card-header">
                <img src="https://via.placeholder.com/400x200" alt="news-image" id="news-img">
            </div>
            <div class="card-content">
                <h3 id="news-title">This is the Title</h3>
                <h6 class="news-source" id="news-source">End Gadget 26/08/2023</h6>
                <p class="news-desc" id="news-desc">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae saepe quis voluptatum quisquam vitae doloremque facilis molestias quae ratione cumque!</p>
            </div>
        </div>
    </template>


    <!-- news section end -->

    <!-- Matches Section starts here -->

    <section class="matches" id="matches">
        <h1 class="heading">
            <span>M</span>
            <span>A</span>
            <span>T</span>
            <span>C</span>
            <span>H</span>
            <span>E</span>
            <span>S</span>
        </h1>

        <div id="matches-container" class="matches-container">
            <div class="match-card">
                <div class="teams">
                    <div class="team">
                        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/c/cc/Chelsea_FC.svg/1200px-Chelsea_FC.svg.png" alt="Chelsea" class="team-logo">
                        <p class="team-name">Chelsea</p>
                    </div>
                    <div class="versus">VS</div>
                    <div class="team">
                        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/9/9f/Aston_Villa_logo.svg/1200px-Aston_Villa_logo.svg.png" alt="Aston Villa" class="team-logo">
                        <p class="team-name">Aston Villa</p>
                    </div>
                </div>
                <div class="match-info">
                    <div class="match-time">01:30 AM</div>
                    <div class="match-status">Today</div>
                </div>
                
            <div class="match-card">
                <div class="teams">
                    <div class="team">
                        <img src="https://upload.wikimedia.org/wikipedia/hif/6/6d/Tottenham_Hotspur.png" alt="Tottenham" class="team-logo">
                        <p class="team-name">Tottenham</p>
                    </div>
                    <div class="versus">VS</div>
                    <div class="team">
                        <img src="https://cdn.freebiesupply.com/images/large/2x/manchester-city-logo-png-transparent.png" alt="Man City" class="team-logo">
                        <p class="team-name">Man City</p>
                    </div>
                </div>
                <div class="match-info">
                    <div class="match-time">01:45 AM</div>
                    <div class="match-status ">Today</div>
                </div>
            </div>  
            
            <div class="match-card">
                <div class="teams">
                    <div class="team">
                        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/4/47/FC_Barcelona_%28crest%29.svg/2020px-FC_Barcelona_%28crest%29.svg.png" alt="Barcelona" class="team-logo">
                        <p class="team-name">Barcelona</p>
                    </div>
                    <div class="versus">VS</div>
                    <div class="team">
                        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/b/b9/Villarreal_CF_logo-en.svg/1200px-Villarreal_CF_logo-en.svg.png" alt="Villareal" class="team-logo">
                        <p class="team-name">Villareal</p>
                    </div>
                </div>
                <div class="match-info">
                    <div class="match-time">11:15 AM</div>
                    <div class="match-status ">Today</div>
                </div>
            </div> 

            <div class="match-card">
                <div class="teams">
                    <div class="team">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/Logo_of_AC_Milan.svg/1200px-Logo_of_AC_Milan.svg.png" alt="AC Milan" class="team-logo">
                        <p class="team-name">AC Milan</p>
                    </div>
                    <div class="versus">VS</div>
                    <div class="team">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5b/Bologna_F.C._1909_logo.svg/1200px-Bologna_F.C._1909_logo.svg.png" alt="Bologna" class="team-logo">
                        <p class="team-name">Bologna</p>
                    </div>
                </div>
                <div class="match-info">
                    <div class="match-time">01:30 AM</div>
                    <div class="match-status ">Tomorrow</div>
                </div>
            </div> 

            <div class="match-card">
                <div class="teams">
                    <div class="team">
                        <img src="https://upload.wikimedia.org/wikipedia/hif/b/bd/Liverpool_FC.png" alt="Liverpool" class="team-logo">
                        <p class="team-name">Liverpool</p>
                    </div>
                    <div class="versus">VS</div>
                    <div class="team">
                        <img src="https://logowik.com/content/uploads/images/norwich-city7754.jpg" alt="Norwich" class="team-logo">
                        <p class="team-name">Norwich</p>
                    </div>
                </div>
                <div class="match-info">
                    <div class="match-time">08:15 PM</div>
                    <div class="match-status ">28 Jan</div>
                </div>
            </div> 

            <div class="match-card">
                <div class="teams">
                    <div class="team">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/22/Al-Hilal-Logo.png/1024px-Al-Hilal-Logo.png" alt="Al-Hilal" class="team-logo">
                        <p class="team-name">Al-Hilal</p>
                    </div>
                    <div class="versus">VS</div>
                    <div class="team">
                        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/5/5c/Inter_Miami_CF_logo.svg/1200px-Inter_Miami_CF_logo.svg.png" alt="Inter Miami CF" class="team-logo">
                        <p class="team-name">Inter Miami CF</p>
                    </div>
                </div>
                <div class="match-info">
                    <div class="match-time">11:45 AM</div>
                    <div class="match-status ">28 Jan</div>
                </div>
            </div> 

            
        </div>
    </section>



    <!-- Matches section end here  -->


    <!-- contact section start here -->

    <section class="contact" id="contact">
        <h1 class="heading">
            <span>c</span>
            <span>o</span>
            <span>n</span>
            <span>t</span>
            <span>a</span>
            <span>c</span>
            <span>t</span>
        </h1>

        <div class="row">
            <div class="image">
                <img src="images/contact .jpeg" alt="">
            </div>

            <form action="">
                <div class="inputBox">
                    <input type="text" placeholder="name">
                    <input type="email" placeholder="email">
                </div>
                <div class="inputBox">
                    <input type="number" placeholder="number">
                    <input type="text" placeholder="subject">
                </div>
                <textarea placeholder="message" name="" id="" cols="30" rows="10"></textarea>
                <input type="submit" class="btn send-message-button" value="send message">
            </form>
        </div>
            

    </section>

    <!-- contact section end here -->

    <!-- footer section -->

    <section class="footer">
        <div class="box-container">

            <div class="box">
                <h3>about us</h3>
                <p>A home for all the football fans around the globe</p>
            </div>

            <div class="box">
                <h3>quick links</h3>
                <a href="#home">home</a>
                <a href="#news">news</a>
                <a href="#matches">matches</a>
                <a href="#stats">stats</a>
                <a href="#contact">contact</a>
            </div>
            <div class="box">
                <h3>follow us</h3>
                <a href="https://www.facebook.com/profile.php?id=100085295929690">facebook</a>
                <a href="https://www.instagram.com/aadesh10y?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">instagram</a>
                <a href="https://twitter.com/aadesh10y">twitter</a>
                <a href="https://www.linkedin.com/in/aadesh-paudel-860270278/">linkedin</a>
            </div>
        </div>

        <h1 class="credit"> created by <span> Aadesh Paudel</span> | all rights reserved!</h1>
    </section>

    <script src="script.js"></script>
</body>
</html>