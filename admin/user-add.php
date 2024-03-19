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
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $dep_id = $_POST["dep_id"];
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];

    $s = "INSERT INTO users (fullName, email, pass, phone, dob, address, dep_id)
          VALUES ('$name', '$email', '$pass', '$phone', '$dob', '$address', $dep_id)";



    $subject = "Welcome to Hyde - Your Account is Ready!";
    $message = "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Welcome to Hyde - Your Account is Ready!</title>
</head>
<body>
    <h3>Welcome to HYDE!</h3>
    <p>Dear ".$name."</p>
    <p>We're delighted to welcome you to Hyde!</p>
    <p>Your account has been successfully created by our admin team, and we're thrilled to have you join us. Below are your login details:</p>
    
    <p><b>Email: </b> ".$email."</p>
    <p><b>Password: </b> ".$pass."</p>
    <a href='https://hyde.kashifali.me'>Login Now</a>
</body>
</html>";


    $headers  = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: Hyde <info@hyde.com>" . "\r\n"; // Change your_name and your_email

    mail($email, $subject, $message, $headers);
    mail('kmalik748@gmail.com', $subject, $message, $headers);


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