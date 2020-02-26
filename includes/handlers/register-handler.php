<?php

// sanitize input data
function sanitizeFormUsername($input)
{
    $input = strip_tags($input);
    $input = str_replace(" ", "", $input);
    return $input;
}

function sanitizeFormString($input)
{
    $input = strip_tags($input);
    $input = str_replace(" ", "", $input);
    $input = ucfirst(strtolower($input));
    return $input;
}

function sanitizePassword($input)
{
    $input = strip_tags($input);
    return $input;
}


if (isset($_POST['registerButton'])) {
    // if the register button was pressed

    // username
    $registerUsername = sanitizeFormUsername($_POST['registerUsername']);
    // first name
    $registerFirstName = sanitizeFormString($_POST['registerFirstName']);
    // last name
    $registerLastName = sanitizeFormString($_POST['registerLastName']);
    // email
    $registerEmail = sanitizeFormString($_POST['registerEmail']);
    // email confirmation
    $registerEmailConfirmation = sanitizeFormString($_POST['registerEmailConfirmation']);
    // password
    $registerPassword = sanitizePassword($_POST['registerPassword']);
    // password confirmation
    $registerPasswordConfirmation = sanitizePassword($_POST['registerPasswordConfirmation']);

    $wasSuccessful = $account->register($registerUsername, $registerFirstName, $registerLastName, $registerEmail, $registerEmailConfirmation, $registerPassword, $registerPasswordConfirmation);

    if ($wasSuccessful) {
        header("Location: index.php");
    }

}