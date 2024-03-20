<div class="card-inner-group" data-simplebar>
    <div class="card-inner">
        <div class="user-card">
            <div class="user-avatar bg-primary">
                <span>AB</span>
            </div>
            <div class="user-info">
                <span class="lead-text"><?=$_SESSION["user"]["fullName"]?></span>
                <span class="sub-text"><?=$_SESSION["user"]["email"]?></span>
            </div>
<!--            <div class="user-action">-->
<!--                <div class="dropdown">-->
<!--                    <a class="btn btn-icon btn-trigger mr-n2" data-toggle="dropdown" href="#"><em class="icon ni ni-more-v"></em></a>-->
<!--                    <div class="dropdown-menu dropdown-menu-right">-->
<!--                        <ul class="link-list-opt no-bdr">-->
<!--                            <li><a href="#"><em class="icon ni ni-camera-fill"></em><span>Change Photo</span></a></li>-->
<!--                            <li><a href="#"><em class="icon ni ni-edit-fill"></em><span>Update Profile</span></a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div><!-- .user-card -->
    </div><!-- .card-inner -->
    <div class="card-inner p-0">
        <ul class="link-list-menu">
            <li><a <?=isset($link) && $link==1 ? 'class="active"' : ''?> href="profile.php"><em class="icon ni ni-user-fill-c"></em><span>Personal Information</span></a></li>
<!--            <li><a --><?php //=isset($link) && $link==2 ? 'class="active"' : ''?><!-- href="profile-customize-dashboard.php"><em class="icon ni ni-shield-star-fill"></em><span>Customize Dashboard</span></a></li>-->
<!--            <li><a --><?php //=isset($link) && $link==3 ? 'class="active"' : ''?><!-- href="profile-activity.php"><em class="icon ni ni-activity-round-fill"></em><span>Account Activity</span></a></li>-->
            <li><a <?=isset($link) && $link==4 ? 'class="active"' : ''?> href="profile-security.php"><em class="icon ni ni-lock-alt-fill"></em><span>Security Settings</span></a></li>
        </ul>
    </div><!-- .card-inner -->
</div><!-- .card-inner-group -->