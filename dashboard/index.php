<?php
require '../app/db.php';
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
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="d-flex between-center">
                                        <p class="text-white ubuntu fs-30">DASHBOARD</p>
                                        <p class="text-white ubuntu fs-38">WELCOME <span class="fs-49 northwell">back</span> <span class="text-uppercase"><?=$_SESSION["user"]["fullName"]?></span></p>
                                    </div>
                                </div><!-- .nk-block-head -->

                                <div class="nk-block" >
                                    <div class="nk-block">
                                        <div class="d-flex">
                                            <div class="border-custom">
                                                <a href="developments.php">
                                                    <div class="d-flex center">
                                                        <div class="flex-grow-1 py-3 d-flex ml-5 flex-column">
                                                            <b class="fs-12px" style="color: #00c4cc">INVENTORY</b>
                                                            <span class="darkColor">1 Development(s)</span>
                                                        </div>
                                                        <div>
                                                            <i class="fa-angle-down fa-solid mr-2" style="font-size: 21px;color: #00c4cc""></i>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="border-custom ml-5">
                                                <a href="gallery.php">
                                                    <div class="d-flex center">
                                                        <div class="flex-grow-1 py-3 d-flex ml-5 flex-column">
                                                            <b class="fs-13px" style="color: #00c4cc">Gallery</b>
                                                            <span class="darkColor">5 Projects</span>
                                                        </div>
                                                        <div>
                                                            <i class="fa-angle-down fa-solid mr-2" style="font-size: 21px;color: #00c4cc""></i>
                                                        </div>
                                                    </div>
                                                </a>
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