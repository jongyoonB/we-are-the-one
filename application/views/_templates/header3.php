<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>We Are The One</title>
    <link href="/public/bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/style.css">
    <link href="/public/css/font-awesome.min.css" rel="stylesheet">
    <link href="/public/css/style.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="/public/css/m_style.css" rel="stylesheet">
    <link href="/public/css/w_style.css" rel="stylesheet">
    <link href="/public/css/h_style.css" rel="stylesheet">

    <style>
        @import url(https://fonts.googleapis.com/css?family=Rokkitt:700);
        @import url(http://fonts.googleapis.com/earlyaccess/nanumgothic.css);

        textarea {
            width: 300px;
            overflow: visible;
            resize: none;
        }
    </style>
    <script>

        function readImage(inputFile)
        {
            if(inputFile.files && inputFile.files[0])
            {
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    $('#upFile').attr('src', e.target.result);
                }
                reader.readAsDataURL(inputFile.files[0]);
                document.getElementById("upFile").style.display="inherit";
            }
            else{
                document.getElementById("upFile").style.display="none";
            }
        }

    </script>

    <style>
        #upFile{
            display: none;
        }
    </style>
</head>
<body>

<div>
    <header class="top">
        <nav class="navbar navbar-default navbar-fixed-top navbar-color" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header ">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1"><span
                            class="sr-only">Toggle navigation</span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand navbar-title" href="<?php echo URL ?>main">We are the One</a></div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group"><input type="text" class="form-control" placeholder="상대방의 닉네임"></div>
                        <button type="submit" class="btn btn-default">검색</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo URL ?>member/follow_page/">팔로우</a></li>
                        <li><a href="#">알림</a></li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                aria-expanded="false">채팅 <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">1:1</a></li>
                                <li class="divider"></li>
                                <li><a href="#">多:多</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <aside class="right">
        <div class="col-sm-4 col-md-3 sidebar fullW">
            <div class="mini-submenu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </div>
            <div class="list-group">
                <span href="#" class="list-group-item active">
                    Submenu
                    <span class="pull-right" id="slide-submenu">
                        <i class="fa fa-times"></i>
                    </span>
                </span>

                <a href="#" class="list-group-item">
                    <i class="fa fa-search"></i> 궁금해
                </a>
                <a href="<?php echo URL ?>bulletin_board/hungry" class="list-group-item">
                    <i class="fa fa-cutlery"></i> 배고파
                </a>
                <a href="<?php echo URL ?>bulletin_board/boring" class="list-group-item">
                    <i class="fa fa-gamepad"></i> 심심해
                </a>
                <a href="#" class="list-group-item">
                    <i class="fa fa-wrench"></i> 불편해
                </a>
                <a href="#" class="list-group-item dropdown-toggle" data-toggle="dropdown" role="button"
                   aria-expanded="false">
                    <i class="fa fa-user"></i> 프로필<span class="caret"></span>
                </a>
                <ul class="dropdown-menu profile-position">
                    <li class="profile-img">
                        <img src="<?php echo $_SESSION['user_info']->u_pic ?>" class="profile-img">
                    </li>
                    <li>
                        <div class="profile-info text-center">
                            <h4 class="username"><?php echo $_SESSION['user_info']->u_nick ?></h4>
                            <div class="btn-group" role="group">
                            </div>
                            <div class="icon-holder">
                                <a data-toggle="modal" data-target="#follow"><span class="glyphicon glyphicon-heart"
                                                                                   aria-hidden="true">팔로잉</span></a>
                            </div>
                            <br>

                            <div class="icon-holder">
                                <a data-toggle="modal" data-target="#memberUpdate"><span class="glyphicon glyphicon-cog"
                                                                                         aria-hidden="true">회원설정</span></a>
                            </div>
                            <br>
                            <div class="icon-holder">
                                <a data-toggle="modal" data-target="#logoutwindow"><span class="glyphicon glyphicon-off"
                                                                                         aria-hidden="true">로그아웃</span></a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- 여기서 부터 팝업창 내용(팔로잉)!-->
        <div class="modal fade" id="follow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">팔로잉</h4>
                    </div>
                    <div class="modal-body">
                        <?php if (isset($_SESSION['f_list'])) { ?>
                            <?php foreach ($_SESSION['f_list'] as $row) { ?>
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
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <!--<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">프로필</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="col-md-5">
                                <img src="<?php /*echo $_SESSION['user_info']->u_pic */ ?>" class="profile-img">
                            </div>
                            <div class="col-md-7">
                                닉네임: &nbsp&nbsp&nbsp&nbsp<input type="text" placeholder="안알랴줌"
                                                                value="<?php /*echo $_SESSION['user_info']->u_nick */ ?>">
                                <br>
                                <br>
                                전화번호: <input type="text" placeholder="안알랴줌"
                                             value="<?php /*echo $_SESSION['user_info']->u_tel */ ?>">
                                <br>
                                <br>
                                관심사: 여자
                                <br>
                                <button type="button" class="btn btn-default">관심사 수정</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default">변경</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
                    </div>
                </div>
            </div>
        </div>-->

        <!--회원설정-->
        <div class="modal fade" id="memberUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">회원정보 수정</h4>
                    </div>

                    <div class="modal-body">
                        <form action="<?php echo URL ?>member/member_update" method="POST"
                              enctype="multipart/form-data">

                            <div class="form-group">
                                <label class="col-md-2 control-label sr-only">u_nick</label>

                                <div class="col-md-10">
                                    <input type="text" name="u_nick" id="u_nick" class="form-control"
                                           placeholder="u_nick" required autofocus
                                           value="<?php echo $_SESSION['user_info']->u_nick ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label sr-only">u_tel</label>

                                <div class="col-md-10">
                                    <input type="text" name="u_tel" id="u_tel" class="form-control"
                                           placeholder="u_tel" required autofocus
                                           value="<?php echo $_SESSION['user_info']->u_tel ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label sr-only">u_email</label>

                                <div class="col-md-10">
                                    <input type="email" name="u_email" id="u_email" class="form-control"
                                           placeholder="u_email" required autofocus
                                           value="<?php echo $_SESSION['user_info']->u_email ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">u_pic</label>

                                <div class="col-md-10">
                                    <img width="250px" height="250px" id="upFile" src=""><br>
                                    <input type="file" name="u_pic" class="form-control" onchange="readImage(this)" >
                                </div>
                            </div>

                            <input type="hidden" name="u_num" value="<?php echo $_SESSION['user_info']->u_num ?>">

                            <div class="modal-footer">
                                <input type="submit" class="btn btn-default" value="확인">
                                <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--로그아웃 팝업창!-->
        <div class="modal fade" id="logoutwindow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">로그아웃</h4>
                    </div>
                    <div class="modal-body logout-font">
                        로그아웃 하시겠습니까?
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-default" href="<?php echo URL ?>member/signOut/">확인</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
                    </div>
                </div>
            </div>
        </div>
    </aside>

    <section class="mid">
        <div class="fullW">
