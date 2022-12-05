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
                        <h1 class="page-header">Product
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $select_cate = "SELECT * FROM post";
                                $result = mysqli_query($mysqli, $select_cate) or die(mysqli_error($mysqli));
                                while($row = mysqli_fetch_array($result)) {
                                    $post_id = $row['post_id'];
                                    $post_title = $row['post_title'];
                                    $post_desc = $row['post_desc'];
                                    $post_date = $row['post_date'];
                                    echo " <tr class='odd gradeX' align='center'>
                                    <td>$post_id</td>
                                    <td>$post_title</td>
                                    <td>$post_desc</td>
                                    <td>$post_date</td>
                                   
                                    <td class='center'><i class='fa fa-trash-o  fa-fw'></i><a href='post_delete.php?id=$post_id'> Delete</a></td>
                                    <td class='center'><i class='fa fa-pencil fa-fw'></i> <a href='post_edit.php?id=$post_id'>Edit</a></td>
                                </tr>";
                                }
                            ?>
                           
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php
            if(isset($_GET['post_delete'])) {
                include 'post_delete.php';
            }
            if(isset($_GET['post_edit'])) {
                include 'post_edit.php';
            }
        ?>
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
