<!-- Dashboard View -->
<!-- place navbar here -->

<link rel="stylesheet" href="../public/css/dashboard_habitica.css">
<?php 
    //Header layout
    include("../api/auth.php");///aron d ma access if wala naka log-in
    include("./layout/header.php");
    include("../config/config.php");
    include("../api/auth/users.php");
?>

<main>
    <div class="container">
        <div class="row justify-content-center mx-1">
            <!-- Authorization Message -->
            <?php 
                if ($_SESSION["admin_role"] !== 'super_admin') {
                    include("./components/authorized.php");
                    return;
                }
            ?>

            <!-- User Statistics -->

            <div class="col-12 user-statistics-wrapper shadow p-3 rounded-3">
                <div class="row justify-content-around align-items-center px-3">
                    <div class="col-12 col-lg-6">
                        <!-- Show total users -->
                        <div id="total-user" 
                            class="d-flex justify-content-start align-items-center gap-2 info-box p-3 rounded-3 shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-people-fill text-success" viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                            </svg>
                            <div class="info-box-content">
                                <h5 class="fw-semibold text-secondary">Total Users</h5>
                                <span class="lead fw-bold fs-2 text-center">
                                    <!-- Displays total count of user -->
                                    <?php echo $totalUserCount; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div id="total-user" 
                            class="d-flex justify-content-start align-items-center bg-secondary gap-2 info-box p-3 rounded-3 shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-lock-fill text-warning" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                            </svg>
                            <div class="info-box-content">
                                <h5 class="fw-semibold text-light">Current Logged User</h5>
                                <span class="lead fw-bold fs-2 text-center text-warning">
                                    <!-- Displays total count of user -->
                                    <?php echo $_SESSION["admin_role"] ?>
                                    <!-- <?php echo $_SESSION["user_id"] ?> -->
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Table -->
            <div class="col-12 col-lg-12 mt-4 mb-3">
                <div class="row justify-content-center">
                    <div class="col-9 my-1 px-0">
                        <div
                            class="table-responsive rounded-4 overflow-x-hidden overflow-y-auto shadow border border-1"
                        >
                            <div class="position-sticky bg-success text-light top-0 z-1 py-2">
                                <div class="px-2">
                                    <h3 class="position-sticky top-0 z-1 py-2">
                                        <div class="d-flex align-items-center gap-1 fw-light">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                                            </svg>
                                            Admins
                                        </div>
                                    </h3>
                                    
                                </div>
                            </div>
                            <table
                                class="table table-sm table-hover table-striped table-bordered mb-0 table-contain"
                            >
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    <?php foreach($admins as $admin) { ?>
                                        <tr class="">
                                            <td>
                                                <?php echo htmlspecialchars($admin["admin_name"]); ?>
                                            </td>
                                            <td>
                                                <?php echo htmlspecialchars($admin["admin_email"]); ?>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge bg-warning text-dark">
                                                    <?php echo htmlspecialchars($admin["admin_role"]); ?>
                                                </span>                                               
                                            </td>
                                            <td class="text-center">
                                                <!-- ====== Delete Button ====== -->
                                                <button
                                                    type="button"
                                                    name="delete_btn"
                                                    id="delete_btn_<?php echo $admin["id"]?>"
                                                    class="btn btn-danger action-delete-button"
                                                    onclick="deleteUser(<?php echo $admin['id']?>)"
                                                >
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
</main>


<script src="../public/js/delete_user.js"></script>
<?php
    include("./layout/footer.php")
?>