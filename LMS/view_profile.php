<?php

include 'user.php';
$test = new library();

$vie = $test->view_profile($_GET);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER DASHBOARD</title>

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
        #em {
            color: white;
            display: flex;
            justify-content: center;
        }
    </style>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-inverse bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="user_dashboard.php">Library Managment System(LMS)</a>
            </div>
            <font id="em"><span><strong>Welcome:<?php echo $_SESSION['name'];  ?></strong></span></font>
            <font  id="em"><span><strong>Email:<?php echo $_SESSION['email'];  ?></strong></span></font>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">My Profile<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item"  href="view_profile.php">View Profile</a></li>
                        <li><a class="dropdown-item"  href="edit_profile.php">Edit Profile</a></li>
                        <li><a class="dropdown-item"  href="change_password.php">Change Password</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
            </ul> 
        </div>
    </nav> <br> 


    <span><marquee>This is Library Managment System. library opens at 8:00 AM and close at 8:00 PM</marquee></span>
    <br><br><br>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="">
            <div class="form-group">
                    <label>Name:</label>
                    <input type="text"  class="form-control" value="<?php echo $vie['name'];  ?>" disabled>
                </div>
                <div class="form-group">
                    <label>Email ID:</label>
                    <input type="email" class="form-control" value="<?php echo $vie['email'];  ?>" disabled>
                </div>
                <div class="form-group">
                    <label>Mobile Number:</label>
                    <input type="text" class="form-control" value="<?php echo $vie['mobile'];  ?>" disabled>
                </div>
                <div class="form-group">
                    <label>Address:</label>
                    <textarea rows="3" cols="40" disabled="" class="form-control"><?php echo $vie['address'];  ?></textarea>
                </div>
            </form>
        </div>
    </div>

</body>
</html>