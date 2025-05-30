<?php
include("./views/layout/guestheader.php");
?>

<link rel="stylesheet" href="./public/css/signup.css">

<main>
  <div class="container-fluid login-bg d-flex align-items-center justify-content-center min-vh-100">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
          <div class="row login-glass shadow-lg g-0">
            <!-- Left Welcome Panel -->
            <div class="col-md-6 d-flex flex-column justify-content-center align-items-start p-5 login-welcome-panel">
              <img src="./public/images/logo/logo2.png" alt="Logo" class="mb-4" style="width: 48px;">
              <h1 class="fw-bold mb-3">Join Us!</h1>
              <p class="mb-4">
                Create your Utang Lista account and start managing your store credits with ease.
              </p>
              <a href="login.php" class="btn btn-learn-more px-4 py-2 rounded-pill fw-semibold">
                <i class="bi bi-arrow-left me-2"></i>Back to Login
              </a>
            </div>
            <!-- Right Signup Panel -->
            <div class="col-md-6 p-5 d-flex flex-column justify-content-center align-items-center">
              <div class="w-100" style="max-width: 340px;">
                <h2 class="fw-bold mb-4 text-center">Sign Up</h2>
                <form onsubmit="event.preventDefault(); register();">
                  <div class="mb-3">
                    <label for="name" class="form-label login-label">Full Name</label>
                    <div class="input-group mb-3">
                      <span class="input-group-text">
                        <i class="bi bi-person"></i>
                      </span>
                      <input type="text" class="form-control login-input" id="name" name="admin_name" placeholder="Your Name" required>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label login-label">Email address</label>
                    <div class="input-group mb-3">
                      <span class="input-group-text">
                        <i class="bi bi-envelope"></i>
                      </span>
                      <input type="email" class="form-control login-input" id="email" name="admin_email" placeholder="name@gmail.com" required>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label login-label">Password</label>
                    <div class="input-group mb-3">
                      <span class="input-group-text">
                        <i class="bi bi-lock"></i>
                      </span>
                      <input type="password" minlength="8" class="form-control login-input" id="password" name="admin_password" placeholder="Password" required>
                    </div>
                  </div>
                  <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary-custom fw-bold py-2">Register</button>
                  </div>
                </form>
                <div class="text-center mb-3">Or sign up</div>
                <div class="text-center">
                  <span class="small">Already have an account?</span>
                  <a href="login.php" class="login-register ms-1">Login</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<script src="./public/js/register.js"></script>
<?php include("./views/layout/guestfooter.php"); ?>