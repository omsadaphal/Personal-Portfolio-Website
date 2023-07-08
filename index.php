<?php 
include_once("includes/header.php");
include_once("includes/navbar.php");
include_once("config/dbcon.php");
?>
<link rel="stylesheet" href="style.css">
<div class="content-wrapper">
<section class="hero">
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" >
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="hero-content">
              
              <h1 class="hero-title">
              <span class="white-text">I am a</span>
              <span class="red-text">Software Developer</span>
              </h1>
                <p class="hero-description"><span class="white-text">Welcome to our Website!</span>
              <span class="red-text">My name is Sanket Patil.</span><span class="white-text">I have a two years of experience and I have done lots of paid projects, for further information please check my resume.</span></p>
                <div class="hero-buttons">
                  <a href="projects.php" class="btn btn-danger">Projects</a>
                  <a href="blog.php" class="btn btn-success">Download Resume</a>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      <div class="carousel-item" >
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="hero-content">
              <h1 class="hero-title">
              <span class="white-text">I am a</span>
              <span class="yellow-text">Software Developer</span>
              </h1>
                <p class="hero-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <div class="hero-buttons">
                <a href="projects.php" class="btn btn-danger">Projects</a>
                  <a href="blog.php" class="btn btn-success">Personal Blog</a>
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually"></span>
    </button>
    <div class="carousel-dots">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="carousel-dot active"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="carousel-dot"></button>
    </div>
  </div>
</section>


<!-- Service Cards Starts -->
<div class="pt-5 pb-5" style="background-color: #FCFFE7;">
    <div class="container">
      <div class="row">
        <div class="section-head col-sm-12">
          <h4 style="color: black;">Personal Skills</h4>
          
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="item"> <span class="icon feature_box_col_one"><i class="fa-brands fa-html5"></i></span>
            <h6>Html</h6>
         </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="item"> <span class="icon feature_box_col_two"><i class="fa-brands fa-css3-alt"></i></span>
            <h6>CSS</h6>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="item"> <span class="icon feature_box_col_three"><i class="fa-brands fa-square-js"></i></span>
            <h6>Javascript</h6>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="item"> <span class="icon feature_box_col_four"><i class="fa-brands fa-php"></i></span>
            <h6>PHP</h6>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="item"> <span class="icon feature_box_col_five"><i class="fa-brands fa-python"></i></span>
            <h6>Python</h6>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="item"> <span class="icon feature_box_col_six"><i class="fa-solid fa-c"></i></span>
            <h6>C/C++</h6>
          </div>
        </div>
      </div>
    </div>
</div>

<!-- about us page starts -->
<?php
$admin_query = "SELECT * FROM admin LIMIT 1";
$admin_query_run = mysqli_query($con, $admin_query);

if (mysqli_num_rows($admin_query_run) > 0) {
    $admin_data = mysqli_fetch_assoc($admin_query_run);
} else {
   
}
?>

<?php
$about_us_query = "SELECT * FROM about_us LIMIT 1";
$about_us_query_run = mysqli_query($con, $about_us_query);

if (mysqli_num_rows($about_us_query_run) > 0) {
    $about_us_data = mysqli_fetch_assoc($about_us_query_run);
} else {
   
}
?>

<section class="section about-section gray-bg" id="about">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="about-text go-to">
                            <h3 class="dark-color">About Me</h3>
                            <h6 class="theme-color lead"><?php echo $admin_data['title']; ?></h6>
                            <p><?php echo $admin_data['description']; ?></p>
                            <div class="row about-list">
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>Birthday</label>
                                        <p><?php echo $admin_data['birthdate']; ?></p>
                                    </div>
                                    <div class="media">
                                        <label>Age</label>
                                        <p><?php echo $admin_data['age']; ?></p>
                                    </div>
                                    <div class="media">
                                        <label>Address</label>
                                        <p><?php echo $admin_data['address']; ?></p>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>E-mail</label>
                                        <p><?php echo $admin_data['email']; ?></p>
                                    </div>
                                    <div class="media">
                                        <label>Phone</label>
                                        <p><?php echo $admin_data['phone']; ?></p>
                                    </div>

                                    <div class="media">
                                        <label>Languages</label>
                                        <p><?php echo $admin_data['languages']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                    <div class="about-avatar">
  <img src="admin/upload/<?=$admin_data['image']?>" title="" alt="" style="border-radius: 50%; width: 370px; height: 370px; object-fit: cover;">
