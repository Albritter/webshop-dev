<?php
include "config.php";
include "header.php";
//echo password_hash("test", PASSWORD_BCRYPT, $b_crypt);
if (array_key_exists("user", $_POST) && !isValidUser()) {
    login();
}
if (!isValidUser()) {
    echo "
<div>
    <div>
        <div>
            <form action='admin.php' method='post'>
                <table>
                    <tr>
                        <td>
                            <label>User</label> 
                        </td>
                        <td>
                            <input type='text' name='user' lable='User' required autofocus/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Passwort</label>
                        </td>
                        <td>
                            <input type='password' name='password' lable='Passwort' required/>
                        </td>
                    <tr>
                        <td colspan='2'>
                            <input type='submit' value='Login'/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>";
} else if (array_key_exists("user", $_POST)) {
    echo "
<div>
Sie sind nun angemeldet.  
<a href='logout.php'>Logout</a>
</from>
</div>
";
} else {
    echo "<a href='logout.php'> Logout </a>";
}
if (isValidUser()) {
    echo "
<div>
<h1>Artikel hinzufügen</h1>
</div>
<form method='POST' action='upload.php' enctype='multipart/form-data'>
   <table>
        <tr>
            <td>
                Name
            </td>
            <td>
                <input type='text' name='name'/>
            </td>
        </tr>
        <tr>
            <td>
                Preis
            </td>
            <td>
                <input type='number' name='preis'/>
            </td>
        </tr>
        <tr>
            <td>
                Bild
            </td>
            <td>
                <input type='file' name='fileToUpload'/>        
            </td>
        </tr>
        <tr>
            <td colspan=2 id='upload'>
                 <input type='submit'/></form>      
            </td >
        </tr>
    </table>
    </form>
</div>
</div>
";
}


