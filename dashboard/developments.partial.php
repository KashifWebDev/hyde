<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Developments</h3>
            <div class="nk-block-des text-soft">
                <p>You have total 3 developments.</p>
            </div>
        </div>
    </div>
</div>
<?php
$products = array(
    array(
        "name" => "Development 1",
        "description" => "This is a small description about the development.",
        "pics" => array("a-sm.jpg", "b-.jpg", "c-sm.jpg"),
        "total_products" => 20
    ),
    array(
        "name" => "Development 2",
        "description" => "This is a small description about the development.",
        "pics" => array("a-sm.jpg", "b-.jpg", "c-sm.jpg"),
        "total_products" => 15
    ),
    array(
        "name" => "Development 3",
        "description" => "This is a small description about the development.",
        "pics" => array("a-sm.jpg", "b-.jpg", "c-sm.jpg"),
        "total_products" => 12
    )
);
?>
<div class="nk-block">
    <div class="nk-block">
        <div class="row g-gs">
            <?php foreach($products as $block){ ?>
                <div class="col-sm-6 col-lg-4 col-xxl-3">
                    <div class="card card-bordered h-100">
                        <div class="card-inner">
                            <div class="project">
                                <div class="project-head">
                                    <a href="view-development.php" class="project-title">
                                        <div class="project-info">
                                            <h6 class="title"><?=$block["name"]?></h6>
                                            <span class="sub-text">Total <?=$block["total_products"]?> Product(s)</span>
                                        </div>
                                    </a>
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger mt-n1 mr-n1" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="view-development.php"><em class="icon ni ni-eye"></em><span>View Development</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="project-details">
                                    <p><?=$block["description"]?></p>
                                </div>
                                <div class="project-meta">
                                    <ul class="project-users g-1">
                                        <li>
                                            <div class="user-avatar"><img src="https://www.hydecontract.ie/cdn/shop/files/elbow_3_400X400.jpg" alt=""></div>
                                        </li>
                                        <li>
                                            <div class="user-avatar"><img src="https://www.hydecontract.ie/cdn/shop/files/1.Carlton_p_1_400X400.jpg?v=1614295675" alt=""></div>
                                        </li>
                                        <li>
                                            <div class="user-avatar bg-light sm"><span>+<?=rand(3,8)?></span></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div><!-- .nk-block -->