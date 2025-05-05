<!-- Registration and Homepage View -->
<!-- Php Code for Registration -->
<?php

include("./views/layout/guestheader.php");

?>
        

<!-- End of Php Code -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> -->

        <!-- place navbar here -->
 <main>
        <section class="py-5" style="background-color: #F7F6FE;">
            <div class="container">
              <div class="row justify-content-center">
                  <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">

                <!-- Logo -->
                <div class="text-center mb-4">
                <a href="#!">
                    <img src="../public/images/logo/logo2.png" alt="Logo" class="img-fluid" style="width: 100px; height: auto;">
                    </a>
                </div>

                <!-- Card -->
                <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h5 class="text-center mb-4" style="color: #13795b;">Welcome to Utang Lista</h5>

                    <!-- Login Form -->
                    <!-- <form action="../api/register.php" method="POST"> -->

                     <!-- Name with Icon -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <div class="input-group">
                        <span class="input-group-text rounded-start border-0 bg-light" style="color: #13795b;">
                             <i class="bi bi-person-fill"></i>
                        </span>
                        <input type="name" class="form-control border-start-0 rounded-end" id="name" name="admin_name" placeholder="Juan Dela Cruz" required>
                        </div>
                    </div>

                    <!-- Email with Icon -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <div class="input-group">
                        <span class="input-group-text rounded-start border-0 bg-light" style="color: #13795b;">
                            <i class="bi bi-envelope-fill"></i>
                        </span>
                        <input type="email" class="form-control border-start-0 rounded-end" id="email" name="admin_email" placeholder="name@gmail.com" required>
                        </div>
                    </div>
                    
                    <!-- Password with Icon and Show/Hide -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                        <span class="input-group-text rounded-start border-0 bg-light" style="color: #13795b;">
                            <i class="bi bi-shield-lock-fill"></i>
                        </span>
                        <input type="password" class="form-control border-start-0" id="password" name="admin_password" placeholder="Password" required>
                        <button class="btn btn-light border-0" type="button" id="togglePassword">
                            <i class="bi bi-eye"></i>
                        </button>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="button" onclick="register()" class="btn" style="background-color: #13795b; color: white;">Register</button>
                    </div>
                    <!-- </form> -->

                    <!-- Forgot password -->
                    <div class="text-center mt-4">
                    <a href="./index.php" class="text-decoration-none" style="color: #13795b;">Already Sign-up? Log-in</a>
                    </div>
                </div>
                </div>

            </div>
            </div>
        </div>
        </section> 
</main>
<script src="./public/js/register.js"></script>

<?php
include("./views/layout/guestfooter.php")
?>




 

      
