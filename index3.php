<?php // sdfsd sdfsd 
// At the top of index.php
$updateSuccess = false;
if (isset($_GET['updateSuccess']) && $_GET['updateSuccess'] == 1) {
    $updateSuccess = true;
}
?>

<?php
if ($updateSuccess) {
    echo "
    <div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Staff updated successfully</strong>
    </div>
    ";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>affr</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <style>
        /* Custom Modal Styles */
        #successModal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            z-index: 1000;
        }
        #successModalContent {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 2px solid blue;
            text-align: center;
        }
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

    <!-- Custom Modal -->
    <div id="successModal">
        <div id="successModalContent">
            <h2>Success</h2>
            <p>Staff updated successfully.</p>
            <button style="background-color: blue; color: white;" onclick="closeSuccessModal()">Okay</button>
        </div>
    </div>

    <script>
        // Check if 'updateSuccess' exists in the URL parameters
        const urlParams = new URLSearchParams(window.location.search);
        const updateSuccess = urlParams.get('updateSuccess');

        if (updateSuccess === '1') {
            openSuccessModal();
        }

        function openSuccessModal() {
            document.getElementById("successModal").style.display = "block";
        }

        function closeSuccessModal() {
            document.getElementById("successModal").style.display = "none";
        }
    </script>
    <div class="header">
        <img src="anthony.png" alt="Logo" class="logo">
        <h1>Anthony Fastfood Restaurant</h1>
    </div>

    <div class="container my-5">
        <h3>List of Staff</h3>

        <div class="d-flex justify-content-between my-3">
            <a class="btn btn-primary" href="/henry_ff/create.php" role="button">Add New Staff</a>
            <a class="btn btn-primary" href="/henry_ff/index1.php" role="button">Home</a>
        </div>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>staffID</th>
                    <th>name</th>
                    <th>address</th>
                    <th>dateOfBirth</th>
                    <th>email</th>
                    <th>mob</th>
                    <th>roleID</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "fastfood";


                $connection = new mysqli($servername, $username, $password, $database);

                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                $sql = "SELECT * FROM staff";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Query failed: " . $connection->error);
                }

                while($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$row[staffID]</td>
                        <td>$row[name]</td>
                        <td>$row[address]</td>
                        <td>$row[dateOfBirth]</td>
                        <td>$row[email]</td>
                        <td>$row[mob]</td>
                        <td>$row[roleID]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='/henry_ff/edit.php?staffID=$row[staffID]' role='button'>Edit/Update</a>
                            <a class='btn btn-primary btn-sm' href='/henry_ff/delete.php?staffID=$row[staffID]' role='button'>Delete</a>
                            <a class='btn btn-primary btn-sm' href='/henry_ff/availability1.php?staffID=$row[staffID]' role='button'>Availability</a>
                        </td>
                    </tr>
                    ";

                }

                ?>
                
            </tbody>
                
        </table>
    </div>

    <div class="d-flex justify-content-center align-items-center" style="height: 15vh;">
        <footer class="container">
            <p>Copyright &copy; Henry Gervacio</p>
        </footer>
    </div>
</body>
</html>
