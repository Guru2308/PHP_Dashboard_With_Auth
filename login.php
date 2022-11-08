<?php 
session_start();
if(isset($_SESSION['authenticated'])){
    $_SESSION['status'] = 'You are already logged in...';
    header('Location: dashboard.php');
    exit(0);
}

$page_title = "Login page";
include('includes/header.php');
include('includes/navbar.php') ?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <?php
                    if(isset($_SESSION['status'])){
                        ?>
                        <div class="alert alert-success">
                            <h5><?=$_SESSION['status']; ?></h5>
                        </div>
                        <?php
                        unset($_SESSION['status']); 
                    }
                ?>
                
                <div class="card shadow">
                    <div class="card-header bg-dark text-light">
                        <h5>Login Page</h5>
                    </div>
                    <div class="card-body">

                        <form action="logincode.php" method="POST">
                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter your email address" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name='login_now_btn' class="btn btn-primary">Login Now</button>
                                <a href="password_reset.php" class="float-end">Forgot Password?</a>
                            </div>
                        </form>
                        <hr>
                        <h6>Did not recieve your Verification mail yet?   <a href="resend_email_verification.php">Resend </a></h6>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>