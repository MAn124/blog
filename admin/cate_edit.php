<?php 
    include 'header.php';
    include '../config/connect.php';
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
                        <h1 class="page-header">Category
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    <?php 
                    
                        if(isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $select = "SELECT * FROM categories WHERE category_id = '$id' LIMIT 1";
                            $result = mysqli_query($mysqli, $select) or die(mysqli_error($mysqli));
                            $row = mysqli_fetch_array($result);
                            $cate_name = $row['category_name'];
                            $cate_id = $row['category_id'];

                            if(isset($_POST['update'])){
                                $input_name = $_POST['txtCateName'];
    
                                $update_cate = "UPDATE categories SET category_name = '$input_name' WHERE category_id = '$id'";
                                $result = mysqli_query($mysqli, $update_cate) or die(mysqli_error($mysqli));
                                if($result) {
                                    echo "<script>alert('update success')</script>";
                                    echo "<script>window.open('cate_list.php','_self')</script>";
                                }
                            }
                        }
                       
                    ?>
                        <form action="" method="POST">
                         
                            <div class="form-group">
                                <label>Category Name</label>
                                <input value="<?php echo $cate_name ?>" class="form-control" name="txtCateName" placeholder="Please Enter Category Name" />
                            </div>
                          
                            <button name="update" type="submit" class="btn btn-default">Category Edit</button>
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
