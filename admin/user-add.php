<?php
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
require '../vendor/autoload.php';

$success =null;
require '../app/db.php';
$s = "SELECT * FROM developments";
$res = mysqli_query($con, $s);

if(isset($_POST["submit"]) || true){
//    $name = $_POST["name"];
//    $email = $_POST["email"];
//    $pass = $_POST["pass"];
//    $dep_id = $_POST["dep_id"];
//    $phone = $_POST["phone"];
//    $dob = $_POST["dob"];
//    $address = $_POST["address"];
//
//    $s = "INSERT INTO users (fullName, email, pass, phone, dob, address, dep_id)
//          VALUES ('$name', '$email', '$pass', '$phone', '$dob', '$address', $dep_id)";

    $websiteUrl = "https://hyde.kashifali.me/"; // Replace this with your actual website URL
    $htmlContent = file_get_contents("email.html");
//    $htmlContent = str_replace("[User's Name]", $name, $htmlContent);
//    $htmlContent = str_replace("user@test.com", $email, $htmlContent);
//    $htmlContent = str_replace("Psas", $pass, $htmlContent);
//    $htmlContent = str_replace("http://www.example.com/", $websiteUrl, $htmlContent);


    $mail = new PHPMailer();

    // SMTP Configuration (Replace with your own SMTP settings)
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'hyde@kashifali.me';
    $mail->Password = 'Gym@1234';
    $mail->SMTPSecure = 'tls';

    // Set the From and To addresses
    $mail->setFrom('gym@kashifali.me', 'Gym APP');
    $mail->addAddress('kmalik748@gmail.com');

    // Set the subject and body of the email
    $mail->Subject = 'test';
    $mail->Body = $htmlContent;

    // Send the email
    if ($mail->send()) {
        echo "yes";
        //return true;
    } else {
        echo "no";
        //return false;
    }
    die(); exit();

    $success = mysqli_query($con, $s);
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

                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="title nk-block-title">Register New User</h4>
                            </div>
                        </div>

                        <?php if($success){ ?>
                            <div class="example-alert container mb-3">
                                <div class="alert alert-fill alert-primary alert-icon">
                                    <em class="icon ni ni-alert-circle"></em> <strong>User was registered successfully</strong></div>
                            </div>
                        <?php } ?>

                        <div class="card card-bordered">
                            <div class="card-inner">
                                <form action="" method="post" class="form-validate is-alter">
                                    <div class="row g-gs">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="fva-full-name">Full Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="fva-full-name" name="name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="fva-email">Email address</label>
                                                <div class="form-control-wrap">
                                                    <input type="email" class="form-control" id="fva-email" name="email" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="fva-subject">Password</label>
                                                <div class="form-control-wrap">
                                                    <input type="password" class="form-control" id="fva-subject" name="pass" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="fva-topics">Select Department</label>
                                                <div class="form-control-wrap ">
                                                    <select class="form-control form-select" id="fva-topics" name="dep_id" data-placeholder="Select a option" required>
                                                        <option label="empty" value=""></option>
                                                        <?php
                                                        while($row = mysqli_fetch_assoc($res)){
                                                        ?>
                                                        <option value='<?=$row["id"]?>'><?=$row["name"]?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="fva-full-name">Phone</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="fva-full-name" name="phone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="fva-full-name">Date of Birth</label>
                                                <div class="form-control-wrap">
                                                    <input type="date" class="form-control" id="fva-full-name" name="dob">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="fva-full-name">Address</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="fva-full-name" name="address">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-lg btn-primary" name="submit">Save User</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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