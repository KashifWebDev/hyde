<?php
require '../app/db.php';
$s = "SELECT * FROM users WHERE is_admin=0";
$res = mysqli_query($con, $s);
?>
<!DOCTYPE html>
<html lang="zxx" class="js">

<?php $title = "Users List"; require '__head.php'; ?>

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
                            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between g-3">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title">Users Directory</h3>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->

                            <div class="nk-content ">
                                <div class="container-fluid">
                                    <div class="nk-content-inner">
                                        <div class="nk-content-body">
                                            <div class="components-preview">
                                                <div class="nk-block nk-block-lg">
                                                    <div class="card card-preview">
                                                        <div class="card-inner">
                                                            <table class="datatable-init nowrap table">
                                                                <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>Full Name</th>
                                                                    <th>Email</th>
                                                                    <th>Phone</th>
                                                                    <th>DoB</th>
                                                                    <th>Development</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php
                                                                while($row = mysqli_fetch_assoc($res)){
                                                                    $devID = $row["dep_id"];
                                                                    $k = "SELECT name FROM developments WHERE id = $devID";
                                                                    $k1 = mysqli_query($con, $k);
                                                                    $dev = mysqli_fetch_assoc($k1);
                                                                    ?>
                                                                    <tr>
                                                                        <td><?=$row["id"]?></td>
                                                                        <td><?=$row["fullName"]?></td>
                                                                        <td><?=$row["email"]?></td>
                                                                        <td><?=$row["phone"]?></td>
                                                                        <td><?=$row["dob"]?></td>
                                                                        <td><?=$dev["name"]?></td>
                                                                    </tr>
                                                                <?php
                                                                }
                                                                ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div><!-- .card-preview -->
                                                </div> <!-- nk-block -->
                                            </div><!-- .components-preview -->
                                        </div>
                                    </div>
                                </div>
                            </div>
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
</body>

</html>