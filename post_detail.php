<?php
    include 'header.php';
    include './config/connect.php';
    include './function/common_function.php';

?>
<body>
<body>

    <div id="wrapper">
    <?php
            include 'navbar.php';
           
        ?>
        <section class="section single-wrapper">
            <div class="container">
                <div class="row" style="justify-content: center;">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <?php
                            view_detail();
                            ?>

                          
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="banner-spot clearfix">
                                        <div class="banner-img">
                                            <img src="upload/banner_01.jpg" alt="" class="img-fluid">
                                        </div><!-- end banner-img -->
                                    </div><!-- end banner -->
                                </div><!-- end col -->
                            </div><!-- end row -->

                            <hr class="invis1">

                            <div class="custombox prevnextpost clearfix">
                                <div class="row">
                                  
                            </div><!-- end author-box -->

                            <hr class="invis1">

                           

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title">You may also like</h4>
                                <div class="row">
                                <?php 
                                                $select_query = "SELECT * FROM post ORDER BY RAND() LIMIT 2";
                                                $result = mysqli_query($mysqli, $select_query) or die(mysqli_error($mysqli));
                                                while ($row = mysqli_fetch_array($result)){
                                                    $post_name = $row['post_title'];
                                                    $post_date = $row['post_date'];
                                                    $post_images = $row['post_images'];
                                                    $post_id = $row['post_id'];

                                                    echo "<div class='col-lg-6'>
                                                    <div class='blog-box'>
                                                        
                                                        <div class='post-media'>
                                                            <a href='post_detail.php?id=$post_id' title=''>
                                                            <img src='./admin/post_images/$post_images' alt='' class='img-fluid'>

                                                                <div class='hovereffect'>
                                                                    <span class=''></span>
                                                                </div><!-- end hover -->
                                                            </a>
                                                        </div><!-- end media -->
                                                        <div class='blog-meta'>
                                                            <h4><a href='post_detail.php?id=$post_id' title=''</a>$post_name</h4>  
                                                            <small><a href='blog-category-01.php' title=''>$post_date</a></small>
                                                        </div><!-- end meta -->
                                                    </div><!-- end blog-box -->
                                                </div><!-- end col -->";
                                                }
                                            ?>
                                    

                                   
                                </div><!-- end row -->
                            </div><!-- end custom-box -->

                           
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->

                   
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
<?php

    include 'footer.php';
?>

        <div class="dmtop">Scroll to Top</div>
        
    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>