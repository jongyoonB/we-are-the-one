<script>
	function chat_enter(idx){
		window.open('http://jycom.asuscomm.com:3000/#/v1/pe'+idx, '_blank');
	}

</script>

<div class="container">
    <div class="row">
        <div>
            <!-- TWEET WRAPPER START -->
            <div class="col-lg-10 twt-wrapper">
                <div class="panel panel-info">
                    <div class="panel-body panelC" align="left">
                        <?php echo $_SESSION['user_info']->u_nick . "님의 매칭현황" ?>
                    </div>
                    <div class="inpannelC">
                        <table class="table boardtable">
                            <?php
                            if (isset($matching_info)) {
                                foreach ($matching_info as $value) { ?>
                                    <tr>
                                        <td>그룹 카테고리: <?php echo $value->pe_category_name ?></td>
                                        <td>시작 시간: <?php echo $value->start_date ?></td>
                                        <td>종료 시간: <?php echo $value->end_date ?></td>
                                        <td>현재 인원: <?php echo $value->number_of_join ?></td>
                                        <td>정원: <?php echo $value->limit_number ?></td>
					<td><a href="<?php echo URL."main/chat_v2/$value->pe_group_idx"; ?>"><button onclick="chat_enter(<?php echo $value->pe_group_idx; ?>)" >채팅</button></a></td>
                                    </tr>
                                <?php }
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
