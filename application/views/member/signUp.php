<div>
    <form action="<?php echo URL ?>member/signUp" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>U_ID :</td>
                <td><input type="text" name="u_id"></td>
            </tr>
            <tr>
                <td>U_PASS :</td>
                <td><input type="text" name="u_pass"></td>
            </tr>
            <tr>
                <td>U_NICK :</td>
                <td><input type="text" name="u_nick"></td>
            </tr>
            <tr>
                <td>U_TEL :</td>
                <td><input type="text" name="u_tel"></td>
            </tr>
            <tr>
                <td>U_EMAIL :</td>
                <td><input type="text" name="u_email"></td>
            </tr>
            <tr>
                <td>U_PIC :</td>
                <td><input type="file" name="u_pic"></td>
            </tr>
            <tr>
                <td>U_BIRTH :</td>
                <td><input type="text" name="u_birth"></td>
            </tr>
            <tr>
                <td>COLLEGE_LIST :</td>
                <td>
                    <select name="college_num">
                        <?php foreach ($college_list as $row) { ?>
                            <option value="<?php echo $row->college_num ?>"><?php echo $row->college_name ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>INTEREST_LIST :</td>
                <td>
                    <?php foreach ($interest_list as $row) { ?>
                        <input type="checkbox" name="interest_Arr[]" value="<?php echo $row->in_num ?>"><?php echo $row->in_name ?><br>
                    <?php } ?>
                </td>
            </tr>
        </table>
        <input type="submit" value="확인">
    </form>
</div>