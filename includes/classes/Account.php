<?php

class Account
{
    private $con;
    private $errorArray;

    public function __construct($con)
    {
        $this->con = $con;
        $this->errorArray = array();
    }

    public function login($username, $password)
    {
        $pw = md5($password);

        $query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$username' AND password='$pw'");
        if (mysqli_num_rows($query) == 1) {
            return true;
        } else {
            array_push($this->errorArray, Constants::$loginFailed);
            return false;
        }
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
            return $this->insertUserData($username, $first, $last, $email, $password);
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

    private function insertUserData($username, $first, $last, $email, $password)
    {
        $encryptedPassword = md5($password);
        $profilePic = "assets/images/profile-pics/profile-pic.png";
        $date = date("Y-m-d");

        return mysqli_query($this->con, "INSERT INTO users VALUES ('', '$username', '$first', '$last', '$email', '$encryptedPassword', '$date', '$profilePic')");
    }

    private function validateUsername($username)
    {
        // check if length is between 25 and 5 chars
        if (strlen($username) > 25 || strlen($username) < 5) {
            array_push($this->errorArray, Constants::$usernameLengthError);
            return;
        }

        $checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$username'");
        if (mysqli_num_rows($checkUsernameQuery) != 0) {
            array_push($this->errorArray, Constants::$usernameTaken);
            return;
        }
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

        $checkEmailQuery = mysqli_query($this->con, "SELECT username FROM users WHERE email='$email'");
        if (mysqli_num_rows($checkEmailQuery) != 0) {
            array_push($this->errorArray, Constants::$emailTaken);
            return;
        }
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
