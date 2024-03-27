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
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Developments</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>You have total <?=$rowcount?> development(s).</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block">
                                    <div class="nk-block">
                                        <div class="row">
                                            <?php while($block = mysqli_fetch_assoc($res)){ ?>
                                            <div class="col-md-6 mt-4">
                                                <?php
                                                $depID = $block["id"];
                                                $s = "SELECT * from unit_tabs WHERE parent_id = $depID";
                                                $s1 = mysqli_query($con, $s);
                                                $unitCounts = mysqli_num_rows($s1);
                                                ?>
                                                <div class="accordion" id="accordion-column-<?=$depID?>">
                                                    <div class="accordion-item">
                                                        <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#accordion-item-<?=$depID?>">
                                                            <h6 class="title"><?=$block["name"]?> <span style="font-weight: 300; font-style: oblique;">(<?=$unitCounts?> items)</span></h6>
                                                            <span class="accordion-icon"></span>
                                                        </a>
                                                        <div class="accordion-body collapse" id="accordion-item-<?=$depID?>" data-parent="#accordion-column-<?=$depID?>">
                                                            <div class="accordion-inner">

                                                                <?php if($unitCounts){ ?>
                                                                    <div class="row">
                                                                        <?php while ($re = mysqli_fetch_assoc($s1)): ?>
                                                                            <a href="development-view.php?id=<?=$re["id"]?>" class="btn btn-round btn-primary mb-1 mr-1" style="width: max-content"><?=$re["name"]?></a>
                                                                        <?php endwhile; ?>
                                                                    </div>
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