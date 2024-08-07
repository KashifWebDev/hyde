<?php
require '../app/db.php';


if (isset($_POST["sendMail"])) {
    $agentsCompany = $_POST['agents-company'];
    $agentsName = $_POST['agents-name'];
    $agentsContactPhone = $_POST['agents-contact-phone'];
    $agentsEmail = $_POST['agents-email'];
    $propertyAddress = $_POST['property-address'];
    $isTenanted = $_POST['is-tenanted'];
    $keysAvailable = $_POST['keys-available'];
    $keysAvailable = $_POST['keys-available'];
    $tenantName = isset($_POST['tenant-name']) ? $_POST['tenant-name'] : '';
    $tenantEmail = isset($_POST['tenant-email']) ? $_POST['tenant-email'] : '';
    $tenantPhone = isset($_POST['tenant-phone']) ? $_POST['tenant-phone'] : '';
    $invoiceTo = $_POST['invoice-to'];
    $orderReference = $_POST['order-reference'];
    $deliveryDate = $_POST['delivery-date'];
    $deliveryTime = $_POST['delivery-time'];
    $notes = $_POST['notes'];

    // Email detail
    $to = "hello@hydeinteriors.ie";
    $subject = "New Billable Order - HYDE Portal";


    $targetDir = "../images/site/form/";
    // Create the directory if it doesn't exist
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }
    $uploadStatus = [
        'success' => [],
        'error' => []
    ];
    $pics = [];
    // Loop through each uploaded file
    foreach ($_FILES['images']['name'] as $key => $name) {
        $targetFilePath = $targetDir . basename($name);
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        // Check if file is an image
        $check = getimagesize($_FILES['images']['tmp_name'][$key]);
        if ($check !== false) {
            // Move the file to the target directory
            if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $targetFilePath)) {
                $uploadStatus['success'][] = "The file $name has been uploaded.";
                $pics[] = $name;
            } else {
                $uploadStatus['error'][] = "Sorry, there was an error uploading your file $name.";
            }
        } else {
            $uploadStatus['error'][] = "$name is not an image.";
        }
    }
    // Display upload status
    $links = "";
    if (!empty($uploadStatus['success'])) {
        echo "Uploaded successfully:<br>";
        foreach ($pics as $pic) {
            $links .= "<a href='https://inventory.hydecontract.ie/images/site/form/" . $pic . "' target='_blank'>" . $pic . "</a><br>";
        }
    }

    // Email content
    $message = "
    <html>
    <head>
        <title>New Billable Order - HYDE Portal</title>
    </head>
    <body>
        <h2>New Billable Order</h2>
        <p><strong>Agent's Company:</strong> $agentsCompany</p>
        <p><strong>Agent's Name:</strong> $agentsName</p>
        <p><strong>Agent's Contact Phone:</strong> $agentsContactPhone</p>
        <p><strong>Agent's Email:</strong> $agentsEmail</p>
        <p><strong>Property Address:</strong> $propertyAddress</p>
        <p><strong>Is the Property Tenanted?:</strong> $isTenanted</p>
        <p><strong>Are the Keys Available for Collection?:</strong> $keysAvailable</p>
        <p><strong>Tenant's Name:</strong> $tenantName</p>
        <p><strong>Tenant's Email:</strong> $tenantEmail</p>
        <p><strong>Tenant's Phone Number:</strong> $tenantPhone</p>
        <p><strong>Who Will HYDE Make the Invoice Out To?:</strong> $invoiceTo</p>
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
        msgToClient($agentsEmail, $agentsName);
        $form1 = true;
    } else {
        echo "Failed to send email.";
    }
}

