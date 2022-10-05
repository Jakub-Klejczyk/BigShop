<?php
require('db.php');
require('class/user_validation.php');




if(isset($_POST['submit'])) {
    

    $username = htmlspecialchars($_POST['username']);
    $pass = htmlspecialchars($_POST['pass']);

    $post_data = array(
        'username' => $username,
        'pass' => $pass
    );

    $validation = new UserValidation($post_data, $users);
    $errors = $validation->validateForm();

    if($validation->getVal() == true) {
        echo 'Zalogowano';
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
</head>
<body>
    <h1>Zaloguj się</h1>
    <form action="" method="POST">
        <div class="item">
            <label for="username">Nazwa użytkownika:</label>
            <input type="text" name="username" autocomplete="off">
            <p><?php echo $errors['username'] ?? '' ?></p>
        </div>
        <div class="item">
            <label for="pass">Hasło:</label>
            <input type="password" name="pass" autocomplete="off">
            <p><?php echo $errors['pass'] ?? '' ?></p>
        </div>
        <div>
            <input type="submit" name="submit" value="Loguj">
        </div>
        <p><?php echo $errors['nouser'] ?? '' ?></p>
    </form>
</body>
</html>