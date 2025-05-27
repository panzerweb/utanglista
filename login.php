<!-- Registration and Homepage View -->
<!-- Php Code for Registration -->
<?php


include("./views/layout/guestheader.php");

?>    
<link rel="stylesheet" href="./public/css/login.css">

<main>
  <div class="container-fluid login-bg d-flex align-items-center justify-content-center min-vh-100">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
          <div class="row login-glass shadow-lg g-0">
            <!-- Left Welcome Panel -->
            <div class="col-md-6 d-flex flex-column justify-content-center align-items-start p-5 login-welcome-panel">
              <img src="./public/images/logo/logo2.png" alt="Logo" class="mb-4" style="width: 48px;">
              <h1 class="fw-bold mb-3">Welcome!</h1>
              <p class="mb-4">
                Welcome to Utang Lista. Manage your store credits with ease and style.
              </p>
              <a href="signup.php" class="btn btn-learn-more px-4 py-2 rounded-pill fw-semibold">
                <i class="bi bi-arrow-left me-2"></i>Sign Up
              </a>
            </div>
            <!-- Right Login Panel -->
            <div class="col-md-6 p-5 d-flex flex-column justify-content-center align-items-center">
              <div class="w-100" style="max-width: 340px;">
                <h2 class="fw-bold mb-4 text-center">Sign in</h2>
                <form onsubmit="event.preventDefault(); login();">
                <div class="mb-3">
                  <label for="admin_email" class="form-label login-label">Email address</label>
                  <div class="input-group mb-3">
                    <span class="input-group-text">
                      <i class="bi bi-envelope"></i>
                    </span>
                    <input type="email" class="form-control login-input" id="admin_email" name="admin_email" placeholder="name@gmail.com" required>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="admin_password" class="form-label login-label">Password</label>
                  <div class="input-group mb-3">
                    <span class="input-group-text">
                      <i class="bi bi-lock"></i>
                    </span>
                    <input type="password" class="form-control login-input" minlength="8" id="admin_password" name="admin_password" placeholder="Password" required>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember_me" id="remember_me">
                    <label class="form-check-label small" for="remember_me">Keep me logged in</label>
                  </div>
                    <a href="#" class="small login-forgot">Forgot password?</a>
                </div>
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary-custom fw-bold py-2">Login</button>
                </div>
                </form>
                <div class="text-center mb-3">Or sign in</div>
                <div class="text-center">
                  <span class="small">Don't have an account yet?</span>
                  <a href="signup.php" class="login-register ms-1">Register for free</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<script src="./public/js/login.js"></script>
<?php include("./views/layout/guestfooter.php") ?>

 

      
