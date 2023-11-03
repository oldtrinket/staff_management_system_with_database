<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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

    <div class="login-box">
        <form method="POST" action="">
            <input type="email" name="email" placeholder="Email" required><br><br>
            <input type="password" name="password" placeholder="Password" required><br><br>
            <button type="submit" name="login">Login</button>
        </form>
    </div>

    <?php
        session_start(); // Start the session at the beginning

        if(isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
        
            $conn = new mysqli("localhost", "root", "", "fastfood");
        
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
        
            $sql = "SELECT staffID, passwordHash, roleID FROM staff WHERE email=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
        
            if($row) {
                if ($password === $row['passwordHash']) {
                    $_SESSION['roleID'] = $row['roleID'];
                    
                    // Redirect based on roleID
                    if ($row['roleID'] == 1 || $row['roleID'] == 2) {
                        header("Location: /henry_ff/index2.php");
                    } elseif ($row['roleID'] == 3 || $row['roleID'] == 4) {
                        header("Location: /henry_ff/index1.php");
                    }
                } else {
                    echo "Invalid login credentials";
                }
            } else {
                echo "Invalid login credentials";
            }
        


    <div class="d-flex justify-content-center align-items-center" style="height: 15vh;">
        <footer class="container">
            <p>Copyright &copy; Henry Gervacio</p>
 
