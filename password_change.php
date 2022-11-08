<?php 
session_start();

$page_title = "Change password";
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
                        <h5>Change password</h5>
                    </div>
                    <div class="card-body">

                        <form action="password_reset_code.php" method="POST">
                            <input type="hidden" name='password_token' value="<?php if(isset($_GET['token'])){echo $GET['token'];} ?>">
                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" value="<?php if(isset($_GET['email'])){echo $GET['email'];} ?>" class="form-control" placeholder="Enter your email address" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">New Password</label>
                                <input type="password" name="new_password" class="form-control" placeholder="Enter your password" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" placeholder="Enter your password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name='password_update' class="btn btn-primary">Update password</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>