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
    $tenantName = isset($_POST['tenant-name']) ? $_POST['tenant-name'] : '';
    $tenantEmail = isset($_POST['tenant-email']) ? $_POST['tenant-email'] : '';
    $tenantPhone = isset($_POST['tenant-phone']) ? $_POST['tenant-phone'] : '';
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
    $agentsCompany = $_POST['agents-company'];
    $agentsName = $_POST['agents-name'];
    $agentsContactPhone = $_POST['agents-contact-phone'];
    $agentsEmail = $_POST['agents-email'];
    $propertyAddress = $_POST['property-address'];
    $isTenanted = $_POST['is-tenanted'];
    $keysAvailable = isset($_POST['w-keys-available']) ? $_POST['w-keys-available'] : '';
    $tenantName = isset($_POST['tenant-name']) ? $_POST['tenant-name'] : '';
    $tenantEmail = isset($_POST['tenant-email']) ? $_POST['tenant-email'] : '';
    $tenantPhone = isset($_POST['tenant-phone']) ? $_POST['tenant-phone'] : '';
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
                                        <em class="icon ni ni-check-circle"></em> <strong>Mail was Sent!</strong> Our team will come back with a quotation within 24 hours.</div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="row gx-4 justify-content-around">
                                    <div class="col-md-5 bg-white p-4" style="border-radius: 15px; height: fit-content">
                                        <form action="" method="post">
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
                                                        <label class="form-label" for="invoice-to">Who Will Hyde Make the Invoice Out To?</label>
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
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-lg btn-primary" name="sendMail">Save Information</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-5 bg-white p-4" style="border-radius: 15px;">
                                        <form action="" method="post">
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
                                                            <select class="form-control" id="w-keys-available" name="keys-available">
                                                                <option value="">Select...</option>
                                                                <option value="yes">Yes</option>
                                                                <option value="no">No</option>
                                                            </select>
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
                                                        <label class="form-label" for="w-delivery-date">Please Pick a Delivery Date</label>
                                                        <div class="form-control-wrap">
                                                            <input type="date" class="form-control" id="w-delivery-date" name="delivery-date">
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
                                <script>
                                    // Function to show/hide elements based on the selected option
                                    function toggleFields() {
                                        var isTenanted = document.getElementById('is-tenanted').value;
                                        var wIsTenanted = document.getElementById('w-is-tenanted').value;

                                        // Toggle 'Keys Available for Collection' based on 'Is the Property Tenanted?' selection
                                        var keysAvailableGroup = document.getElementById('keys-available-group');
                                        var w_keysAvailableGroup = document.getElementById('w-keys-available-group');
                                        if (isTenanted === 'yes') {
                                            keysAvailableGroup.style.display = 'block';
                                        } else {
                                            keysAvailableGroup.style.display = 'none';
                                        }
                                        if (wIsTenanted === 'yes') {
                                            w_keysAvailableGroup.style.display = 'block';
                                        } else {
                                            w_keysAvailableGroup.style.display = 'none';
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
                                        } else {
                                            tenantNameGroup.style.display = 'none';
                                            tenantEmailGroup.style.display = 'none';
                                            tenantPhoneGroup.style.display = 'none';
                                        }
                                        if (wIsTenanted === 'yes') {
                                            w_tenantNameGroup.style.display = 'block';
                                            w_tenantEmailGroup.style.display = 'block';
                                            w_tenantPhoneGroup.style.display = 'block';
                                        } else {
                                            w_tenantNameGroup.style.display = 'none';
                                            w_tenantEmailGroup.style.display = 'none';
                                            w_tenantPhoneGroup.style.display = 'none';
                                        }
                                    }

                                    // Call the toggleFields function when the selection changes for both forms
                                    document.getElementById('is-tenanted').addEventListener('change', toggleFields);
                                    document.getElementById('w-is-tenanted').addEventListener('change', toggleFields);
                                    toggleFields(); // Call the function initially to set the initial state
                                </script>


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