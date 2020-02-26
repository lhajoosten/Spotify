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
    }

    private function validateUsername($username)
    {
        // check if length is between 25 and 5 chars
        if (strlen($username) > 25 || strlen($username) < 5) {
            array_push($this->errorArray, "Your username must be between 25 & 5 characters");
            return;
        }

        // check if user exists
    }

    private function validateFirstName($first)
    {
        // check if length is between 25 and 5 chars
        if (strlen($first) > 25 || strlen($first) < 2) {
            array_push($this->errorArray, "Your first name must be between 25 & 2 characters");
            return;
        }
    }

    private function validateLastName($last)
    {
        // check if length is between 25 and 5 chars
        if (strlen($last) > 25 || strlen($last) < 2) {
            array_push($this->errorArray, "Your last name must be between 25 & 2 characters");
            return;
        }
    }

    private function validateEmails($email, $confirmEmail)
    {
        if ($email != $confirmEmail) {
            array_push($this->errorArray, "Your emails don't match");
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, "Your email is invalid");
            return;
        }

        // check if email is being used
    }

    private function validatePasswords($password, $confirmPassword)
    {
        if ($password != $confirmPassword) {
            array_push($this->errorArray, "Your passwords don't match");
            return;
        }

        if (preg_match('/[^A-Za-z0-9]/', $password)) {
            array_push($this->errorArray, "Your password can only contain numbers and letters");
            return;
        }

        // check if length is between 30 and 5 chars
        if (strlen($password) > 30 || strlen($password) < 5) {
            array_push($this->errorArray, "Your password must be between 30 & 50 characters");
            return;
        }
    }
}
