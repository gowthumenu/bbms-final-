
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
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <style>
     #full {
    width: 100%;
    height: auto;
    background-color: wheat; /* Light background to enhance the contrast */
}

#inner_full {
    width: 40%;
    height: auto;
    margin: auto;
    margin-top: 3em;
    padding: 2em; /* Added padding to make it less cramped */
    border-radius: 2em;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2); /* Adds a subtle shadow */
    background-color: white; /* Added background color to highlight content */
}

#header {
    width: 100%;
    height: 4.65em;
    background-color: red;
    color: white;
    border-radius: 10px;
    text-align: center;
    font-size: 1.4em;
    font-family: Montserrat;
}

#body {
    width: 100%;
    height: auto;
    padding: 1em 0;
    text-align: center;
}

table {
    
    width: 80%; /* Ensure table does not stretch too wide */
}

table td {
}

input[type="text"], input[type="password"] {
    width: 100%;
    height: 35px;
    border-radius: 10px;
    padding-left: 10px;
    border: 1px solid #ccc; /* Subtle border for input fields */
    box-sizing: border-box;
    outline: none; /* Removes the default blue border on focus */
}

input[type="text"]:focus, input[type="password"]:focus {
    border-color: #ff4b4b; /* Adds red border when the input is focused */
}

input[type="submit"] {
    width: 100%;
    height: 35px;
    border-radius: 5px;
    background-color: red;
    color: white;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
    
}

input[type="submit"]:hover {
    background-color: darkred; /* Darkens the button on hover */
}

#footer {
    width: 100%;
    height: 50px;
    background-color: red;
    color: white;
    border-radius: 7px;
    text-align: center;
    padding-top: 1em;
    margin-top: 1.5em;
    font-size: 0.9em;
}

/* Media queries for responsiveness */
@media screen and (max-width: 768px) {
    #inner_full {
        width: 90%;
    }
}

@media screen and (max-width: 480px) {
    #inner_full {
        width: 95%;
    }

    input[type="submit"] {
        height: 45px;
    }
}


    </style>
</head>
<body>
    <div class="full">
        <div id="inner_full">
          <div class="img">
            <div id="header"><h2>BLOOD BANK MANAGEMENT SYSTEM</h2></div>
            <div id="body">
            <form action="" method="post">
            <table align="center">
                <tr>
                    <td width="100px" height="50px"><b>Enter Username</b></td>
                    <td width="100px" height="50px"><input type="text" name="un" placeholder="Enter username" style="width: 180px; height: 30px;border-radius: 10px;"></td>
                </tr><br> 
                <tr>
                    <td width="100px" height="50px"><b>Enter Password</b></td>
                    <td width="100px" height="50px"><input type="text" name="ps" placeholder="Enter Password" style="width: 180px; height: 30px;border-radius: 10px;"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="sub" value="LOGIN" style="width: 60px; height: 25px;border-radius: 5px;"></td>
                </tr>
            </table>
        </form>
        <?php 
         if(isset($_POST['sub']))
         {
            $un=$_POST['un'];
            $ps=$_POST['ps'];
            $q=$db->prepare("SELECT * FROM veeresh WHERE uname='$un' && pass='$ps'");
            $q->execute();
            $res=$q->fetchAll(PDO::FETCH_OBJ);
            if($res)
            {

                $_SESSION['un']=$un;
                header("Location:admin-home.php");
            }
            else
            {
                echo "<script>alert('wrong user')</script>";
            }
            }
        ?>

        </div>
            <div id="footer"><h4 align="center">Copyright@bonded</h4></div>
        </div>
    </div>
    
</body>
</html>