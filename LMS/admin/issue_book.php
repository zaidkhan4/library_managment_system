<?php

include '../user.php';
$test = new library();

$aut = $test->author_fetch_data();

if(isset($_POST['issue_book'])){
    $test->insert_issue_book_data($_POST);
}




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
                        <li><a href="manage_book.php" class="dropdown-item">Manage Books</a></li>
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
                         <li><a href="add_author.php"  class="dropdown-item">Add New Author</a></li>
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
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="" method="post">
                <div class="form-group">
                    <label>Book Name</label>
                    <input type="text" name="book_name" class="form-control" require>
                </div>

                <div class="form-group">
                    <label>Book Author</label>
                    <select name="book_author"class="form-control">
                        <option>-Select author-</option>
                        <?php  foreach ($aut as  $value) {
                            ?>
                            <option><?php echo $value['author_name'];  ?></option>
                         
                            <?php  } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Book Number</label>
                    <input type="text" name="book_no" class="form-control" require>
                </div>

                <div class="form-group">
                    <label>Student ID</label>
                    <input type="text" name="student_id" class="form-control" require>
                </div>

                <div class="form-group">
                    <label>Issue Date</label>
                    <input type="text" name="issue_date" class="form-control"
                    value="<?php echo date("yy-m-d"); ?>" require>
                </div>

                <button class="btn btn-warning" name="issue_book">Issue Book</button>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>

</body>
</html>