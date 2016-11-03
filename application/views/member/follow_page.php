<div class="row">
    <?php foreach ($f_list as $row) { ?>
        <div class="col-md-12">
            <div class="col-md-4">
                <img src="<?php echo $row->u_pic ?>" class="follow-img">
            </div>
            <div class="col-md-7 follow-img-font">
                닉네임: <?php echo $row->u_nick ?>
                <br>
                전화번호: <?php echo $row->u_tel ?>
                <br>
                관심사: 여자
            </div>
            <form action="<?php echo URL ?>member/follow_user/" method="POST">
                <input type="hidden" name="u_num" value="<?php echo $row->u_num ?>">
                <input type="submit" value="팔로우">
            </form>
        </div>
    <?php } ?>
</div>