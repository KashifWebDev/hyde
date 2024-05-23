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


if (isset($_POST["sendMail"])) {
    $agentsName = $_POST['agents-name'];
    $agentsContactPhone = $_POST['agents-contact-phone'];
    $agentsEmail = $_POST['agents-email'];
    $propertyAddress = $_POST['property-address'];
    $isTenanted = $_POST['is-tenanted'];
    $keysAvailable = $_POST['keys-available'];
    $invoiceTo = $_POST['invoice-to'];
    $orderReference = $_POST['order-reference'];
    $deliveryDate = $_POST['delivery-date'];
    $deliveryTime = $_POST['delivery-time'];
    $notes = $_POST['notes'];

    // Email detail
    $to = "kmalik748@gmail.com";
    $subject = "New Billable Order - HYDE Portal";

    // Email content
    $message = "
    <html>
    <head>
        <title>New Billable Order - HYDE Portal</title>
    </head>
    <body>
        <h2>New Billable Order - BASIC Form Details</h2>
        <p><strong>Agent's Name:</strong> $agentsName</p>
        <p><strong>Agent's Contact Phone:</strong> $agentsContactPhone</p>
        <p><strong>Agent's Email:</strong> $agentsEmail</p>
        <p><strong>Property Address:</strong> $propertyAddress</p>
        <p><strong>Is the Property Tenanted?:</strong> $isTenanted</p>
        <p><strong>Are the Keys Available for Collection?:</strong> $keysAvailable</p>
        <p><strong>Who Will Hyde Make the Invoice Out To?:</strong> $invoiceTo</p>
        <p><strong>Purchase Order/Order Reference:</strong> $orderReference</p>
        <p><strong>Please Pick a Delivery Date:</strong> $deliveryDate</p>
        <p><strong>Preferred Time for Delivery:</strong> $deliveryTime</p>
        <p><strong>Notes:</strong> $notes</p>
    </body>
    </html>
    ";

    // Headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <portal@hyde.com>' . "\r\n"; //

    if (mail($to, $subject, $message, $headers)) {
        $form1 = true;
    } else {
        echo "Failed to send email.";
    }
}

if(isset($_POST["warranty_email"])){
        $agentsName = $_POST['agents-name'];
        $agentsContactPhone = $_POST['agents-contact-phone'];
        $agentsEmail = $_POST['agents-email'];
        $propertyAddress = $_POST['property-address'];
        $isTenanted = $_POST['is-tenanted'];
        $tenantContactDetails = $_POST['tenant-contact-details'];
        $keysAvailable = $_POST['keys-available'];
        $issueDescription = $_POST['issue-description'];
        $orderReference = $_POST['order-reference'];
        $deliveryDate = $_POST['delivery-date'];
        $inspectionTime = $_POST['inspection-time'];
        $notes = $_POST['notes'];

        // Email details
        $to = "kmalik748@gmail.com";
        $subject = "Warranty Request - HYDE Portal";

        // Email content
        $message = "
    <html>
    <head>
        <title>Warranty Request - HYDE Portal</title>
    </head>
    <body>
        <h2>Warranty Request</h2>
        <p><strong>Agent's Name:</strong> $agentsName</p>
        <p><strong>Agent's Contact Phone:</strong> $agentsContactPhone</p>
        <p><strong>Agent's Email:</strong> $agentsEmail</p>
        <p><strong>Property Address:</strong> $propertyAddress</p>
        <p><strong>Is the Property Tenanted?:</strong> $isTenanted</p>
        <p><strong>Tenant Contact Details:</strong> $tenantContactDetails</p>
        <p><strong>Are the Keys Available for Collection?:</strong> $keysAvailable</p>
        <p><strong>Issue Description:</strong> $issueDescription</p>
        <p><strong>Purchase Order/Order Reference:</strong> $orderReference</p>
        <p><strong>Please Pick a Delivery Date:</strong> $deliveryDate</p>
        <p><strong>Preferred Time for Inspection:</strong> $inspectionTime</p>
        <p><strong>Notes:</strong> $notes</p>
    </body>
    </html>
    ";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <portal@hyde.com>' . "\r\n";

        if (mail($to, $subject, $message, $headers)) {
            $form1 = true;
        } else {
            echo "Failed to send warranty request.";
        }
}

$depID = $_GET["id"];


$s = "SELECT * FROM unit_tabs WHERE id = $depID";

