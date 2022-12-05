<?php
    include 'header.php';
    include '../config/connect.php';
    session_start();

    if(isset($_POST['login'])) {
        $user_name = $_POST['email'];
        $user_password = $_POST['password'];
    
        $select = "SELECT * FROM user WHERE user_name = '$user_name' AND 
        user_password = '$user_password'";
        $result = mysqli_query($mysqli, $select) or die(mysqli_error($mysqli));
        $row = mysqli_fetch_array($result);
        $row_data = mysqli_num_rows($result);

        if($row > 0) {
            if(password_verify($user_password, $row['user_password'])){
                if($row['user_role'] == 1) {
                $_SESSION['user_name'] = $user_name;
                echo "<script>alert('Login success')</script>";
                echo "<script>window.open('post_list.php','_self')</script>";
                } else {
                    $_SESSION['user_name'] = $user_name;
                    echo "<script>alert('Login success')</script>";
                    echo "<script>window.open('../index.php','_self')</script>";
                }
                $_SESSION['user_name'] = $user_name;
                echo "<script>alert('Login success')</script>";
            }else {
                echo "<script>alert('Invalid information')</script>";
            }
        }else {
            echo "<script>alert('Invalid information')</script>";
        }
    }
?>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <button name="login" type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
