
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
                <ul class="nk-menu">
                    <li class="nk-menu-item">
<!--                        <a href="./" class="nk-menu-link">-->
<!--                            <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>-->
<!--                            <span class="nk-menu-text">Dashboard</span>-->
<!--                        </a>-->
                        <a href="./" class="nk-menu-link">
                            <span class="nk-menu-icon"><i class="fa-solid fa-chart-pie"></i></span>
                            <span class="nk-menu-text darkColor">Home</span>
                        </a>
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Quick Pages</h6>
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-building-fill"></em></span>
                            <span class="nk-menu-text">Development Management</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="development-list.php" class="nk-menu-link"><span class="nk-menu-text">Development List</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="development-add.php" class="nk-menu-link"><span class="nk-menu-text">Add New Development</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                            <span class="nk-menu-text">Users Management</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="users-list.php" class="nk-menu-link"><span class="nk-menu-text">Users List</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="user-add.php" class="nk-menu-link"><span class="nk-menu-text">Add New User</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>