<?php
$error = false;
 if(isset($_POST["login"])){
     require 'app/db.php';
     $email = $_POST["email"];
     $pass = $_POST["pass"];

     $query = "SELECT * FROM users WHERE email = '$email' and pass = '$pass'";

     $result = $con->query($query);
    // mysqli_num_rows is counting table row
    if(mysqli_num_rows($result) > 0) {
        $rows = mysqli_fetch_assoc($result);
        $_SESSION["user"] = $rows;

        if ($rows['is_admin'] == 1) {
            header('location: admin');

        } else
            header('location: dashboard');
    }else{
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Login | HYDE Portal</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="assets/css/dashlite.css?ver=2.4.0">
    <link id="skin-default" rel="stylesheet" href="assets/css/theme.css?ver=2.4.0">
</head>

<body class="nk-body bg-white npc-general pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-split nk-split-page nk-split-md">
                        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                            <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                                <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                            </div>
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <div class="brand-logo pb-5 center">
                                    <a href="html/index.html" class="logo-link">
                                        <img class="logo-light logo-img logo-img-lg" src="images/site/logo.jpg" srcset="images/site/logo.jpg 2x" alt="logo">
                                        <img class="logo-dark logo-img logo-img-lg" src="images/site/logo.jpg" srcset="images/site/logo.jpg 2x" alt="logo-dark">
                                    </a>
                                </div>
                                <?php if($error){ ?>
                                    <div class="example-alert pb-4">
                                        <div class="alert alert-fill alert-danger alert-dismissible alert-icon">
                                            <em class="icon ni ni-cross-circle"></em> <strong>Login Failed</strong>! Incorrect Email or password <button class="close" data-dismiss="alert"></button>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Sign-In</h5>
                                        <div class="nk-block-des">
                                            <p>Access the HYDE panel using your email and passcode.</p>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->

                                <form action="" method="post">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email or Username</label>
<!--                                            <a class="link link-primary link-sm" tabindex="-1" href="#">Need Help?</a>-->
                                        </div>
                                        <input name="email" type="text" class="form-control form-control-lg" id="default-01" placeholder="Enter your email address or username">
                                    </div><!-- .foem-group -->
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Passcode</label>
<!--                                            <a class="link link-primary link-sm" tabindex="-1" href="html/pages/auths/auth-reset.html">Forgot Code?</a>-->
                                        </div>
                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input name="pass" type="password" class="form-control form-control-lg" id="password" placeholder="Enter your passcode">
                                        </div>
                                    </div><!-- .foem-group -->
                                    <div class="form-group">
                                        <button name="login" type="submit" class="btn btn-lg btn-primary btn-block  lightColorBg nowFont fs-14px border-0">Sign in</button>
                                    </div>
                                </form><!-- form -->
<!--                                <div class="form-note-s2 pt-4"> New on our platform? <a href="html/pages/auths/auth-register.html">Create an account</a>-->
<!--                                </div>-->
<!--                                <div class="text-center pt-4 pb-3">-->
<!--                                    <h6 class="overline-title overline-title-sap"><span>OR</span></h6>-->
<!--                                </div>-->
<!--                                <ul class="nav justify-center gx-4">-->
<!--                                    <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>-->
<!--                                    <li class="nav-item"><a class="nav-link" href="#">Google</a></li>-->
<!--                                </ul>-->
<!--                                <div class="text-center mt-5">-->
<!--                                    <span class="fw-500">I don't have an account? <a href="#">Try 15 days free</a></span>-->
<!--                                </div>-->
                            </div><!-- .nk-block -->
                            <div class="nk-block nk-auth-footer">
                                <div class="nk-block-between">
                                    <ul class="nav nav-sm">
                                        <li class="nav-item">
                                            <a class="nav-link lightColor" href="#">Terms & Condition</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link lightColor" href="#">Privacy Policy</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link lightColor" href="#">Help</a>
                                        </li>
                                    </ul><!-- .nav -->
                                </div>
                                <div class="mt-3">
                                    <p>&copy; 2024 Hyde Interiors. All Rights Reserved.</p>
                                </div>
                            </div><!-- .nk-block -->
                        </div><!-- .nk-split-content -->
                        <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
                            <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                                <div class="slider-init" data-slick='{"dots":true, "arrows":false}'>
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            <div class="nk-feature-img">
                                                <img class="round" src="./images/site/1.png?v=2" srcset="./images/slides/promo-a2x.png 2x" alt="">
                                            </div>
                                            <div class="nk-feature-content py-4 p-sm-5">
                                                <h4>HYDE INTERIORS</h4>
                                                <p>We are HYDE, one of Ireland’s largest and most renowned Interior Design & Fit-out Firms.</p>
                                            </div>
                                        </div>
                                    </div><!-- .slider-item -->
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            <div class="nk-feature-img">
                                                <img class="round" src="images/site/2.png?v=2" srcset="./images/slides/promo-b2x.png 2x" alt="">
                                            </div>
                                            <div class="nk-feature-content py-4 p-sm-5">
                                                <h4>HYDE INTERIORS</h4>
                                                <p>Over 75,000 Sq FT Dublin based warehouse and logistics centres</p>
                                            </div>
                                        </div>
                                    </div><!-- .slider-item -->
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            <div class="nk-feature-img">
                                                <img class="round" src="images/site/3.png?v=2" srcset="./images/slides/promo-c2x.png 2x" alt="">
                                            </div>
                                            <div class="nk-feature-content py-4 p-sm-5">
                                                <h4>HYDE INTERIORS</h4>
                                                <p>Over €1 billion worth of Irish property sales facilitated by our services</p>
                                            </div>
                                        </div>
                                    </div><!-- .slider-item -->
                                </div><!-- .slider-init -->
                                <div class="slider-dots"></div>
                                <div class="slider-arrows"></div>
                            </div><!-- .slider-wrap -->
                        </div><!-- .nk-split-content -->
                    </div><!-- .nk-split -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="assets/js/bundle.js?ver=2.4.0"></script>
    <script src="assets/js/scripts.js?ver=2.4.0"></script>

</html>