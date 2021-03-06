<?php
    require_once 'connection.php';
    require_once 'procedures.php';
    require_once 'signup.php';
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Toolshop</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Toolshop</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
            <?php
            require_once 'login.php';
                if(isset($_SESSION['login_user']))
                {
                    require_once 'loggedIn.php';
                }
                else
                {
                    require_once 'notLoggedIn.php';
                }
            ?>
            </ul>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <!-- Modal -->
        <form method="post" action="signup.php"> 
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Register</h4>
                        </div>
                            <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="reg_firstName" id="reg_firstName" placeholder="First Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="reg_lastName" id="reg_lastName" placeholder="Last Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="reg_email" id="reg_email" placeholder="Email Address" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="reg_username" id="reg_username" placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="reg_password" id="reg_password" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="reg_passwordConfirm" id="reg_passwordConfirm" placeholder="Confirm Password" required>
                                    </div>
                            </div>
                            <div class="modal-footer">
                        <button name="registerUser" type="submit" id="registerUserButton" value="Register" class="btn btn-primary btn-block" >Sign Up</button>

                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-md-3">
            <p class="lead">Home</p>
            <div class="list-group">
                <?php
                    require_once 'displayCategories.php'; 
                ?>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <?php
                    require_once 'displayItems.php';
                ?>
            </div>
        </div>
    </div>
</div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Toolshop 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/custom.js" type="text/javascript"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
