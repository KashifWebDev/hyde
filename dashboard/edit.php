<?php
$success = false;
require '../app/db.php';

$id = $_GET["id"];
$sql = "SELECT * FROM units where id=$id";
$res =mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);

if(isset($_POST["save"])){
    $id = $_POST["id"];
    $qty = $_POST["qty"];
    $type = $_POST["type"];
    $model = $_POST["model"];
    $location = $_POST["location"];
    $brand = $_POST["brand"];
    $description = $_POST["description"];
    $image = $_POST["image"];


    // Check if image file is selected in the form
    if(isset($_FILES["file"]) && $_FILES['file']['name']) {
        $banner=$_FILES['file']['name'];
        $expbanner=explode('.',$banner);
        $bannerexptype=$expbanner[1];
        $date = date('m/d/Yh:i:sa', time());
        $rand=rand(10000,99999);
        $encname=$date.$rand;
        $image=md5($encname).'.'.$bannerexptype;
        $bannerpath="../images/site/uploads/".$image;
        echo $bannerpath;
        move_uploaded_file($_FILES["file"]["tmp_name"],$bannerpath);
    }

    $sql = "UPDATE units SET qty=$qty, location = '$location', product_type= '$type', brand = '$brand', model = '$model', description = '$description', image = '$image'
            WHERE id=$id";
    $success = mysqli_query($con, $sql);
}
?>
<!DOCTYPE html>
<html lang="zxx" class="js">

<?php $title = "Add New Development"; require '__head.php'; ?>

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

                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="title nk-block-title">Add New Development</h4>
                        </div>
                    </div>
                    <div class="container">
                        <?php if(isset($success) && $success){ ?>
                            <div class="example-alert mb-4 shadow-lg">
                                <div class="alert alert-pro alert-primary">
                                    <div class="alert-text">
                                        <h6>Unit was updated successfully</h6>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <form method="post" class="form-validate is-alter" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?=$row["id"]?>">
                                    <input type="hidden" name="image" value="<?=$row["image"]?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row g-gs">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fva-full-name">Qty</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="fva-full-name" name="qty" value="<?=$row["qty"]?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fva-message">Product Type</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="fva-full-name" name="type" value="<?=$row["product_type"]?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fva-message">Model</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="fva-full-name" name="model" value="<?=$row["model"]?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="default-06">Change Image *(Optional)</label>
                                                        <div class="form-control-wrap">
                                                            <div class="custom-file">
                                                                <input type="file" name="file" class="custom-file-input" id="customFile">
                                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row g-gs">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fva-full-name">Location</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="fva-full-name" name="location"  value="<?=$row["location"]?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fva-full-name">Brand</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="fva-full-name" name="brand" value="<?=$row["brand"]?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fva-message">Short Description</label>
                                                        <div class="form-control-wrap">
                                                            <textarea class="form-control form-control-sm" id="fva-message" name="description"><?=$row["description"]?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-3">
                                            <div class="form-group">
                                                <button type="submit" name="save" class="btn btn-lg btn-primary btn-round">
                                                    <em class="icon ni ni-save mr-1"></em>
                                                    Save Unit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- .nk-block -->
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