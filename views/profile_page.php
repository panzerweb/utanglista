<!-- place header here -->
<?php 
    //Header layout
    include("./layout/header.php");
?>

<main>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="card text-start p-4">
                    <div class="text-center">
                        <img src="https://via.placeholder.com/120" class="profile-img" alt="Profile Picture">
                        <h4 class="mt-3">
                            <?php
                                //Replace with actual data
                                $name = "Admin";
                                echo $name;
                            ?>
                        </h4>
                        <p class="text-muted">
                            <?php
                                //Replace with actual data
                                $bio = "Web Developer & UI/UX Enthusiast";
                                echo $bio;
                            ?>
                        </p>
                    </div>
                    <hr>
                    <form>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter username">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter new password">
                        </div>
                        <div class="mb-3">
                            <label for="bio" class="form-label">Bio / Description</label>
                            <textarea class="form-control" id="bio" rows="3" placeholder="Write something about yourself..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="profilePic" class="form-label">Profile Picture</label>
                            <input class="form-control" type="file" id="profilePic">
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn btn-primary-custom">Update Profile</button>
                            <button type="button" class="btn btn-logout">Log Out</button>
                        </div>
                    </form>
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