if(isset($_POST["warranty_email"])){
    $agentsCompany = $_POST['agents-company'];
    $agentsName = $_POST['agents-name'];
    $agentsContactPhone = $_POST['agents-contact-phone'];
    $agentsEmail = $_POST['agents-email'];
    $propertyAddress = $_POST['property-address'];
    $isTenanted = $_POST['is-tenanted'];
    $keysAvailable = isset($_POST['w-keys-available']) ? $_POST['w-keys-available'] : '';
    $accessInst = $_POST['access-instr-1'];
    $tenantName = isset($_POST['tenant-name']) ? $_POST['tenant-name'] : '';
    $tenantEmail = isset($_POST['tenant-email']) ? $_POST['tenant-email'] : '';
    $tenantPhone = isset($_POST['tenant-phone']) ? $_POST['tenant-phone'] : '';
    $issueDescription = $_POST['issue-description'];
    $orderReference = $_POST['order-reference'];
    $deliveryDate = $_POST['delivery-date'];
    $inspectionTime = $_POST['inspection-time'];
    $notes = $_POST['notes'];

    // Email details
    $to = "hello@hydeinteriors.ie";
    $subject = "Warranty Request - HYDE Portal";


    $targetDir = "../images/site/form/";
    // Create the directory if it doesn't exist
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }
    $uploadStatus = [
        'success' => [],
        'error' => []
    ];
    $pics = [];
    // Loop through each uploaded file
    foreach ($_FILES['images']['name'] as $key => $name) {
        $targetFilePath = $targetDir . basename($name);
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        // Check if file is an image
        $check = getimagesize($_FILES['images']['tmp_name'][$key]);
        if ($check !== false) {
            // Move the file to the target directory
            if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $targetFilePath)) {
                $uploadStatus['success'][] = "The file $name has been uploaded.";
                $pics[] = $name;
            } else {
                $uploadStatus['error'][] = "Sorry, there was an error uploading your file $name.";
            }
        } else {
            $uploadStatus['error'][] = "$name is not an image.";
        }
    }
    // Display upload status
    $links = "";
    if (!empty($uploadStatus['success'])) {
        echo "Uploaded successfully:<br>";
        foreach ($pics as $pic) {
            $links .= "<a href='https://inventory.hydecontract.ie/images/site/form/" . $pic . "' target='_blank'>" . $pic . "</a><br>";
        }
    }

    // Email content
    $message = "
    <html>
    <head>
        <title>Warranty Request - HYDE Portal</title>
    </head>
    <body>
        <h2>Warranty Request</h2>
        <p><strong>Agent's Company:</strong> $agentsCompany</p>
        <p><strong>Agent's Name:</strong> $agentsName</p>
        <p><strong>Agent's Contact Phone:</strong> $agentsContactPhone</p>
        <p><strong>Agent's Email:</strong> $agentsEmail</p>
        <p><strong>Property Address:</strong> $propertyAddress</p>
        <p><strong>Is the Property Tenanted?:</strong> $isTenanted</p>
        <p><strong>Are the Keys Available for Collection?:</strong> $keysAvailable</p>
        <p><strong>Acess Instructions:</strong> $accessInst</p>
        <p><strong>Tenant's Name:</strong> $tenantName</p>
        <p><strong>Tenant's Email:</strong> $tenantEmail</p>
        <p><strong>Tenant's Phone Number:</strong> $tenantPhone</p>
        <p><strong>Issue Description:</strong> $issueDescription</p>
        <p><strong>Purchase Order/Order Reference:</strong> $orderReference</p>
        <p><strong>Please Pick a Delivery Date:</strong> $deliveryDate</p>
        <p><strong>Preferred Time for Inspection:</strong> $inspectionTime</p>
        <p><strong>Notes:</strong> $notes</p>
        <p><strong>Photos:</strong> $links</p>
    </body>
    </html>
    ";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <portal@hyde.com>' . "\r\n";

    if (mail($to, $subject, $message, $headers)) {
        msgToClient($agentsEmail, $agentsName);
        $form1 = true;
    } else {
        echo "Failed to send warranty request.";
    }
}


