<?php 
include('connection.php');
session_start();

if (!isset($_SESSION['un'])) {
    header("Location:index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DONOR Registration</title>

    <style>
        /* Reset box-sizing for all elements */
* {
    box-sizing: border-box;
}

body, html {
    margin: 0;
    padding: 0;
    height: 100%;
    font-family: Arial, sans-serif;
}

#full {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
}

#inner_full {
    width: 50%;
    height: calc(100% - 85px); /* Adjust height minus header and footer */
    margin: auto;
    margin-top: 2em;
    border-radius: 2em;
    background-color: #f4f4f4;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

#header {
    background-color: #cc0000;
    padding: 10px;
    color: white;
    text-align: center;
    border-radius: 1em 1em 0 0;
    height: 4em;
}

#body {
    flex: 1;
    padding: 20px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
}

#form {
    width: 100%;
    flex: 1;
    background: red;
    color: white;
    padding: 20px;
    border-radius: 0 0 1em 1em;
    display: flex;
    flex-direction: column;
}

table {
    width: 100%;
    border-collapse: collapse;
}

td {
    padding: 10px;
    text-align: left;
    vertical-align: top;
}

input, textarea, select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 10px;
}

textarea {
    resize: vertical;
}

th, td {
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
}

#footer {
    background-color: #cc0000;
    padding: 10px;
    text-align: center;
    color: white;
    border-radius: 0 0 1em 1em;
    height: 60px;
    flex-shrink: 0; /* Prevent footer from shrinking */
}

a {
    color: white;
    text-decoration: none;
}

.listh td {
    color: black;
    text-decoration: underline;
}

    </style>
</head>
<body>
    <div id="full">
        <div id="inner_full">
            <div id="header"><h2><a href="admin-home.php">BLOOD BANK MANAGEMENT SYSTEM</a></h2></div>
            <div id="body">
                <h1>Blood Donor Registration</h1>
                <div id="form">
                    <form action="" method="post">
                        <table>
                            <tr>
                                <td>Enter Name</td>
                                <td><input type="text" name="name" placeholder="Enter Name" required></td>
                                <td>Enter Father Name</td>
                                <td><input type="text" name="fname" placeholder="Enter Father Name" required></td>
                            </tr>
                            <tr>
                                <td>Enter Address</td>
                                <td><textarea name="address" placeholder="Enter Address" required></textarea></td>
                                <td>Enter City</td>
                                <td><input type="text" name="city" placeholder="Enter City" required></td>
                            </tr>
                            <tr>
                                <td>Enter Age</td>
                                <td><input type="number" name="age" placeholder="Enter Age" required min="18" max="100"></td>
                                <td>Select Blood Group</td>
                                <td>
                                    <select name="bgroup" required>
                                        <option value="O+">O+</option>
                                        <option value="A+">A+</option>
                                        <option value="B+">B+</option>
                                        <option value="AB+">AB+</option>
                                        <option value="O-">O-</option>
                                        <option value="A-">A-</option>
                                        <option value="B-">B-</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Enter E-Mail</td>
                                <td><input type="email" name="email" placeholder="Enter E-Mail" required></td>
                                <td>Enter Mobile Number</td>
                                <td><input type="tel" name="mno" placeholder="Enter Mobile No." required></td>
                            </tr>
                            <tr>
                                <td colspan="4" align="center"><input type="submit" name="sub" value="Save"></td>
                            </tr>
                        </table>
                    </form>

                    <?php
                    if (isset($_POST['sub'])) {
                        $name = htmlspecialchars($_POST['name']);
                        $fname = htmlspecialchars($_POST['fname']);
                        $address = htmlspecialchars($_POST['address']);
                        $city = htmlspecialchars($_POST['city']);
                        $age = intval($_POST['age']);
                        $bgroup = htmlspecialchars($_POST['bgroup']);
                        $mno = htmlspecialchars($_POST['mno']);
                        $email = htmlspecialchars($_POST['email']);

                        $q = $db->prepare("INSERT INTO donor_registration (name, fname, address, city, age, bgroup, mno, email) VALUES (:name, :fname, :address, :city, :age, :bgroup, :mno, :email)");
                        $q->bindValue(':name', $name);
                        $q->bindValue(':fname', $fname);
                        $q->bindValue(':address', $address);
                        $q->bindValue(':city', $city);
                        $q->bindValue(':age', $age);
                        $q->bindValue(':bgroup', $bgroup);
                        $q->bindValue(':mno', $mno);
                        $q->bindValue(':email', $email);

                        if ($q->execute()) {
                            echo "<script>alert('Donor Registration Successful')</script>";
                        } else {
                            echo "<script>alert('Registration Failed'); console.log(" . json_encode($q->errorInfo()) . ");</script>";
                        }
                    }
                    ?>

                </div>
            </div>
            <div id="footer">
                <p><a href="logout.php">Logout</a></p>
                <h4>Copyright@bonded</h4>
            </div>
        </div>
    </div>
</body>
</html>
