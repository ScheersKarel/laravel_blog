<?php

use App\Models\Contact;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$name = $_POST["name"];
$email = $_POST["email"];
$errorcounter = 0;
if (isset($_POST['Add'])) {
    if (empty($name)) {
        echo "name is empty";
        $errorcounter++;
    }
    if (empty($email)) {
        echo "email is empty";
        $errorcounter++;
    }
    if ($errorcounter == 0) {
        $contact = new Contact;
        $contact->name = $name;
        $contact->email = $email;
        $contact->save();
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <table>
            <tr>
                <td><label>name</label></td>
                <td><input type="text" name="name" id="name"> </td>
            </tr>
            <tr>
                <td><label>e-mail</label></td>
                <td>
                    <input type = "text" id="e-mail" name="e-mail">
    
                </input>
                </td>
            </tr>
            <td> <input type="submit" name="Add" value="Add" /></td>
            </tr>
        </table>
    </form>
</body>

</html>