<?php
    include 'header.php';
    include '../config/connect.php';
?>

<body>
<?php 
                    
                    if(isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $select = "SELECT * FROM post WHERE post_id = '$id' LIMIT 1";
                        $result = mysqli_query($mysqli, $select) or die(mysqli_error($mysqli));
                        $row = mysqli_fetch_array($result);
                        $post_title = $row['post_title'];
                        $post_category = $row['category_id'];                    
                        $post_desc = $row['post_desc'];
                        $post_content = $row['post_content'];
                        $post_thumnbail = $row['post_thumbnail'];
                        $post_images = $row['post_images'];
                        
                        
                        if(isset($_POST['update'])){
                            $update_title = $_POST['update_title'];
                            $update_desc = $_POST['update_desc'];
                            $update_cate = $_POST['update_category'];
                            $update_content = $_POST['update_content'];
                            $update_thumbnail = $_FILES['update_thumbnail']['name'];
                            $update_thumbnail_tmp = $_FILES['update_thumbnail']['tmp_name'];
                            $update_images = $_FILES['update_images']['name'];
                            $update_images_tmp = $_FILES['update_images']['tmp_name'];
                            
                            unlink($post_thumbnail);
                            unlink($post_images);

                            move_uploaded_file($update_images_tmp,"./post_thumbnail/$update_thumbnail");
                            move_uploaded_file($update_images_tmp,"./post_images/$update_images");
                            $update_post = "UPDATE post SET post_title = '$update_title',
                            post_desc = '$update_desc', post_content = '$update_content', category_id = '$update_cate'
                            , post_images = '$update_images', post_thumbnail = '$update_thumbnail',
                            post_date = NOW()  WHERE post_id = '$id'";
                            $result = mysqli_query($mysqli, $update_post) or die(mysqli_error($mysqli));
                            if($result) {
                                echo "<script>alert('update success')</script>";
                                echo "<script>window.open('post_list.php','_self')</script>";
                            }
                        }
                    }
                   
                ?>
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
                        <h1 class="page-header">Product
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            
                                <select name="update_category" class="form-control">
                                    <option value="0">Please Choose Category</option>
                                    <?php
                                    $select_cate = "SELECT * FROM categories";
                                    $result = mysqli_query($mysqli, $select_cate) or die(mysqli_error($mysqli));
                                    while($row = mysqli_fetch_array($result)) {
                                        $cate_id = $row['category_id'];
                                        $cate_name = $row['category_name'];
                                       echo "<option value='$cate_id'>$cate_name</option>" ;
                                    }
                                ?>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input value="<?php echo $post_title ?>" class="form-control" name="update_title" placeholder="Please Enter Post title" />
                            </div>
                            <div class="form-group">
                                <label>thumbnail</label>
                                <input type="file" name="update_thumbnail">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input value="<?php echo $post_desc ?>" class="form-control" name="update_desc" placeholder=" Enter Post Description" />
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea value="<?php echo $post_content ?>" class="form-control" rows="3" name="update_content"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" name="update_images">
                            </div>
                            <button name="update" type="submit" class="btn btn-default">Post Add</button>
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
