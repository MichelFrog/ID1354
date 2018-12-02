<?php
namespace Tasty\View;

use Id1354fw\View\AbstractRequestHandler;
use Tasty\Controller\Controller;
use Tasty\Util\Constants;

class Login extends AbstractRequestHandler{
    private $username;
    private $password;


    public function setUsername($username) {$this->username = $username;}

    public function setPassword($password) {$this->password = $password;}

    protected function doExecute()
    {
        $this->session->restart();
        $ctrl = $this->session->get(Constants::CONTR_KEY);
        if(ctype_alnum($_POST['username']) AND ctype_print($_POST['password'])){
        $login = $ctrl->login($_POST['username'], $_POST['password']);
        if(!is_string($login)) {
            $this->session->set(Constants::USERNAME_VAR, $login->getUsername());
            $this->addVariable(Constants::USERNAME_VAR, $login->getUsername());
            $this->session->set(Constants::USERID_VAR, $login->getUserID());
            $this->addVariable(Constants::USERID_VAR, $login->getUserID());
            $this->session->set(Constants::LOGIN_STATUS, true);
            $this->addVariable(Constants::LOGIN_STATUS, true);
            $this->session->set(Constants::CONTR_KEY,$ctrl);
            echo 'Successfully login!';
            return Constants::INDEX_VIEW;
        }
        else{ 
            echo "$login";
            return Constants::INDEX_VIEW;     
        }
    }
    echo 'Only characters or numbers allowed.';
    return Constants::INDEX_VIEW;     
 
}
    
}