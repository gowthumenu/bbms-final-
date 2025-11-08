
<?php 
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN LOGIN</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/s1.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <style>
        #inner_full {
    width: 60%; /* Adjust width to fit content nicely */
    margin: auto;
    margin-top: 3em;
    border-radius: 2em;
    background-color: whitesmoke;
    padding: 1.5em;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

#header {
    width: 100%;
    height: 4em;
    background-color: red;
    color: white;
    border-radius: 10px;
    text-align: center;
    padding-top: 15px;
    font-size: 1.5em;
}

#body {
    width: 100%;
    height: auto;
    text-align: center;
    margin-top: 20px;
}

ul {
    padding: 0;
    margin: 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    list-style: none; /* Remove bullet points */
}

ul li {
    width: 30%; /* 30% width for three items in each row */
    margin: 10px 1.5%; /* Adds horizontal spacing between items */
    padding: 10px 0;
    background-color: red;
    color: white;
    text-align: center;
    border-radius: 15px;
    font-size: 1.1em;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

ul li:hover {
    background-color: darkred;
}

ul li a {
    text-decoration: none;
    color: white;
}

h1 {
    font-size: 2em;
    margin-bottom: 20px;
}

/* Styling for Logout button */
#footer a {
    display: inline-block;
    background-color: red;
    color: white;
    padding: 10px 20px;
    border-radius: 15px;
    text-decoration: none;
    font-size: 1.1em;
    
}

/* Media Queries for Responsiveness */
@media (max-width: 768px) {
    #inner_full {
        width: 90%;
    }

    ul li {
        width: 45%; /* 2 items per row on smaller screens */
        margin: 10px 2.5%;
    }
}

@media (max-width: 500px) {
    ul li {
        width: 90%; /* Single column for smaller devices */
        margin: 10px 0;
    }
}

    </style>
</head>
<body>
    <div class="full">
        <div id="inner_full">
            <div id="header"><h2><a href="admin-home.php" style="text-decoration: none; color: white"> BLOOD BANK MANAGEMENT SYSTEM</a></h2></div>
            <div id="body">
                <br>
                <?php
                $un=$_SESSION['un'];
                if(!$un)
                {
                     header("Location:index.php");
                }
                ?>
                <h1>WEL COME ADMIN</h1><br><br>
                <ul>
                    <li><a href="donor-reg.php">Donor Registration</a></li>
                    <li><a href="donor-list.php">Donor List</a></li>
                    <li><a href="stoke-blood-list.php">Stock Blood List</a></li>
                </ul>
                <ul>
                     <li><a href="out-stoke-blood-list.php">Out Stoke Blood List</a></li>
                    <li><a href="exchange-blood-list.php">Blood Donate Registration</a></Exchange></li>
                    <li><a href="Donation-list.php">Donation List</a></li>
                </ul>


        </div><br><br>
            <div id="footer">
                <p align="center"><a href="logout.php"><font color='white'>Logout</font></a></p>
                <h4 align="center">Copyright@bonded</h4></div>
        </div>
    </div>
    
</body>
</html>