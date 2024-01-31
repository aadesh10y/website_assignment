</head>

<?php require_once "controllerUserData.php"; ?>


<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<link rel="stylesheet" href="lstyle.css">


<link rel="stylesheet" href="st-login.css">




<body >

<div class="container" >
</br>
</br>
</br>
</br>



    <div class="row">
</br>
&#160; &#160; 
         <div class="col-md-4 offset-md-4 form login-form">
            <form action="login-user.php" method="POST" autocomplete="">
                
                <h2 class="text-center" style="color: Black; font-weight: bold; font-size: 30px;">Login Form </font></h2>
                <p class="text-center" style="color: Black; font-weight: bold; font-size: 16px;">
                &#160; &#160;    Enter your email & password.
</p>
</br>
                

                <?php
                if(count($errors) > 0){
                    ?>
                    <div class="alert alert-danger text-center">
                        <?php
                        foreach($errors as $showerror){
                            echo $showerror;
                        }
                        ?>
                    </div>
                    </div>
                    <?php
                    }
                
                ?>
                
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Enter email address" style="border: 5px solid black; text:bold; padding: 15px; width: 265px; font-weight: bold;" required value="<?php echo $email ?>">
                
                    
                
                </div>
                <div class="form-group">
            </br>   <input class="form-control" type="password" name="password" placeholder="Password" style="border: 5px solid black; text:bold; padding: 15px; width: 265px; font-weight: bold;"  required>
                </div>
            </br> <div class="link forget-pass text-left" style="color: black; font-weight: bold; font-size: 16px;"><a href="forgot-password.php"><font size="4">Forgot password?</font></a></div>
                <div class="form-group">
                <input class="form-control button" type="submit" name="login" value="Login" style="border: 5px solid black; padding: 25px; width: 265px; font-weight: bold; text-align:center; margin: 0 auto; display: block;">

                </div>
            </br>    <div class="link login-link text-center" style="color: black; font-weight: bold; font-size: 16px;">Not yet a member? <a href="signup-user.php"><font size="4">Signup now</font></a></div>
            </form>
        </div>
    </div>
            </div>
            

            <div section="img">

<img
                                src="images/naozFg.webp"  height="730px" width="1400"
                                alt=""
                                
                            />

<!-- header section starts  -->

<header class="header" id="header">


<a href="#" class="logo"> </i> Football Hub </a>
            </br>
<nav class="navbar">
            </br>
    <div id="nav-close" class="fas fa-times"></div>
            </br>
    <a href="#header">home</b></a>
    <a href="#about">About</b></a>
    <a href="#newsletter">subscribe</b></a>
        
    
    <a href="#footer">reviews</b></a>
    
</nav>

<div class="icons">
    <div id="menu-btn" class="fas fa-bars"></div>
    <!--<a href="#" class="fas fa-shopping-cart"></a>-->
    <div id="search-btn" class="fas fa-search"></div>
</div>

</header>

<!-- header section ends -->

<!-- search form  -->















            </body>
            </html>
            





<?php require_once "header.php"; ?>
<?php require_once "db_connect.php"; ?>




        
</form> 

<script src="java.js"></script>

</body>
</html>