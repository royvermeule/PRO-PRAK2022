<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/auracss.css">
    <title>Homepage</title>
</head>
<body>
    <div class="container-11">
        <div class="row flex-jc-center">
            <div class="col-s-8 col-m-8 col-l-8 col-xl-8 col-xxl-8 col-8 flex-jc-center screen-height">    
                <header>
                    <h1>Login</h1>
                </header>    
        <form action="/auth/login" method="POST">
        <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="email" id="email" required>

        <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" id="password" required>

        <button type="submit">Login</button>
        <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
        <span class="psw">Forgot <a href="#">password?</a></span> 
        </form>
        </div>
        </div>
    </div>
</body>
</html>