$res = mysqli_query($con, $s);
$headings = mysqli_fetch_assoc($res);

$dev_id = $headings["parent_id"];
$s = "SELECT * FROM developments WHERE id = $dev_id";

$r = mysqli_query($con, $s);
$dev_res = mysqli_fetch_assoc($r);
$development_name = $dev_res["name"];

    $s = "SELECT * FROM units WHERE unit_tab_id = $depID order by id";
    $r = mysqli_query($con, $s);
    $rows = "";
    $count = 0;
    while($result = mysqli_fetch_assoc($r)){
        $pack = $result["pack"];
        $count++;
        $rows .= "<tr class='rowCenter'>
                    <td class='fs-14px nowFont text-dark'>".$count."</td>
                    <td class='fs-14px nowFont text-dark'>".$result["location"]."</td>
                    <td class='fs-14px nowFont text-dark'>".$result["product_type"]."</td>
                    <td class='fs-14px nowFont text-dark'>ALL</td>
                    <td class='fs-14px nowFont text-dark'>".strrep($result["warranty_start"])."<br>-<br>".strrep($result["warranty_end"])." </td>
                    <td><img src='../images/site/uploads/".$result["image"]."' alt='Reference Image' style='max-height: 120px'></td>
                    <td>
                        <a href='unit-details.php?id=".$result["id"]."' class='btn btn-dark nowFont darkBgColor fs-14px'>View</a>
                        <button type='button' class='btn btn-success lightColorBg nowFont fs-14px btnHover' data-toggle='modal' data-target='#modalTabs'>
                        Request Replacement
                        </button>
                        ";
        if($_SESSION["user"]["is_admin"]) $rows .= "<a href='edit.php?id=".$result["id"]."'  class='btn btn-secondary'>Edit</a>";
        $rows .= "
                    </td>
                </tr>";
    }
    //echo $rows;exit(); die();
