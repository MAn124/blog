<?php
    include 'header.php';
    include '../config/connect.php';

    if(isset($_POST['post_add'])) {
        $post_title = $_POST['post_title'];
        $post_thumbnail = $_FILES['post_thumbnail']['name'];
        $post_thumbnail_tmp = $_FILES['post_thumbnail']['tmp_name'];
        $post_desc = $_POST['post_desc'];
        $post_category = $_POST['post_category'];
        $post_content = $_POST['post_content'];
        $post_images = $_FILES['post_images']['name'];
        $post_images_tmp = $_FILES['post_images']['tmp_name'];
        $post_author = $_POST['post_author'];
        

        if($post_title == '' || $post_desc == '' || $post_thumbnail == '' || $post_content == '' || $post_images == '') {
            echo "<script>alert('Not allow empty text field')</script>";
            exit();
        } else {
            move_uploaded_file($post_thumbnail_tmp,"./post_thumbnail/$post_thumbnail");
            move_uploaded_file($post_images_tmp,"./post_images/$post_thumbnail");

            $insert_query = "INSERT INTO post (category_id, post_title,post_desc,post_thumbnail	,post_content,
        post_images,post_date, post_author)  VALUES ('$post_category','$post_title', '$post_desc', '$post_thumbnail', '$post_content',
         '$post_images', NOW(), '$post_author' )";
         $result_insert = mysqli_query($mysqli, $insert_query) or die(mysqli_error($mysqli));
         if($result_insert) {
            echo "<script>alert('Add success')</script>";
         }
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
                        <h1 class="page-header">Post
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            
                                <select name="post_category" class="form-control">
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
                                <input class="form-control" name="post_title" placeholder="Please Enter Post title" />
                            </div>
                            <div class="form-group">
                                <label>thumbnail</label>
                                <input type="file" name="post_thumbnail">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input class="form-control" name="post_desc" placeholder=" Enter Post Description" />
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" rows="3" name="post_content"></textarea>
                            </div>
                            <div class="form-group">
                            
                            <select name="post_author" class="form-control">
                               
                                <?php
                                $select_user = "SELECT * FROM user";
                                $result = mysqli_query($mysqli, $select_user) or die(mysqli_error($mysqli));
                                while($row = mysqli_fetch_array($result)) {
                                    $user_id = $row['user_id'];
                                    $user_name = $row['user_name'];
                                   echo "<option value='$user_id'>$user_name</option>" ;
                                }
                            ?>
                                
                            </select>
                        </div>
                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" name="post_images">
                            </div>
                         
                            <button name="post_add" type="submit" class="btn btn-default">Post Add</button>
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
