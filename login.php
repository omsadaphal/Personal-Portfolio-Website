<?php
session_start();
include("includes/header.php");
include("includes/navbar.php");
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
<div class="py-5">
<div class="container" style="margin-bottom: 50px;">
        <div class="row justify-content-center ">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Login Form</h4>
                    </div>
                    <div class="card-body">
               <?php include('message.php'); ?>
                    <form action="login-code.php" method="POST">
                   
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter password">
                            </div>
                            <button type="submit" name="login_btn" class="btn btn-primary col-12">Login Now</button>
                        </form>
            </div>
                </div>
            </div>
        </div>
    </div>

</div>
<style>
    body{
    background:#eee;
}
    </style>
<?php
include("includes/footer.php");
?>