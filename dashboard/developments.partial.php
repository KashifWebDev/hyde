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
                <div class="circle_parent">
                    <?php
                    $depID = $block["id"];
                    $s = "SELECT * from unit_tabs WHERE parent_id = $depID order by name";
                    $s1 = mysqli_query($con, $s);
                    $unitCounts = mysqli_num_rows($s1);
                    ?>
                    <div class="accordion border-0 bg-transparent" id="accordion-column-<?=$depID?>">
                        <div class="accordion-item">
                            <a href="#" class="accordion-head collapsed p-0" data-toggle="collapse" data-target="#accordion-item-<?=$depID?>">
                                <div class="d-flex center h-100px">
                                    <div class="flex-grow-1 py-4 d-flex ml-5 flex-column">
                                        <b class="fs-12px" style="color: #00c4cc"><?=$block["name"]?></b>
                                        <span class="darkColor"><?=$unitCounts?> items</span>
                                    </div>
                                    <div class="border-custom align-items-center border-custom d-flex h-100" id="arrowParentDiv">
                                        <span id="arrow" class="accordion-icon mr-2 text-white fs-30"></span>
                                    </div>
                                </div>
                            </a>
                            <div class="accordion-body collapse" id="accordion-item-<?=$depID?>" data-parent="#accordion-column-<?=$depID?>">
                                <div class="accordion-inner">
                                    <?php if($unitCounts){ ?>
                                        <ul class="list-group list-group-flush">
                                            <?php while ($re = mysqli_fetch_assoc($s1)): ?>
                                                <li class="list-group-item border-0">
                                                    <a href="view-development.php?id=<?=$re["id"]?>"
                                                       class="ibmFont fs-12px text-dark" style="width: max-content">
                                                        &#9642; UNIT <?=$re["name"]?>
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