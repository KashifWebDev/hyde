<?php
require '../app/db.php';
$image = null;

if(isset($_POST["save"])) {
    $errMsg = null;

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
        $uid = $_SESSION["user"]["id"];
        $s = "UPDATE users SET logo = '$image' WHERE id = $uid";
        mysqli_query($con, $s);

    }else{

    }
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
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-aside-wrap">
                                            <div class="card-inner card-inner-lg">
                                                <div class="nk-block-head nk-block-head-lg">
                                                    <div class="nk-block-between">
                                                        <div class="nk-block-head-content">
                                                            <h4 class="nk-block-title">Customize Dashboard</h4>
                                                            <div class="nk-block-des">
                                                                <p>Customize your feel and experience of your dashboard in a way you want!</p>
                                                            </div>
                                                        </div>
                                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
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

                                                <div class="nk-block card">
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="customFileLabel">Upload your logo for dashboard</label>
                                                                    <div class="form-control-wrap">
                                                                        <div class="custom-file">
                                                                            <input name="image" type="file" class="custom-file-input" id="customFile">
                                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-primary" name="save">
                                                                        <em class="icon ni ni-setting"></em><span>Save My Logo</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div><!-- .nk-block-head -->
                                            </div><!-- .card-inner -->
                                            <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                                                <?php $link =2;  require 'profile_left_bar.partial.php'; ?>
                                            </div><!-- card-aside -->
                                        </div><!-- card-aside-wrap -->
                                    </div><!-- .card -->
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