function strrep($str){
    return str_replace(".", "/", $str);
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
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="d-flex between-center">
                            <p class="text-white ubuntu fs-30"><span style="font-weight: bold">DEVELOPMENT UNITS</span> - INVENTORY TRACKING</p>
                            <p class="text-white ubuntu fs-38 d-none">WELCOME <span class="fs-49 northwell">back</span> <span class="text-uppercase"><?=$_SESSION["user"]["fullName"]?></span></p>
                        </div>
                    </div><!-- .nk-block-head -->
                    <p class="m-0 lightColor fs-19px text-uppercase" style="margin-top: -37px !important;"><?=$development_name?></p>

                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm p-0">
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <div class="nk-block-des text-soft">
                                                <ul class="list-inline">
                                                    <li> <span class="text-base"></span></li>
                                                    <li> <span class="text-base"></span></li>
                                                </ul>
                                            </div>
                                            <ul class="link-list-plain no-bdr">
                                                <li class="text-white fs-14px nowFont"><span style="font-weight: bold">Pack:</span> <span style="font-weight: normal"><?=$pack?></span></li>
                                                <li class="text-white fs-14px nowFont"><span style="font-weight: bold">Unit Number:</span> <span style="font-weight: normal"><?=$headings["name"]?></span></li>
                                                <li class="text-white fs-14px nowFont"><span style="font-weight: bold">Ref:</span> <span style="font-weight: normal"><?=$headings["ref"]?></span></li>
                                                <li class="text-white fs-14px nowFont"><span style="font-weight: bold">Total Units:</span> <span style="font-weight: normal"><?=$count?></span></li>
                                                <li class="text-white fs-14px nowFont"><span style="font-weight: bold">Last Delivered:</span> <span style="font-weight: normal">26 Feb, 2024 11:02 AM</span></li>
                                            </ul>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        <li class="nk-block-tools-opt">
                                                            <?php if($_SESSION["user"]["is_admin"] == 1 && false){ ?>
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalForm">
                                                                    <em class="icon ni ni-plus"></em>Add New Unit
                                                                </button>
                                                            <?php } ?>
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


                                    <?php if(isset($form1)){ ?>
                                        <div class="container">
                                            <div class="example-alert">
                                                <div class="alert alert-fill alert-success alert-icon">
                                                    <em class="icon ni ni-check-circle"></em> <strong>Mail was Sent!</strong> Our team will come back with a quotation within 24 hours.</div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                <div class="nk-content ">
                                    <div class="container-fluid">
                                        <div class="nk-content-inner">
                                            <div class="nk-content-body">
                                                <div class="components-preview">
                                                    <div class="nk-block nk-block-lg">
                                                        <div class="nk-block-head">
                                                            <div class="nk-block-head-content d-flex justify-end">
                                                                <h4 class="nk-block-title text-white ubuntu fs-22px">Inventory Details</h4>
                                                            </div>
                                                        </div>
                                                        <div class="card card-preview">
                                                            <div class="card-inner">
                                                                <table class="datatable-init nowrap table">
                                                                    <thead>
                                                                    <tr class="rowCenter">
                                                                        <th>ID</th>
                                                                        <th>LOCATION</th>
                                                                        <th>PRODUCT TYPE</th>
                                                                        <th>QUANTITY</th>
                                                                        <th>WARRANTY</th>
                                                                        <th>IMAGE</th>
                                                                        <th>ADD TO ORDER</th>
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


    <div class="modal fade" tabindex="-1" role="dialog" id="modalTabs">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h4 class="title">Request Replacement</h4>
                    <ul class="nk-nav nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabItem1">New Billable Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabItem2">Warranty Request</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabItem1">
                            <form action="" method="post">
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="agents-name">Agent's Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="agents-name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="agents-contact-phone">Agent's Contact Phone</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="agents-contact-phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="agents-email">Agent's Email</label>
                                            <div class="form-control-wrap">
                                                <input type="email" class="form-control" id="agents-email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="property-address">Property Address</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="property-address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="is-tenanted">Is the Property Tenanted?</label>
                                            <div class="form-control-wrap">
                                                <select class="form-control" id="is-tenanted">
                                                    <option value="">Select...</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="keys-available">Are the Keys Available for Collection?</label>
                                            <div class="form-control-wrap">
                                                <select class="form-control" id="keys-available">
                                                    <option value="">Select...</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="invoice-to">Who Will Hyde Make the Invoice Out To?</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="invoice-to">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="order-reference">Purchase Order/Order Reference</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="order-reference">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="delivery-date">Please Pick a Delivery Date</label>
                                            <div class="form-control-wrap">
                                                <input type="date" class="form-control" id="delivery-date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Preferred Time for Delivery</label>
                                            <div class="form-control-wrap">
                                                <select class="form-control" id="delivery-time">
                                                    <option value="">Select...</option>
                                                    <option value="morning">Morning</option>
                                                    <option value="afternoon">Afternoon</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="notes">Notes</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control" id="notes" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary" name="sendMail">Save Information</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="tab-pane" id="tabItem2">
                            <form action="" method="post">
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="agents-name">Agent's Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="agents-name" name="agents-name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="agents-contact-phone">Agent's Contact Phone</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="agents-contact-phone" name="agents-contact-phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="agents-email">Agent's Email</label>
                                            <div class="form-control-wrap">
                                                <input type="email" class="form-control" id="agents-email" name="agents-email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="property-address">Property Address</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="property-address" name="property-address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="is-tenanted">Is the Property Tenanted?</label>
                                            <div class="form-control-wrap">
                                                <select class="form-control" id="is-tenanted" name="is-tenanted">
                                                    <option value="">Select...</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="tenant-contact-details">Tenant Contact Details</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="tenant-contact-details" name="tenant-contact-details">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="keys-available">Are the Keys Available for Collection?</label>
                                            <div class="form-control-wrap">
                                                <select class="form-control" id="keys-available" name="keys-available">
                                                    <option value="">Select...</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Preferred Time for Inspection</label>
                                            <div class="form-control-wrap">
                                                <select class="form-control" id="inspection-time" name="inspection-time">
                                                    <option value="">Select...</option>
                                                    <option value="morning">Morning</option>
                                                    <option value="afternoon">Afternoon</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label" for="issue-description">Please Outline the Issue</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control" id="issue-description" name="issue-description" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="order-reference">Purchase Order/Order Reference</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="order-reference" name="order-reference">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="delivery-date">Please Pick a Delivery Date</label>
                                            <div class="form-control-wrap">
                                                <input type="date" class="form-control" id="delivery-date" name="delivery-date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="notes">Notes</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control" id="notes" name="notes" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary" name="warranty_email">Submit Warranty Request</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="example-alert mt-2">
                                    <div class="alert alert-primary alert-icon">
                                        <em class="icon ni ni-alert-circle"></em> <strong>To Note: </strong>If this item is not covered under warranty, a callout fee of €95 will be applicable.</div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .modal -->

</body>

</html>