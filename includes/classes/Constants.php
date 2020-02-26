<?php


class Constants
{
    // register errors
    public static $usernameLengthError = "Your username must be between 25 & 5 characters";
    public static $firstNameLengthError = "Your first name must be between 25 & 2 characters";
    public static $lastNameLengthError = "Your last name must be between 25 & 2 characters";
    public static $emailDoNotMatchError = "Your emails don't match";
    public static $emailNotValidError = "Your email is invalid";
    public static $passwordsDoNotMatchError = "Your passwords don't match";
    public static $passwordNotValidError = "Your password can only contain numbers and letters";
    public static $passwordLengthError = "Your password must be between 30 & 50 characters";
    public static $usernameTaken = "This username is already taken";
    public static $emailTaken = "This username is already taken";

    // login errors
    public static $loginFailed = "Your username or password was incorrect";

}