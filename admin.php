<?php
include "config.php";
include "header.php";
//echo password_hash("test", PASSWORD_BCRYPT, $b_crypt);
if (array_key_exists("user", $_POST) && !isValidUser()) {
    login();
}
if (!isValidUser()) {
    echo "
<div class='container '>
    <div class='row justify-content-center'>
        <div class='col-md-4'>
            <form class='form-horizontal' action='admin.php' method='post'>
                <table>
                    <tr>
                        <td>
                            <label class='control-label'>User</label> 
                        </td>
                        <td>
                            <input type='text' name='user' lable='User' required autofocus/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class='control-label'>Passwort</label>
                        </td>
                        <td>
                            <input type='password' name='password' lable='Passwort' required/>
                        </td>
                    <tr>
                        <td colspan='2' id='login'>
                            <input type='submit' value='Login'/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>";
} else if(array_key_exists($_POST["user"])) {
    echo "
<div class='confirmation'>
Sie sind nun angemeldet.  
<a href='logout.php'>Logout</a>
</from>
</div>
";
}