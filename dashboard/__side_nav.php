
<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-menu-trigger">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
        <div class="nk-sidebar-brand">
            <a href="" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="../images/site/uploads/<?=$_SESSION['user']['logo']?>" alt="logo">
            </a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element nk-sidebar-body">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu" style="height: 100vh">
                    <li class="nk-menu-item">
                        <a href="./" class="nk-menu-link">
                            <span class="nk-menu-icon"><i class="fa-solid fa-chart-pie"></i></span>
                            <span class="nk-menu-text darkColor">Home</span>
                        </a>
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt darkColor">Quick Pages</h6>
                    </li>
                    <li class="nk-menu-item">
                        <a href="developments.php" class="nk-menu-link">
                            <span class="nk-menu-icon"><i class="fa-solid fa-truck-ramp-box"></i></span>
                            <span class="nk-menu-text darkColor">Inventory Tracking</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="gallery.php" class="nk-menu-link">
                            <span class="nk-menu-icon"><i class="fa-solid fa-house"></i></span>
                            <span class="nk-menu-text darkColor">Shop-By-Development</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <div style="position: absolute; bottom: 0; left: 20px;">
                                <img src="../images/site/HYDE_LOGO_DARKEST_GREY_Normal.png" alt="" style="height: 100px;">
                        </div>
                    </li>
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>