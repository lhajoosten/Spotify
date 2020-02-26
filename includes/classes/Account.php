<?php

class Account
{
    private $errorArray;

    public function __construct()
    {
        $this->errorArray = array();
    }

    // validate input data
    public function register($username, $first, $last, $email, $confirmEmail, $password, $confirmPassword)
    {
        $this->validateUsername($username);
        $this->validateFirstName($first);
        $this->validateLastName($last);
        $this->validateEmails($email, $confirmEmail);
        $this->validatePasswords($password, $confirmPassword);

        if (empty($this->errorArray)) {
            // TODO: insert into database
            return true;
        } else {
            // don't insert and return false
            return false;
        }
    }

    public function getError($error)
    {
        if (!in_array($error, $this->errorArray)) {
            $error = "";
        }
        return "<span class='errorMessage'>$error</span>";
    }

    private function validateUsername($username)
    {
        // check if length is between 25 and 5 chars
        if (strlen($username) > 25 || strlen($username) < 5) {
            array_push($this->errorArray, Constants::$usernameLengthError);
            return;
        }

        // TODO: check if user exists
    }

    private function validateFirstName($first)
    {
        // check if length is between 25 and 2 chars
        if (strlen($first) > 25 || strlen($first) < 2) {
            array_push($this->errorArray, Constants::$firstNameLengthError);
            return;
        }
    }

    private function validateLastName($last)
    {
        // check if length is between 25 and 2 chars
        if (strlen($last) > 25 || strlen($last) < 2) {
            array_push($this->errorArray, Constants::$lastNameLengthError);
            return;
        }
    }

    private function validateEmails($email, $confirmEmail)
    {
        if ($email != $confirmEmail) {
            array_push($this->errorArray, Constants::$emailDoNotMatchError);
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$emailNotValidError);
            return;
        }

        // TODO: check if email is being used
    }

    private function validatePasswords($password, $confirmPassword)
    {
        if ($password != $confirmPassword) {
            array_push($this->errorArray, Constants::$passwordsDoNotMatchError);
            return;
        }

        if (preg_match('/[^A-Za-z0-9]/', $password)) {
            array_push($this->errorArray, Constants::$passwordNotValidError);
            return;
        }

        // check if length is between 30 and 5 chars
        if (strlen($password) > 30 || strlen($password) < 5) {
            array_push($this->errorArray, Constants::$passwordLengthError);
            return;
        }
    }
}
