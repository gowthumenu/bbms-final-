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
            height: calc(100% - 100px); /* Adjust height minus header and footer */
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
            overflow: hidden;
            padding: 20px;
            border-radius: 0 0 1em 1em;
        }

        .table-container {
            width: 100%;
            height: 100%;
            overflow-y: auto;
            background: red;
            border-radius: 1em;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .listh td {
            color: black;
            text-decoration: underline;
        }

        #footer {
            background-color: #cc0000;
            padding: 10px;
            text-align: center;
            color: white;
            border-radius: 0 0 1em 1em;
            height: 85px; 
        }

        a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div id="full">
        <div id="inner_full">
            <div id="header">
                <h2><a href="admin-home.php">BLOOD BANK MANAGEMENT SYSTEM</a></h2>
            </div>
            <div id="body">
                <h1>Donor's List</h1>
                <div id="form">
                    <div class="table-container">
                        <table>
                            <tr class="listh">
                                <td><center><b>Name</b></center></td>
                                <td><center><b>Father's Name</b></center></td>
                                <td><center><b>Address</b></center></td>
                                <td><center><b>City</b></center></td>
                                <td><center><b>Age</b></center></td>
                                <td><center><b>Blood Group</b></center></td>
                                <td><center><b>Mobile Number</b></center></td>
                                <td><center><b>E-Mail</b></center></td>
                            </tr>
                            <?php
                            $q = $db->query("SELECT * FROM donor_registration");
                            while($r1 = $q->fetch(PDO::FETCH_OBJ)) {
                                ?>
                                <tr>
                                    <td><center><?=$r1->name; ?></center></td>
                                    <td><center><?=$r1->fname; ?></center></td>
                                    <td><center><?=$r1->address; ?></center></td>
                                    <td><center><?=$r1->city; ?></center></td>
                                    <td><center><?=$r1->age; ?></center></td>
                                    <td><center><?=$r1->bgroup; ?></center></td>
                                    <td><center><?=$r1->mno; ?></center></td>
                                    <td><center><?=$r1->email; ?></center></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
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
