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
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Administrator Dashboard</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>Welcome back Admin!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-gs">
                        <div class="col-sm-3">
                            <div class="card text-white bg-blue">
                                <div class="card-inner">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="card-text">Users</p>
                                            <h5 class="card-title">38</h5>
                                        </div>
                                        <div>
                                            <em class="icon ni ni-users-fill" style="font-size: 52px;"></em>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card text-white bg-success">
                                <div class="card-inner">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="card-text">Developments</p>
                                            <h5 class="card-title">25</h5>
                                        </div>
                                        <div>
                                            <em class="icon ni ni-building" style="font-size: 52px;"></em>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card text-white bg-purple">
                                <div class="card-inner">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="card-text">Units</p>
                                            <h5 class="card-title">25</h5>
                                        </div>
                                        <div>
                                            <em class="icon ni ni-table-view" style="font-size: 52px;"></em>
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