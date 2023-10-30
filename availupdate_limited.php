<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "fastfood";
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Variable to hold success message
$successMessage = "";

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['AvailableUpdate-btn'])) {
        if (isset($_POST['availableUpdate']) && isset($_POST['staffID'])) {
            $staffID = $_POST['staffID'];
            $selectedRosterIDs = $_POST['availableUpdate'];

            foreach ($selectedRosterIDs as $rosterID) {
                // Fetch dateTimeFrom and dateTimeTo from Roster table
                $sql = "SELECT dateTimeFrom, dateTimeTo FROM Roster WHERE rosterID = ?";
                $stmt = $connection->prepare($sql);
                $stmt->bind_param("i", $rosterID);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();

                // Insert into availability table
                $sql = "INSERT INTO availability (dateTimeFrom, dateTimeTo, staffID, rosterID) VALUES (?, ?, ?, ?)";
                $stmt = $connection->prepare($sql);
                $stmt->bind_param("ssii", $row['dateTimeFrom'], $row['dateTimeTo'], $staffID, $rosterID);
                $stmt->execute();
            }

            // Set the success message
            $successMessage = "Availability updated successfully!";
        } else {
            echo "No roster selected or staff ID missing.";
        }
    }
}

if (!empty($successMessage)) {
    echo "<script>alert('$successMessage'); window.location.href='/henry_ff/index4.php';</script>";
}
?>



