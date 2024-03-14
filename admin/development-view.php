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
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Developments / <strong class="text-primary small">Dev Site 1</strong></h3>
                                            <div class="nk-block-des text-soft">
                                                <ul class="list-inline">
                                                    <li>Total Units: <span class="text-base">34</span></li>
                                                    <li>Last Delivered: <span class="text-base">15 Feb, 2019 01:02 PM</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->

                                <div class="nk-content ">
                                    <div class="container-fluid">
                                        <div class="nk-content-inner">
                                            <div class="nk-content-body">
                                                <div class="components-preview">
                                                    <div class="nk-block nk-block-lg">
                                                        <div class="nk-block-head">
                                                            <div class="nk-block-head-content">
                                                                <h4 class="nk-block-title">Inventory Details</h4>
                                                            </div>
                                                        </div>
                                                        <div class="card card-preview">
                                                            <div class="card-inner">
                                                                <table class="datatable-init nowrap table">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>ID</th>
                                                                        <th>Pack</th>
                                                                        <th>Qty.</th>
                                                                        <th>Location</th>
                                                                        <th>Model</th>
                                                                        <th>Reference Image</th>
                                                                        <th>Actions</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <?php
                                                                    // Define the headings
                                                                    $headings = array("ID", "Pack", "Qty.", "Location", "Model", "Reference Image", "Actions");

                                                                    // Generate random data for each row
                                                                    $rows = '';
                                                                    for ($id = 1; $id <= 10; $id++) { // Let's create 10 rows for example
                                                                        $pack = getRandomString(array("Small", "Medium", "Large", "Extra Large"));
                                                                        $qty = rand(5, 50);
                                                                        $location = getRandomString(array("Area A", "Area B", "Area C", "Area D"));
                                                                        $model = getRandomString(array("Model X", "Model Y", "Model Z"));
                                                                        $images = array(
                                                                            "https://www.hydecontract.ie/cdn/shop/files/elbow_3_400X400.jpg",
                                                                            "https://www.hydecontract.ie/cdn/shop/files/1.Carlton_p_1_400X400.jpg?v=1614295675",
                                                                            "https://www.hydecontract.ie/cdn/shop/files/5_03.png?v=1614292789"
                                                                        );
                                                                        $randomImage = $images[array_rand($images)];

                                                                        $actions = "<a href='unit-details.php?id=$id'><span class='nk-menu-icon'>
<em class='icon ni ni-eye'></em>
</span></a>";

                                                                        // Generate the table row
                                                                        $rows .= "<tr>
                                                                                <td>$id</td>
                                                                                <td>$pack</td>
                                                                                <td>$qty</td>
                                                                                <td>$location</td>
                                                                                <td>$model</td>
                                                                                <td><img src='$randomImage' alt='Reference Image' width='100'></td>
                                                                                <td>$actions</td>
                                                                            </tr>";
                                                                    }

                                                                    // Print the table rows
                                                                    echo $rows;

                                                                    // Function to return a random string from a predefined array of strings
                                                                    function getRandomString($strings) {
                                                                        $randomIndex = array_rand($strings);
                                                                        return $strings[$randomIndex];
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