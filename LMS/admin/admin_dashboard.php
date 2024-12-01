<?php

include '../user.php';
$test = new library();

$a = $test->get_user_count();
$b = $test->get_book_count();
$c = $test->get_category_count();
$d = $test->get_author_count();
$e = $test->issue_book_count();



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
                         <li><a href="add_book.php" class="dropdown-item">Add New Book</a></li>
                        <li><a  href="manage_book.php" class="dropdown-item">Manage Books</a></li>
                    </ul> 
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">Category<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                         <li><a href="add_cat.php" class="dropdown-item">Add New category</a></li>
                        <li><a class="dropdown-item">Manage category</a></li>
                    </ul> 
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">Author<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                         <li><a href="add_author.php" class="dropdown-item">Add New Author</a></li>
                        <li><a   class="dropdown-item">Manage Author</a></li>
                    </ul> 
                </li>

                <li class="nav-item">
                    <a href="issue_book.php" class="nav-link">Issue Book</a>
                </li>

            </ul>
        </div>
</nav>



<!-- navbar  end-->

    <span><marquee>This is Library Managment System. library opens at 8:00 AM and close at 8:00 PM</marquee></span>

    <div class="row">
    <!-- Card 1 -->
    <div class="col-md-3 mb-4">
        <div class="card border-primary bg-light">
            <div class="card-header text-center font-weight-bold text-primary">
                Registered Users:
            </div>
            <div class="card-body text-center">
                <p class="card-text">No. of total users: <?php  echo $a; ?></p>
                <a href="register.php" class="btn btn-danger btn-sm" target="_blank">View Registered Users</a>
            </div>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="col-md-3 mb-4">
        <div class="card border-success bg-light">
            <div class="card-header text-center font-weight-bold text-success">
                Registered Books:
            </div>
            <div class="card-body text-center">
                <p class="card-text">No. of availible books: <?php echo $b; ?></p>
                <a href="regbook.php" class="btn btn-primary btn-sm" target="_blank">View Active Books</a>
            </div>
        </div>
    </div>

    <!-- Card 3 -->
    <div class="col-md-3 mb-4">
        <div class="card border-warning bg-light">
            <div class="card-header text-center font-weight-bold text-warning">
               Registered Category:
            </div>
            <div class="card-body text-center">
                <p class="card-text">No. of  book,s Category: <?php  echo $c;  ?></p>
                <a href="regcateg.php" class="btn btn-warning btn-sm" target="_blank">View Category</a>
            </div>
        </div>
    </div>

    <!-- Card 4 -->
    <div class="col-md-3 mb-4">
        <div class="card border-danger bg-light">
            <div class="card-header text-center font-weight-bold text-danger">
                Registered Authors:
            </div>
            <div class="card-body text-center">
                <p class="card-text">No. of availible authors: <?php echo $d;  ?></p>
                <a href="regauthor.php" class="btn btn-info btn-sm" target="_blank">View Authors</a>
            </div>
        </div>
    </div>
    <!-- Card 5 -->
    <div class="col-md-3 mb-4">
        <div class="card border-danger bg-light">
            <div class="card-header text-center font-weight-bold text-danger">
                Issued Books:
            </div>
            <div class="card-body text-center">
                <p class="card-text">No. of Issued Books: <?php echo $e;  ?> </p>
                <a href="view_issued_book.php" class="btn btn-success btn-sm" target="_blank">View Issued Books</a>
            </div>
        </div>
    </div>
</div>






</body>
</html>