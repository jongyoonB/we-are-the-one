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

<div class="container">
    <div class="row">
        <div class="content col-lg-6" id="content">WeAreTheOne</div>
        <div class="login col-lg-6">
            <form role="form" action="<?php echo URL ?>member/signIn/" method="POST">
                <div class="form-group">
                    <input type="text" name="u_id" class="form-control" placeholder="id">
                </div>
                <div class="form-group">
                    <input type="password" name="u_pass" class="form-control" placeholder="password">
                </div>
                <input type="submit" name="SignIn" id="SignIn" class="btn btn-primary" value="로그인">
            </form>
        </div>
    </div>
    <div class="row">
        <div class="join col-lg-12">
            <button class="btn  btn-default" data-toggle="modal" data-target="#join" id="button">회원가입</button>
        </div>
    </div>
</div>

<div class="modal fade" id="join" role="dialog" aria-labelledby="introHeader" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">회원가입</h4>
            </div>

            <form role="form" class="form-horizontal" action="<?php echo URL ?>member/signUp" method="POST"
                  enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-2 control-label sr-only">아이디</label>

                        <div class="col-md-10">
                            <input type="text" name="u_id" id="u_id" class="form-control" placeholder="영문+숫자 조합 8자리 이상" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label sr-only">비밀번호</label>

                        <div class="col-md-10">
                            <input type="password" name="u_pass" id="u_pass" class="form-control" placeholder="영문+숫자 조합 8자리 이상" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label sr-only">닉네임</label>

                        <div class="col-md-10">
                            <input type="text" name="u_nick" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label sr-only">휴대폰<br>번호</label>

                        <div class="col-md-10">
                            <input type="text" name="u_tel" class="form-control" value="010-0000-1111" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label sr-only">email</label>

                        <div class="col-md-10">
                            <input type="email" name="u_email" id="email" class="form-control" placeholder="학교 이메일만 사용가능" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">프로필<br>사진</label>

                        <div class="col-md-10">
                            <img width="250px" height="250px" id="upFile" src=""><br>
                            <input type="file" name="u_pic" class="form-control" onchange="readImage(this)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label sr-only">생년월일</label>

                        <div class="col-md-10">
                            <input type="date" name="u_birth" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">대학<br>리스트</label>

                        <div class="col-md-10">
                            <select name="college_num" id="htmlselect" class="form-control">
                                <?php foreach ($college_list as $row) { ?>
                                    <option
                                        value="<?php echo $row->college_num ?>" data-imagesrc="<?php echo URL.$row->college_pic ?>"><?php echo $row->college_name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">관심사<br>선택</label>
                        <div class="col-md-10">
                            <?php foreach ($interest_list as $row) { ?>
                                <input type="checkbox" name="interest_Arr[]" multiple
                                       value="<?php echo $row->in_num ?>"><?php echo $row->in_name ?></input>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" id="btn_submit" class="btn btn-default" id="join_btn" value="가입하기">
                </div>
            </form>
        </div>
    </div>
</div>
