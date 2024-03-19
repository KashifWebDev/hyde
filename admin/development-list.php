<?php
require '../app/db.php';
$s = "SELECT * FROM developments";
$res = mysqli_query($con, $s);
?>
<!DOCTYPE html>
<html lang="zxx" class="js">

<?php $title = "Developments Listings"; require '__head.php'; ?>

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
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Developments</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>You have total 3 developments.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block">
                                    <div class="nk-block">
                                        <div class="row g-gs">
                                            <?php while($block = mysqli_fetch_assoc($res)){
                                                $depID = $block["id"];
                                                $s = "SELECT * from units WHERE dep_id = $depID";
                                                $s1 = mysqli_query($con, $s);
                                                $unitCounts = mysqli_num_rows($s1);
                                                ?>
                                                <div class="col-sm-6 col-lg-4 col-xxl-3">
                                                    <div class="card card-bordered h-100">
                                                        <div class="card-inner">
                                                            <div class="project">
                                                                <div class="project-head">
                                                                    <a href="development-view.php?id=<?=$block["id"]?>" class="project-title">
                                                                        <div class="project-info">
                                                                            <h6 class="title"><?=$block["name"]?></h6>
                                                                            <span class="sub-text">Total <?=$unitCounts?> Product(s)</span>
                                                                        </div>
                                                                    </a>
                                                                    <div class="drodown">
                                                                        <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger mt-n1 mr-n1" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li><a href="development-view.php?id=<?=$block["id"]?>"><em class="icon ni ni-eye"></em><span>View Development</span></a></li>
<!--                                                                                <li><a href="development-view.php"><em class="icon ni ni-edit"></em><span>Edit Development</span></a></li>-->
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="project-details">
                                                                    <p><?=$block["description"]?></p>
                                                                </div>
<!--                                                                <div class="project-meta">-->
<!--                                                                    <ul class="project-users g-1">-->
<!--                                                                        <li>-->
<!--                                                                            <div class="user-avatar"><img src="https://www.hydecontract.ie/cdn/shop/files/elbow_3_400X400.jpg" alt=""></div>-->
<!--                                                                        </li>-->
<!--                                                                        <li>-->
<!--                                                                            <div class="user-avatar"><img src="https://www.hydecontract.ie/cdn/shop/files/1.Carlton_p_1_400X400.jpg?v=1614295675" alt=""></div>-->
<!--                                                                        </li>-->
<!--                                                                        <li>-->
<!--                                                                            <div class="user-avatar bg-light sm"><span>+--><?php //=rand(3,8)?><!--</span></div>-->
<!--                                                                        </li>-->
<!--                                                                    </ul>-->
<!--                                                                </div>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
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
</body>

</html>