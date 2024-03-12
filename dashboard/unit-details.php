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
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Unit Details</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="d-flex flex-column align-items-center">

                                <img width="350px" src="https://www.hydecontract.ie/cdn/shop/files/1.Carlton_p_1_400X400.jpg?v=1614295675" alt="">
                                <a style="width: 250px;" href="#"
                                   class="btn btn-round btn-primary center mt-2">
                                    <em class="icon ni ni-cart"></em>
                                    <span>Re-order Now</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <ul class="list-group">
                                <li class="list-group-item"><span class="fw-bold">Pack: </span>BOWERY</li>
                                <li class="list-group-item"><span class="fw-bold">Quantity: </span>23</li>
                                <li class="list-group-item"><span class="fw-bold">Area: </span>Living Room</li>
                                <li class="list-group-item"><span class="fw-bold">Product Category: </span>Coffe Table</li>
                                <li class="list-group-item"><span class="fw-bold">Brand: </span>HDE Contract</li>
                                <li class="list-group-item"><span class="fw-bold">Model: </span>Amble</li>
                                <li class="list-group-item"><span class="fw-bold">Description: </span>AMBLE COFFEE TABLE TOP MELAMINE MARBLE BASE STEEL MATT BLACK</li>
                                <li class="list-group-item"><span class="fw-bold">Warranty Start Date: </span> In Warranty</li>
                            </ul>
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