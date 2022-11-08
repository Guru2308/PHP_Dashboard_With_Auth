<?php
include('includes/header.php');
include('includes/navbar.php');
session_start();
$page_title = "Login Form";
?>

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

            <div class="card">
                <div class="card-header bg-dark text-light">
                    <h5>Resend Email Verification</h5>
                </div>
                <div class="card-body">
                    <form action="resend_code.php" method="POST">
                        <div class="form-group mb-3">
                            <label>Email Address</label>
                            <input type="email" name='email' class='form-control' placeholder="Enter your email address" required>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" name="resend_email_verify_btn" class="btn btn-primary">Resend Verification Mail</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');