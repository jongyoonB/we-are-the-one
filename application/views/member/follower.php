<div class="container-projects bg-primary">
    <div class="container">
        <h1 id="projects" class="text-center">Follower</h1>
        <br/><br/>
        <div class="row">
            <div class="col-md-12 text-center">
                <ul class="list-unstyled text-center">
                    <li class="filter btn btn-primary" data-filter="all">ALL</li>
                    <li class="filter btn btn-primary" data-filter=".following">Following</li>
                    <li class="filter btn btn-primary" data-filter=".follower">Follower</li>
                </ul>
            </div>
            <?php if ($u_list) { ?>
                <?php foreach ($u_list as $value) { ?>
                    <?php /*echo $value->fol_u_num */ ?>
                    <div class="mix following col-md-3">
                        <div class="img-wrapper">
                            <p><?php echo $value->u_nick ?></p>
                            <img class="img-responsive" src="<?php echo $value->u_pic ?>"/>
                            <a href="#project-1">
                                <div class="img-info bg-primary">Click to see more info</div>
                            </a>
                        </div>
                    </div>
                    <div class="mix follower col-md-3">
                        <div class="img-wrapper">
                            <img class="img-responsive" src="../../../public/img/m_img/huben.jpg"/>
                            <a href="#project-1">
                                <div class="img-info bg-primary">Click to see more info</div>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
            <!--<div class="mix development col-md-3">
                <div class="img-wrapper">
                    <img class="img-responsive" src="../../../public/img/m_img/huben.jpg" />
                    <a href="#project-2"><div class="img-info bg-success">Click to see more info</div></a>
                </div>
            </div>
            <div class="mix design col-md-3">
                <div class="img-wrapper">
                    <img class="img-responsive" src="../../../public/img/m_img/huben.jpg" />
                    <a href="#project-3"><div class="img-info bg-warning">Click to see more info</div></a>
                </div>
            </div>
            <div class="mix branding col-md-3">
                <div class="img-wrapper">
                    <img class="img-responsive" src="../../../public/img/m_img/huben.jpg" />
                    <a href="#project-4"><div class="img-info bg-danger">Click to see more info</div></a>
                </div>
            </div>
            <div class="mix design col-md-3">
                <div class="img-wrapper">
                    <img class="img-responsive" src="../../../public/img/m_img/huben.jpg" />
                    <a href="#project-5"><div class="img-info bg-info">Click to see more info</div></a>
                </div>
            </div>
            <div class="mix seo col-md-3">
                <div class="img-wrapper">
                    <img class="img-responsive" src="../../../public/img/m_img/huben.jpg" />
                    <a href="#project-6"><div class="img-info bg-primary">Click to see more info</div></a>
                </div>
            </div>
            <div class="mix design col-md-3">
                <div class="img-wrapper">
                    <img class="img-responsive" src="../../../public/img/m_img/huben.jpg" />
                    <a href="#project-7"><div class="img-info bg-success">Click to see more info</div></a>
                </div>
            </div>
            <div class="mix seo col-md-3">
                <div class="img-wrapper">
                    <img class="img-responsive" src="../../../public/img/m_img/huben.jpg" />
                    <a href="#project-8"><div class="img-info bg-warning">Click to see more info</div></a>
                </div>
            </div>
        </div>-->
        </div>
        <div class="clearfix hidden-xs" style="width:100%; height:50px;"></div>
    </div>
</div>


