<?php
namespace Tasty\Model;

use Tasty\Integration\DBH;

class Verify {

    public function __construct() {
    }

    public function checkLoginInput($username, $password){
        if(empty($username) || empty($password)){
            return 'Please fill in all the fields.'; 
        }elseif (!ctype_alnum($username)){
            return 'Only characters and numbers for username';
        }
            return TRUE;
        }
    public function checkCommentInput($comment){
        if(empty($comment)){
            return 'No blank fields'; 
        }
        elseif(!ctype_alnum($comment)){
            return 'Only letters,numbers allowed. No blank fields';        }
        return TRUE;
    }

    public function checkSignupInput($username, $email, $password, $passwordConfirm){ 

    if(empty($username) || empty($email) || empty($password) || empty($passwordConfirm)) 
    { return 'Empty fields'; }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        return 'Incorrect format for either username or email.';
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return 'Incorrect format on email. Must be: xxxx@xxxxx.com';
    }
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        return 'Incorrect format on username. Only characters or numbers';
    }
    elseif ($password !== $passwordConfirm ){
        return 'Passwords dont match.';
    }
    return TRUE;
    }


}