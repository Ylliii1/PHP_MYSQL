<?php require_once("header.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <style>
        /* Background gradient for the entire page */
        body {
            background: linear-gradient(135deg, #66785F, white);
            color: #fff;
            font-family: 'Arial', sans-serif;
        }

        /* Container for table */
        .content-container {
            background-color: #fff;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 10px #91AC8F;
            border: 2px solid transparent;
            background-clip: padding-box;
        }

        .content-container:hover {
            border-image: linear-gradient(to right, #66785F, #B2C9AD) 1;
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }

        /* Stylish table */
        table {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .table thead {
            background-color: #66785F;
            color: white;
        }

        /* Buttons */
        .btn-warning {
            background: #66785F;
            border: none;
            color: #4B5945;
            transition: all 0.3s ease;
            color:white;
        }

        .btn-warning:hover {
            background: linear-gradient(to right, #66785F, black);
            transform: scale(1.05);
            color:white;
        }

        .btn-danger {
            background: #66785F;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            background: linear-gradient(to right, #66785F, black);
            transform: scale(1.05);
        }

        /* Table hover effect */
        tbody tr:hover {
            background-color: #f2f2f2;
            transition: background-color 0.3s ease;
        }

        /* Title styling */
        h2 {
            color: #4B5945;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="content-container">
            <h2>Manage Users</h2>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example rows -->
                    <tr>
                        <td>1</td>
                        <td>john_doe</td>
                        <td>john@example.com</td>
                        <td>
                            <a href="#" class="btn btn-warning btn-sm">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>jane_doe</td>
                        <td>jane@example.com</td>
                        <td>
                            <a href="#" class="btn btn-warning btn-sm">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
<?php include("footer.php"); ?>
</html>
