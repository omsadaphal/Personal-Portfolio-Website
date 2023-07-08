<?php 
include_once("includes/header.php");
include_once("includes/navbar.php");
?>


<div id="main-content" class="blog-page" style="margin-top: 20px;">
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 left-box">

            <?php
            require 'config/dbcon.php';

            $query = "SELECT * FROM post ORDER BY id DESC LIMIT 10";
            $query_run = mysqli_query($con, $query);

            if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {
                    $post_id = $row['id'];
                    $comment_query = "SELECT COUNT(*) AS comment_count FROM comment WHERE post_id = $post_id";
                    $comment_result = mysqli_query($con, $comment_query);
                    $comment_row = mysqli_fetch_assoc($comment_result);
                    $comment_count = $comment_row['comment_count'];
                    ?>
                    <a href="blog-post.php?post_id=<?php echo $row['id']; ?>">
                    <div class="card single_post">
                        <div class="body">
                            <div class="img-post">
                                <img class="d-block img-fluid" src="images/<?php echo $row['image'] ?>" alt="First slide" style="width: 800px; height: 280px">
                            </div>
                            <h3><a href="blog-post.php?post_id=<?php echo $row['id']; ?>"><?php echo $row['title'] ?></a></h3>
                            <p><?php echo substr($row['content'], 0, 250); ?></p>

                        </div>
                        <div class="footer">
                            <div class="actions">
                                <a href="blog-post.php?post_id=<?php echo $row['id']; ?>" class="btn btn-primary">Continue Reading</a>
                            </div>
                            <ul class="stats">
                                <!-- Omitting the category name -->
                                <li><a href="javascript:void(0);"><?php echo $row['category']; ?></a></li>
                                <li><a href="javascript:void(0);" class="fa fa-date"><?php echo date('j M Y', strtotime($row['created_at'])); ?></a></li>
                                <li><a href="javascript:void(0);" class="fa fa-comment"><?php echo $comment_count; ?> Comments</a></li>
                            </ul>
                        </div>
                    </div>
                    </a>
                    <?php
                }
            } else {
                echo "No Posts Found";
            }
            ?>
           
                <ul class="pagination pagination-primary">
                    <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
                </ul>                
            </div>
            <div class="col-lg-4 col-md-12 right-box">
                <div class="card">
                    <div class="body search">
                        <div class="input-group m-b-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search...">                                    
                        </div>
                    </div>
                </div>

                <div class="card">
                <div class="header">
                        <h2>Popular Posts</h2>                        
                    </div>
                <?php
require 'config/dbcon.php';

$query = "SELECT * FROM post ORDER BY id DESC LIMIT 3";
$query_run = mysqli_query($con, $query); 

if (mysqli_num_rows($query_run) > 0) {
    while ($row = mysqli_fetch_assoc($query_run)) {
        ?>


                    <div class="body widget popular-post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="single_post">
                                    <p class="m-b-0"><?php echo $row['title'] ?></p>
                                    <span><?php echo date('j M Y', strtotime($row['created_at'])); ?></span>
                                    <div class="img-post">
                                        <img src="images/<?php echo $row['image'] ?>" alt="Awesome Image" style="width: 150px; height: 150px;">                                        
                                    </div>                                            
                                </div>

                            </div>
                        </div>
                        </div>

<?php
    }
} else {
    echo "No Posts Found";
}
?>
     
                </div>


            </div>
        </div>

    </div>
</div>


    <style>
body{
    background-color: #f4f7f6;
}
.card {
    background: #fff;
    transition: .5s;
    border: 0;
    margin-bottom: 30px;
    border-radius: .55rem;
    position: relative;
    width: 100%;
    box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
}
.card .body {
    color: #444;
    padding: 20px;
    font-weight: 400;
}
.card .header {
    color: #444;
    padding: 20px;
    position: relative;
    box-shadow: none;
}
.single_post {
    -webkit-transition: all .4s ease;
    transition: all .4s ease
}

.single_post .body {
    padding: 30px
}

.single_post .img-post {
    position: relative;
    overflow: hidden;
    max-height: 500px;
    margin-bottom: 30px
}

