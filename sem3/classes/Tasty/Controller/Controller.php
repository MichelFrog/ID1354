<?php
namespace Tasty\Controller;
use Tasty\Integration\DBH;
use Tasty\Model\Verify;
use Tasty\Util\Constants;
class Controller
{
    private $verify;
    private $username;
    private $db;


    public function __construct()
    {
        $this->db = new DBH();
        $this->verify = new Verify();

    }
    /* Get the username  */
    public function getUsername()
    {
        return $this->username;
    }
    /* Get the username  */
    public function addComment($userid, $date, $comment)
    {
        $input = $this->verify->checkCommentInput($comment);
        if(is_string( $input)){
            return  $input;
        }
        return $this->db->newComment($userid, $date, $comment);
    }

    public function getAllComments()
    {
        return $this->db->showComments();
    }

    public function deleteComment($commentid)
    {
        return $this->db->removeComment($commentid);
    }

    /* LOGIN CALLS */
    public function login($username, $password)
    {
        $this->username = $username;
        $input = $this->verify->checkLoginInput($username, $password);
        if(is_string($input)){
            return $input;
        }
        elseif(is_object($this->db->login($username,$password))){
             return $this->db->login($username,$password);
        }
       return $this->db->login($username,$password);
    }
    public function logout(){
        $this->username = NULL;
    }
    /* SIGNUP CALLS*/
    public function signupUser($username, $email, $pwd, $pwdC)
    {
        $input = $this->verify->checkSignupInput($username, $email, $pwd, $pwdC);
        if(is_string($input)){
            return $input;
        }else
            return $this->db->storeUser($username, $email, $pwd, $pwdC);
    }


}