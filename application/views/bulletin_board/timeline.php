<?php if ($this->b_category == '1' || $this->b_category == '2') { ?>

    <ul class="nav nav-tabs col-md-12 col-lg-offset-1" xmlns="http://www.w3.org/1999/html">
        <li class="active"><a href="#">타임라인</a></li>
        <li><a href="/bulletin_board/<?php if ($this->b_category == '1') echo 'boring'; else echo 'hungry' ?>_matching"><?php if ($this->b_category == '1') echo '같이 놀자'; else echo '같이 먹자'; ?></a></li>
    </ul>


    <!--<a href="javascript:document.toggle.submit()"><?php /*if($this->b_category =='1') echo '같이 놀자'; else echo '같이 먹자'; */ ?></a>
<form name="toggle" action="/bulletin_board/matching" method="post">
    <input type="hidden" name = 'b_category' value="<?php /*echo $this->b_category*/ ?>">
</form>-->

<?php } ?>


<?php /*foreach ($board_list as $row) { */?><!--
    <li>
        b_con_idx : <?php /*echo $row->b_con_idx */?> / u_num : <?php /*echo $row->u_num */?> / b_category_num
        : <?php /*echo $row->b_category_num */?> / college_num : <?php /*echo $row->college_num */?>
         / b_content : <?php /*echo $row->b_content */?> / b_date
        : <?php /*echo $row->b_date */?> / attach : <?php /*echo $row->attach */?> / ls_html : <?php /*echo $row->ls_html */?>
        / like_count : <?php /*echo $row->like_count */?>  / u_nick : <?php /*echo $row->u_nick */?>
    </li>
--><?php /*}*/?>

<div class="row">
    <div class="col-lg-9 col-lg-offset-2 col-md-9 col-md-offset-2 col-sm-9 col-sm-offset-2">
        <!-- TWEET WRAPPER START -->
        <div class="twt-wrapper">
            <form action="<?php echo URL ?>b_plus" method="POST" enctype="multipart/form-data">
                <div class="panel panel-info">
                    <div class="panel-heading">
                    <textarea name="b_content" class="form-control " placeholder="Enter here for We are the One..."
                              rows="3"
                              onKeyDown="setLine( this )"></textarea>
                    </div>
                    <div class="panel-body" align="right">
                        <button name="b_img" type="button" class="btn btn-default btn-sm">
                            <span class="glyphicon glyphicon-camera" aria-hidden="true"></span>
                        </button>
                        <button type="submit" class="btn btn-primary btn-sm">게시</button>
                    </div>
                </div>
                <input type="hidden" name="b_category_num" value="<?php echo $this->b_category ?>">
            </form>

            <?php foreach($board_list as $row) { ?>
            <!-- 이미지가 하나일 때 -->
            <div class="panel panel-info">
                <div class="panel-body">
                    <ul class="writing-list media-list">
                        <li class="writing media">
                            <div class="media-left">
                                <a href="#" class="pull-left">
                                    <img src="../../../public/img/w_img/donghwi.jpg" class="media-object img-circle">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="text-success"><strong><?php echo $row->u_nick ?></strong></div>
                                <div class="time">
                                    <small class="text-muted"><?php echo $row->b_date ?></small>
                                </div>
                                <p><?php echo $row->b_content ?></p>

                                <div><img src="../../../public/img/w_img/donghwi.jpg" class="img_writing"></div>

                            </div>
                        </li>
                    </ul>
                </div>
                <div class="panel-footer">
                    <ul class="board-list media-list">
                        <li class="board media">
                            <a href="#" class="pull-left">
                                <img src="../../../public/img/w_img/bogum.jpg" class="img-circle">
                            </a>

                            <div class="media-body">
                                        <span class="text-muted pull-right">
                                            <small class="text-muted">30분 전</small>
                                        </span>
                                <strong class="text-success">보검짱</strong>

                                <p>
                                    헤헤헤헤헤헿ㅎ헿
                                </p>
                            </div>
                        </li>
                    </ul>
                    <div class="panel">
                    <textarea class="form-control " placeholder="Enter here for tweet..." rows="3"
                              onKeyDown="setLine( this )"></textarea>
                    </div>
                    <div align="right">
                        <button type="submit" class="btn btn-primary">게시</button>
                    </div>
                </div>
            </div>
            <?php } ?>


            <!-- 다중이미지지일 때 -->
            <div class="panel panel-info">
                <div class="panel-body">
                    <ul class="writing-list media-list">
                        <li class="writing media">
                            <div class="media-left">
                                <a href="#" class="pull-left">
                                    <img src="../../../public/img/w_img/donghwi.jpg"
                                         class="media-object img-circle">
                                </a>
                            </div>
                            <div class="media-body">

                                <!--닉네임-->
                                <div class="text-success"><strong>동휘</strong></div>

                                <!--Time-->
                                <div class="time">
                                    <small class="text-muted">30분 전</small>
                                </div>

                                <!--글 내용-->
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Lorem ipsum dolor adipiscing elit.dfwff dfjklfwtiosd wpqppdfsdwwf
                                    tiopwvjkldfw
                                    dfw</p>

                                <!--글 이미지지-->
                                <div id="wrapper">
                                    <div id="columns" class="col-md-13">
                                        <div class="card">
                                            <img src="../../../public/img/w_img/beenzino.bmp">
                                        </div>
                                        <div class="card">
                                            <img src="../../../public/img/w_img/beenzino2.jpg">
                                        </div>
                                        <div class="card">
                                            <img src="../../../public/img/w_img/seojun.jpg">
                                        </div>
                                        <div class="card">
                                            <img src="../../../public/img/w_img/haejin.jpg">
                                        </div>
                                        <div class="card">
                                            <img src="../../../public/img/w_img/sakagutikenntarou.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="panel-footer">
                    <ul class="board-list media-list">
                        <li class="board media">
                            <a href="#" class="pull-left">
                                <img src="../../../public/img/w_img/bogum.jpg" class="img-circle">
                            </a>

                            <div class="media-body">
                                        <span class="text-muted pull-right">
                                            <small class="text-muted">30분 전</small>
                                        </span>
                                <strong class="text-success">보검짱</strong>

                                <p>
                                    헤헤헤헤헤헿ㅎ헿
                                </p>
                            </div>
                        </li>
                    </ul>
                    <div class="panel">
                    <textarea class="form-control " placeholder="Enter here for tweet..." rows="3"
                              onKeyDown="setLine( this )"></textarea>
                    </div>
                    <div align="right">
                        <button type="submit" class="btn btn-primary">게시</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- TWEET WRAPPER END -->
</div>
