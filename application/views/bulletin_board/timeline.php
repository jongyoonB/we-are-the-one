<?php if ($this->b_category == '1' || $this->b_category == '2') { ?>
    <ul class="nav nav-tabs col-md-12 col-lg-offset-1" xmlns="http://www.w3.org/1999/html">
        <li class="active"><a href="#">타임라인</a></li>
        <li>
            <a href="<?php echo URL ?>bulletin_board/<?php if ($this->b_category == '1') echo 'boring'; else echo 'hungry' ?>_matching"><?php if ($this->b_category == '1') echo '같이 놀자'; else echo '같이 먹자'; ?></a>
        </li>
    </ul>
<?php } else { ?>
    <ul class="nav nav-tabs col-md-12 col-lg-offset-1" xmlns="http://www.w3.org/1999/html">
        <li class="active"><a href="#">타임라인</a></li>
    </ul>
<?php } ?>
<input type="hidden" id="category_Num" value="<?php echo $this->b_category ?>" class="<?php echo isset($s_u_nick) ? $s_u_nick : ''  ?>">



<div class="row" id="main_Div">
    <div class="col-lg-9 col-lg-offset-2 col-md-9 col-md-offset-2 col-sm-9 col-sm-offset-2">
        <!-- TWEET WRAPPER START -->
        <div class="twt-wrapper">
            <form action="<?php echo URL ?>bulletin_board/b_plus" method="POST" enctype="multipart/form-data">
                <div class="panel panel-info">
                    <div class="panel-heading">
                    <textarea name="b_content" class="form-control " placeholder="Enter here for We are the One..."
                              rows="3"
                              onKeyDown="setLine( this )"></textarea>
                    </div>
                    <div class="panel-body" align="right">
                        <!--<button name="b_img" type="button" class="btn btn-default btn-sm">
                            <span class="glyphicon glyphicon-camera" aria-hidden="true"></span>
                        </button>-->
             	        <img width="250px" height="250px" id="upFile" src=""><br>
                        <input type="file" name="b_pic[]" onchange="readImage(this)">
<!--                        <input type="file" name="b_pic[]" multiple> -->
                        <button type="submit" class="btn btn-primary btn-sm">게시</button>
                    </div>
                </div>
                <input type="hidden" name="b_category_num" value="<?php echo $this->b_category ?>">
                <input type="hidden" name="u_num" value="<?php echo $_SESSION['user_info']->u_num ?>">
                <input type="hidden" name="college_num" value="<?php echo $_SESSION['user_info']->college_num ?>">
                <input type="hidden" name="category" value="<?php echo $this->b_category ?>">
            </form>

            <!-- 다중이미지지일 때 -->
            <div id="board_Div">

            </div>

        </div>
        <button type="button" class="btn" id="moreView" value="0">더보기</button>
    </div>
    <!-- TWEET WRAPPER END -->
</div>



