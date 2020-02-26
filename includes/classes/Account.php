<?php

class Account
{
    public function __construct()
    {
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

    }

    private function validateFirstName($first)
    {

    }

    private function validateLastName($last)
    {

    }

    private function validateEmails($email, $confirmEmail)
    {

    }

    private function validatePasswords($password, $confirmPassword)
    {

    }
}