</div>

                    </div>
                </div>
                <div class="counter" style="margin-top: 10px;">
                    <div class="row">
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="500" data-speed="500"><?=$about_us_data['client']?></h6>
                                <p class="m-0px font-w-600">Happy Clients</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="150" data-speed="150"><?=$about_us_data['completed']?></h6>
                                <p class="m-0px font-w-600">Project Completed</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="850" data-speed="850"><?=$about_us_data['pending_paid']?></h6>
                                <p class="m-0px font-w-600">Pending Projects</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="190" data-speed="190"><?=$about_us_data['total_paid']?></h6>
                                <p class="m-0px font-w-600">Paid Projects</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-light" style="background-color:#eee; margin-top:40px; margin-bottom:40px;">
        <div class="container">
<div class="row">
      <div class="col-lx-12">
          <div class="card">
              <div class="card-body">
                <div class="row justify-content-center mt-4">
                    <div class="col-xl-5 col-lg-8">
                        <div class="text-center">
                            <h3 style="font-weight: bold; font-size: 30px;">Frequently Asked Questions?</h3>
                            <h5 class="text" style="margin-top: 30px;">If you have any problem or any questions releated to our website then check our Faqs.</h5p>
                            <div>
                                <button type="button" class="btn btn-primary me-2" style="margin-top: 20px;">Email Us</button>
                                <button type="button" class="btn btn-success" style="margin-top: 20px;">Contact Us</button>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
                <div class="row justify-content-center mt-5">
                    <div class="col-9">
                        <ul class="nav nav-tabs  nav-tabs-custom nav-justified justify-content-center faq-tab-box" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-genarel-tab" data-bs-toggle="pill" data-bs-target="#pills-genarel" type="button" role="tab" aria-controls="pills-genarel" aria-selected="true">
                                    <span class="font-size-16">General Questions</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-privacy_policy-tab" data-bs-toggle="pill" data-bs-target="#pills-privacy_policy" type="button" role="tab" aria-controls="pills-privacy_policy" aria-selected="false">
                                    <span class="font-size-16">Privacy Policy</span>
                                </button>
                              </li>
                              <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-teachers-tab" data-bs-toggle="pill" data-bs-target="#pills-pricing_plan" type="button" role="tab" aria-controls="pills-pricing_plan" aria-selected="false">
                                    
                                    <span class="font-size-16">Pricing &amp; Plans</span>
                                </button>
                              </li>
                          </ul>
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content pt-3" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="pills-genarel" role="tabpanel" aria-labelledby="pills-genarel-tab">
                                <div class="row g-4 mt-2">
                                    <div class="col-lg-6">
                                        <h5>What is my Name?</h5>
                                    <p class="text">My name is Sanket Patil.</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5>What is my Birthdate and age?</h5>
                                        <p class="text">My birthdate is 16 January 2001 and currently I am 22 years old.</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5>Where do I live?</h5>
                                    <p class="text">Currently I lived in Pune, Maharastra and I am completing my studies.
                                    </p>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5>What programming language I know?</h5>
                                        <p class="lg-base">I know html, CSS, Javascript, PHP, Python, C, C++.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-privacy_policy" role="tabpanel" aria-labelledby="pills-privacy_policy-tab">
                                <div class="row g-4 mt-2">
                                    <div class="col-lg-6">
                                        <h5>Where can I get some ?</h5>
                                        <p class="lg-base">If several languages coalesce, the grammar of the resulting language is more simple
                                            and regular than that of the individual languages. The new common language will be more
                                            simple and regular than the existing</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5>Where does it come from ?</h5>
                                        <p class="lg-base">If several languages coalesce, the grammar of the resulting language is more simple
                                            and regular than that of the individual languages. The new common language will be more
                                            simple and regular than the existing</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5>Why do we use it ?</h5>
                                        <p class="lg-base">If several languages coalesce, the grammar of the resulting language is more simple
                                            and regular than that of the individual languages. The new common language will be more
                                            simple and regular than the existing</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5>What is Genius privacy policy</h5>
                                        <p class="lg-base">If several languages coalesce, the grammar of the resulting language is more simple
                                            and regular than that of the individual languages. The new common language will be more
                                            simple and regular than the existing</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-pricing_plan" role="tabpanel">
                                <div class="row g-4 mt-4">
                                    <div class="col-lg-6">
                                        <h5>Where does it come from ?</h5>
                                    <p class="lg-base">If several languages coalesce, the grammar of the resulting language is more simple
                                        and regular than that of the individual languages. The new common language will be more
                                        simple and regular than the existing</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5>Why do we use it ?</h5>
                                        <p class="lg-base">If several languages coalesce, the grammar of the resulting language is more simple
                                            and regular than that of the individual languages. The new common language will be more
                                            simple and regular than the existing</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5>What is Lorem Ipsum ?</h5>
                                    <p class="lg-base">If several languages coalesce, the grammar of the resulting language is more simple 
                                        and regular than that of the individual languages. The new common language will be more 
                                        simple and regular than the existing</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5>What is Lorem Ipsum?</h5>
                                        <p class="lg-base">If several languages coalesce, the grammar of the resulting language is more simple 
                                            and regular than that of the individual languages. The new common language will be more 
                                            simple and regular than the existing</p>
                                    </div>
                                </div>
                            </div>
                          </div>
                    </div>
                </div>
              </div>
          </div>
      </div>
  </div>
