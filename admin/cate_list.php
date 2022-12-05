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
            <!-- /.navbar-static-side -->
    

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover ">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $select_cate = "SELECT * FROM categories";
                                $result = mysqli_query($mysqli, $select_cate) or die(mysqli_error($mysqli));
                                while($row = mysqli_fetch_array($result)) {
                                    $cate_id = $row['category_id'];
                                    $cate_name = $row['category_name'];
                                    echo "<tr class='odd gradeX' align='center'>
                                    <td>$cate_id</td>
                                    <td>$cate_name  </td>
                                    <td name='delete_category' class='center'><i class='fa fa-trash-o  fa-fw'></i><a href='cate_delete.php?id=$cate_id'> Delete</a></td>
                                    <td class='center'><i class='fa fa-pencil fa-fw'></i> <a href='cate_edit.php?id=$cate_id'>Edit</a></td>
                                </tr>";
                                };
                                
                              
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
