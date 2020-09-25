<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Advenco Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    
    <!-- Custom CSS -->
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Log In</h3>
                    </div>
                    <div class="panel-body">
                    <?php 
                              //check for any errors
                               if(isset($_GET["msg"]))     
                                {
                                    if ($_GET["msg"] == 1) {
                                        
                                    
                                       ?>
                                         <div class="alert alert-danger">
                                             
                                             <p><i class="fa fa-lg fa-warning"></i>&nbsp;Wrong Password</p>
                                             </div>
                                             <?php
                                    }elseif ($_GET['msg'] == 2) {
                                        ?>
                                        <div class="alert alert-danger">
                                             
                                             <p><i class="fa fa-lg fa-warning"></i>&nbsp;Your access has been revoked.Please contact the admin</p>
                                             </div>
                                        <?php
                                    }elseif ($_GET['msg'] == 3) {
                                        ?>
                                        <div class="alert alert-danger">
                                             
                                             <p><i class="fa fa-lg fa-warning"></i>&nbsp;You are logged in another device</p>
                                             </div>
                                        <?php
                                    }elseif ($_GET['msg'] == 4) {
                                        ?>
                                        <div class="alert alert-danger">
                                             
                                             <p><i class="fa fa-lg fa-warning"></i>&nbsp;Contact Administrators for permisions.</p>
                                             </div>
                                        <?php
                                    }
                                }
                            ?>
                         <form action="login_action.php" method="POST" class="margin-bottom-0">
                            <div class="form-group m-b-20">
                                <input type="password" name="password" class="form-control input-lg" placeholder="Password" required  autofocus/ >
                            </div>
                            <div class="login-buttons">
                                <button type="submit" name="login" class="btn btn-success btn-block btn-lg">Log In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="assets/js/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>


    <!-- Custom Theme JavaScript -->
    <script src="assets/js/sb-admin-2.js"></script>

</body>

</html>
