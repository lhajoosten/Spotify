<?php
include("includes/classes/Account.php");
include("includes/classes/Constants.php");

$account = new Account();

include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Spotify!</title>
</head>
<body>

<div id="inputContainer">

    <!-- Login form -->
    <form id="loginForm" action="register.php" method="POST">
        <h2>Login to your account</h2>
        <p>
            <label for="loginUsername">Username</label>
            <input id="loginUsername" name="loginUsername" type="text" placeholder="Username" required>
        </p>
        <p>
            <label for="loginPassword">Password</label>
            <input id="loginPassword" name="loginPassword" type="password" placeholder="Password" required>
        </p>

        <button type="submit" name="loginButton">LOGIN</button>
    </form>

    <!-- Register form -->
    <form id="registerForm" action="register.php" method="POST">
        <h2>Create your free account</h2>
        <p>
            <?php echo $account->getError(Constants::$usernameLengthError);?>
            <label for="registerUsername">Username</label>
            <input id="registerUsername" name="registerUsername" type="text" placeholder="Username" required>
        </p>
        <p>
            <?php echo $account->getError(Constants::$firstNameLengthError);?>
            <label for="registerFirstName">First name</label>
            <input id="registerFirstName" name="registerFirstName" type="text" placeholder="First name" required>
        </p>
        <p>
            <?php echo $account->getError(Constants::$lastNameLengthError);?>
            <label for="registerLastName">Last name</label>
            <input id="registerLastName" name="registerLastName" type="text" placeholder="Last name" required>
        </p>
        <p>
            <?php echo $account->getError(Constants::$emailNotValidError);?>
            <?php echo $account->getError(Constants::$emailDoNotMatchError);?>
            <label for="registerEmail">Email</label>
            <input id="registerEmail" name="registerEmail" type="email" placeholder="Email" required>
        </p>
        <p>
            <label for="registerEmailConfirmation">Email confirmation</label>
            <input id="registerEmailConfirmation" name="registerEmailConfirmation" type="email"
                   placeholder="Confirmation email" required>
        </p>
        <p>
            <?php echo $account->getError(Constants::$passwordLengthError);?>
            <?php echo $account->getError(Constants::$passwordNotValidError);?>
            <?php echo $account->getError(Constants::$passwordsDoNotMatchError);?>
            <label for="registerPassword">Password</label>
            <input id="registerPassword" name="registerPassword" type="password" placeholder="Password" required>
        </p>
        <p>
            <label for="registerPasswordConfirmation">Password confirmation </label>
            <input id="registerPasswordConfirmation" name="registerPasswordConfirmation" type="password"
                   placeholder="Confirmation password" required>
        </p>

        <button type="submit" name="registerButton">SIGN UP</button>
    </form>
</div>

</body>
</html>
