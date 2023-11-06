<!DOCTYPE html>
<html lang="en">
<he>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <style>
        body {
            padding-top: 150px;
        }
    </style>
</head>
<body>
    <nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand mb-0 h1">
                <img class="d-inline-block align-middle" src="anthony.png" width="100" height="100" />
                Navbar
            </a>
            <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" class="navbar-toggler" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a href="/henry_ff/index3.php" class="nav-link">
                            Home
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Manage Staff
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a href="/henry_ff/create.php" class="dropdown-item">Create/Add New Staff</a></li>
                            <li><a href="/henry_ff/index3.php" class="dropdown-item">Edit/Update Staff</a></li>
                            <li><a href="/henry_ff/index3.php" class="dropdown-item">Delete Staff</a></li>
                        </ul>
                    </li>
                    <li class="nav-item active">
                        <a href="/henry_ff/availability1.php" class="nav-link active">
                            Availability
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a href="/henry_ff/logout.php" class="nav-link active">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <h6 class="text-left">You have full access control. All options in the NavBar are available to you.</h6>

</body>
</html>
