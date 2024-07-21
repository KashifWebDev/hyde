<?php
require '../app/db.php';

function alert($msg)
{
    echo "<script>alert('$msg')</script>";
}

function changePassword($con, $userId, $currentPassword, $newPassword, $confirmPassword) {
    $check = false;
    $result = mysqli_query($con, "SELECT pass FROM users WHERE id = '$userId'");
    if (!$result) {
        alert("Error retrieving current password: " . mysqli_error($con));
    }
    $row = mysqli_fetch_assoc($result);
    $hashedPassword = $row['pass'];
    //echo $hashedPassword.' '.$currentPassword;exit(); die();

    // Verify if the entered current password matches the password retrieved from the database
    if ($currentPassword != $hashedPassword) {
        alert("Incorrect current password.");
    }elseif ($newPassword !== $confirmPassword) {
        alert("New password and confirm password do not match.");
    }else{
        $hashedNewPassword = $newPassword;
        echo "UPDATE users SET pass = '$hashedNewPassword' WHERE id = '$userId'";

        $updateResult = mysqli_query($con, "UPDATE users SET pass = '$hashedNewPassword' WHERE id = '$userId'");
        if ($updateResult) {
            alert("Password changed successfully.");
        } else {
            alert("Error updating password: " . mysqli_error($con));
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentPassword = $_POST["current_password"];
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];

    $userId = $_SESSION['user']['id'];
    changePassword($GLOBALS['con'], $userId, $currentPassword, $newPassword, $confirmPassword);
}
?>
<!DOCTYPE html>
<html lang="zxx" class="js">

<?php $title = "Dashboard"; require '__head.php'; ?>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <?php require '__side_nav.php'; ?>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <?php require '__top_bar.php'; ?>
                <!-- main header @e -->
                <!-- content @s -->

                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-aside-wrap">
                                            <div class="card-inner card-inner-lg">
                                                <div class="nk-block-head nk-block-head-lg">
                                                    <div class="nk-block-between">
                                                        <div class="nk-block-head-content">
                                                            <h4 class="nk-block-title">Security Settings</h4>
                                                            <div class="nk-block-des">
                                                                <p>These settings are helps you keep your account secure.</p>
                                                            </div>
                                                        </div>
                                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-block-head -->
                                                <div class="nk-block">
                                                    <div class="card card-bordered">
                                                        <div class="card-inner-group">
                                                            <div class="card-inner">
                                                                <div class="between-center flex-wrap g-3">
                                                                    <div class="nk-block-text">
                                                                        <h6>Change Password</h6>
                                                                        <p>Set a unique password to protect your account.</p>
                                                                    </div>
                                                                    <div class="nk-block-actions flex-shrink-sm-0">
                                                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                                                            <li class="order-md-last">
                                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalForm">Change Password</button>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .card-inner -->
                                                        </div><!-- .card-inner-group -->
                                                    </div><!-- .card -->
                                                </div><!-- .nk-block -->
                                            </div><!-- .card-inner -->
                                            <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                                                <?php $link =4;  require 'profile_left_bar.partial.php'; ?>
                                            </div><!-- .card-aside -->
                                        </div><!-- .card-aside-wrap -->
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <div class="nk-footer">
                    <?php require '__footer.php'; ?>
                </div>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="../assets/js/bundle.js?ver=2.4.0"></script>
    <script src="../assets/js/scripts.js?ver=2.4.0"></script>
    <script src="../assets/js/charts/gd-default.js?ver=2.4.0"></script>

    <!-- Modal Form -->
    <div class="modal fade" tabindex="-1" id="modalForm">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Password</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form-validate is-alter">
                        <div class="form-group">
                            <label class="form-label" for="full-name">Old Password</label>
                            <div class="form-control-wrap">
                                <input name="current_password" type="password" class="form-control" id="full-name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="full-name">New Password</label>
                            <div class="form-control-wrap">
                                <input name="new_password" type="password" class="form-control" id="full-name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="full-name">Confirm Password</label>
                            <div class="form-control-wrap">
                                <input name="confirm_password" type="password" class="form-control" id="full-name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>