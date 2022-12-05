<?php
    include 'header.php';
    include '../config/connect.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $select = "SELECT * FROM user WHERE user_id = '$id'";
        $result = mysqli_query($mysqli, $select) or die(mysqli_error($mysqli));
        $row = mysqli_fetch_array($result);
        $user_name = $row['user_name'];
        $user_password = $row['user_password'];
        $user_email = $row['user_email'];
        $user_phone = $row['user_phone'];
    }
    if(isset($_POST['user_update'])) {
        $update_name = $_POST['update_name'];
        $update_password = $_POST['update_password'];
        $update_email = $_POST['update_email'];
        $update_phone = $_POST['update_phone'];

        $update_query = "UPDATE user SET user_name = '$update_name', user_password = '$update_password'
        user_email = '$update_email', user_phone ='$update_phone'";
        $result_update = mysqli_query($mysqli, $update_query) or die(mysqli_error($mysqli));
        if($result_update) {
            echo "<script>alert('Update success')</script>";
            echo "<script>window.open('user_list.php','_self')</script>";
        }
    }
?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php
            include 'sidebar.php';
        ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input value="<?php echo $user_name ?>" class="form-control" required="required" name="update_name" placeholder="Please Enter Username" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input value="<?php echo $user_password ?>" type="password" class="form-control" required="required" name="update_password" placeholder="Please Enter Password" />
                            </div>
                            <div class="form-group">
                                <label>Phone number</label>
                                <input value="<?php echo $user_phone ?>" type="text" class="form-control" required="required" name="update_phone" placeholder="Please Enter Your Phone Numbers" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input value="<?php echo $user_email ?>" type="email" class="form-control" required="required" name="update_email" placeholder="Please Enter Email" />
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
                            <button name="user_update" type="submit" class="btn btn-default">User Add</button>
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
