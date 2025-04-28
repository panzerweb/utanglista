<!-- Registration and Homepage View -->
<!-- Php Code for Registration -->
<?php
if (isset($_GET['error']) && $_GET['error'] === 'not_logged_in') {
    echo "<script>alert('You must be logged in to access this page!');</script>";
}
?>
        

<!-- End of Php Code -->

        <!-- place navbar here -->
      
        <main>
        <!-- links -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
        <link rel="stylesheet" href="./public/css/log&register.css" />

        <div class="container" id="container"> 
    
                <!-- Register Form -->
                <div class="form-container register-container">
                <form action="./api/register.php" method="POST" class="text-center">
                    <h1 class="mb-3">Register here.</h1>
                    <div class="mb-2 w-100">
                    <input type="text" class="form-control" name = "name" placeholder="Name" required />
                    </div>
                    <div class="mb-2 w-100">
                    <input type="email" class="form-control" name = "email" placeholder="Email" required />
                    </div>
                    <div class="mb-2 w-100">
                    <input type="password" class="form-control" name = "password" placeholder="Password" required />
                    </div> 
                    <input type="submit" name = "register" class="btn btn-primary w-100">Register</input>
                    <span>or use your account</span>
                    <div class="social-container d-flex justify-content-center mt-3">
                    <a href="#" class="social"><i class="lni lni-facebook-fill"></i></a>
                    <a href="#" class="social"><i class="lni lni-google"></i></a>
                    </div>
                </form>
                </div>

                <!-- Login Form -->
                <div class="form-container login-container">
                <form action="./api/login.php" method="POST" class="text-center">
                    <h1 class="mb-3">Login here.</h1>
                    <div class="mb-2 w-100">
                    <input type="email" class="form-control" name = "email" placeholder="Email" required />
                    </div>
                    <div class="mb-2 w-100">
                    <input type="password" class="form-control" name = "password" placeholder="Password" required />
                    </div>
                    <div class="content d-flex justify-content-between align-items-center w-100 mb-3">
                    <div class="form-check checkbox">
                        <input type="checkbox" class="form-check-input" id="rememberMe" />
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <div class="pass-link">
                        <a href="#">Forgot password?</a>
                    </div>
                    </div>
                    <input type="submit" name = "login" class="btn btn-primary w-100">Login</input>
                    <span>or use your account</span>
                    <div class="social-container d-flex justify-content-center mt-3">
                    <a href="#" class="social"><i class="lni lni-facebook-fill"></i></a>
                    <a href="#" class="social"><i class="lni lni-google"></i></a>
                    </div>
                </form>
                </div>

                <!-- Overlay Panels -->
                <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                    <button class="login" id="login">Login
                        <i class="lni lni-arrow-left login"></i>
                    </button>
                    </div>
                    <div class="overlay-panel overlay-right">
                    <button class="register" id="register">Register
                        <i class="lni lni-arrow-right register"></i>
                    </button>
                    </div>
                </div>
                </div>

            </div>
            <script src="./public/js/log&register.js"></script>
         </main>

       
      
