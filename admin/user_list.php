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
                        <h1 class="page-header">User
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Username</th>
                                <th>Level</th>  
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $select = "SELECT * FROM user";
                                $result = mysqli_query($mysqli, $select);
                                while ($row = mysqli_fetch_array($result)){
                                   $user_id = $row['user_id'];
                                   $user_name = $row['user_name'];
                                   $user_role = $row['user_role'];
                                 
                                  echo "<tr class='odd gradeX' align='center'>
                                  <td>$user_id</td>
                                  <td>$user_name</td>
                                  <td>$user_role</td>
                                  <td class='center'><i class='fa fa-trash-o  fa-fw'></i><a href='user_delete.php?id=$user_id'> Delete</a></td>
                                  <td class='center'><i class='fa fa-pencil fa-fw'></i> <a href='user_edit.php?id=$user_id'>Edit</a></td>
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
