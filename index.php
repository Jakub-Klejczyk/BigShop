<?php



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
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="item">
            <label for="username">Nazwa użytkownika:</label>
            <input type="text" name="username" autocomplete="off">
        </div>
        <div class="item">
            <label for="username">Hasło:</label>
            <input type="text" name="username" autocomplete="off">
        </div>
        <div class="item">
            <label for="username">Powtórz hasło:</label>
            <input type="text" name="username" autocomplete="off">
        </div>
        <div class="item">
            <label for="username">Adres e-mail:</label>
            <input type="email" name="username" autocomplete="off">
        </div>
        <div class="item">
            <label for="username">Numer telefonu:</label>
            <input type="tel" name="username" autocomplete="off" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}">
        </div>
            
        <div class="item">
            <h4>Adres zamieszkania</h4>
            <div>
                <label for="username">Ulica:</label>
                <input type="tekst" name="username" autocomplete="off">
            </div>
            <div>
                <label for="username">Kod pocztowy:</label>
                <input type="zip" name="username" autocomplete="off">
            </div>
            <div>
                <label for="username">Miejscowość:</label>
                <input type="tekst" name="username" autocomplete="off">
            </div>
            <div>
                <input type="submit" name="submit" value="Zapisz">
            </div>
        </div>
    </form>
</body>
</html>