<p class="nowFont fs-14px lightColor mb-4">YOU  HAVE A TOTAL OF 1 DEVELOPMENT(S)</p>

<div class="nk-block" >
    <div class="nk-block">
        <div class="d-flex">
            <?php
            $depID = $_SESSION["user"]["dep_id"];
            $s = "SELECT * FROM developments WHERE id = $depID";
            $res = mysqli_query($con, $s);
            ?>
            <?php while($block = mysqli_fetch_assoc($res)){ ?>
                <div class="border-custom">
                    <?php
                    $depID = $block["id"];
                    $s = "SELECT * from unit_tabs WHERE parent_id = $depID";
                    $s1 = mysqli_query($con, $s);
                    $unitCounts = mysqli_num_rows($s1);
                    ?>
                    <div class="accordion border-0 bg-transparent" id="accordion-column-<?=$depID?>">
                        <div class="accordion-item">
                            <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#accordion-item-<?=$depID?>">
                                <h6 class="title">
                                    <b class="ibmFont fs-12px lightColor m-0"><?=$block["name"]?></b>
                                    <p class="ibmFont fs-12px m-0" style="font-weight: 500">
                                        <?=$unitCounts?> items
                                    </p>
                                </h6>
                                <span class="accordion-icon"></span>
                            </a>
                            <div class="accordion-body collapse" id="accordion-item-<?=$depID?>" data-parent="#accordion-column-<?=$depID?>">
                                <div class="accordion-inner">

                                    <?php if($unitCounts){ ?>
                                        <ul class="list-group list-group-flush">
                                            <p class="m-0 px-2 py-1 fs-12px" style="background-color: #cfcfcf;">Development Units</p>
                                            <?php while ($re = mysqli_fetch_assoc($s1)): ?>
                                                <li class="list-group-item border-0">
                                                    <a href="view-development.php?id=<?=$re["id"]?>"
                                                       class="ibmFont fs-12px text-dark" style="width: max-content">
                                                        &#9642; <?=$re["name"]?>
                                                    </a>
                                                </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    <?php }else{ ?>
                                        <div class="example-alert">
                                            <div class="alert alert-secondary alert-icon">
                                                <em class="icon ni ni-alert-circle"></em> <strong>No items in this unit!</strong></div>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>

    </div>
</div><!-- .nk-block -->