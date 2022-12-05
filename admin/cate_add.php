<?php 
    include 'header.php';
    include '../config/connect.php';

    if(isset($_POST['add_cate'])) {
        $cate_name = $_POST['CateName'];

        $sql = "INSERT INTO categories (category_name)
        VALUES ('$cate_name')";
        $result = mysqli_query($mysqli, $sql);
        if($result) {
            echo "<script>alert('Add success')</script>";
            echo "<script>window.open('cate_list.php','_self')</script>";
        }
    }
?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        
            <?php 
                 
                    include 'sidebar.php';
                ?>
            <!-- /.navbar-static-side -->
   

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST">
                           
                            <div class="form-group">
                                <label>Category Name</label>
                                <input class="form-control" name="CateName" placeholder="Please Enter Category Name" />
                            </div>
                           
                            <button name="add_cate" type="submit" class="btn btn-default">Category Add</button>
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
