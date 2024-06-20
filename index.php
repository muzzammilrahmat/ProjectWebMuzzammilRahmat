<?php
include('includes/config.php');

$page_title = "Home Page";
$meta_description = "Home page description bloggin website";
$meta_keywords = "php, html, laravel";

include('includes/header.php');
include('includes/navbar.php');
?>

<div class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-white">Category</h3>
                <div class="underline"></div>
            </div>

            <?php
                $homeCategory = "SELECT * FROM categories WHERE navbar_status='0' AND status='0' LIMIT 12 ";
                $homeCategory_run = mysqli_query($con,$homeCategory);

                if(mysqli_num_rows($homeCategory_run) > 0)
                {
                    foreach($homeCategory_run as $homeCateItem)
                    {
                        ?>
                            <div class="col-md-3 mb-4">
                                <a class="text-decoration-none" href="category.php?title=<?= $homeCateItem['slug']; ?>">
                                    <div class="card card-body">
                                        <?= $homeCateItem['name']; ?>
                                    </div>
                                </a>
                            </div>
                        <?php
                    } 
            }
            ?>
        </div>
    </div>
</div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3 class="text-dark">Web Programming</h3>
                <div class="underline"></div>
                <p>
                This course is taught to achieve competency in making and developing web-based applications through understanding network technology, the internet, programming languages ​​and various technological collaborations so that students will be able to create and develop web-based applications.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3 class="text-dark">Latest Posts</h3>
                <div class="underline"></div>

                <?php
                    $homePosts = "SELECT * FROM posts WHERE status='0' ORDER BY id DESC LIMIT 12";
                    $homePosts_run = mysqli_query($con, $homePosts);

                    if(mysqli_num_rows($homePosts_run) > 0)
                    {
                        foreach($homePosts_run as $homePostItem)
                        {
                            ?>
                                <div class="mb-4">
                                    <a class="text-decoration-none" href="post.php?title=<?= $homePostItem['slug']; ?>">
                                        <div class="card card-body bg-light">
                                            <h5><?= $homePostItem['name']; ?></h5>
                                            <label class="text-dark me-2 fs-6">Posted On: <?= date('d-M-Y', strtotime($homePostItem['created_at'])); ?></label>
                                        </div>
                                    </a>
                                </div>
                            <?php
                        } 
                }
                ?>

            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Reach Us</h4>
                    </div>
                    <div class="card-body">
                    <div><a href="https://www.instagram.com/adamabiyuu/" target="_blank" class="text-black">Contact@adamabiyuu</a></div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>