function msgToClient($to, $name){
    $to = "hello@hydeinteriors.ie";
    $subject = "Warranty Request - HYDE Portal";

    $message = "
    <html>
    <head>
        <title>Warranty Request - HYDE Portal</title>
    </head>
    <body>
        <h2>Thanks $name!</h2>
        <p>We will be in touch regarding your request shortly.</p>
        
        <p>Regards,</p>
        <p>HYDE Inventory Team.</p>
    </body>
    </html>
    ";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <portal@hyde.com>' . "\r\n";

    mail($to, $subject, $message, $headers);
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
                    <?php if(isset($form1)){ ?>
                        <div class="container mb-4">
                            <div class="example-alert">
                                <div class="alert alert-fill alert-success alert-icon">
                                    <em class="icon ni ni-check-circle"></em> <strong>Message Received With Thanks!</strong> </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="nk-content-inner" style="height: 100vh">
                        <div class="nk-content-body h-100">
                            <div class="container h-100">
                                <div class="row gx-4 justify-content-around h-100">
                                    <div class="col-md-5 justify-around align-items-center h-100">
                                        <button  type='button' class='btn btn-success lightColorBg nowFont fs-17px btnHover mt-4' data-toggle='modal'
                                                 data-target='#modalTabs'  data-backdrop="static" data-keyboard="false">
                                            New Order
                                        </button>
                                        <button  type='button' class='btn btn-success lightColorBg nowFont fs-17px btnHover mt-4' data-toggle='modal'
                                                 data-target='#modalTabs2'  data-backdrop="static" data-keyboard="false">
                                            Warranty Request
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="modal fade" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" id="modalTabs">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                        <div class="modal-body modal-body-md">
                            <form action="" method="post"  enctype="multipart/form-data">
                                <div class="row g-4">
                                    <div class="col-12">
                                        <h4 class="center">NEW BILLABLE ORDER</h4>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label" for="agents-name">Agent's Company</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="agents-company" id="agents-company">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="agents-name">Agent's Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="agents-name" id="agents-name">
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
                                    <div class="col-lg-6" id="keys-available-group" style="display: none;">
                                        <div class="form-group">
                                            <label class="form-label" for="keys-available-1">Are the Keys Available for Collection?</label>
                                            <div class="form-control-wrap">
                                                <select class="form-control" id="keys-available-1" name="keys-available-1">
                                                    <option value="">Select...</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" id="keys-loc-1" style="display: none">
                                        <div class="form-group">
                                            <label class="form-label" for="keys-location-1">Location of Keys:</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control" id="keys-location-1" name="keys-location-1" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" id="access-instr-1" style="display: none">
                                        <div class="form-group">
                                            <label class="form-label" for="access-instr-1">Access Instructions:</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control" id="access-instr-1" name="access-instr-1" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" id="tenant-name-group" style="display: none;">
                                        <div class="form-group">
                                            <label class="form-label" for="tenant-name">Tenant's Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="tenant-name" name="tenant-name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" id="tenant-email-group" style="display: none;">
                                        <div class="form-group">
                                            <label class="form-label" for="tenant-email">Tenant's Email</label>
                                            <div class="form-control-wrap">
                                                <input type="email" class="form-control" id="tenant-email" name="tenant-email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" id="tenant-phone-group" style="display: none;">
                                        <div class="form-group">
                                            <label class="form-label" for="tenant-phone">Tenant's Phone Number</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="tenant-phone" name="tenant-phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="invoice-to">Who Will HYDE Make the Invoice Out To?</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="invoice-to" name="invoice-to">
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
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Preferred Time for Delivery</label>
                                            <div class="form-control-wrap">
                                                <select class="form-control" id="delivery-time" name="delivery-time">
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
                                                <textarea class="form-control" id="notes" name="notes" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!--                                        <div class="col-12">-->
                                    <!--                                            <div class="form-group">-->
                                    <!--                                                <label class="form-label" for="customMultipleFilesLabel">Upload Photos</label>-->
                                    <!--                                                <div class="form-control-wrap">-->
                                    <!--                                                    <div class="custom-file">-->
                                    <!--                                                        <input type="file" multiple class="custom-file-input" id="customMultipleFiles" accept="image/*" name="images[]">-->
                                    <!--                                                        <label class="custom-file-label" for="customMultipleFiles">Choose files</label>-->
                                    <!--                                                    </div>-->
                                    <!--                                                </div>-->
                                    <!--                                             </div>-->
                                    <!--                                        </div>-->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary" name="sendMail">Save Information</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" id="modalTabs2">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                        <div class="modal-body modal-body-md">
                            <form action="" method="post"  enctype="multipart/form-data">
                                <div class="row g-4">
                                    <div class="col-12">
                                        <h4 class="center">WARRANTY REQUEST</h4>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label" for="agents-name">Agent's Company</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="agents-company" id="agents-company">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="w-agents-name">Agent's Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="w-agents-name" name="agents-name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="w-agents-contact-phone">Agent's Contact Phone</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="w-agents-contact-phone" name="agents-contact-phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="w-agents-email">Agent's Email</label>
                                            <div class="form-control-wrap">
                                                <input type="email" class="form-control" id="w-agents-email" name="agents-email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="w-property-address">Property Address</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="w-property-address" name="property-address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="w-is-tenanted">Is the Property Tenanted?</label>
                                            <div class="form-control-wrap">
                                                <select class="form-control" id="w-is-tenanted" name="is-tenanted">
                                                    <option value="">Select...</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" id="w-keys-available-group" style="display: none;">
                                        <div class="form-group">
                                            <label class="form-label" for="w-keys-available">Are the Keys Available for Collection?</label>
                                            <div class="form-control-wrap">
                                                <select class="form-control" id="w-keys-available" name="w-keys-available">
                                                    <option value="" selected>Select...</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" id="keys-loc" style="display: none">
                                        <div class="form-group">
                                            <label class="form-label" for="keys-location">Location of Keys:</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control" id="keys-location" name="keys-location" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" id="access-instr-2" style="display: none">
                                        <div class="form-group">
                                            <label class="form-label" for="access-instr-2">Access Instructions:</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control" id="access-instr-2" name="access-instr-2" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" id="w-tenant-name-group" style="display: none;">
                                        <div class="form-group">
                                            <label class="form-label" for="w-tenant-name">Tenant's Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="w-tenant-name" name="tenant-name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" id="w-tenant-email-group" style="display: none;">
                                        <div class="form-group">
                                            <label class="form-label" for="w-tenant-email">Tenant's Email</label>
                                            <div class="form-control-wrap">
                                                <input type="email" class="form-control" id="w-tenant-email" name="tenant-email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" id="w-tenant-phone-group" style="display: none;">
                                        <div class="form-group">
                                            <label class="form-label" for="w-tenant-phone">Tenant's Phone Number</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="w-tenant-phone" name="tenant-phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Preferred Date for Inspection</label>
                                            <div class="form-control-wrap">
                                                <input type="date" class="form-control"  name="inspection-date">
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
                                            <label class="form-label" for="issue-description">Please outline fault and circumstances for warranty claim:</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control" id="issue-description" name="issue-description" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="w-order-reference">Purchase Order/Order Reference</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="w-order-reference" name="order-reference">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="w-delivery-date">Pick a Delivery Date</label>
                                            <div class="form-control-wrap">
                                                <input type="date" class="form-control" id="w-delivery-date" name="delivery-date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Preferred Delivery Time</label>
                                            <div class="form-control-wrap">
                                                <select class="form-control" id="delivery-time" name="order-reference">
                                                    <option value="">Select...</option>
                                                    <option value="morning">Morning</option>
                                                    <option value="afternoon">Afternoon</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="w-notes">Notes</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control" id="w-notes" name="notes" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="customMultipleFilesLabel">Upload Photos</label>
                                            <div class="form-control-wrap">
                                                <div class="custom-file">
                                                    <input type="file" multiple class="custom-file-input" id="customMultipleFiles" accept="image/*" name="images[]">
                                                    <label class="custom-file-label" for="customMultipleFiles">Choose files</label>
                                                </div>
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
                                        <em class="icon ni ni-alert-circle"></em> <strong>To Note: </strong>If this item is not covered by warranty, a callout fee of €95 ex VAT will be applicable and replacement items will be quoted as usual.</div>
                                </div>
                            </form>
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

<script>
    // Function to show/hide elements based on the selected option
    function toggleFields() {
        var isTenanted = document.getElementById('is-tenanted').value;
        var wIsTenanted = document.getElementById('w-is-tenanted').value;
        var w_keys_available = document.getElementById('w-keys-available').value;
        var keys_available1 = document.getElementById('keys-available-1').value;

        // Toggle 'Keys Available for Collection' based on 'Is the Property Tenanted?' selection
        var keysAvailableGroup = document.getElementById('keys-available-group');
        var w_keysAvailableGroup = document.getElementById('w-keys-available-group');
        var keys_lock = document.getElementById('keys-loc');
        var keys_lock_1 = document.getElementById('keys-loc-1');

        var access_instruction_1 = document.getElementById('access-instr-1');
        var access_instruction_2 = document.getElementById('access-instr-2');
        access_instruction_1.style.display = 'none';
        access_instruction_2.style.display = 'none';

        keys_lock.style.display = 'none';
        keys_lock_1.style.display = 'none';
        if (isTenanted === 'yes') {
            keys_lock_1.style.display = 'none';
            keysAvailableGroup.style.display = 'none';
        } else {
            keys_lock_1.style.display = 'block';
            keysAvailableGroup.style.display = 'block';
        }
        if (wIsTenanted === 'yes') {
            w_keysAvailableGroup.style.display = 'none';
        } else {
            w_keysAvailableGroup.style.display = 'block';
        }


        if (w_keys_available === 'yes') {
            keys_lock.style.display = 'block';
            access_instruction_2.style.display = 'none';
        } else {
            keys_lock.style.display = 'none';
            access_instruction_2.style.display = 'block';
        }
        if (keys_available1 === 'yes') {
            keys_lock_1.style.display = 'block';
            access_instruction_1.style.display = 'none';
        } else {
            keys_lock_1.style.display = 'none';
            access_instruction_1.style.display = 'block';
        }

        // Toggle 'Tenant's Name', 'Tenant's Email', and 'Tenant's Phone Number' based on 'Is the Property Tenanted?' selection
        var tenantNameGroup = document.getElementById('tenant-name-group');
        var tenantEmailGroup = document.getElementById('tenant-email-group');
        var tenantPhoneGroup = document.getElementById('tenant-phone-group');
        var w_tenantNameGroup = document.getElementById('w-tenant-name-group');
        var w_tenantEmailGroup = document.getElementById('w-tenant-email-group');
        var w_tenantPhoneGroup = document.getElementById('w-tenant-phone-group');
        if (isTenanted === 'yes') {
            tenantNameGroup.style.display = 'block';
            tenantEmailGroup.style.display = 'block';
            tenantPhoneGroup.style.display = 'block';
        } if(isTenanted === 'no') {
            tenantNameGroup.style.display = 'none';
            tenantEmailGroup.style.display = 'none';
            tenantPhoneGroup.style.display = 'none';
        }
        if (wIsTenanted === 'yes') {
            w_tenantNameGroup.style.display = 'block';
            w_tenantEmailGroup.style.display = 'block';
            w_tenantPhoneGroup.style.display = 'block';
        } if (wIsTenanted === 'no') {
            w_tenantNameGroup.style.display = 'none';
            w_tenantEmailGroup.style.display = 'none';
            w_tenantPhoneGroup.style.display = 'none';
        }
    }

    // Call the toggleFields function when the selection changes for both forms
    document.getElementById('is-tenanted').addEventListener('change', toggleFields);
    document.getElementById('w-is-tenanted').addEventListener('change', toggleFields);
    document.getElementById('w-keys-available').addEventListener('change', toggleFields);
    document.getElementById('keys-available-1').addEventListener('change', toggleFields);
    toggleFields(); // Call the function initially to set the initial state




    var access_instruction_1 = document.getElementById('access-instr-1');
    var access_instruction_2 = document.getElementById('access-instr-2');
    access_instruction_1.style.display = 'none';
    access_instruction_2.style.display = 'none';
</script>
</body>

</html>