<?php
require '../app/db.php';
$id = $_GET["id"];
$s = "SELECT * from units WHERE id = $id";
$res = mysqli_query($con, $s);
$row = mysqli_fetch_assoc($res);

$s = "SELECT name from unit_tabs WHERE id = ".$row["unit_tab_id"];
$res = mysqli_query($con, $s);
$apart = mysqli_fetch_assoc($res);



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
                    <?php if(isset($form1)){ ?>
                        <div class="container">
                            <div class="example-alert">
                                <div class="alert alert-fill alert-success alert-icon">
                                    <em class="icon ni ni-check-circle"></em> <strong>Mail was Sent!</strong> Our team will come back with a quotation within 24 hours.</div>
                            </div>
                        </div>
                    <?php } ?>
                    <p class="nowFont fs-22px lightColor m-0">PRODUCT DETAILS</p>
                    <div class="row">
                        <div class="col-md-4 pl-6">
                            <ul class="list-group mt-4">
                                <p class="text-white ubuntu fs-15px"><span class="fw-bold">Unit Number: </span><?=$apart["name"]?></p>
                                <p class="text-white ubuntu fs-15px"><span class="fw-bold">Pack: </span><?=$row["pack"]?></p>
                                <p class="text-white ubuntu fs-15px"><span class="fw-bold">Quantity: </span><?=$row["qty"] == 0 ? 'ALL' : $row["qty"]?></p>
                                <p class="text-white ubuntu fs-15px"><span class="fw-bold">Location: </span><?=$row["location"]?></p>
                                <p class="text-white ubuntu fs-15px"><span class="fw-bold">Product Type: </span><?=$row["product_type"]?></p>
                                <p class="text-white ubuntu fs-15px"><span class="fw-bold">Brand: </span>HYDE CONTRACT</p>
                                <p class="text-white ubuntu fs-15px"><span class="fw-bold">Model: </span><?=$row["model"]?></p>
                                <p class="text-white ubuntu fs-15px"><span class="fw-bold">Description: </span><?=$row["description"]?></p>
                                <p class="text-white ubuntu fs-15px"><span class="fw-bold">Warranty Start Date: </span> <?=str_replace(".", "/", $row["warranty_start"])?></p>
                                <p class="text-white ubuntu fs-15px"><span class="fw-bold">Warranty End Date: </span> <?=str_replace(".", "/", $row["warranty_end"])?></p>
                            </ul>
                            <a href='../dashboard/reachout.php' class='btn btn-success lightColorBg nowFont fs-14px btnHover mt-4'>
                                Request Replacement
                            </a>
                        </div>
<!--                        <div class="col-md-4">-->
<!--                            <div class="py-5 px-5" style="background-color: #cfcfcf; max-width: 300px;">-->
<!--                                <p>Warranty Form:</p>-->
<!--                                <p>-->
<!--                                    To initiate the process of filing your-->
<!--                                    warranty claim, kindly press the-->
<!--                                    "Submit" button below. A dedicated-->
<!--                                    member of the Hyde team will-->
<!--                                    promptly reach out to you within 48-->
<!--                                    hours to assist with your inquiry. Please-->
<!--                                    ensure that all relevant images and-->
<!--                                    information are included in the online-->
<!--                                    form. Thank you for your cooperation-->
<!--                                </p>-->
<!--                            </div>-->
<!--                        </div>-->
                        <div class="col-md-6">
                            <div class="d-flex flex-column align-items-center mt-4">
                                <img  height="300px" src="../images/site/uploads/<?=$row["image"]?>" alt="">
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

    <div class="modal fade" tabindex="-1" role="dialog" id="modalTabs">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h4 class="title">REQUEST REPLACEMENT</h4>
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
    </div>
</body>

</html>