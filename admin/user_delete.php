<?php 
  include '../config/connect.php';
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $delete = "DELETE FROM user WHERE user_id = '$id'";
        $result = mysqli_query($mysqli, $delete) or die(mysqli_error($mysqli));
        if($result) {
            echo "<script>alert('Delete success')</script>";
            echo "<script>window.open('user_list.php','_self')</script>";
        }
    }
?>