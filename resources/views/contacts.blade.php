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
    <title>Contacts</title>
    
</head>
<body>
<h1>Contacts</h1>

    <table>
            <tr>
                <td><h3>Name </h3></td>
                <td><h3>E-mail </h3></td>
                <td><h3>Action </h3></td>
            </tr>

        @foreach ($contacts as $contact)
        
            <tr>
                <td><label>{{ $contact->name }}</label></td>
                <td><label>{{ $contact->email }}</label></td>
                <td><a href="/edit/{{ $contact->id }}">edit</a>/<a href="/delete/{{ $contact->id }}">delete</a></td>
            </tr>
            
        @endforeach
    </table>
    

   
    <a href="/create">create contact</a>
</body>
</html>