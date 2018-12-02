<?php
namespace Tasty\View;

use Id1354fw\View\AbstractRequestHandler;
use Tasty\Controller\Controller;
use Tasty\Model\UserComment;
use Tasty\Util\Constants;


date_default_timezone_set('Europe/Stockholm'); 

class MeatballPage extends AbstractRequestHandler {
    private $userid;
    private $date;
    private $comment;
    private $commentid;
    private $submitcomment;
    private $commentdelete;

    public function setUserid($userid) 
    {$this->userid = $userid;}

    public function setDate($date) 
    {$this->date = $date;}

    public function setComment($comment) 
    {$this->comment = $comment;}

    public function setCommentid($commentid) 
    {$this->commentid = $commentid;}

    public function setSubmitcomment($submitcomment) 
    {$this->submitcomment = $submitcomment;}

    public function setCommentdelete($commentdelete) 
    {$this->commentdelete = $commentdelete;}

    protected function doExecute(){
    $this->session->restart();
    //Controller
    $ctrl = $this->session->get(Constants::CONTR_KEY);
    //Delete comment from database
    if (isset($_POST['commentdelete']) && isset($_POST['commentid'])){
        echo $ctrl->deleteComment($_POST['commentid']);
    }
    //Add new comment
    if (isset($_POST['submitcomment'])){
        echo $ctrl->addComment($_POST['userid'], $_POST['date'], $_POST['comment']);
    }

    //Get new comments and store an object for the next view.
    $this->addVariable(Constants::COMMENTS_VAR, $ctrl->getAllComments());
    return Constants::RECIPE_MEATBALL_VIEW;
    }
}