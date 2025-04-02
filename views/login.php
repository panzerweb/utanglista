<!-- Registration and Homepage View -->
<!-- Php Code for Login -->
<?php

?>

<!-- End of Php Code -->

        <!-- place navbar here -->
        <?php 
            //Header layout
            include("./layout/guestheader.php");
        ?>
        
        <main>
            <!-- Section for Registration -->
             <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                    <form>
                        <img class="mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
                        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                        <div class="form-floating">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" fdprocessedid="akuehb">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" fdprocessedid="b74lyfu">
                            <label for="floatingPassword">Password</label>
                        </div>

                        <div class="form-check text-start my-3">
                            <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Remember me
                            </label>
                        </div>
                        <button class="btn btn-primary w-100 py-2" type="submit" fdprocessedid="1rf4jl">Sign in</button>
                        <p class="mt-5 mb-3 text-body-secondary">© 2017–2024</p>
                    </form>
                    </div>
                </div>
             </div>
        </main>

        <?php
            include("./layout/guestfooter.php")
        ?>
        
      
