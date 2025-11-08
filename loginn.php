<?php 
include('connection.php');
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VNB fashions</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="script" href="../js/login.js">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
    <style>
        

@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
	box-sizing: border-box;
}

nav{
    margin: 2.5em auto;
}

h1 {
	font-weight: bold;
	margin: 0;
}

h2 {
	text-align: center;
}

p {
	font-size: 14px;
	font-weight: 100;
	line-height: 20px;
	letter-spacing: 0.5px;
	margin: 20px 0 30px;
}

span {
	font-size: 12px;
}

.social-containerr a {
	color: #333;
	font-size: 14px;
	text-decoration: none;
	margin: 15px 0;
}
.button{
	width: 10em;
	border: 1px solid #FF4B2B;
	background-color: #FF4B2B;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px ;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
	
}

button {
	border-radius: 20px;
	border: 1px solid #FF4B2B;
	background-color: #FF4B2B;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}

button:active {
	transform: scale(0.95);
}

button:focus {
	outline: none;
}

button.ghost {
	background-color: transparent;
	border-color: #FFFFFF;
}

.formm {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	height: 100%;
	text-align: center;
}

input {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
}

.c1{
	padding-left: 22em;
	padding-top: 20px;
}

.containerr {
	background-color: #fff;
	border-radius: 10px;
  	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 768px;
	max-width: 100%;
	min-height: 480px;
	
	
}

.form-containerr {
	position: absolute;
	top: 0;
	height: 100%;
	transition: all 0.6s ease-in-out;
}

.sign-in-containerr {
	left: 0;
	width: 50%;
	z-index: 2;
}

.containerr.right-panel-active .sign-in-containerr {
	transform: translateX(100%);
}

.sign-up-containerr {
	left: 0;
	width: 50%;
	opacity: 0;
	z-index: 1;
}

.containerr.right-panel-active .sign-up-containerr {
	transform: translateX(100%);
	opacity: 1;
	z-index: 5;
	animation: show 0.6s;
}

@keyframes show {
	0%, 49.99% {
		opacity: 0;
		z-index: 1;
	}
	
	50%, 100% {
		opacity: 1;
		z-index: 5;
	}
}

.overlay-containerr {
	position: absolute;
	top: 0;
	left: 50%;
	width: 50%;
	height: 100%;
	overflow: hidden;
	transition: transform 0.6s ease-in-out;
	z-index: 100;
}

.containerr.right-panel-active .overlay-containerr{
	transform: translateX(-100%);
}

.overlay {
	background: #FF416C;
	background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
	background: linear-gradient(to right, #FF4B2B, #FF416C);
	background-repeat: no-repeat;
	background-size: cover;
	background-position: 0 0;
	color: #FFFFFF;
	position: relative;
	left: -100%;
	height: 100%;
	width: 200%;
  	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.containerr.right-panel-active .overlay {
  	transform: translateX(50%);
}

.overlay-panel {
	position: absolute;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 40px;
	text-align: center;
	top: 0;
	height: 100%;
	width: 50%;
	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.overlay-left {
	transform: translateX(-20%);
}

.containerr.right-panel-active .overlay-left {
	transform: translateX(0);
}

.overlay-right {
	right: 0;
	transform: translateX(0);
}

.containerr.right-panel-active .overlay-right {
	transform: translateX(20%);
}

.social-container {
	margin: 20px 0;
}

.social-container a {
	border: 1px solid #DDDDDD;
	border-radius: 50%;
	display: inline-flex;
	justify-content: center;
	align-items: center;
	margin: 0 5px;
	height: 40px;
	width: 40px;
}




    </style>
</head>
  <body>

    <!--navbar-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
          <a class="navbar-brand" href="#"><b>VNB</b> Fashions</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
              </ul>
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Mens</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Womens</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./templates/shop.html">Shop</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Account
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../templates/login.html">Login</a></li>
                  <li><a class="dropdown-item" href="../templates/register.html">SignUp</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Manage Account</a></li>
                </ul>
              </li>
              <li>
                <a href="#" class="btn" style="float: right;"><span><i class="fa-solid fa-cart-shopping"></i></span> My Cart</a>
              </li>
            </ul>
           
          </div>
        </div>
      </nav>

   

      <div class="c1">
        <div class="containerr" id="containerr">
           
            <div class="form-containerr sign-in-containerr">
                <form action="" class="formm" method="post">
                    <h1>Sign in</h1>
                    <div class="social-containerr">
                <span>or use your account</span>
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    
                    <input type="email" placeholder="Email" required id="username" name="un"/>
                    <input type="password" placeholder="Password" required id="password" required name="ps"/>
                    <a href="#">Forgot your password?</a>
                    <input type="submit" name="sub" class="button" value="Sign In" onclick="validate()" id="submit">
                </form>
            </div>
            <div class="overlay-containerr">
                <div class="overlay">
                    
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p>Enter your personal details and start journey with us</p>
                        <a href="../templates/register.html"><button class="ghost" id="signUp">Sign Up</button></a>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <?php 
         if(isset($_POST['sub']))
         {
            $un=$_POST['un'];
            $ps=$_POST['ps'];
            $q=$db->prepare("SELECT * FROM loginn WHERE uname='$un' && pass='$ps'");
            $q->execute();
            $res=$q->fetchAll(PDO::FETCH_OBJ);
            if($res)
            {

                $_SESSION['un']=$un;
                header("Location:user.php");
            }
            else
            {
                echo "<script>alert('wrong user')</script>";
            }
            }
        ?>

    <script src="https://kit.fontawesome.com/ac9121196b.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>