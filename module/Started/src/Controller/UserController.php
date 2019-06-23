<?php


namespace Started\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class UserController extends AbstractActionController
{
    public function loginAction()
    {
    	echo "login page";
        return false;
    }

    public function logoutAction()
    {
    	echo "logout page";
        return false;
    }
}