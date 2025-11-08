<?php 
include('connection.php'); 
session_start();

// Ensure user is logged in
if (!isset($_SESSION['un'])) {
    header("Location:index.php");
    exit();
}

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exchange Blood Registration</title>
    <style>
        /* Your original CSS remains unchanged */
        * { box-sizing: border-box; }
        body, html { margin: 0; padding: 0; height: 100%; font-family: Arial, sans-serif; }
        #full { width: 100%; height: 100%; display: flex; flex-direction: column; }
        #inner_full { width: 50%; margin: auto; margin-top: 2em; border-radius: 2em; background-color: #f4f4f4; display: flex; flex-direction: column; justify-content: space-between; }
        #header { background-color: #cc0000; padding: 10px; color: white; text-align: center; border-radius: 1em 1em 0 0; }
        #body { flex: 1; padding: 20px; display: flex; flex-direction: column; }
        #form { width: 100%; padding: 20px; display: flex; flex-direction: column; }
        table { width: 100%; border-collapse: collapse; }
        td { padding: 10px; }
        input, textarea, select { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; margin-bottom: 10px; }
        textarea { resize: vertical; }
        #footer { background-color: #cc0000; padding: 10px; text-align: center; color: white; border-radius: 0 0 1em 1em; }
        a { color: white; text-decoration: none; }
    </style>
</head>
<body>
    <div id="full">
        <div id="inner_full">
            <div id="header"><h2><a href="admin-home.php">BLOOD BANK MANAGEMENT SYSTEM</a></h2></div>
            <div id="body">
                <h1>Blood Donation Registration</h1>
                <div id="form">
                    <form action="" method="post">
                        <table>
                            <tr>
                                <td>Enter Name</td>
                                <td><input type="text" name="name" placeholder="Enter Name" required></td>
                            </tr>
                            <tr>
                                <td>Enter Father Name</td>
                                <td><input type="text" name="fname" placeholder="Enter Father Name" required></td>
                            </tr>
                            <tr>
                                <td>Enter Address</td>
                                <td><textarea name="address" placeholder="Enter Address" required></textarea></td>
                            </tr>
                            <tr>
                                <td>Enter City</td>
                                <td><input type="text" name="city" placeholder="Enter City" required></td>
                            </tr>
                            <tr>
                                <td>Enter Age</td>
                                <td><input type="number" name="age" placeholder="Enter Age" required min="18" max="100"></td>
                            </tr>
                            <tr>
                                <td>Enter Mobile Number</td>
                                <td><input type="tel" name="mno" placeholder="Enter Mobile No." required></td>
                            </tr>
                            <tr>
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
                                <td colspan="2" align="center"><input type="submit" name="sub" value="Save"></td>
                            </tr>
                        </table>
                    </form>

                    <?php
                    if (isset($_POST['sub'])) {
                        // If the form was submitted, handle the form data
                        $name = htmlspecialchars($_POST['name']);
                        $fname = htmlspecialchars($_POST['fname']);
                        $address = htmlspecialchars($_POST['address']);
                        $city = htmlspecialchars($_POST['city']);
                        $age = intval($_POST['age']);
                        $bgroup = htmlspecialchars($_POST['bgroup']);
                        $mno = htmlspecialchars($_POST['mno']);

                        try {
                            // Fetch the first stock of the selected blood group
                            $q2 = $db->prepare("SELECT * FROM donor_registration WHERE bgroup = :bgroup ORDER BY id ASC LIMIT 1");
                            $q2->execute([':bgroup' => $bgroup]);
                            $donor = $q2->fetch();

                            if ($donor) {
                                $donorId = $donor['id'];

                                // Insert the donor's details into out_stock table before deletion
                                $qInsertOutStock = $db->prepare("INSERT INTO out_stock (id, name, bgroup, mno) VALUES (:id, :name, :bgroup, :mno)");
                                $qInsertOutStock->execute([
                                    ':id' => $donorId,
                                    ':name' => $donor['name'],
                                    ':bgroup' => $donor['bgroup'],
                                    ':mno' => $donor['mno']
                                ]);

                                // Insert data into exchange_b table
                                $qInsert = $db->prepare("INSERT INTO exchange_b (name, fname, address, city, age, bgroup, mno) VALUES (:name, :fname, :address, :city, :age, :bgroup, :mno)");
                                $qInsert->execute([
                                    ':name' => $name,
                                    ':fname' => $fname,
                                    ':address' => $address,
                                    ':city' => $city,
                                    ':age' => $age,
                                    ':bgroup' => $bgroup,
                                    ':mno' => $mno,
                                ]);

                                // Delete the donor from the donor_registration table
                                $qDelete = $db->prepare("DELETE FROM donor_registration WHERE id = :id");
                                $qDelete->execute([':id' => $donorId]);

                                echo "<script>alert('Exchange Blood Registration Successful');</script>";
                            } else {
                                echo "<script>alert('No Stock Available for the Selected Blood Group');</script>";
                            }
                        } catch (PDOException $e) {
                            echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
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
