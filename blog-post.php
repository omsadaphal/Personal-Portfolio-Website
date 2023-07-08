<?php 
include_once("includes/header.php");
include_once("includes/navbar.php");
include_once("config/dbcon.php");
?>
<?php
require 'config/dbcon.php';

if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];

    $query = "SELECT * FROM post WHERE id = $post_id";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $row = mysqli_fetch_assoc($query_run);

        // Fetch admin data
        $admin_query = "SELECT * FROM admin";
        $admin_result = mysqli_query($con, $admin_query);
        $admin_row = mysqli_fetch_assoc($admin_result);

    } else {
        echo "Post not found.";
    }
} else {
    echo "Invalid request.";
}
?>
  <div class="content-wrapper">


<div class="blog-single gray-bg">
        <div class="container">
            <div class="row align-items-start">
            
                <div class="col-lg-8 m-15px-tb">
            

                <article class="article">
    
    <div class="article-title">
       
        
        <div class="media">
        <div class="avatar-media">
    <div class="avatar">
        <img src="admin/upload/<?php echo $admin_row['image']; ?>" title="" alt="">
    </div>
    <div class="media-body">
        <label><?php echo $admin_row['name']; ?></label>
    </div>
    <div class="article-created_at" style="margin-right: 180px;">
    <h6><a href="#"><?php echo 'Posted At: ' . date('j F Y', strtotime($row['created_at'])); ?></a></h6>

</div>
<div class="article-category">
    <h6><a href="#"><?php echo $row['category'] ?></a></h6>
</div>
</div>
<h2><?php echo $row['title'] ?></h2>


            </div>
            
            <div class="media">
            <div class="article-img">
            
        <img src="admin/upload/<?php echo $row['image'] ?>" title="" alt="">
    </div>
       
        
    </div>
    
    <div class="article-content" >
        <?php echo $row['content'] ?>
    </div>
    <div class="share-buttons" style="margin-top: 30px;">
    <a class="btn btn-primary active" href="https://www.facebook.com/sharer/sharer.php?u=YOUR-PAGE-URL" target="_blank">
        Share on Facebook
    </a>
    <a class="btn btn-info" href="https://twitter.com/intent/tweet?url=YOUR-PAGE-URL" target="_blank">
        Share on Twitter
    </a>
    <a class="btn btn-danger" href="https://www.linkedin.com/sharing/share-offsite/?url=YOUR-PAGE-URL" target="_blank">
        Share on LinkedIn
    </a>
    <a class="btn btn-success" href="whatsapp://send?text=Check out this blog post: YOUR-PAGE-URL" target="_blank">
        Share on WhatsApp
    </a>
    <a class="btn btn-primary" href="telegram://send?text=Check out this blog post: YOUR-PAGE-URL" target="_blank">
        Share on Telegram
    </a>
</div>



</article>
<div class="contact-form article-comment">
                        <h4>Leave a Reply</h4>
                        <form id="contact-form" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="Name" id="name" placeholder="Name *" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="Email" id="email" placeholder="Email *" class="form-control" type="email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" id="message" placeholder="Your message *" rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="send">
                                        <button class="btn btn-primary active"><span>Submit</span> <i class="arrow"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                    
                <div class="col-lg-4 m-15px-tb blog-aside">
                    <!-- Author -->
                    <div class="widget widget-author">
                      <div class="widget-title">
                          <h3>Author</h3>
                      </div>
                      <div class="widget-body">
                          <?php
                          require 'config/dbcon.php';
                  
                          $query = "SELECT * FROM admin";
                          $query_run = mysqli_query($con, $query);
                  
                          if (mysqli_num_rows($query_run) > 0) {
                              $row = mysqli_fetch_assoc($query_run);
                              ?>
                              <div class="media align-items-center">
                                  <div class="avatar-media-2">
                                      <div class="avatar">
                                          <img src="admin/upload/<?php echo $row['image'] ?>" title="" alt="">
                                      </div>
                                      <div class="media-body">
                                          <h6><?php echo $row['name'] ?></h6>
                                      </div>
                                  </div>
                              </div>
                              <p><?php echo $row['title'] ?></p>
                          <?php } ?>
                      </div>
                  </div>
                  
                    <!-- End Author -->
                  
                    <!-- Latest Post -->
                    <div class="widget widget-latest-post">
    <div class="widget-title">
        <h3>Latest Post</h3>
    </div>
    <div class="widget-body">
        <?php
        $query = "SELECT * FROM post ORDER BY created_at DESC LIMIT 3";
        $query_run = mysqli_query($con, $query);

        if (mysqli_num_rows($query_run) > 0) {
            while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                <div class="latest-post-aside media">
                    <div class="lpa-left media-body">
                        <div class="lpa-title">
                            <h5><a href="#"><?php echo $row['title']; ?></a></h5>
                        </div>
                        <div class="lpa-meta">
                            <a class="name" href="#">
                                <?php echo $admin_row['name']; ?>
                            </a>
                            <a class="date" href="#">
                                <?php echo date('j M Y', strtotime($row['created_at'])); ?>
                            </a>
                        </div>
                    </div>
                    <div class="lpa-right">
                        <a href="#">
                            <img src="admin/upload/<?php echo $row['image']; ?>" title="" alt="">
                        </a>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "No posts found.";
        }
        ?>
    </div>
