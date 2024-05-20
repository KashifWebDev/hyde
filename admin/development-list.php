<?php
require '../app/db.php';
$s = "SELECT * FROM developments";
$res = mysqli_query($con, $s);
$rowcount = mysqli_num_rows($res);
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
                        <div class="nk-block-head nk-block-head-sm">
                            <div class="d-flex between-center">
                                <p class="text-white ubuntu fs-30">INVENTORY TRACKING</p>
                                <p class="text-white ubuntu fs-38 d-none">WELCOME <span class="fs-49 northwell">back</span> <span class="text-uppercase"><?=$_SESSION["user"]["fullName"]?></span></p>
                            </div>
                        </div><!-- .nk-block-head -->

                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <p class="nowFont fs-14px lightColor mb-4">YOU  HAVE A TOTAL OF 1 DEVELOPMENT(S)</p>

                                <div class="nk-block" >
                                    <div class="nk-block">
                                        <div class="row">
                                            <?php
                                            $s = "SELECT * FROM developments";
                                            $res = mysqli_query($con, $s);
                                            ?>
                                            <?php while($block = mysqli_fetch_assoc($res)){ ?>
                                                <div class="col-md-3">
                                                    <div class="circle_parent">
                                                        <?php
                                                        $depID = $block["id"];
                                                        $s = "SELECT * from unit_tabs WHERE parent_id = $depID";
                                                        $s1 = mysqli_query($con, $s);
                                                        $unitCounts = mysqli_num_rows($s1);
                                                        ?>
                                                        <div class="accordion border-0 bg-transparent" id="accordion-column-<?=$depID?>">
                                                            <div class="accordion-item">
                                                                <a href="#" class="accordion-head collapsed p-0" data-toggle="collapse" data-target="#accordion-item-<?=$depID?>">
                                                                    <div class="d-flex center h-100px">
                                                                        <div class="flex-grow-1 py-4 d-flex ml-5 flex-column">
                                                                            <b class="fs-12px" style="color: #00c4cc"><?=$block["name"]?></b>
                                                                            <span class="darkColor"><?=$unitCounts?> items</span>
                                                                        </div>
                                                                        <div class="border-custom align-items-center border-custom d-flex h-100" id="arrowParentDiv">
                                                                            <span id="arrow" class="accordion-icon mr-2 text-white fs-30"></span>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                                <div class="accordion-body collapse" id="accordion-item-<?=$depID?>" data-parent="#accordion-column-<?=$depID?>">
                                                                    <div class="accordion-inner">
                                                                        <?php if($unitCounts){ ?>
                                                                            <ul class="list-group list-group-flush">
                                                                                <p class="m-0 px-2 py-1 fs-12px" style="background-color: #cfcfcf;">Development Units</p>
                                                                                <?php while ($re = mysqli_fetch_assoc($s1)): ?>
                                                                                    <li class="list-group-item border-0">
                                                                                        <a href="development-view.php?id=<?=$re["id"]?>"
                                                                                           class="ibmFont fs-12px text-dark" style="width: max-content">
                                                                                            &#9642; <?=$re["name"]?>
                                                                                        </a>
                                                                                    </li>
                                                                                <?php endwhile; ?>
                                                                            </ul>
                                                                        <?php }else{ ?>
                                                                            <div class="example-alert">
                                                                                <div class="alert alert-secondary alert-icon">
                                                                                    <em class="icon ni ni-alert-circle"></em> <strong>No items in this unit!</strong></div>
                                                                            </div>
                                                                        <?php } ?>

                                                                    </div>
                                                                </div>
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