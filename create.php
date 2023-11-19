<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "fastfood"

//create connection
$connection = new mysqli($servername, $username, $password, $database);

$staffID = "";
$name = "";
$address = "";
$dateOfBirth = "";
$email = "";
$mob = "";
$roleID = "";

$errorMessage = "";
$sucessMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $staffID = $_POST["staffID"];
    $name = $_POST["name"];
    $address = $_POST["address"];
    $dateOfBirth = $_POST["dateOfBirth"];
    $email = $_POST["email"];
    $mob = $_POST["mob"];
    $roleID = $_POST["roleID"];

    do {
        if (empty($staffID) || empty($name) || empty($address) || empty($dateOfBirth) || empty($email) || empty($mob) || empty($roleID)) {
            $errorMessage = "All the fields are required";
            break;
        }

        //add new client to database
        $sql = "INSERT INTO staff (staffID, name, address, dateOfBirth, email, mob, roleID) 
                VALUES ('$staffID', '$name', '$address', '$dateOfBirth', '$email', '$mob', '$roleID')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $staffID = "";
        $name = "";
        $address = "";
        $dateOfBirth = "";
        $email = "";
        $mob = "";
        $roleID = "";

        $sucessMessage = "New staff added successfully";

       

    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>affr</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">

    </script>

<style>
        body {
            text-align: center;
        }
        h1 {
            margin-top: 10px;
        }
        .login-box {
            width: 30%;
            margin: auto;
        }
        input[type=email], input[type=password] {
            width: 100%; 
            padding: 12px 20px; 
            margin: 8px 0;  
            display: inline-block; 
            border: 1px solid #ccc;  
            box-sizing: border-box;  
        }
        button {
            background-color: blue;
            color: white;
            width: 100%; 
            padding: 14px 20px;
            font-size: 18px; 
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            width: 100px; 
            height: auto;
            margin-bottom: 0;
            margin-top: 20px;
        }

    </style>
</head>
<body>

    <div class="header">
        <img src="anthony.png" alt="Logo" class="logo">
        <h1>Anthony Fastfood Restaurant</h1>
    </div>

    <div class="container my-5">
        <h2>Add New Staff</h2>

        <!-- Alerts for error and success messages -->
        <?php 
        if ( !empty($errorMessage) ) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        if ( !empty($sucessMessage) ) {
            echo "
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>$sucessMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">staffID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="staffID" value="<?php echo $staffID; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">dateOfBirth</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="dateOfBirth" value="<?php echo $dateOfBirth; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">mob</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="mob" value="<?php echo $mob; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">roleID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="roleID" value="<?php echo $roleID; ?>">
                </div>
            </div>
            <div class="row mt-4 mb-3">
                <div class="col-sm-3"></div>
                <div class="col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/henry_ff/index3.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>

    <div class="d-flex justify-content-center align-items-center" style="height: 15vh;">
        <footer class="container">
            <p>Copyright &copy; Henry Gervacio</p>
        </footer>
    </div>
</body>
</html>
