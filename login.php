<!DOCTYPE html>
<?php
require_once "config.php";
$loginURL = $gClient->createAuthUrl();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IMG SVG</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/materialize.min.css">
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body{
        position: relative;
        width: 100%;
        height: 100vh;
        background: url("./fa.svg");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        font-family: Arial, Helvetica, sans-serif;

        display: flex;
        justify-content: center;
        align-items: center;
    }
    form{
        width: 350px;
        height: 420px;
        padding: 20px 50px;
        margin-right: 50px;
        display: flex;
        flex-direction: column;
        align-content: flex-end;
        background: #fff;
        border-radius: 36px;
        text-align: center;
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.3);
    }
    form input{
        border: none;
        background: transparent;
        border-bottom: 1px solid #c7c7c7;
        padding: 0px 0px 10px 0px;
        margin-top: 50px;
        transition: 0.3s ease-in-out;
        font-size: 20px;
    }

    form input:focus{
        outline: none;
    }

    ::placeholder{
        color: #dedede;
    }
    label{
        color: #8e8e8e;
        margin-bottom: 10px;  
        font-size: 28px;
    }

    .sign{
        margin: 70px auto;
        padding: 8px 45px;
        background: linear-gradient(#9B6AFF, #FF46C2);
        border-radius: 32px;
        border: none;
        color: #fff;
        cursor: pointer;
    }

    /* .main{
        display: flex;
        justify-content: center;
        align-items: center;
    } */
    .container{
        width: 90%;
    }

    .label{

        margin-top: 100px;
    }

/* .loginWithGoogle{ */
/* width:200px; */
/* border:none; */
/* background:#fff; */
/* } */
  
</style>
<body>
<div class="container main">
    <div class="row">
        <div class="col-md-6 ">
            <div class="label float-right">
                <h1>Enlighten Yourself</h1>
                <h2>Anywhere Anytime</h2>
            </div>
        </div>

        <div class="col-md-3">
            <form action="./includes/login.inc.php" method="POST">
                <label for="type">Sign In</label>
                <input type="text" name="username" placeholder="Username" name="username">
                <input type="password" name="password" placeholder="Password">
								<input class="sign" type="submit" name="login-submit" value="login">
            </form>
						<!--<input onclick="window.location = '<?php echo $loginURL?>'" class="loginWithGoogle" type="button" name="loginWithGoogle" value="Login With Google">
-->
<button class="googleButton btn waves-effect waves-light z-depth-3" onclick="window.location = '<?php echo $loginURL?>'">
<img src="images/google.png" class="googleLogo" alt="">
<span>Login With Google</span>
</button>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
