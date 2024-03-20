<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Developments</h3>
            <div class="nk-block-des text-soft">
                <p>You have total 1 development(s).</p>
            </div>
        </div>
    </div>
</div>
<div class="nk-block">
    <div class="nk-block">
        <div class="row g-gs">
            <?php
            $devID = $_SESSION["user"]["dep_id"];

            $s = "SELECT * FROM developments WHERE id =$devID";
            $res = mysqli_query($con, $s);
            while($block = mysqli_fetch_assoc($res)){
                $depID = $block["id"];
                $s = "SELECT * from units WHERE dep_id = $depID";
                $s1 = mysqli_query($con, $s);
                $unitCounts = mysqli_num_rows($s1);
                ?>
                <div class="col-sm-6 col-lg-4 col-xxl-3">
                    <div class="card card-bordered h-100">
                        <div class="card-inner">
                            <div class="project">
                                <div class="project-head">
                                    <a href="view-development.php?id=<?=$block["id"]?>" class="project-title">
                                        <div class="project-info">
                                            <h6 class="title"><?=$block["name"]?></h6>
                                            <span class="sub-text">Total <?=$unitCounts?> Product(s)</span>
                                        </div>
                                    </a>
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger mt-n1 mr-n1" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="view-development.php?id=<?=$block["id"]?>"><em class="icon ni ni-eye"></em><span>View Development</span></a></li>
                                                <!--                                                                                <li><a href="view-development.php"><em class="icon ni ni-edit"></em><span>Edit Development</span></a></li>-->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="project-details">
                                    <p><?=$block["description"]?></p>
                                </div>
                                <!--                                                                <div class="project-meta">-->
                                <!--                                                                    <ul class="project-users g-1">-->
                                <!--                                                                        <li>-->
                                <!--                                                                            <div class="user-avatar"><img src="https://www.hydecontract.ie/cdn/shop/files/elbow_3_400X400.jpg" alt=""></div>-->
                                <!--                                                                        </li>-->
                                <!--                                                                        <li>-->
                                <!--                                                                            <div class="user-avatar"><img src="https://www.hydecontract.ie/cdn/shop/files/1.Carlton_p_1_400X400.jpg?v=1614295675" alt=""></div>-->
                                <!--                                                                        </li>-->
                                <!--                                                                        <li>-->
                                <!--                                                                            <div class="user-avatar bg-light sm"><span>+--><?php //=rand(3,8)?><!--</span></div>-->
                                <!--                                                                        </li>-->
                                <!--                                                                    </ul>-->
                                <!--                                                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div><!-- .nk-block -->