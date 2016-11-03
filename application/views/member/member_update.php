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
        display: inherit;
    }
</style>

<form action="<?php echo URL ?>member/member_update" method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <td>U_PASS :</td>
            <td><input type="text" name="u_pass" value="<?php echo $member_prof->u_pass ?>"></td>
        </tr>
        <tr>
            <td>U_NICK :</td>
            <td><input type="text" name="u_nick" value="<?php echo $member_prof->u_nick ?>"></td>
        </tr>
        <tr>
            <td>U_TEL :</td>
            <td><input type="text" name="u_tel" value="<?php echo $member_prof->u_tel ?>"></td>
        </tr>
        <tr>
            <td>U_EMAIL :</td>
            <td><input type="text" name="u_email" value="<?php echo $member_prof->u_email ?>"></td>
        </tr>
        <tr>
            <td>U_PIC :</td>
            <td><img width="500px" height="500px" id="upFile" src=""></td>
            <td><input type="file" name="u_pic" onchange="readImage(this)" value="<?php echo $member_prof->u_pic ?>"></td>
        </tr>
        <tr>
            <td>U_BIRTH :</td>
            <td><input type="text" name="u_birth" value="<?php echo $member_prof->u_birth ?>"></td>
        </tr>
        <tr>
            <td><input type="submit" value="확인"></td>
        </tr>
        <input type="hidden" name="u_num" value="<?php echo $_SESSION['user_info']->u_num ?>">
    </table>
</form>