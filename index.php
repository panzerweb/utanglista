<!-- Registration and Homepage View -->
<!-- Php Code for Registration -->
<?php

?>

<!-- End of Php Code -->

        <!-- place navbar here -->
        <?php 
            //Header layout
            include("./views/layout/guestheader.php");
        ?>
        
        <main>
            <!-- Section for Registration -->
            <div class="container">
                <div class="row justify-content-center">
                    <h1 class="text-center">UtangLista</h1>
                    <div class="col-12 col-lg-4">
                        <form action="" method="">
                            <div class="mb-3">
                                <label for="" class="form-label">Username</label>
                                <input
                                    type="text"
                                    name="username"
                                    id="username"
                                    class="form-control"
                                    placeholder="Enter Username"
                                    aria-describedby="helpId"
                                />
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    name="password"
                                    id="password"
                                    placeholder="Enter Password"
                                />
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Confirm Password</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    name="confirm_pass"
                                    id="confirm_pass"
                                    placeholder="Confirm Password"
                                />
                            </div>
                            <button
                                type="submit"
                                class="btn btn-primary w-100"
                            >
                                Register
                            </button>
                            
                            
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <?php
            include("./views/layout/guestfooter.php")
        ?>
        
      
