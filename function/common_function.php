<?php
   function get_post() {
    global $mysqli;
    if(!isset($_GET['category'])) {
        $select_all = "SELECT * FROM post";
        $sql = mysqli_query($mysqli,$select_all);
        while($row = mysqli_fetch_array($sql)) {
            $post_title = $row['post_title'];
            $post_desc = $row['post_desc'];
            $post_date = $row['post_date'];
            $post_images = $row['post_images'];
            $post_id = $row['post_id'];

            echo " <div class='blog-list clearfix'>
            <div class='blog-box row'>
                <div class='col-md-4'>
                    <div class='post-media'>
                        <a href='post_detail.php?post_id=$post_id' title=''>
                        <img src='./admin/post_images/$post_images' alt='' class='img-fluid'>
                            <div class='hovereffect'></div>
                        </a>
                    </div><!-- end media -->
                </div><!-- end col -->

                <div class='blog-meta big-meta col-md-8'>
                    <h4><a href='post_detail.php?post_id=$post_id' title=''>$post_title</a></h4>
                    <p>$post_desc</p>
                    <small><a href='post_detail.php?post_id=$post_id' title=''>$post_date</a></small>
                </div><!-- end meta -->
            </div><!-- end blog-box -->

            <hr class='invis'>
            ";
        }
    }
   }
   function get_unique_cate() {
    global $mysqli;

    if(isset($_GET['category'])) {
     $categories_id = $_GET['category'];
    $select_query = "SELECT * FROM post WHERE category_id = '$categories_id'";
    $result_query = mysqli_query($mysqli,$select_query) or die(mysqli_error($mysqli));
    while($row = mysqli_fetch_array($result_query)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_desc = $row['post_desc'];
        $post_date = $row['post_date'];
        $post_images = $row['post_images'];
        echo " <div class='blog-list clearfix'>
        <div class='blog-box row'>
            <div class='col-md-4'>
                <div class='post-media'>
                    <a href='post_detail.php?post_id=$post_id' title=''>
                    <img src='./admin/post_images/$post_images' alt='' class='img-fluid'>
                        <div class='hovereffect'></div>
                    </a>
                </div><!-- end media -->
            </div><!-- end col -->

            <div class='blog-meta big-meta col-md-8'>
                <h4><a href='post_detail.php?post_id=$post_id' title=''>$post_title</a></h4>
                <p>$post_desc</p>
                <small class='firstsmall'><a class='bg-orange' href='post_detail.php?post_id=$post_id' title=''>Gadgets</a></small>
                <small><a href='post_detail.php?post_id=$post_id' title=''>$post_date</a></small>
            </div><!-- end meta -->
        </div><!-- end blog-box -->

        <hr class='invis'>
        ";
    }

    }
}
function view_detail() {
    global $mysqli;
    if(isset($_GET['post_id'])){
    if(!isset($_GET['category'])) {
        $post_id = $_GET['post_id'];
        $select_query = "SELECT * FROM post WHERE post_id = $post_id LIMIT 1";
        $result_query = mysqli_query($mysqli,$select_query) or die(mysqli_error($mysqli));
        while($row = mysqli_fetch_array($result_query)) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_desc = $row['post_desc'];
            $post_date = $row['post_date'];
            $post_images = $row['post_images'];
            $post_content = $row['post_content'];

            echo " <div class='blog-title-area text-center'>
            <span class='color-orange'><a href='tech-category-01.php' title=''>Technology</a></span>

            <h3>$post_title</h3>

            <div class='blog-meta big-meta'>
                <small><a href='author.php?id=$post_id' title=''>$post_date</a></small>
            </div><!-- end meta -->

          
        </div><!-- end title -->

        <div class='single-post-media'>
            <img src='./admin/post_images/$post_images' alt='' class='img-fluid'>
        </div><!-- end media -->

        <div class='blog-content'>  
        $post_content
        </div><!-- end content -->";
        }
    }}
}

function view_author() {
    global $mysqli;
    if(isset($_GET['post_id'])){
    if(!isset($_GET['category'])) {
        $post_id = $_GET['post_id'];
        $select_query = "SELECT * FROM post WHERE post_id = $post_id LIMIT 1";
        $result_query = mysqli_query($mysqli,$select_query) or die(mysqli_error($mysqli));
        while($row = mysqli_fetch_array($result_query)) {
            $post_author = $row['post_author'];
           
            $select_author = "SELECT * FROM user WHERE user_id = '$post_author'";
            $result = mysqli_query($mysqli,$select_author) or die(mysqli_error($mysqli));
            while($row_author = mysqli_fetch_array($result) ) {
                $author_name = $row_author['user_name'];
                $author_desc = $row_author['user_profile'];
                echo "<div class='custombox authorbox clearfix'>
                <h4 class='small-title'>About author</h4>
                <div class='row'>
                    <div class='col-lg-2 col-md-2 col-sm-2 col-xs-12'>
                        <img src='upload/author.jpg' alt='' class='img-fluid rounded-circle'> 
                    </div><!-- end col -->

                    <div class='col-lg-10 col-md-10 col-sm-10 col-xs-12'>
                     
                       <h4><a href='author_deatail.php?id='> $author_name</a></h4>
                                <p>Quisque sed tristique felis. Lorem <a href='#'>visit my website</a> $author_desc</p>

                                <div class='topsocial'>
                                    <a href='#' data-toggle='tooltip' data-placement='bottom' title='Facebook'><i class='fa fa-facebook'></i></a>
                                    <a href='#' data-toggle='tooltip' data-placement='bottom' title='Youtube'><i class='fa fa-youtube'></i></a>
                                    <a href='#' data-toggle='tooltip' data-placement='bottom' title='Pinterest'><i class='fa fa-pinterest'></i></a>
                                    <a href='#' data-toggle='tooltip' data-placement='bottom' title='Twitter'><i class='fa fa-twitter'></i></a>
                                    <a href='#' data-toggle='tooltip' data-placement='bottom' title='Instagram'><i class='fa fa-instagram'></i></a>
                                    <a href='#' data-toggle='tooltip' data-placement='bottom' title='Website'><i class='fa fa-link'></i></a>
                                </div><!-- end social -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end author-box -->
";
            }
        }
        }
    }
}
?>
  