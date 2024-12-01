<?php

include '../user.php';
$test = new library();

$selec = $test->user_select();





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
    
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
                <a class="navbar-brand" href="admin/admin_dashboard.php">Library Managment System(LMS)</a>
            </div>
            <font id="em"><span><strong>Welcome:<?php echo $_SESSION['name'];  ?></strong></span></font>
            <font  id="em"><span><strong>Email:<?php echo $_SESSION['email'];  ?></strong></span></font>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">My Profile<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="view_profile.php">View Profile</a></li>
                        <li><a class="dropdown-item" href="edit_profile.php">Edit Profile</a></li>
                        <li><a class="dropdown-item" href="change_password.php">Change Password</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="../logout.php" class="nav-link">Logout</a></li>
            </ul> 
        </div>
    </nav>  
<!-- navbar  start-->

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-center">
                <li class="nav-item">
                    <a href="admin_dashboard.php" class="nav-link">Dashboard</a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">Book<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                         <li><a class="dropdown-item">Add New Book</a></li>
                        <li><a class="dropdown-item">Manage Books</a></li>
                    </ul> 
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">Category<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                         <li><a class="dropdown-item">Add New category</a></li>
                        <li><a class="dropdown-item">Manage category</a></li>
                    </ul> 
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">Author<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                         <li><a class="dropdown-item">Add New Author</a></li>
                        <li><a class="dropdown-item">Manage Author</a></li>
                    </ul> 
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link">Issue Book</a>
                </li>

            </ul>
        </div>
</nav>



<!-- navbar  end-->

    <span><marquee>This is Library Managment System. library opens at 8:00 AM and close at 8:00 PM</marquee></span>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form action="">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  foreach ($selec as  $val) { ?>
                        <tr>
                            <td><?php  echo $val['id']; ?></td>
                            <td><?php  echo $val['name']; ?></td>
                            <td><?php  echo $val['email']; ?></td>
                            <td><?php  echo $val['mobile']; ?></td>
                            <td><?php  echo $val['address']; ?></td>
                        </tr>

                        <?php  }  ?>
                    </tbody>
                </table>

            </form>
        </div>
        <div class="col-md-2"></div>
    </div>





</body>
</html>