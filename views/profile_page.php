<!-- place header here -->
<?php 
    //Header layout
    include("../api/auth.php");//aron d ma access if wala naka log-in
    include("./layout/header.php");
?>

<main>
    <div class="container py-5">
        <div class="row">
            <div class="d-flex justify-content-between align-items-center mb-4 bg-success rounded-3 shadow-sm py-2 border border-1">
                <h1 class="fw-bold text-light">Profile</h1>
                <a
                    class="btn btn-dark border border-2 border-danger logout"
                    href="../api/logout.php"
                    role="button"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-power text-danger" viewBox="0 0 16 16">
                        <path d="M7.5 1v7h1V1z"/>
                        <path d="M3 8.812a5 5 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812"/>
                    </svg>
                </a
                >              
            </div>
        </div>
        <div class="row justify-content-evenly">

            <!-- Image Profile and Socials -->

            <div class="col-lg-5">
                <div class="card text-start shadow-sm">
                    <img class="rounded-3 img-thumbnail border border-5 border-success mx-auto m-3 mb-0" src="../public/images/profile.jpg" alt="Profile Pic" style="width: 300px;" />
                    <div class="card-body">
                        <div class="border border-1 p-3 rounded-3 text-secondary">
                            Admin Description here
                        </div>
                        <h4 class="card-title mb-3 mt-3 fw-bold">Socials</h4>
                        <div class="social-links">
                            <!-- Facebook Link -->
                            <div class="facebook d-flex align-items-center gap-2 my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-facebook text-secondary" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                                </svg>
                                <input type="text" class="form-control border border-3" value="">
                            </div>

                            <!-- Instagram Link -->
                            <div class="instagram d-flex align-items-center gap-2 my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-instagram text-secondary" viewBox="0 0 16 16">
                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                                </svg>
                                <input type="text" class="form-control border border-3" value="">
                            </div>

                            <!-- Github Link -->
                            <div class="instagram d-flex align-items-center gap-2 my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-github text-secondary" viewBox="0 0 16 16">
                                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/>
                                </svg>
                                <input type="text" class="form-control border border-3" value="">
                            </div>

                            <!-- More Socials -->
                        </div>
                    </div>
                </div>   
            </div>

            <!-- User Information -->

            <div class="col-lg-7">
                <div class="card text-start shadow-sm">
                    <div class="card-body">
                        <!-- Admin_name -->
                        <div class="mb-3">
                            <label for="" class="form-label fw-bold">Username</label>
                            <input
                                type="text"
                                class="form-control form-control-sm"
                                name="admin_name"
                                id="admin_name"
                                aria-describedby="helpId"
                                placeholder=""
                                value="<?php echo $_SESSION["admin_name"] ?>"
                            />
                        </div>
                        
                        <!-- Admin Email -->
                        <div class="mb-3">
                            <label for="" class="form-label fw-bold">Email Address</label>
                            <input
                                type="email"
                                class="form-control form-control-sm"
                                name="admin_email"
                                id="admin_email"
                                aria-describedby="helpId"
                                placeholder=""
                                value="<?php echo $_SESSION["admin_email"] ?>"
                            />
                        </div>

                        <!-- Admin Password -->
                        <div class="mb-3">
                            <label for="" class="form-label fw-bold">Password</label>
                            <input
                                type="password"
                                class="form-control form-control-sm"
                                name="admin_password"
                                id="admin_password"
                                aria-describedby="helpId"
                                placeholder=""
                                value=""
                            />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-bold">Repeat Password</label>
                            <input
                                type="password"
                                class="form-control form-control-sm"
                                name="confirm_password"
                                id="confirm_password"
                                aria-describedby="helpId"
                                placeholder=""
                                value=""
                            />
                        </div>

                        <!-- Admin bio -->
                        <div class="mb-3">
                            <label for="" class="form-label fw-bold">Description</label>
                            <textarea class="form-control" name="admin_bio" id="admin_bio" rows="3"></textarea>
                        </div>

                        <!-- Image File -->
                         <div class="mb-3">
                            <label for="admin_image" class="form-label fw-bold">Profile Pic</label>
                            <input
                                type="file"
                                class="form-control"
                                name="admin_image"
                                id="admin_image"
                                placeholder=""
                                aria-describedby="adminFileId"
                            />
                         </div>
                         
                        

                        <div class="d-flex justify-content-end mt-5">
                            <button
                                type="button"
                                class="btn btn-warning action-button"
                            >
                                Update Information
                            </button>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>  
</main>
<!-- place footer here -->
<?php 
    //Header layout
    include("./layout/footer.php");
?>