<script type="text/javascript" src="/public/js/jstz.main.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script>
    //getTimezoneName();
    function getTimezoneName() {
        var timezone = jstz.determine();
        //document.getElementById("tz").value = timezone.name();
        document.writeln(timezone);
    }
</script>

<?php
$time_zone = "Asia/Seoul";
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($time_zone)); //first argument "must" be a string
$dt->setTimestamp(ceil($timestamp / 3600) * 3600); //adjust the object to correct timestamp and ceil
$client_time = $dt->format('H:i');
$available_time_list = array($client_time);
$limit_time = '00:00';
while (true) {
    $next_time = ($dt->add(new DateInterval('PT1H')));
    $next_time = ($next_time->format('H:i'));
    if ($next_time == $limit_time) {
        break;
    }
    array_push($available_time_list, $next_time);
}

$pe_category_num = isset($pe_list) ? $pe_list[0]->pe_category_num : $group_info->pe_group_category;

?>
<style>
    #time {
        display:;
    }

    #toggle_submit {
        display:;
    }

    /*#time{ display:none; }
    #toggle_submit { display:none; }*/
</style>

<ul class="nav nav-tabs col-md-12 col-lg-offset-1" xmlns="http://www.w3.org/1999/html">
    <li><a href="/bulletin_board/<?php if ($pe_category_num == '1') echo "boring"; else echo "hungry"; ?> ">타임라인</a>
    </li>
    <li class="active"><a
            href="javascript:void(0);"><?php if ($pe_category_num == '1') echo "같이 놀자"; else echo "같이 먹자"; ?></a>
    </li>
</ul>
</div>
<div class="col-md-12 col-lg-offset-1">
    <div class="text-center">
        <?php if (!isset($group_info)) { ?>
        <p class="maching-title">선택</p>
        <form action="<?php echo URL ?>bulletin_board/match/" method="POST">
            <div class="maching-font">
                <?php if (isset($pe_list)) { ?>
                    <?php foreach ($pe_list as $link) { ?>
                        <input type="radio" name="category"
                               value="<?php echo $link->pe_category_link ?>"><?php echo $link->pe_category_name; ?>&nbsp&nbsp&nbsp&nbsp
                    <?php } ?>
                    <br>
                    <select id="time" name="startdate">
                        <?php foreach ($available_time_list as $time_list) { ?>
                            <option value="<?php echo $time_list; ?>">
                                <?php echo $time_list; ?>
                            </option>
                        <?php } ?>
                    </select>
                <?php } ?>
                <button class="btn btn-default" id="toggle_submit" onclick="submit()">매칭</button>
            </div>
        </form>
        <?php } ?>
        <div>
            <div>
                <?php if (isset($group_info)) { ?>
                    그룹 카테고리 : <?php echo $group_category_name->pe_category_name ?><br>
                    시작 시간 : <?php echo $group_info->start_date ?><br>
                    종료 시간 : <?php echo $group_info->end_date ?><br>
                    현재 인원 : <?php echo $group_info->number_of_join ?><br>
                    정원 : <?php echo $group_info->limit_number ?><br>
                <?php } ?>
            </div>
        </div>
    </div>


    <!--<div class="btn-group" style="float: right" role="group" aria-label="...">
        <a href="#">
            <button type="button" class="btn btn-default">매칭하기</button>
        </a>
    </div>-->
</div>





