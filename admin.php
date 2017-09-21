<?php
include "config.php";
include "header.php";
include "databases.php";
echo isValidUser();
//echo password_hash("test", PASSWORD_BCRYPT, $b_crypt);
if (array_key_exists("user", $_POST) && !isValidUser()) {
    login();
    echo var_dump($_POST);
}
echo "
<div class='container '>
    <div class='row justify-content-center'>
        <div class='col-md-4'>
            <form class='form-horizontal' action='admin.php' method='post'>
                <div class='form-group'>
                    <label class='control-label'>User</label> <input type='text' name='user' lable='User'/>
                    <label class='control-label'>Passwort</label> <input type='password' name='password' lable='Passwort'/>
                    <input type='submit' value='Login'/>
                </div>
            </form>
        </div>
    </div>
</div>";
