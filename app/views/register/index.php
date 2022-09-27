<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/auracss.css">
    <title>Register</title>
</head>

<body>
    <form action="action_page.php">
        <div class="container-11">
            <div class="row flex-jc-center">
                <h1>Regristreren</h1>

            </div>
            <div class="row flex-jc-center">
                <div class="col-s-8 col-m-8 col-l-8 col-xl-8 col-xxl-8 col-8 flex-jc-center screen-height">
                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Voer e-mail in" name="email" id="email" required>

                    <label for="psw"><b>Wachtwoord</b></label>
                    <input type="password" placeholder="Voer wachtwoord in" name="psw" id="psw" required>

                    <label for="psw-repeat"><b>Herhaal wachtwoord</b></label>
                    <input type="password" placeholder="Herhaal wachtwoord" name="psw-repeat" id="psw-repeat" required>

                    <br>
                    <button type="submit" class="registerbtn">Register</button>
                </div>
            </div>


            <div class="container-11">
                <div class="row flex-jc-center">
                    <p>Heb je al een account? <a href="#">Log in</a>.</p>
                </div>
</body>
</form>

</html>