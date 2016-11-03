<h1>SignIn</h1>
<form action="<?php echo URL ?>member/signIn/" method="POST">
    <table>
        <tr>
            <td>ID :</td>
            <td><input type="text" name="u_id"></td>
        </tr>
        <tr>
            <td>PASS :</td>
            <td><input type="password" name="u_pass"></td>
        </tr>
        <tr><td></t><input type="submit" value="SignIn"></td></tr>
    </table>
</form>