</div>
</section>

<style>

.white-text {
  color: white;
}

.red-text {
  color: red;
}

.yellow-text {
  color: yellow;
}

  .hero {
    padding: 180px 0;
    position: relative;
  }

  .hero-content {
    margin-bottom: 30px;
  }

  .hero-title {
    font-size: 36px;
    font-weight: bold;
    margin-bottom: 20px;
    color: white;
  }

  .hero-description {
    font-size: 18px;
    margin-bottom: 20px;
    color: white;
  }

  .hero-buttons {
    margin-top: 30px;
  }

  .carousel-control-prev,
  .carousel-control-next {
    background: transparent;
    border: none;
    font-size: 30px;
    color: white;
    width: 40px;
    height: 40px;
    line-height: 40px;
    margin-top: 150px;
  }

  .carousel-dots {
    position: absolute;
    margin-top: 145px;
    left: 50%;
    transform: translateX(-50%);
  }

  .carousel-dot {
    width: 10px;
    height: 10px;
    background-color: #fff;
    border: none;
    border-radius: 50%;
    margin-right: 5px;
    opacity: 0.5;
    cursor: pointer;
  }

  .carousel-dot.active {
    opacity: 1;
  }

  .section {
    padding: 100px 0;
    position: relative;
}
.gray-bg {
    background-color: #f5f5f5;
}
img {
    max-width: 100%;
}
img {
    vertical-align: middle;
    border-style: none;
}
/* About Me 
---------------------*/
.about-text h3 {
  font-size: 45px;
  font-weight: 700;
  margin: 0 0 6px;
}
@media (max-width: 767px) {
  .about-text h3 {
    font-size: 35px;
  }
}
.about-text h6 {
  font-weight: 600;
  margin-bottom: 15px;
}
@media (max-width: 767px) {
  .about-text h6 {
    font-size: 18px;
  }
}
.about-text p {
  font-size: 18px;
  max-width: 450px;
}
.about-text p mark {
  font-weight: 600;
  color: #20247b;
}

.about-list {
  padding-top: 10px;
}
.about-list .media {
  padding: 5px 0;
}
.about-list label {
  color: #20247b;
  font-weight: 600;
  width: 88px;
  margin: 0;
  position: relative;
}
.about-list label:after {
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  right: 11px;
  width: 1px;
  height: 12px;
  background: #20247b;
  -moz-transform: rotate(15deg);
  -o-transform: rotate(15deg);
  -ms-transform: rotate(15deg);
  -webkit-transform: rotate(15deg);
  transform: rotate(15deg);
  margin: auto;
  opacity: 0.5;
}
.about-list p {
  margin: 0;
  font-size: 15px;
}

@media (max-width: 991px) {
  .about-avatar {
    margin-top: 30px;
  }
}

.about-section .counter {
  padding: 22px 20px;
  background: #ffffff;
  border-radius: 10px;
  box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
}
.about-section .counter .count-data {
  margin-top: 10px;
  margin-bottom: 10px;
}
.about-section .counter .count {
  font-weight: 700;
  color: #20247b;
  margin: 0 0 5px;
}
.about-section .counter p {
  font-weight: 600;
  margin: 0;
}
mark {
    background-image: linear-gradient(rgba(252, 83, 86, 0.6), rgba(252, 83, 86, 0.6));
    background-size: 100% 3px;
    background-repeat: no-repeat;
    background-position: 0 bottom;
    background-color: transparent;
    padding: 0;
    color: currentColor;
}
.theme-color {
    color: #fc5356;
}
.dark-color {
    color: #20247b;
}


.card {
    box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
}
.nav-tabs-custom .nav-item .nav-link.active {
    color: #6c6ff5;
}
.nav-tabs-custom .nav-item .nav-link {
    border: none;
}
.text-muted {
    color: #8ca3bd!important;
}
.nav-tabs-custom .nav-item {
    position: relative;
    color: #271050;
}
.nav-tabs-custom .nav-item .nav-link.active:after {
    -webkit-transform: scale(1);
    transform: scale(1);
}
.nav-tabs-custom .nav-item .nav-link::after {
    content: "";
    background: #6c6ff5;
    height: 2px;
    position: absolute;
    width: 100%;
    left: 0;
    bottom: -1px;
    -webkit-transition: all 250ms ease 0s;
    transition: all 250ms ease 0s;
    -webkit-transform: scale(0);
    transform: scale(0);
}
</style>
</div>

<?php
include_once("includes/footer.php");
?>
