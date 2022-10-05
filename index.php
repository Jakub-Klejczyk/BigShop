<?php

require('db.php');
require('class/user_create.php');

if(isset($_POST['submit'])) {
    $username = htmlspecialchars($_POST['username']);
    $pass = htmlspecialchars($_POST['pass']);
    $pass2 = htmlspecialchars($_POST['pass2']);
    $email = htmlspecialchars($_POST['email']);
    $tel = htmlspecialchars($_POST['tel']);
    $street = htmlspecialchars($_POST['street']);
    $zip = htmlspecialchars($_POST['zip']);
    $local = htmlspecialchars($_POST['local']);

    $registration = new UserCreate($username, $pass, $pass2, $email, $tel, $street, $zip, $local, $users);
    $errors = $registration->createUser();

    if($registration->getVal() == true) {
        echo 'Konto utoworzone';
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz rejestracji</title>
</head>
<body>
    <h1>Załóż konto</h1>
    <form action="" method="POST">
        <div class="item">
            <label for="username">Nazwa użytkownika:</label>
            <input type="text" name="username" autocomplete="off">
            <p><?php echo $errors['username'] ?? '' ?></p>
        </div>
        <div class="item">
            <label for="pass">Hasło:</label>
            <input type="text" name="pass" autocomplete="off">
            <p><?php echo $errors['pass'] ?? '' ?></p>
        </div>
        <div class="item">
            <label for="pass2">Powtórz hasło:</label>
            <input type="text" name="pass2" autocomplete="off">
            <p><?php echo $errors['pass2'] ?? '' ?></p>
        </div>
        <div class="item">
            <label for="email">Adres e-mail:</label>
            <input type="text" name="email" autocomplete="off">
            <p><?php echo $errors['email'] ?? '' ?></p>
        </div>
        <div class="item">
            <label for="tel">Numer telefonu:</label>
            <input type="tel" name="tel" autocomplete="off">
            <p><?php echo $errors['tel'] ?? '' ?></p>
        </div>
            
        <div class="item">
            <h4>Adres zamieszkania</h4>
            <div>
                <label for="street">Ulica:</label>
                <input type="tekst" name="street" autocomplete="off">
                <p><?php echo $errors['street'] ?? '' ?></p>
            </div>
            <div>
                <label for="zip">Kod pocztowy:</label>
                <input type="zip" name="zip" autocomplete="off">
                <p><?php echo $errors['zip'] ?? '' ?></p>
            </div>
            <div>
                <label for="local">Miejscowość:</label>
                <input type="tekst" name="local" autocomplete="off">
                <p><?php echo $errors['local'] ?? '' ?></p>
            </div>
            <div>
                <input type="submit" name="submit" value="Zapisz">
            </div>
        </div>
    </form>
</body>
</html>