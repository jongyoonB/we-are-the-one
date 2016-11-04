/**
 * Created by user on 2016-01-25.
 */

function followingSelect() {

    var u_num = $('#u_num').val();

    $.ajax({
        url: '/ajaxC/followingSelect/',
        type: 'post',
        dataType: 'json',
        success: function (data) {
            $('#following_body').html('');
            for (var key in data) {
                var birth = data[key].u_birth.substring(0, 10)+"     ";
                var following_img = "following_img_" + data[key].u_num;
                var following_content = "following_content_" + data[key].u_num;
                var room = "chat_" + data[key].u_num;
                var click = "send_chat_pr("+u_num+"," + data[key].u_num + ")";

               console.log(data[key].u_num);
                $('#following_body').append('<div class="col-md-12">' +
                    '<div class="col-md-4">' +
                    '<img id=following_img class="follow-img">' +
                    '</div>' +
                    '<div class="col-md-7 follow-img-font" id="following_content">' +
                    '</div>' +
                    '</div>');
                $('#following_img').attr({id: following_img});
                $('#following_content').attr({id: following_content});
                $('#' + following_img).attr({src: data[key].u_pic});
                $('#' + following_content).html(
                '<a id="cyka" href="">'+
                data[key].u_nick +
                '</a>'+
                '<br>생일: '+birth+
                '<button type="button" id="chat" onclick="chat_pr">채팅</button>');
                $('#chat').attr({id: room, onclick: click});
		$('#cyka').attr({id: 'cyka_'+data[key].u_num, href: 'http://jycom.asuscomm.com:6680/bulletin_board/user_Select_num/'+data[key].u_num});

            }
        }
    });
}

function get_Comment(b_idx) {

    var comment_V = "comment_V_" + b_idx;
    var num = $('#' + comment_V).attr('value');

    var urlStr = '/ajaxC/get_Comment/' + b_idx + '/' + num + '/';
    $.ajax({
        url: urlStr,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            for (var c in data['c_Val']) {
                var num = data['c_Val'][c].c_idx;
                var comment_time = "comment_time_" + num;
                var comment_pic = "comment_pic_" + num;
                var comment_nick = "comment_nick_" + num;
                var comment_comment = "comment_comment_" + num;

                $('#' + comment_V).append('<ul class="board-list media-list">' +
                    '<li class="board media">' +
                    '<a href="#" class="pull-left">' +
                    '<img id="comment_pic">' +
                    '</a>' +
                    '<div class="media-body">' +
                    '<span class="text-muted pull-right">' +
                    '<small class="text-muted" id="comment_time"></small>' +
                    '</span>' +
                    '<strong class="text-success" id="comment_nick"></strong>' +
                    '<p id="comment_comment">' +
                    '</p>' +
                    '</div>' +
                    '</li>' +
                    '</ul>');
                $('#comment_pic').attr({id: comment_pic, src: data['c_Val'][c].u_pic});
                $('#comment_time').append(data['c_Val'][c].c_date);
                $('#comment_time').attr({id: comment_time});
                $('#comment_nick').append(data['c_Val'][c].u_nick);
                $('#comment_nick').attr({id: comment_nick});
                $('#comment_comment').append(data['c_Val'][c].c_content);
                $('#comment_comment').attr({id: comment_comment});


            }
            $value_Num = parseInt($('#' + comment_V).attr('value')) + 5;
            $('#' + comment_V).attr({value: $value_Num});
        }
    });
}

function set_comment(b_idx) {
    var comment_V = "comment_V_" + b_idx;
    var comment_A = "comment_A_" + b_idx;
    var comment = $('#' + comment_A).val();


    var urlStr = '/ajaxC/set_Comment/';

    $.ajax({
        url: urlStr,
        type: 'POST',
        data: {b_idx: b_idx, comment: comment},
        dataType: 'json',
        success: function (data) {

        }
    });
    $('#' + comment_A).val('');
    $('#' + comment_V).html('');
    $('#' + comment_V).attr({value: 0});
    get_Comment(b_idx);
}

