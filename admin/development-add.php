<?php
$success = false;
    require '../app/db.php';
    if(isset($_POST["save"])){
        $name = $_POST["name"];
        $desc = $_POST["desc"];

        $sql = "INSERT INTO developments (name, description) VALUES ('$name', '$desc')";
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
                            <?php if($success){ ?>
                            <div class="example-alert mb-4 shadow-lg">
                                <div class="alert alert-pro alert-primary">
                                    <div class="alert-text">
                                        <h6>Development was added</h6>
                                        <p>New Development was added successfully. <a style="text-decoration: underline" href="development-list.php">Click Here</a> to list developments </p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <form method="post" class="form-validate is-alter">
                                        <div class="row g-gs">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="fva-full-name">Name Of Development</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="fva-full-name" name="name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="fva-message">Short Description</label>
                                                    <div class="form-control-wrap">
                                                        <textarea class="form-control form-control-sm" id="fva-message" name="desc" placeholder="Write your message" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="submit" name="save" class="btn btn-lg btn-primary btn-round">
                                                        <em class="icon ni ni-save mr-1"></em>
                                                        Save Development
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