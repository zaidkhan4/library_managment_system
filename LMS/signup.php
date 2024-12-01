<?php
include 'user.php';
$test = new library();

if(isset($_POST['submit'])){
    $test->insert_data($_POST);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIBRARY MANAGMENT SYSTEM</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style type="text/css">
        #side_bar {
            background-color: whitesmoke;
            padding: 50px;
            width: 400px;
            height:450px;
        }
    </style>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-inverse bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Library Managment System(LMS)</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Admin Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">User Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Register</a>
                </li>
            </ul>
        </div>
    </nav> <br>

    <span><marquee>This is Library Managment System. library opens at 8:00 AM and close at 8:00 PM</marquee></span>


    <div class="row">
        <div class="col-md-4" id="side_bar">
            <h5>Library Time</h5>
            <ul>
                <li>Opening Timing 8:00 AM</li>
                <li>Closing Timing 8:00 PM</li>
                <li>(Sunday off)</li>
            </ul>

            <h5>What we provides</h5>
            <ul>
                <li>Full furniture</li>
                <li>Free WI-FI</li>
                <li>News Papers</li>
                <li>Discussion Room</li>
                <li>RO water</li>
                <li>peacefull Environment</li>
            </ul>
        </div>
    

        <div class="col-md-8" id="main_content">
        <!-- <span class="text-center text-success"><//php echo @$suc; ?></span> -->
            <center><h3>User Registration Form</h3></center>
            <form action="" method="POST">
                <div class="form-group">
                    <label>Full Name:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email ID:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Mobile Number:</label>
                    <input type="text" name="mobile" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Address:</label>
                    <textarea rows="3" cols="40" name="address" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="Register">
                </div>
            </form>
        </div>

    </div>


</body>
</html>