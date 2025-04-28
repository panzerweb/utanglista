<!-- Admin Greeting: add more code to the header if you want -->

<div class="col-12 col-lg-12">
    <div class="mt-4 mb-3 pb-4">
        <h1>Hello, 
            <!-- Admin is placeholder, apply Session for a logged in user -->
            <?php echo htmlspecialchars($_SESSION["admin_name"]) ?>
        </h1>
    </div>
</div>