</div>


                    <!-- End Latest Post -->
           
                </div>
            </div>
        </div>
        </div>
    </div>

   <style>
.avatar-media-2 {
    display: inline-flex;
    align-items: center;
    margin-right: 10px;
}

.avatar {
    margin-right: 10px;
}

.media-body {
    display: inline-block;
}



.avatar-media {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.avatar {
    margin-right: 10px;
}

.media-body {
    flex-grow: 1;
}

.blog-listing {
    padding-top: 30px;
    padding-bottom: 30px;
}
.gray-bg {
    background-color: #f5f5f5;
}
/* Blog 
---------------------*/
.blog-grid {
  box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
  border-radius: 5px;
  overflow: hidden;
  background: #ffffff;
  margin-top: 15px;
  margin-bottom: 15px;
}
.blog-grid .blog-img {
  position: relative;
}
.blog-grid .blog-img .date {
  position: absolute;
  background: #fc5356;
  color: #ffffff;
  padding: 8px 15px;
  left: 10px;
  top: 10px;
  border-radius: 4px;
}
.blog-grid .blog-img .date span {
  font-size: 22px;
  display: block;
  line-height: 22px;
  font-weight: 700;
}
.blog-grid .blog-img .date label {
  font-size: 14px;
  margin: 0;
}
.blog-grid .blog-info {
  padding: 20px;
}
.blog-grid .blog-info h5 {
  font-size: 22px;
  font-weight: 700;
  margin: 0 0 10px;
}
.blog-grid .blog-info h5 a {
  color: #20247b;
}
.blog-grid .blog-info p {
  margin: 0;
}
.blog-grid .blog-info .btn-bar {
  margin-top: 20px;
}


/* Blog Sidebar
-------------------*/
.blog-aside .widget {
  box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
  border-radius: 5px;
  overflow: hidden;
  background: #ffffff;
  margin-top: 15px;
  margin-bottom: 15px;
  width: 100%;
  display: inline-block;
  vertical-align: top;
}
.blog-aside .widget-body {
  padding: 15px;
}
.blog-aside .widget-title {
  padding: 15px;
  border-bottom: 1px solid #eee;
}
.blog-aside .widget-title h3 {
  font-size: 20px;
  font-weight: 700;
  color: #fc5356;
  margin: 0;
}
.blog-aside .widget-author .media {
  margin-bottom: 15px;
}
.blog-aside .widget-author p {
  font-size: 16px;
  margin: 0;
}
.blog-aside .widget-author .avatar {
  width: 70px;
  height: 70px;
  border-radius: 50%;
  overflow: hidden;
}
.blog-aside .widget-author h6 {
  font-weight: 600;
  color: #20247b;
  font-size: 22px;
  margin: 0;
  padding-left: 20px;
}
.blog-aside .post-aside {
  margin-bottom: 15px;
}
.blog-aside .post-aside .post-aside-title h5 {
  margin: 0;
}
.blog-aside .post-aside .post-aside-title a {
  font-size: 18px;
  color: #20247b;
  font-weight: 600;
}
.blog-aside .post-aside .post-aside-meta {
  padding-bottom: 10px;
}
.blog-aside .post-aside .post-aside-meta a {
  color: #6F8BA4;
  font-size: 12px;
  text-transform: uppercase;
  display: inline-block;
  margin-right: 10px;
}
.blog-aside .latest-post-aside + .latest-post-aside {
  border-top: 1px solid #eee;
  padding-top: 15px;
  margin-top: 15px;
}
.blog-aside .latest-post-aside .lpa-right {
  width: 90px;
}
.blog-aside .latest-post-aside .lpa-right img {
  border-radius: 3px;
}
.blog-aside .latest-post-aside .lpa-left {
  padding-right: 15px;
}
.blog-aside .latest-post-aside .lpa-title h5 {
  margin: 0;
  font-size: 15px;
}
.blog-aside .latest-post-aside .lpa-title a {
  color: #20247b;
  font-weight: 600;
}
.blog-aside .latest-post-aside .lpa-meta a {
  color: #6F8BA4;
  font-size: 12px;
  text-transform: uppercase;
  display: inline-block;
  margin-right: 10px;
}


.blog-single {
  padding-top: 30px;
  padding-bottom: 30px;
}

.article {
  box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
  border-radius: 5px;
  overflow: hidden;
  background: #ffffff;
  padding: 15px;
  margin: 15px 0 30px;
}
.article .article-title {
  padding: 15px 0 20px;
}
.article .article-title h6 {
  font-size: 14px;
  font-weight: 700;
  margin-bottom: 20px;
}
.article .article-title h6 a {
  text-transform: uppercase;
  color: #fc5356;
  border-bottom: 1px solid #fc5356;
}
.article .article-title h2 {
  color: #20247b;
  font-weight: 600;
}
.article .article-title .media {
  padding-top: 15px;
  border-bottom: 1px dashed #ddd;
  padding-bottom: 20px;
}
.article .article-title .media .avatar {
  width: 45px;
  height: 45px;
  border-radius: 50%;
  overflow: hidden;
}
.article .article-title .media .media-body {
  padding-left: 8px;
}
.article .article-title .media .media-body label {
  font-weight: 600;
  color: #fc5356;
  margin: 0;
}
.article .article-title .media .media-body span {
  display: block;
  font-size: 12px;
}
.article .article-content h1,
.article .article-content h2,
.article .article-content h3,
.article .article-content h4,
.article .article-content h5,
.article .article-content h6 {
  color: #20247b;
  font-weight: 600;
  margin-bottom: 15px;
}
.article .article-content blockquote {
  max-width: 600px;
  padding: 15px 0 30px 0;
  margin: 0;
}
.article .article-content blockquote p {
  font-size: 20px;
  font-weight: 500;
  color: #fc5356;
  margin: 0;
}
.article .article-content blockquote .blockquote-footer {
  color: #20247b;
  font-size: 16px;
}
.article .article-content blockquote .blockquote-footer cite {
  font-weight: 600;
}
.article .tag-cloud {
  padding-top: 10px;
}

.article-comment {
  box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
  border-radius: 5px;
  overflow: hidden;
  background: #ffffff;
  padding: 20px;
}
.article-comment h4 {
  color: #20247b;
  font-weight: 700;
  margin-bottom: 25px;
  font-size: 22px;
}
img {
    max-width: 100%;
}
img {
    vertical-align: middle;
    border-style: none;
}

/* Contact Us
---------------------*/
.contact-name {
  margin-bottom: 30px;
}
.contact-name h5 {
  font-size: 22px;
  color: #20247b;
  margin-bottom: 5px;
  font-weight: 600;
}
.contact-name p {
  font-size: 18px;
  margin: 0;
}

.social-share a {
  width: 40px;
  height: 40px;
  line-height: 40px;
  border-radius: 50%;
  color: #ffffff;
  text-align: center;
  margin-right: 10px;
}
.social-share .dribbble {
  box-shadow: 0 8px 30px -4px rgba(234, 76, 137, 0.5);
  background-color: #ea4c89;
}
.social-share .behance {
  box-shadow: 0 8px 30px -4px rgba(0, 103, 255, 0.5);
  background-color: #0067ff;
}
.social-share .linkedin {
  box-shadow: 0 8px 30px -4px rgba(1, 119, 172, 0.5);
  background-color: #0177ac;
}

.contact-form .form-control {
  border: none;
  border-bottom: 1px solid #20247b;
  background: transparent;
  border-radius: 0;
  padding-left: 0;
  box-shadow: none !important;
}
.contact-form .form-control:focus {
  border-bottom: 1px solid #fc5356;
}
.contact-form .form-control.invalid {
  border-bottom: 1px solid #ff0000;
}
.contact-form .send {
  margin-top: 20px;
}
@media (max-width: 767px) {
  .contact-form .send {
    margin-bottom: 20px;
  }
}

.section-title h2 {
    font-weight: 700;
    color: #20247b;
    font-size: 45px;
    margin: 0 0 15px;
    border-left: 5px solid #fc5356;
    padding-left: 15px;
}
.section-title {
    padding-bottom: 45px;
}
.contact-form .send {
    margin-top: 20px;
}
</style>


    <?php 
include_once("includes/footer.php");
?>