function get_Board() {
    var category_Num = $('#category_Num').val();
    var start_Num = $('#moreView').val();
    var last_Num = 5;

    if (category_Num != 5)
        var urlStr = '/ajaxC/get_Board/' + category_Num + '/' + start_Num + '/' + last_Num + '/';
    else {
        var u_num = $('#category_Num').attr('class');
        var urlStr = '/ajaxC/get_Board_List_fromUser/' + u_num + '/' + start_Num + '/' + last_Num + '/';
    }

    $.ajax({
        url: urlStr,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            if (category_Num != '4') {
                for (var b in data['b_Val']) {
                    var u_pic = "u_pic_" + data['b_Val'][b].b_con_idx;
                    var u_nick = "u_nick_" + data['b_Val'][b].b_con_idx;
                    var b_time = "b_time_" + data['b_Val'][b].b_con_idx;
                    var b_content = "b_content_" + data['b_Val'][b].b_con_idx;
                    var b_pic_div = "b_pic_div_" + data['b_Val'][b].b_con_idx + " col-md-13";
                    var comment = "commentView_" + data['b_Val'][b].b_con_idx;
                    var b_idx = parseInt(data['b_Val'][b].b_con_idx);
                    var comment_A = "comment_A_" + data['b_Val'][b].b_con_idx;
                    var set_Comment = "set_Comment_" + data['b_Val'][b].b_con_idx;
                    var comment_V = "comment_V_" + data['b_Val'][b].b_con_idx;
                    var user_View = "user_View_" + data['b_Val'][b].b_con_idx;

                    $('#board_Div').append('<div class="panel panel-info" id="board_num">' +
                        '<div class="panel-body">' +
                        '<ul class="writing-list media">' +
                        '<li class="writing media">' +
                        '<div class="media-left">' +
                        '<a id="user_View" class="pull-left">' +
                        '<img id="u_pic" class="media-object img-circle">' +
                        '</a>' +
                        '</div>' +
                        '<div class="media-body">' +
                        '<div id="unick" class="text-success">' +
                        '</div>' +
                        '<div class="time"><small class="text-muted" id="b_time"></small>' +
                        '</div>' +
                        '<p id="b_content"></p>' +
                        '<div id="wrapper">' +
                        '<div id="columns" class="col-md-13 b_pic_div">' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</li>' +
                        '</ul>' +
                        '</div>' +
                        '<div class="panel">' +
                        '<textarea class="form-control " placeholder="Enter here for tweet..." rows="3" onKeyDown="setLine( this )" id="comment_A"></textarea>' +
                        '</div>' +
                        '<div align="right">' +
                        '<button type="submit" class="btn btn-primary" id="set_Comment">게시</button>' +
                        '</div>' +
                        '<div id="comment_V" class="panel-footer" value="0">' +
                        '</div>' +
                        '<button type="button" class="btn btn-primary" id="commentView">덧글보기</button>' +
                        '</div>');

                    $('#board_num').attr({id: data['b_Val'][b].b_con_idx});
                    if(category_Num!=3){
			    $('#u_pic').attr({id: u_pic, src: data['b_Val'][b].u_pic});
	                    $('#unick').attr({id: u_nick});
		    }
                    $('#b_time').attr({id: b_time});
                    $('#b_content').attr({id: b_content});
                    $('#' + b_time).append(data['b_Val'][b].b_date);
                    $('#' + u_nick).append('<strong>' + data['b_Val'][b].u_nick + '</strong>');
                    $('#' + b_content).append(data['b_Val'][b].b_content);
                    $('.b_pic_div').attr({class: b_pic_div});
                    $('#commentView').attr({id: comment});
                    $('#' + comment).attr({value: b_idx});
                    $('#' + comment).click(function () {
                        var b_value = $(this).val();
                        get_Comment(b_value);
                    });
                    $('#comment_A').attr({id: comment_A});
                    $('#set_Comment').attr({id: set_Comment, value: b_idx});
                    $('#comment_V').attr({id: comment_V});
                    $('#' + set_Comment).click(function () {
                        var b_value = $(this).val();
                        set_comment(b_value);
                    });
                    $('#user_View').attr({id: user_View, value: data['b_Val'][b].u_num});
                    $('#' + user_View).click(function () {
                        var u_num = $(this).attr('value');
                        $('#category_Num').attr({value: 5 , class: u_num});
                        $('#moreView').attr({value : 0});
                        $('#board_Div').html('');
                        get_Board();
                    });
                }

                for (var a in data['a_Val']) {
                    var b_pic_div = "b_pic_div_" + data['a_Val'][a].b_con_idx;
                    var attach_name = data['a_Val'][a].file_path_info + data['a_Val'][a].attach_name;

                    $('.' + b_pic_div).append('<div class="card">' +
                        '<img id="a_pic">' +
                        '</div>');
                    $('#a_pic').attr({id: data['a_Val'][a].attach_name, src: attach_name});

                }
            } else {
                var indexNum = 0;
                var a_href = $('#a_href').val();
                for (var b in data['b_Val']) {
                    var b_num = data['b_Val'][b].b_con_idx;
                    var b_subject = data['b_Val'][b].b_content.substring(0, 15);
                    indexNum++;
                    $('#bulletin_board').append(
                        '<tr>' +
                        '<td id="c_indexNum">' +
                        '</td>' +
                        '<td class="boardtitle">' +
                        '<a id="c_subject" >' +
                        '</a>' +
                        '</td>' +
                        '<td id="c_nick">' +
                        '</td>' +
                        '<td id="c_date">' +
                        '</td>' +
                        '</tr>'
                    );
                    $('#c_indexNum').append(indexNum);
                    $('#c_indexNum').attr({id: 'c_indexNum' + indexNum});
                    $('#c_subject').append(b_subject);
                    $('#c_subject').attr({id: 'c_subject' + indexNum, href: a_href + b_num});
                    $('#c_nick').append(data['b_Val'][b].u_nick);
                    $('#c_nick').attr({id: 'c_nick' + indexNum});
                    $('#c_date').append(data['b_Val'][b].b_date);
                    $('#c_date').attr({id: 'c_date' + indexNum});
                }
            }


            $('#moreView').attr({value: parseInt(start_Num) + 5});
        }
    });
}


function get_Inter() {
    $.ajax({
        url: '/ajaxC/get_Inter/',
        type: 'post',
        dataType: 'json',
        success: function (data) {
            for (var a in data) {
                $('#inter').append(
                    '<input type="checkbox" name="interest_Arr[]" multiple id="before"><strong id="before1"></strong></input>'
                );
                $('#before1').append(data[a].in_name);
                $('#before1').attr({id: 'clear'});
                $('#before').attr({value: data[a].in_num, id: 'clear'});
            }
        }
    });
}

$('#get_Inter').click(function () {
    get_Inter();
});


$('#moreView').click(function () {
    get_Board();
});

$('#followingButton').click(function () {
    followingSelect();
});

$('#comment').hide();


