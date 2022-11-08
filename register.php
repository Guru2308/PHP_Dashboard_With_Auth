<?php 
session_start();

$page_title = "Registration page";
include('includes/header.php');
include('includes/navbar.php') ?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="alert">
                    <?php 
                        if(isset($_SESSION['status'])){
                            echo "<h4>".$_SESSION['status']."</h4>";
                            unset($_SESSION['status']);

                        }
                    ?>
                </div>
                <div class="card shadow">
                    <div class="card-header bg-dark text-light">
                        <h5>Registration Form</h5>
                    </div>
                    <div class="card-body">

                        <form action="code.php" method="POST">
                            <div class="form-group mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Phone number</label>
                                <input type="number" name="phone" class="form-control" placeholder="Enter your mobile number (eg: 9876543210)" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter your Email ID (eg: abc@gmail.com)" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter a password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="register_btn" class="btn btn-primary">Register Now</button>
                            </div>
                        </form>
                        <hr>
                        <h6>Already have an account?   <a href="login.php">Login ! </a></h6>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
?>

<?php include('includes/footer.php') ?>