.single_post .img-post>img {
    -webkit-transform: scale(1);
    -ms-transform: scale(1);
    transform: scale(1);
    opacity: 1;
    -webkit-transition: -webkit-transform .4s ease, opacity .4s ease;
    transition: transform .4s ease, opacity .4s ease;
    max-width: 100%;
    filter: none;
    -webkit-filter: grayscale(0);
    -webkit-transform: scale(1.01)
}

.single_post .img-post:hover img {
    -webkit-transform: scale(1.02);
    -ms-transform: scale(1.02);
    transform: scale(1.02);
    opacity: .7;
    filter: gray;
    -webkit-filter: grayscale(1);
    -webkit-transition: all .8s ease-in-out
}

.single_post .img-post:hover .social_share {
    display: block
}

.single_post .footer {
    padding: 0 30px 30px 30px
}

.single_post .footer .actions {
    display: inline-block
}

.single_post .footer .stats {
    cursor: default;
    list-style: none;
    padding: 0;
    display: inline-block;
    float: right;
    margin: 0;
    line-height: 35px
}

.single_post .footer .stats li {
    border-left: solid 1px rgba(160, 160, 160, 0.3);
    display: inline-block;
    font-weight: 400;
    letter-spacing: 0.25em;
    line-height: 1;
    margin: 0 0 0 2em;
    padding: 0 0 0 2em;
    text-transform: uppercase;
    font-size: 13px
}

.single_post .footer .stats li a {
    color: #777
}

.single_post .footer .stats li:first-child {
    border-left: 0;
    margin-left: 0;
    padding-left: 0
}

.single_post h3 {
    font-size: 26px;
    font-weight: bold;
}

.single_post h3 a {
    color: #242424;
    text-decoration: none
}

.single_post p {
    font-size: 16px;
    line-height: 26px;
    font-weight: 300;
    margin: 0
}

.single_post .blockquote p {
    margin-top: 0 !important
}

.single_post .meta {
    list-style: none;
    padding: 0;
    margin: 0
}

.single_post .meta li {
    display: inline-block;
    margin-right: 15px
}

.single_post .meta li a {
    font-style: italic;
    color: #959595;
    text-decoration: none;
    font-size: 12px
}

.single_post .meta li a i {
    margin-right: 6px;
    font-size: 12px
}

.single_post2 {
    overflow: hidden
}

.single_post2 .content {
    margin-top: 15px;
    margin-bottom: 15px;
    padding-left: 80px;
    position: relative
}

.single_post2 .content .actions_sidebar {
    position: absolute;
    top: 0px;
    left: 0px;
    width: 60px
}

.single_post2 .content .actions_sidebar a {
    display: inline-block;
    width: 100%;
    height: 60px;
    line-height: 60px;
    margin-right: 0;
    text-align: center;
    border-right: 1px solid #e4eaec
}

.single_post2 .content .title {
    font-weight: 100
}

.single_post2 .content .text {
    font-size: 15px
}

.right-box .categories-clouds li {
    display: inline-block;
    margin-bottom: 5px
}

.right-box .categories-clouds li a {
    display: block;
    border: 1px solid;
    padding: 6px 10px;
    border-radius: 3px
}

.right-box .instagram-plugin {
    overflow: hidden
}

.right-box .instagram-plugin li {
    float: left;
    overflow: hidden;
    border: 1px solid #fff
}

.comment-reply li {
    margin-bottom: 15px
}

.comment-reply li:last-child {
    margin-bottom: none
}

.comment-reply li h5 {
    font-size: 18px
}

.comment-reply li p {
    margin-bottom: 0px;
    font-size: 15px;
    color: #777
}

.comment-reply .list-inline li {
    display: inline-block;
    margin: 0;
    padding-right: 20px
}

.comment-reply .list-inline li a {
    font-size: 13px
}

@media (max-width: 640px) {
    .blog-page .left-box .single-comment-box>ul>li {
        padding: 25px 0
    }
    .blog-page .left-box .single-comment-box ul li .icon-box {
        display: inline-block
    }
    .blog-page .left-box .single-comment-box ul li .text-box {
        display: block;
        padding-left: 0;
        margin-top: 10px
    }
    .blog-page .single_post .footer .stats {
        float: none;
        margin-top: 10px
    }
    .blog-page .single_post .body,
    .blog-page .single_post .footer {
        padding: 30px
    }
}
        </style>

<?php
include_once("includes/footer.php");
?>
