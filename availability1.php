<!DOCTYPE htm>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Availability</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

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
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Specify when you are available to work</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card-body">
                    <form action="/henry_ff/availupdate.php" method="POST">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        <button type="submit" name="AvailableUpdate-btn" class="btn btn-primary">Update</button>
                                    </th>
                                    <th>StaffID</th>
                                    <th>Name</th>
                                    <th>RoleID</th>
                                    <th>RosterID</th>
                                    <th>Start</th>
                                    <th>End</th>
                                </tr>
                            </tbody>
                            <tbody>
                                <?php
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $database = "fastfood";

                                    // Create connection
                                    $connection = new mysqli($servername, $username, $password, $database);

                                    // Check connection
                                    if ($connection->connect_error) {
                                        die("Connection failed: " . $connection->connect_error);
                                    }

                                    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                                        if (!isset($_GET["staffID"])) {
                                            header("location: /henry_ff/index3.php");
                                            exit;
                                        }

                                        $staffID = $_GET["staffID"];
                                        $sql = "SELECT Staff.staffID, Staff.name, staff.roleID, roster.rosterID, Roster.dateTimeFrom, Roster.dateTimeTo FROM Staff JOIN Role ON staff.roleID = role.roleID JOIN rosterRole ON role.roleID = rosterRole.roleID Join roster On rosterrole.rosterID = roster.rosterid where staff.staffID=$staffID ORDER BY roster.dateTimefrom ";
                                        
                                        $result = $connection->query($sql);

                                        if (empty($result)) {
                                            echo "nothing";
                                            header("location: /henry_ff/index3.php");
                                            exit;
                                        }

                                        foreach($result as $row) {
                                ?>
                                            <tr>
                                                <td style="width:10px; text-align: center;">
                                                    <input type="checkbox" name="availableUpdate[]" value="<?= $row['rosterID']; ?>">
                                                </td>
                                                <td><?= $row['staffID']; ?></td>
                                                <td><?= $row['name']; ?></td>
                                                <td><?= $row['roleID']; ?></td>
                                                <td><?= $row['rosterID']; ?></td>
                                                <td><?= $row['dateTimeFrom']; ?></td>
                                                <td><?= $row['dateTimeTo']; ?></td>
                                            </tr>
                                <?php
                                        }
                                ?>
                                    <input type="hidden" name="staffID" value="<?php echo $staffID; ?>">
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

