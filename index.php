<?php
    include 'header.php';
    include './function/common_function.php';
?>
<body>

    <div id="wrapper">
       <?php 
        include 'navbar.php';
       ?>

        <section class="section first-section">
            <div class="container-fluid">
                <div class="masonry-blog clearfix">
                    <?php 

                        $select_cate = "SELECT * FROM categories WHERE category_id =' post.category_id'";
                        $result_select = mysqli_query($mysqli, $select_cate) or die(mysqli_error($mysqli));
                        $row_data = mysqli_fetch_array($result);
                        $cate_name = $row_data['category_name'];
                        echo "$cate_name";

                        $select_post = "SELECT * FROM post WHERE category_id = 1 ORDER BY RAND() LIMIT 1";
                        $result = mysqli_query($mysqli, $select_post) or die(mysqli_error($mysqli));

                        while ( $row= mysqli_fetch_array($result)){
                            $post_thumbnail = $row["post_thumbnail"];
                            $post_id = $row["post_id"];
                            $post_title  =$row['post_title'];
                            $post_date  =$row['post_date'];
                            echo " <div class='first-slot'>
                            <div class='masonry-box post-media'>
                                <img src='./admin/post_thumbnail/$post_thumbnail' alt='' class='img-fluid' >
                                 <div class='shadoweffect'>
                                    <div class='shadow-desc'>
                                        <div class='blog-meta'>
                                            <span class='bg-orange'><a href='tech-category-01.html' title=''> $cate_name </a></span>
                                            <h4><a href='post_detail.php?id=$post_id' title=''> $post_title </a></h4>
                                            <small><a href='post_detail.php?id=$post_id' title=''>$post_date</a></small>
                                        </div><!-- end meta -->
                                    </div><!-- end shadow-desc -->
                                </div><!-- end shadow -->
                            </div><!-- end post-media -->
                        </div><!-- end first-side -->";
                        }
                        ?>
                         <?php 
                  
                  $select_cate = "SELECT * FROM categories WHERE category_id =' post.category_id'";
                  $result_select = mysqli_query($mysqli, $select_cate) or die(mysqli_error($mysqli));
                  $row_data = mysqli_fetch_array($result);
                  $cate_name = $row_data['category_name'];

                    $select_post = "SELECT * FROM post WHERE category_id = 2 ORDER BY RAND() LIMIT 1";
                    $result = mysqli_query($mysqli, $select_post) or die(mysqli_error($mysqli));
                    while ( $row= mysqli_fetch_array($result)){
                        $post_thumbnail = $row["post_thumbnail"];
                        $post_title  =$row['post_title'];
                        $post_date  =$row['post_date'];
                        echo " <div class='second-slot'>
                        <div class='masonry-box post-media'>
                            <img src='./admin/post_thumbnail/$post_thumbnail' alt='' class='img-fluid'>
                            
                            <div class='shadoweffect'>
                                <div class='shadow-desc'>
                                    <div class='blog-meta'>
                                        <span class='bg-orange'><a href='tech-category-01.html' title=''>Gadgets</a></span>
                                        <h4><a href='post_detail.php?id=$post_id' title=''> $post_title</a></h4>
                                        <small><a href='post_detail.php?id=$post_id' title=''>$post_date </a></small>
                                        
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end second-side -->
                                        ";
                  }
                  ?>
                      <?php 

                    $select_cate = "SELECT * FROM categories WHERE category_id =' post.category_id'";
                    $result_select = mysqli_query($mysqli, $select_cate) or die(mysqli_error($mysqli));
                    $row_data = mysqli_fetch_array($result);
                    $cate_name = $row_data['category_name'];
                  
                  $select_post = "SELECT * FROM post WHERE category_id = 2 ORDER BY RAND() LIMIT 1";
                  $result = mysqli_query($mysqli, $select_post) or die(mysqli_error($mysqli));
                  while ( $row= mysqli_fetch_array($result)){
                      $post_thumbnail = $row["post_thumbnail"];
                      $post_title  =$row['post_title'];
                      $post_date  =$row['post_date'];
                      echo " <div class='last-slot'>
                      <div class='masonry-box post-media'>
                           <img src='./admin/post_thumbnail/$post_thumbnail' alt='' class='img-fluid'>
                           <div class='shadoweffect'>
                              <div class='shadow-desc'>
                                  <div class='blog-meta'>
                                      <span class='bg-orange'><a href='tech-category-01.html' title=''>Technology</a></span>
                                      <h4><a href='post_detail.php?id=$post_id' title=''> $post_title</a></h4>
                                      <small><a href='post_detail.php?id=$post_id' title=''> $post_date</a></small>
                                    
                                  </div><!-- end meta -->
                              </div><!-- end shadow-desc -->
                           </div><!-- end shadow -->
                      </div><!-- end post-media -->
                  </div><!-- end second-side -->
              </div><!-- end masonry -->";
                }
                ?> 
                    
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-top clearfix">
                                <h4 class="pull-left">Recent News <a href="#"><i class="fa fa-rss"></i></a></h4>
                            </div><!-- end blog-top -->
                            <?php 
                            get_post();
                            get_unique_cate();
                            ?>

                        <hr class="invis">

                        <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-start">
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->

                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <div class="dmtop">Scroll to Top</div>
 <?php
    include 'footer.php';
 ?>

</body>
</html>