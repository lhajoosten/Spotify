<?php
include("includes/classes/Account.php");
include("includes/classes/Constants.php");
include("includes/config.php");


$account = new Account($con);

include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");

function getInputValue($name)
{
    if (isset($_POST[$name])) {
        echo $_POST[$name];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Spotify!</title>
    <link rel="stylesheet" type="text/css" href="assets/css/register.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/register.js" ></script>
</head>
<body>
<div id="background">
    <div id="loginContainer">
        <div id="inputContainer">

            <!-- Login form -->
            <form id="loginForm" action="register.php" method="POST">
                <h2>Login to your account</h2>
                <p>
                    <?php echo $account->getError(Constants::$loginFailed); ?>
                    <label for="loginUsername">Username</label>
                    <input id="loginUsername" name="loginUsername" type="text" placeholder="Username" required>
                </p>
                <p>
                    <label for="loginPassword">Password</label>
                    <input id="loginPassword" name="loginPassword" type="password" placeholder="Password" required>
                </p>

                <button type="submit" name="loginButton">LOGIN</button>

                <div class="hasAccountText">
                    <span id="hideLogin">Don't have an account yet? Sign up here.</span>
                </div>
            </form>

            <!-- Register form -->
            <form id="registerForm" action="register.php" method="POST">
                <h2>Create your free account</h2>
                <p>
                    <?php echo $account->getError(Constants::$usernameLengthError); ?>
                    <?php echo $account->getError(Constants::$usernameTaken); ?>
                    <label for="registerUsername">Username</label>
                    <input id="registerUsername" name="registerUsername" type="text" placeholder="Username"
                           value="<?php getInputValue('registerUsername'); ?>" required>
                </p>
                <p>
                    <?php echo $account->getError(Constants::$firstNameLengthError); ?>
                    <label for="registerFirstName">First name</label>
                    <input id="registerFirstName" name="registerFirstName" type="text" placeholder="First name"
                           value="<?php getInputValue('registerFirstName'); ?>" required>
                </p>
                <p>
                    <?php echo $account->getError(Constants::$lastNameLengthError); ?>
                    <label for="registerLastName">Last name</label>
                    <input id="registerLastName" name="registerLastName" type="text" placeholder="Last name"
                           value="<?php getInputValue('registerLastName'); ?>" required>
                </p>
                <p>
                    <?php echo $account->getError(Constants::$emailNotValidError); ?>
                    <?php echo $account->getError(Constants::$emailDoNotMatchError); ?>
                    <?php echo $account->getError(Constants::$emailTaken); ?>
                    <label for="registerEmail">Email</label>
                    <input id="registerEmail" name="registerEmail" type="email" placeholder="Email"
                           value="<?php getInputValue('registerEmail'); ?>" required>
                </p>
                <p>
                    <label for="registerEmailConfirmation">Email confirmation</label>
                    <input id="registerEmailConfirmation" name="registerEmailConfirmation" type="email"
                           placeholder="Confirmation email" value="<?php getInputValue('registerEmailConfirmation'); ?>"
                           required>
                </p>
                <p>
                    <?php echo $account->getError(Constants::$passwordLengthError); ?>
                    <?php echo $account->getError(Constants::$passwordNotValidError); ?>
                    <?php echo $account->getError(Constants::$passwordsDoNotMatchError); ?>
                    <label for="registerPassword">Password</label>
                    <input id="registerPassword" name="registerPassword" type="password" placeholder="Password"
                           value="<?php getInputValue('registerPassword'); ?>" required>
                </p>
                <p>
                    <label for="registerPasswordConfirmation">Password confirmation </label>
                    <input id="registerPasswordConfirmation" name="registerPasswordConfirmation" type="password"
                           placeholder="Confirmation password"
                           value="<?php getInputValue('registerPasswordConfirmation'); ?>"
                           required>
                </p>

                <button type="submit" name="registerButton">SIGN UP</button>

                <div class="hasAccountText">
                    <span id="hideRegister">Already have an account? Login here.</span>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
