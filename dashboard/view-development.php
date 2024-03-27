<?php
require '../app/db.php';
if(isset($_POST["save"])) {
    $errMsg = null;
    $uploadOk = 1;
    $pack = $_POST['pack'];
    $qty = $_POST['qty'];
    $loc = $_POST['loc'];
    $prod_type = $_POST['prod_type'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $desc = $_POST['desc'];
    $dep_id = $_POST['dep_id'];
    $image = null;

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $targetDirectory = "../images/site/uploads/"; // Directory where the file will be saved
        $uploadOk = 1; // Flag to check if upload is successful
        $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION)); // File type

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            $errMsg = "File is not an image.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $errMsg = "Sorry, your file was not uploaded.";
        } else {
            // Move uploaded file to target directory
            $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                $uploadOk = 1;
                $image = basename($_FILES["image"]["name"]);
                echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
            } else {
                $uploadOk = 0;
                $errMsg = "Sorry, there was an error uploading your file.";
            }
        }
    }

    if($uploadOk){
        $s = "INSERT INTO units (pack, qty, location, product_type, brand, model, description, image, dep_id) VALUES 
                  ('$pack', $qty, '$loc', '$prod_type', '$brand', '$model', '$desc', '$image', $dep_id)";
        mysqli_query($con, $s);

    }else{

    }
}

$depID = $_GET["id"];


$s = "SELECT * FROM unit_tabs WHERE id = $depID";
$res = mysqli_query($con, $s);
$headings = mysqli_fetch_assoc($res);

$s = "SELECT * FROM units WHERE unit_tab_id = $depID";
$r = mysqli_query($con, $s);
$rows = "";
$count = 0;
while($result = mysqli_fetch_assoc($r)){
    $pack = $result["pack"];
    $count++;
    $rows .= "<tr>
                    <td>".$result["id"]."</td>
                    <td>".$result["pack"]."</td>
                    <td>".$result["qty"]."</td>
                    <td>".$result["location"]."</td>
                    <td>".$result["model"]."</td>
                    <td><img src='../images/site/uploads/".$result["image"]."' alt='Reference Image' width='100' height='100'></td>
                    <td><a href='unit-details.php?id=".$result["id"]."'><span class='nk-menu-icon'><em class='icon ni ni-eye'></em></span></a></td>
                </tr>";
}
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
                                <div class="nk-block-between g-3">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title">Developments / <strong class="text-primary small">Dev Site 1</strong></h3>
                                        <div class="nk-block-des text-soft">
                                            <ul class="list-inline">
                                                <li>Total Units: <span class="text-base"><?=$count?></span></li>
                                                <li>Last Delivered: <span class="text-base">26 Feb, 2024 11:02 AM</span></li>
                                            </ul>
                                        </div>
                                        <ul class="link-list-plain no-bdr">
                                            <li><a href="#"><em class="icon ni ni-archive"></em><span>Pack: <?=$pack?></span></a></li>
                                            <li><a href="#"><em class="icon ni ni-box"></em><span>Unit Number: <?=$headings["name"]?></span></a></li>
                                            <li><a href="#"><em class="icon ni ni-bulb"></em><span>Ref: <?=$headings["ref"]?></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle">
                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                <ul class="nk-block-tools g-3">
                                                    <li class="nk-block-tools-opt">
<!--                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalForm">-->
<!--                                                            <em class="icon ni ni-plus"></em>Add New Unit-->
<!--                                                        </button>-->
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .toggle-wrap -->
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->

                            <?php if(isset($uploadOk)){ ?>
                                <div class="container">

                                    <?php if(isset($uploadOk)){ ?>
                                        <div class="example-alert">
                                            <div class="alert alert-fill alert-success alert-icon">
                                                <em class="icon ni ni-check-circle"></em> <strong>Unit was added!</strong> The new unit was successfully linked with the current department.</div>
                                        </div>
                                    <?php }else{ ?>
                                        <div class="example-alert">
                                            <div class="alert alert-fill alert-danger alert-icon">
                                                <em class="icon ni ni-cross-circle"></em> <strong>Insertion Failed!</strong> <?=$con->error?></div>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>

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
                                                                echo $rows;
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


<div class="modal fade zoom" tabindex="-1" id="modalForm">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Unit</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form method="post" action="" enctype="multipart/form-data" class="form-validate is-alter">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label class="form-label" for="full-name">Pack</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="full-name" name="pack" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label class="form-label" for="qty">Quantity</label>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control" id="qty" name="qty" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label class="form-label" for="Location">Location</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="Location" name="loc" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label class="form-label" for="prod_type">Product Type</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="prod_type" name="prod_type" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label class="form-label" for="brand">Brand</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="brand" name="brand" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label class="form-label" for="model">Model</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="model" name="model" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label class="form-label" for="desc">Description</label>
                                <div class="form-control-wrap">
                                    <textarea class="form-control" rows="3" id="desc" name="desc" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label class="form-label" for="default-06">Reference Image</label>
                                <div class="form-control-wrap">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Upload Picture</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3 d-flex justify-content-center">
                        <input type="hidden" name="dep_id" value="<?=$_GET["id"]?>">
                        <button type="submit" class="btn btn-lg btn-primary" name="save">Save Details</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</body>

</html>