<?php include("./views/layout/guestheader.php"); ?>
<link rel="stylesheet" href="./public/css/index.css">

<main>
  <!-- Hero Section -->
  <section class="hero-section d-flex align-items-center justify-content-center">
    <div class="container">
      <div class="row align-items-center rounded-4 hero-glass mx-0">
        <div class="col-lg-6 py-5 px-4 text-center text-lg-start">
          <h1 class="display-3 fw-bold mb-3 hero-title">
            <span style="color:var(--primary)">UTANG</span> <span style="font-style:italic; color:var(--accent-second)">LISTA</span>
          </h1>
          <p class="lead mb-4 hero-desc">
            Stay on top of your store credits and debts with <b>Utang Lista</b>. Simple, secure, and always in control.
          </p>
          <div class="d-flex gap-3 justify-content-center justify-content-lg-start mb-4">
            <a href="login.php" class="btn btn-success btn-lg rounded-pill px-4 hero-btn" style="background:var(--primary);border:none;">Login</a>
            <a href="signup.php" class="btn btn-outline-success btn-lg rounded-pill px-4 hero-btn-outline" style="border-color:var(--primary);color:var(--primary);">Sign Up</a>
          </div>
        </div>
        <div class="col-lg-6 text-center py-5 px-4">
          <img src="./public/images/logo/logo2.png" alt="Utang Lista Logo" class="img-fluid hero-logo" style="max-width: 340px;">
        </div>
      </div>
      <!-- Features Row -->
      <div class="row mt-4 g-3 justify-content-center">
        <div class="col-md-4">
          <div class="feature-card glass-card text-center p-4 h-100">
            <div class="feature-icon mb-2"><i class="bi bi-lightning-charge-fill"></i></div>
            <h5 class="fw-bold mb-2">Fast Tracking</h5>
            <p class="mb-0">Add, edit, and monitor debts in seconds with a clean, intuitive interface.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-card glass-card text-center p-4 h-100">
            <div class="feature-icon mb-2"><i class="bi bi-shield-lock-fill"></i></div>
            <h5 class="fw-bold mb-2">Secure & Private</h5>
            <p class="mb-0">Your data is protected and only accessible by you. Privacy is our priority.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-card glass-card text-center p-4 h-100">
            <div class="feature-icon mb-2"><i class="bi bi-bar-chart-fill"></i></div>
            <h5 class="fw-bold mb-2">Smart Insights</h5>
            <p class="mb-0">Visualize your debt trends and get actionable insights to stay on top.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- About Us Section -->
  <section id="about" class="about-section py-5">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <div class="about-glass p-4 p-md-5 rounded-4 shadow-sm h-100">
            <h2 class="fw-bold mb-3" style="color:var(--primary)">About <span style="color:var(--accent-second)">Utang Lista</span></h2>
            <p class="fs-5" style="color:var(--primary)">
              Utang Lista is your modern, secure, and intuitive debt tracking solution. Our mission is to empower individuals and businesses to manage, monitor, and settle debts with confidence and ease. 
            </p>
            <ul class="list-unstyled mt-4">
              <li class="mb-2 d-flex align-items-center">
                <i class="bi bi-check-circle-fill me-2" style="color:var(--accent-second);"></i>
                Simple and intuitive interface
              </li>
              <li class="mb-2 d-flex align-items-center">
                <i class="bi bi-check-circle-fill me-2" style="color:var(--accent-second);"></i>
                Secure and private data
              </li>
              <li class="mb-2 d-flex align-items-center">
                <i class="bi bi-check-circle-fill me-2" style="color:var(--accent-second);"></i>
                Smart insights and analytics
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-5 text-center">
          <img src="./public/images/logo/logo2.png" alt="About Utang Lista" class="img-fluid about-img" style="max-width: 260px;">
        </div>
      </div>
    </div>
  </section>

  <!-- Members Section -->
  <section id="members" class="members-section py-5">
    <div class="container">
      <h2 class="fw-bold text-center mb-5" style="color:var(--primary)">
        <span style="color:var(--accent-second)">The Squad</span>
      </h2>
      <div class="row g-4 justify-content-center">
        <!-- Member 1 -->
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="member-card-game text-center p-0 h-100">
            <div class="member-card-header">
              <img src="./public/images/members/member1.jpg" alt="Alex Rivera" class="member-img-game">
            </div>
            <div class="member-card-body p-3">
              <h5 class="fw-bold mb-1">Alex Rivera</h5>
              <p class="mb-2 text-muted small">Lead Developer</p>
              <div class="member-divider"></div>
              <div class="social-links mt-2">
                <a href="#" class="me-2"><i class="bi bi-github"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
        <!-- Member 2 -->
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="member-card-game text-center p-0 h-100">
            <div class="member-card-header">
              <img src="./public/images/members/member2.jpg" alt="Jamie Cruz" class="member-img-game">
            </div>
            <div class="member-card-body p-3">
              <h5 class="fw-bold mb-1">Jamie Cruz</h5>
              <p class="mb-2 text-muted small">UI/UX Designer</p>
              <div class="member-divider"></div>
              <div class="social-links mt-2">
                <a href="#" class="me-2"><i class="bi bi-dribbble"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
        <!-- Member 3 -->
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="member-card-game text-center p-0 h-100">
            <div class="member-card-header">
              <img src="./public/images/members/member3.jpg" alt="Sam Lee" class="member-img-game">
            </div>
            <div class="member-card-body p-3">
              <h5 class="fw-bold mb-1">Sam Lee</h5>
              <p class="mb-2 text-muted small">Backend Engineer</p>
              <div class="member-divider"></div>
              <div class="social-links mt-2">
                <a href="#" class="me-2"><i class="bi bi-github"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
        <!-- Member 4 -->
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="member-card-game text-center p-0 h-100">
            <div class="member-card-header">
              <img src="./public/images/members/member4.jpg" alt="Pat Santos" class="member-img-game">
            </div>
            <div class="member-card-body p-3">
              <h5 class="fw-bold mb-1">Pat Santos</h5>
              <p class="mb-2 text-muted small">Product Manager</p>
              <div class="member-divider"></div>
              <div class="social-links mt-2">
                <a href="#" class="me-2"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php include("./views/layout/guestfooter.php"); ?>

 

      
