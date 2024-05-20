<?php
require '../app/db.php';
$id = $_GET["id"];
$s = "SELECT * from units WHERE id = $id";
$res = mysqli_query($con, $s);
$row = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="zxx" class="js">

<?php $title = $row["pack"]; require '__head.php'; ?>

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
                <div class="nk-content pl-4">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="d-flex between-center">
                            <p class="text-white ubuntu fs-30 m-0"><span style="font-weight: bold">DEVELOPMENT UNITS</span> - INVENTORY TRACKING</p>
                            <p class="text-white ubuntu fs-38 d-none">WELCOME <span class="fs-49 northwell">back</span> <span class="text-uppercase"><?=$_SESSION["user"]["fullName"]?></span></p>
                        </div>
                    </div>
                    <p class="nowFont fs-22px lightColor m-0">PRODUCT DETAILS</p>
                    <div class="row">
                        <div class="col-md-4 pl-4">
                            <ul class="list-group mt-4">
                                <p class="text-white ubuntu fs-15px"><span class="fw-bold">Pack: </span><?=$row["pack"]?></p>
                                <p class="text-white ubuntu fs-15px"><span class="fw-bold">Quantity: </span><?=$row["qty"]?></p>
                                <p class="text-white ubuntu fs-15px"><span class="fw-bold">Location: </span><?=$row["location"]?></p>
                                <p class="text-white ubuntu fs-15px"><span class="fw-bold">Product Type: </span><?=$row["product_type"]?></p>
                                <p class="text-white ubuntu fs-15px"><span class="fw-bold">Brand: </span><?=$row["brand"]?></p>
                                <p class="text-white ubuntu fs-15px"><span class="fw-bold">Model: </span><?=$row["model"]?></p>
                                <p class="text-white ubuntu fs-15px"><span class="fw-bold">Description: </span><?=$row["description"]?></p>
                                <p class="text-white ubuntu fs-15px"><span class="fw-bold">Warranty Start Date: </span> 31-Jan-2024</p>
                                <p class="text-white ubuntu fs-15px"><span class="fw-bold">Warranty End Date: </span> 31-Jan-2029</p>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="py-5 px-5" style="background-color: #cfcfcf; max-width: 300px;">
                                <p>Warranty Form:</p>
                                <p>
                                    To initiate the process of filing your
                                    warranty claim, kindly press the
                                    "Submit" button below. A dedicated
                                    member of the Hyde team will
                                    promptly reach out to you within 48
                                    hours to assist with your inquiry. Please
                                    ensure that all relevant images and
                                    information are included in the online
                                    form. Thank you for your cooperation
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex flex-column align-items-center mt-4">

                                <img width="350px" height="350px" src="../images/site/uploads/<?=$row["image"]?>" alt="">
                                <a href="https://www.hydecontract.ie/" target="_blank" class='btn btn-success lightColorBg nowFont fs-14px btnHover mt-4'>
                                    Request Replacement
                                </a>
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