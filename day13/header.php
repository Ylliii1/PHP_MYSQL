<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        /* Header Gradient Background */
        .navbar {
            background: #4B5945;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        /* Navbar Brand Styling */
        .navbar-brand {
            color: #fff;
            font-size: 1.5rem;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .navbar-brand:hover {
            color: white;
        }

        .mybtn:hover{
            color: black;
        }
    
        /* Ensure body doesn't get overlapped by fixed navbar */
        body {
            padding-top: 70px; /* Adjust to navbar height */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <!-- Navbar Brand -->
            <a class="navbar-brand" href="admin.php">Admin Dashboard</a>

            <!-- Logout Button -->
            <div class="d-flex">
                <a style ="background: white; color: #4B5945 " href="logout.php" class="btn mybtn">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Main Content Container -->
    <div class="container mt-4">
