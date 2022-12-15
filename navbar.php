<?php
    include './config/connect.php';
?>
<header class="tech-header header">
            <div class="container-fluid">
                <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-dark">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="images/version/tech-logo.png" alt=""></a>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <?php
                                $select_query = "SELECT * FROM categories";
                                $result = mysqli_query($mysqli, $select_query) or die(mysqli_error($mysqli));
                                while ($row = mysqli_fetch_array($result)){
                                    $cate_id = $row['category_id'];
                                    $cate_name = $row['category_name'];
                                    echo "  <li class='nav-item'>
                                    <a class='nav-link' href='index.php?category=$cate_id'>$cate_name</a>
                                </li>";       
                                }
                            ?>
                        
                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">Contact Us</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav mr-2">
                           
                            <li class="nav-item">
                                <a class="nav-link" href="./admin/login.php"><i class="fa-solid fa-user"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div><!-- end container-fluid -->
        </header><!-- end market-header -->