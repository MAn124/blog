<?php
    include 'header.php';
    include '../config/connect.php';

    if(isset($_POST['user_add'])) {
        $user_name = $_POST['user_name'];
        $user_password = $_POST['user_password'];
        $user_phone = $_POST['user_phone'];
        $user_email = $_POST['user_email'];
        $user_role = $_POST['user_role'];

        $sql = "INSERT INTO user (user_name, user_password, user_email, user_phone, user_role)
        VALUES ('$user_name', '$user_password', '$user_email', '$user_phone','$user_role')";
        $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
        if($result) {
            echo "<script>alert('Add success')</script>";
            echo "<script>window.open('user_list.php','_self')</script>";
        }
    }
?>
<body>

    <div id="wrapper">

    <?php
           
            include 'sidebar.php';
        ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" required="required" name="user_name" placeholder="Please Enter Username" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" required="required" name="user_password" placeholder="Please Enter Password" />
                            </div>
                            <div class="form-group">
                                <label>Phone number</label>
                                <input type="text" class="form-control" required="required" name="user_phone" placeholder="Please Enter Your Phone Numbers" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" required="required" name="user_email" placeholder="Please Enter Email" />
                            </div>
                            <div class="form-group">
                                <label>User Level</label>
                                <label class="radio-inline">
                                    <input name="user_role" value="1"  type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="user_role" value="2" checked="" type="radio">Member
                                </label>
                            </div>
                            <button name="user_add" type="submit" class="btn btn-default">User Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
</body>

</html>
