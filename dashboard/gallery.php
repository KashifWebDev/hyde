<?php
require '../app/db.php';
$data = [
        [
                "pic" => "https://cdn.shopify.com/s/files/1/1009/5484/files/RK2A1128_copy_1024x1024.jpg?v=1700225575",
            "name" => "East Village Bowery Pack/ 295 Units",
            "link" => "https://www.hydecontract.ie/pages/east-village-bowery-pack-295-units"
        ],
        [
                "pic" => "https://cdn.shopify.com/s/files/1/1009/5484/files/17_1024x1024.jpg?v=1700222130",
            "name" => "East Village Fulton Pack/ 295 Units",
            "link" => "https://www.hydecontract.ie/pages/east-village-fulton-pack-295-units"
        ],
        [
                "pic" => "https://cdn.shopify.com/s/files/1/1009/5484/files/8_a84a3f43-9901-4cdd-bc08-d21436a50ff6_1024x1024.jpg?v=1700218149",
            "name" => "East Village Noho Pack/ 295 Units",
            "link" => "https://www.hydecontract.ie/pages/east-village-295-units"
        ],
        [
                "pic" => "https://cdn.shopify.com/s/files/1/1009/5484/files/RK2A0282_1024x1024.jpg?v=1704813010",
            "name" => "Belcamp/ 46 Units",
            "link" => "https://www.hydecontract.ie/pages/belcamp-46-units-green"
        ],
        [
                "pic" => "https://cdn.shopify.com/s/files/1/1009/5484/files/RK2A0754_copy_1024x1024.jpg?v=1704803089",
            "name" => "Belcamp/ 46 Units",
            "link" => "https://www.hydecontract.ie/pages/belcamp-46-units"
        ],
];
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
                                        <div class="bg-white p-4" style="border-radius: 25px;">
                                            <div class="row">
                                                <?php foreach ($data as $block): ?>
                                                <div class="col-md-4 mb-4">
                                                    <a href="<?=$block["link"]?>" target="_blank">
                                                        <img src="<?=$block["pic"]?>" alt="">
                                                        <p class="center lightColor"><?=$block["name"]?> </p>
                                                    </a>
                                                </div>
                                                <?php endforeach; ?>
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