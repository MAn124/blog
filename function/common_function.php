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
                        <img src='../admin/post_images/$post_images' alt='' class='img-fluid'>
                            <div class='hovereffect'></div>
                        </a>
                    </div><!-- end media -->
                </div><!-- end col -->

                <div class='blog-meta big-meta col-md-8'>
                    <h4><a href='post_detail.php?post_id=$post_id' title=''>$post_title</a></h4>
                    <p>$post_desc</p>
                    <small class='firstsmall'><a class='bg-orange' href='tech-category-01.html' title=''>Gadgets</a></small>
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
                    <img src='../admin/post_images/$post_images' alt='' class='img-fluid'>
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
                <small><a href='tech-single.php' title=''>$post_date</a></small>
            </div><!-- end meta -->

          
        </div><!-- end title -->

        <div class='single-post-media'>
            <img src='upload/tech_menu_08.jpg' alt='' class='img-fluid'>
        </div><!-- end media -->

        <div class='blog-content'>  
        $post_content
        </div><!-- end content -->";
        }
    }}
}
?>
  