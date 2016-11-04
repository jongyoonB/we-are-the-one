<div class="container">
    <div class="row follow">
        <div class="col-md-9 follow_title">
            팔로워
        </div>
        <?php foreach ($f_list as $row) { ?>
            <div class="col-md-4 follower_list">
                <img src="<?php echo $row->u_pic ?>" class="follow-img">
                <p id="follower_nick">
                    <?php echo $row->u_nick ?></p>
                <p id="follower_info">
                    전화번호: <?php echo $row->u_tel ?><br>
                    관심사: <?php foreach($u_list as $ulist){
				 if($ulist->u_num ==$row->u_num){
					 echo $ulist->in_name."<br>";
				 }
			    } ?>
		</p>
                <form action="<?php echo URL ?>member/follow_user/" method="post">
                    <input type="hidden" id="u_num" name="u_num" value="<?php echo $row->u_num ?>">
                    <input type="submit" id="follow_button" value="팔로우">
                </form>
            </div>
        <?php } ?>
    </div>
</div>
